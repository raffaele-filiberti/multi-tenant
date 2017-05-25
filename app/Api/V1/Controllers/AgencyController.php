<?php

namespace App\Api\V1\Controllers;

use App\Agency;
use App\Api\V1\Requests\AgencyRequest;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @resource AgencyController
 * @package App\Api\V1\Controllers
 */
class AgencyController extends Controller
{

    /**
     * Display a listing of the agencies.
     */
    public function index()
    {
        return Response()->json([
            'agencies' => Agency::all()
        ]);
    }

    /**
     * Display the specified agency.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return Response()->json([
            'agency' => Agency::find($id)
        ]);
    }

    /**
     * Update the specified agency in storage.
     *
     * @param AgencyRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AgencyRequest $request, $id)
    {
        $agency = Agency::find($id);
        $agency->name = $request->input('name');
        $agency->motto = $request->input('motto');
        $agency->description = $request->input('description');
        $agency->save();

        return Response()->json([
            'status' => 'agency updated successfully'
        ]);
    }
}
