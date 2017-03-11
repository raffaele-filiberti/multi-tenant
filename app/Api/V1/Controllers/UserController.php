<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\UserRequest;

use App\User;
use App\Role;

use App\Http\Controllers\Controller;
use Dingo\Api\Contract\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return Response()->json([
            'users' => User::all()
        ]);
    }

    public function show($id)
    {
        return Response()->json([
            'users' => User::findOrFail($id)
        ]);
    }

    public function store(UserRequest $request) {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'subscribed' => true
        ]);

        return Response()->json([
            'status' => 'user created successfully'
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->subscribed = true;
        $user->save();

        return Response()->json([
            'status' => 'user updated successfully'
        ]);
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return Response()->json([
            'status' => 'user deleted successfully'
        ]);
    }

    public function getSubscriber()
    {
        return Response()->json([
            'users' => User::where('subscribed','=',false)->get()
        ]);
    } 

    // TODO: add costumers relationship
    public function confirmSubscribe(Request $request, $id)
    {
        $user = User::find($id);
        $user->subscribed = true;
        $user->save();

        $role = Role::find($request->input('id'));
        $user->roles()->attach($role->id);

        return Response()->json([
           'status' => 'The Administrator has allowed your subscription'
        ]);
    }

    public function RemoveSubscribe($id)
    {
        $user = User::find($id);
        $user->subscribed = false;
        $user->agency_id = null;
        $user->save();

        return Response()->json([
            'status' => 'The Administrator has removed you to the agency'
        ]);
    }

    public function Ibernate($id = null)
    {
        if($id)
        {
            $user = User::find($id);
            $user->ibernate = true;
            $user->save();
        }
    }


}
