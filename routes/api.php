<?php

use Dingo\Api\Routing\Router;

$api = app(Router::class);
//TODO: fix middleware role & perms
$api->version('v1', function (Router $api) {

    // AUTH ROUTES
    // role: nessuna
    $api->group(['prefix' => 'auth', 'namespace' => 'App\\Api\\V1\\Controllers\\'], function(Router $api) {
        $api->post('agency/signup', 'SignUpController@signUpAsAgency');
        $api->post('signup', 'SignUpController@signUpAsSubscriber');
        $api->post('login', 'LoginController@login');

        $api->post('recovery', 'ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'ResetPasswordController@resetPassword');
    });

    //role : admin
    $api->group(['middleware' => 'role:admin', 'namespace' => 'App\\Api\\V1\\Controllers\\'], function(Router $api) {

        //SUBSCRIBE ROUTES
        $api->get('subscriber', 'UserController@getSubscriber');
        $api->post('{user_id}/confirm', 'UserController@confirmSubscribe');
        $api->post('{user_id}/subscribe', 'UserController@removeSubscribe');

        //USER ROUTES
        $api->resource('users', 'UserController', ['except' => ['create', 'edit']]);

        //CUSTOMER ROUTES
        $api->resource('customers', 'CustomerController', ['except' => ['create', 'edit']]);

        //PROJECT ROUTES
        $api->resource('customers/{customer_id}/projects', 'ProjectController', ['except' => ['create', 'edit']]);

        //TASK ROUTES
        $api->resource('customers/{customer_id}/projects/{project_id}/tasks', 'TaskController', ['except' => ['create', 'edit']]);

        //FILE STEP TASK ROUTES
        $api->post('customers/{customer_id}/projects/{project_id}/tasks/{task_id}/files', 'FileController@storeStepFiles');

        //FILE LIST STEP TASK ROUTE
        $api->get('customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files', 'FileController@getStepFiles');

        //FILE APPPROVATION STEP TASK ROUTES
        $api->post('customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/approve', 'FileController@approveStepFiles');

        //FILE DISAPPROVATION STEP TASK ROUTES
        $api->post('customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/disapprove', 'FileController@disapproveStepFiles');

        //DATE STEP TASK ROUTES
        $api->post('customers/{customer_id}/projects/{project_id}/tasks/{task_id}/dates', 'DateController@storeStepDates');

        //DATE LIST STEP TASK ROUTE
        $api->get('customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates', 'DateController@getStepDates');

        //DATE CONFIRMATION STEP TASK ROUTES
        $api->post('customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/approve', 'DateController@approveStepDates');

        //DATE DISAPPROVATION STEP TASK ROUTES
        $api->post('customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/disapprove', 'DateController@disapproveStepDates');

        //DATE DELETE STEP TASK ROUTES
        $api->delete('customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}', 'DateController@destroy');


        //TEMPLATE ROUTES
        $api->resource('templates', 'TemplateController', ['except' => ['create', 'edit']]);

        //STEP_TEMPLATE ROUTES
        $api->resource('templates/{template_id}/steps', 'StepController', ['except' => ['create', 'edit']]);

        //DETAIL_TEMPLATE ROUTES
        $api->resource('templates/{template_id}/steps/{detail_id}/details', 'DetailController', ['except' => ['create', 'edit']]);

        //AGENCIES ROUTES
        $api->get('agencies', 'AgencyController@index');
        $api->get('agencies/{id}', 'AgencyController@show');
        $api->put('agencies/{id}', 'AgencyController@update');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {

        //TENANT TEST
        $api->get('tenant', function() {

            return response()->json([
                'message' => 'This is a tenancy test',
                'tenant' => Landlord::getTenants(),
                'users' => \App\User::where('subscribed', '=', true)->get()
            ]);
        });

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
