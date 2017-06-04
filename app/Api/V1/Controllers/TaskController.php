<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\GoogleUpload;
use App\Api\V1\Requests\TaskRequest;
use App\Customer;
use App\Project;
use App\Step;
use App\Step_Task;
use App\Task;
use App\Template;
use Auth;

use App\Http\Controllers\Controller;
use Aws\Laravel\AwsFacade as AWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class TaskController
 * @package App\Api\V1\Controllers
 */
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($customer_id, $project_id)
    {
        // role dell'agenzia vedonono tutti i project
        if(Auth::user()->hasRole(['admin', 'designer', 'creative_director'])) {
            return Response()->json([
                'tasks' => Project::find($project_id)->tasks()
                    ->where('archivied', '=', false)
                    ->with(
                        'steps',
                        'steps.details',
                        'step_task',
                        'step_task.detail_step_task.files',
                        'step_task.detail_step_task.dates'
                    )
                    ->get()
            ]);
        }

        // i clienti vedono solo i progetti condivisi con loro
        if(Auth::user()->can('view_tasks')) {
            return Response()->json([
                'tasks' => Project::find($project_id)->tasks()
                    ->where('archivied', '=', false)
                    ->where('private', '=', false)
                    ->with('steps')
                    ->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request, $customer_id, $project_id)
    {
        $project = Project::findOrFail($project_id);
        $customer = Customer::findOrFail($customer_id);
        $google_drive = new GoogleUpload();
        $folder_id = $google_drive->create_folder($request->input('name'), $project->folder_id);

        $task = $project->tasks()->create([
            'folder_id' => $folder_id,
            'user_id' => Auth::user()->id,
            'template_id' => $request->input('template_id'),
            'product_manager_id' => $request->input('product_manager_id'),
            'item_number' => $request->input('item_number', 'n.a'),
            'design_type' => $request->input('design_type'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'country' => $request->input('country', 'EU'),
            'private' => $request->input('private'),
            'deadline' => $request->input('deadline')
        ]);

        try {

            $template = Template::find($task->template_id);

            foreach ($template->steps as $key => $step) {
                //TODO: handle special features for steps
                $task->steps()->attach($step->id,
                    [
                        'expiring_date' => $request->input('steps.' . $key . '.expiring_date'),
                        /*                    'hidden' => $request->input('steps.'.$key.'.hidden'),
                                            'missed' => $request->input('steps.'.$key.'.missed'),
                                            'ref_id' => $request->input('steps.'.$key.'.ref_id'),
                                            'ref_description' => $request->input('steps.'.$key.'.ref_description')*/
                    ]);


                $pivot = $task->steps()->get();

                foreach ($step->details as $detail) {
                    $step_task = Step_Task::find($pivot[$key]->pivot->id);
                    Log::info(
                        ['step task -> ' . $pivot[$key]->pivot->id],
                        ['pivot -> ' . $pivot]);
                    $step_task->details()->attach($detail->id);

                }

            }
        } catch (\Exception $e) {
            $task->steps()->delete();
            $task->delete();
            return Response()->json([
                'status' => $e->getMessage()
            ]);
        }

        $bucket = preg_replace('/\s*/', '', $task->agency->name);

        $s3 = AWS::createClient('s3');
        $s3->putObject(array(
            'Bucket' => strtolower($bucket),
            'Key'    => $customer->name . '/'. $project->name . '/' . $task->name . '/',
            'Body'   => '',
        ));

        return Response()->json([
            'status' => 'task created successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customer_id, $project_id, $id)
    {
        if(Auth::user()->hasRole(['admin', 'designer', 'creative_director'])) {
            $task = Task::findOrFail($id);
            if($task->archivied) {
                return Response()->json([
                    'tasks' => $task
                ]);
            }
        }

        // i clienti vedono solo i progetti condivisi con loro
        if(Auth::user()->can('view_tasks')) {
            $task = Task::findOrFail($id);
            if($task->archivied && $task->private) {
                return Response()->json([
                    'tasks' => $task
                ]);
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** TODO: implementare modifica template  */
    public function update(TaskRequest $request, $customer_id, $project_id, $id)
    {
        $task = Task::find($id);
        $task->product_manager_id = $request->input('product_manager_id');
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->archivied = $request->input('archivied');
        $task->private = $request->input('private');
        $task->billed = $request->input('billed');
        $task->item_number = $request->input('item_number');
        $task->design_type = $request->input('design_type');
        $task->deadline = $request->input('deadline');
        $task->country = $request->input('country');
        $task->save();


        $template = Template::find($task->template_id);

        foreach ($template->steps as $key => $step)
        {
            //TODO: handle special features for steps
            if (!empty($request->input('steps.'.$key.'.expiring_date'))) {
                $task->steps()->updateExistingPivot($step->id,
                    [
                        'expiring_date' => $request->input('steps.' . $key . '.expiring_date'),
                        /*                    'hidden' => $request->input('steps.'.$key.'.hidden'),
                                            'missed' => $request->input('steps.'.$key.'.missed'),
                                            'ref_id' => $request->input('steps.'.$key.'.ref_id'),
                                            'ref_description' => $request->input('steps.'.$key.'.ref_description')*/
                    ]);
            }
        }

        return Response()->json([
            'status' => 'task updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer_id, $project_id, $id)
    {
        $task = Task::find($id);
        $task->delete();

        return Response()->json([
            'status' => 'task deleted successfully'
        ]);
    }
}
