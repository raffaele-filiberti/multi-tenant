<?php

namespace App\Api\V1\Controllers;

use App\Detail;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\DetailRequest;
use App\Step;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($template_id, $step_id)
    {
        return Response()->json([
            'details' => Step::find($step_id)->details()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailRequest $request, $template_id, $step_id)
    {
        $detail = Step::find($step_id)->details()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'roled' => $request->input('roled'),
            'detail_type' => $request->input('detail_type')
        ]);

        return Response()->json([
            'status' => 'detail created successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($template_id, $step_id, $id)
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
    public function update(DetailRequest $request, $template_id, $step_id, $id)
    {
        $detail = Detail::find($id);
        $detail->name = $request->input('name');
        $detail->description = $request->input('description');
        $detail->roled = $request->input('roled');
        $detail->detail_type = $request->input('detail_type');
        $detail->save();

        return Response()->json([
            'status' => 'detail updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($template_id, $step_id, $id)
    {
        $detail = Detail::find($id);
        $detail->delete();

        return Response()->json([
            'status' => 'detail deleted successfully'
        ]);
    }
}
