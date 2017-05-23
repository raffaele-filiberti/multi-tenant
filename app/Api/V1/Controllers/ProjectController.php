<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\GoogleUpload;
use App\Api\V1\Requests\ProjectRequest;

use App\Project;
use App\Customer;

use Auth;

use Aws\Laravel\AwsFacade as AWS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($customer_id)
    {
        // role dell'agenzia vedonono tutti i project
        if(Auth::user()->hasRole(['admin', 'designer', 'creative_director'])) {
            return Response()->json([
                'projects' => Customer::find($customer_id)->projects()->get()
            ]);
        }

        // i clienti vedono solo i progetti condivisi con loro
        if(Auth::user()->can('view_projects')) {
            return Response()->json([
                'projects' => Customer::find($customer_id)->projects()
                    ->where('private', '=', false)
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
    public function store(ProjectRequest $request, $customer_id)
    {
        $customer = Customer::find($customer_id);
//        $google_drive = new GoogleUpload();
//        $folder_id = $google_drive->create_folder($request->input('name'), $customer->folder_id);

        $project = $customer->projects()->create([
            'folder_id' => null,
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'private' => $request->input('private')
        ]);

        $bucket = preg_replace('/\s*/', '', $project->agency->name);

        $s3 = AWS::createClient('s3');
        $s3->putObject(array(
            'Bucket' => strtolower($bucket),
            'Key'    => $project->name . '/',
            'Body'   => '',
        ));

        return Response()->json([
            'status' => 'project created successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customer_id, $id)
    {
        if(Auth::user()->hasRole('admin')) {
            return Response()->json([
                'projects' => Project::find($id)
            ]);
        }

        // i clienti vedono solo i progetti condivisi con loro
        if(Auth::user()->can('view_projects')) {
            $project = Project::find($id);
            if($project->private) {
                return Response()->json([
                    'projects' => $project
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
    public function update(ProjectRequest $request, $customer_id, $id)
    {
        $project = Project::find($id);
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->archivied = $request->input('archivied');
        $project->private = $request->input('private');
        $project->save();

        return Response()->json([
            'status' => 'project updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer_id, $id)
    {
        $project = Project::find($id);
        $project->delete();

        return Response()->json([
            'status' => 'project deleted successfully'
        ]);
    }
}
