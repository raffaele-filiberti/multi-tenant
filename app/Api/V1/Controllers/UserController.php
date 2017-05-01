<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\UserRequest;

use App\Customer;
use App\User;
use App\Role;

use App\Http\Controllers\Controller;
use Dingo\Api\Contract\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return Response()->json([
            'users' => User::with('roles', 'customers')->get()
        ]);
    }

    public function show($id)
    {
        return Response()->json([
            'users' => User::with('roles', 'customers')->find($id)
        ]);
    }

    public function store(UserRequest $request) {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'subscribed' => true
        ]);

        $user->customers()->attach($request->input('customer_id'));
        $user->roles()->attach($request->input('role_id'));

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

        if($request->has('customer_id'))
            $user->customers()->sync([$request->input('customer_id')]);
        else
            $user->customers()->detach();

        if(!empty($request->input('role_id')))
            $user->roles()->sync([$request->input('role_id')]);

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

    public function confirmSubscribe(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $role = Role::find($request->input('role_id'));

        $user->subscribed = true;
        $user->save();

        $user->roles()->attach($role->id);

        return Response()->json([
            'status' => 'The Administrator has allowed your subscription'
        ]);
    }

    public function RemoveSubscribe($id)
    {
        $user = User::find($id);
        $user->delete();

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
