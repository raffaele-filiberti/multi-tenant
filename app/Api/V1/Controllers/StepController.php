<?php

namespace App\Api\V1\Controllers;

use App\Step;
use App\Template;
use App\Api\V1\Requests\StepRequest;

use App\Http\Controllers\Controller;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($template_id)
    {
        return Response()->json([
            'steps' => Template::find($template_id)->steps()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepRequest $request, $template_id)
    {
        $step = Template::find($template_id)->steps()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return Response()->json([
            'status' => 'step created successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($template_id, $id)
    {
        return Response()->json([
            'step' => Step::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StepRequest $request, $template_id, $id)
    {
        $step = Step::find($id);
        $step->name = $request->input('name');
        $step->description = $request->input('description');
        $step->save();

        return Response()->json([
            'status' => 'step updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($template_id, $id)
    {
        $step = Step::find($id);
        $step->delete();

        return Response()->json([
            'status' => 'step deleted successfully'
        ]);
    }
}
