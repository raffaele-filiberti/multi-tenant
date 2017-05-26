<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\GoogleUpload;
use App\Api\V1\Requests\customerRequest;
use App\Customer;
use App\User;
use Aws\Laravel\AwsFacade as AWS;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response()->json([
            'customers' => Customer::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(customerRequest $request)
    {
//        creo la cartella su drive
//        $google_drive = new GoogleUpload();
//        $folder_id = $google_drive->create_folder($request->input('name'));

        $folder_id = null;

        $customer = Customer::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'folder_id' => ($folder_id)? $folder_id : null,
        ]);

        $bucket = preg_replace('/\s*/', '', $customer->agency->name);

        $s3 = AWS::createClient('s3');
        $s3->putObject(array(
            'Bucket' => strtolower($bucket),
            'Key'    => $customer->name . '/',
            'Body'   => '',
        ));

        return Response()->json([
            'status' => 'customer created successfully'
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
            'customer' => Customer::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(customerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $old_name = $customer->name;
        $customer->name = $request->input('name');
        $customer->description = $request->input('description');
        $customer->save();

        $bucket = preg_replace('/\s*/', '', $customer->agency->name);

        $s3 = AWS::createClient('s3');
        $s3->copyObject(array(
            'Bucket' => strtolower($bucket),
            'CopySource' => $old_name . '/',
            'Key'    => $customer->name . '/',
            'Body'   => '',
        ));
        unlink('s3://' . strtolower($bucket) . '/' . $customer->name . '/');

        return Response()->json([
            'status' => 'customer updated successfully'
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
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return Response()->json([
            'status' => 'customer deleted successfully'
        ]);
    }

    public function getTasks($customer_id)
    {
        return response()->json([
           'tasks' => Customer::findOrFail($customer_id)->tasks()->get()
        ]);
    }
}
