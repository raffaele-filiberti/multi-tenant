<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\CostumerRequest;
use App\Costumer;
use App\User;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response()->json([
            'costumers' => Costumer::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostumerRequest $request)
    {
        $costumer = Costumer::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        Auth::user()->costumers()->attach($costumer->id);

        return Response()->json([
            'status' => 'costumer created successfully'
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
            'costumer' => Costumer::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CostumerRequest $request, $id)
    {
        $costumer = Costumer::findOrFail($id);
        $costumer->name = $request->input('name');
        $costumer->description = $request->input('description');
        $costumer->save();

        return Response()->json([
            'status' => 'costumer updated successfully'
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
        $costumer = Costumer::findOrFail($id);
        $costumer->delete();

        return Response()->json([
            'status' => 'costumer deleted successfully'
        ]);
    }

    public function syncUser()
    {

    }
}
