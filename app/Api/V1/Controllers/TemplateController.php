<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\TemplateRequest;
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

        return Response()->json([
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
