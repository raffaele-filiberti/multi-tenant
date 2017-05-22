<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\SignUpAsAgencyRequest;
use App\Api\V1\Requests\SignUpAsSubscriberRequest;
use App\Customer;
use App\Notifications\NewSubscriberNotification;
use App\Permission;
use Aws\Laravel\AwsFacade as AWS;
use Config;
use Auth;

use App\User;
use App\Agency;
use App\Role;

use Dingo\Api\Http\Response;
use Notification;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\LoginRequest;
use HipsterJazzbo\Landlord\Facades\Landlord;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SignUpController extends Controller
{

    public function signUpAsAgency(SignUpAsAgencyRequest $request, JWTAuth $JWTAuth)
    {
        $agency = Agency::create([
            'name' => $request->input('agency'),
            'motto' => $request->input('motto'),
            'description' => $request->input('description')
        ]);

        Landlord::AddTenant($agency);
        User::bootBelongsToTenants();

        //  assign agency for tenancy belongs to
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'subscribed' => true
        ]);

        $s3 = AWS::createClient('s3');
        $s3->createBucket();
        //  assign role admin to the agency owner
        $role = Role::where('name', '=', 'admin')->first();
        $user->roles()->attach($role->id);

        $token = $JWTAuth->fromUser($user);
        return response()->json([
            'status' => 'ok',
            'token' => $token
        ], 201);
    }

    public function signUpAsSubscriber(SignUpAsSubscriberRequest $request)
    {
        $agency = Agency::find($request->input('agency_id'));
        $customer = Customer::find($request->input('customer_id'));

        Landlord::AddTenant($agency);
        User::bootBelongsToTenants();

        //  assign agency for tenancy belongs to
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        $user->customers()->attach($customer->id);

        $permission = Permission::where('name', '=', 'view_subscribers')->first();
        foreach( $permission->roles as $role ) {
            $users = $role->users;
            Notification::send($users, new NewSubscriberNotification($user));
        }


        return response()->json([
            'status' => 'ok',
            'message' => 'your request has been sent to administrator'
        ], 201);
    }
}
