<?php

use Dingo\Api\Routing\Router;

$api = app(Router::class);
//TODO: setting up costumer e review agency routes
//TODO: fix middleware role & perms
$api->version('v1', function (Router $api) {

    // AUTH ROUTES
    $api->group(['prefix' => 'auth', 'namespace' => 'App\\Api\\V1\\Controllers\\'], function(Router $api) {
        $api->post('agency/signup', 'SignUpController@signUpAsAgency');
        $api->post('signup', 'SignUpController@signUpAsSubscriber');
        $api->post('login', 'LoginController@login');

        $api->post('recovery', 'ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'ResetPasswordController@resetPassword');
    });


    $api->group(['middleware' => 'role:admin', 'namespace' => 'App\\Api\\V1\\Controllers\\'], function(Router $api) {

        //SUBSCRIBE ROUTES
        $api->get('subscriber', 'UserController@getSubscriber');
        $api->post('{id}/confirm', 'UserController@confirmSubscribe');
        $api->post('{id}/subscribe', 'UserController@removeSubscribe');

        //USER ROUTES
        $api->resource('users', 'UserController', ['except' => ['create', 'edit']]);

        $api->resource('costumers', 'CostumerController', ['except' => ['create', 'edit']]);

        //AGENCIES ROUTES
        $api->get('agencies', 'AgencyController@index');
        $api->get('agencies/{id}', 'AgencyController@show');
        $api->put('agencies/{id}', 'AgencyController@update');

        //TENANT TEST
        $api->get('tenant', function() {

            return response()->json([
                'message' => 'This is a tenancy test',
                'tenant' => Landlord::getTenants(),
                'users' => \App\User::where('subscribed', '=', true)->get()
            ]);
        });

    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to this item is only for authenticated user. Provide a token in your request!'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });
});
