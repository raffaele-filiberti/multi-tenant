<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\TemplateRequest;
use App\Step;
use App\Template;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response()->json([
            'templates' => Template::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemplateRequest $request)
    {
        $template = Template::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        if($request->has('steps')){
            $arr_steps = $request->input('steps');
            foreach ($arr_steps as $arr_step) {
                $step = Template::find($template->id)->steps()->create([
                    'name' => $arr_step['name'],
                    'description' => $arr_step['description']
                ]);
                if($arr_step['details']){
                    foreach ($arr_step['details'] as $detail)
                    {
                        Step::find($step->id)->details()->create([
                            'name' => empty($detail['name']) ? null : $detail['name'],
                            'description' => empty($detail['description']) ? null : $detail['description']
                        ]);
                    }
                }
            }
        }

        return Response()->json([
            'request' => $request->all(),
            'status' => 'template created successfully'
        ]);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            return Response()->json([
                'template' => Template::find($id)
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TemplateRequest $request, $id)
    {
        $template = Template::find($id);
        $template->name = $request->input('name');
        $template->description = $request->input('description');
        $template->save();

        return Response()->json([
            'status' => 'template updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = Template::find($id);
        $template->delete();

        return Response()->json([
            'status' => 'template deleted successfully'
        ]);
    }
}
