## Multy-tenancy Restful API CRM 
based on Laravel Framework

### routes beta
```
| Host | Method    | URI                                                             | Name              | Action
|      | POST      | /api/auth/agency/signup                                         |                   | App\Api\V1\Controllers\SignUpController@signUpAsAgency
|      | POST      | /api/auth/signup                                                |                   | App\Api\V1\Controllers\SignUpController@signUpAsSubscriber
|      | POST      | /api/auth/login                                                 |                   | App\Api\V1\Controllers\LoginController@login
|      | POST      | /api/auth/recovery                                              |                   | App\Api\V1\Controllers\ForgotPasswordController@sendResetEmail
|      | POST      | /api/auth/reset                                                 |                   | App\Api\V1\Controllers\ResetPasswordController@resetPassword
|      | GET|HEAD  | /api/subscriber                                                 |                   | App\Api\V1\Controllers\UserController@getSubscriber
|      | POST      | /api/{user_id}/confirm                                          |                   | App\Api\V1\Controllers\UserController@confirmSubscribe
|      | POST      | /api/{user_id}/subscribe                                        |                   | App\Api\V1\Controllers\UserController@removeSubscribe
|      | GET|HEAD  | /api/users                                                      | users.index       | App\Api\V1\Controllers\UserController@index
|      | POST      | /api/users                                                      | users.store       | App\Api\V1\Controllers\UserController@store
|      | GET|HEAD  | /api/users/{user}                                               | users.show        | App\Api\V1\Controllers\UserController@show
|      | PUT|PATCH | /api/users/{user}                                               | users.update      | App\Api\V1\Controllers\UserController@update
|      | DELETE    | /api/users/{user}                                               | users.destroy     | App\Api\V1\Controllers\UserController@destroy
|      | GET|HEAD  | /api/customers                                                  | customers.index   | App\Api\V1\Controllers\CustomerController@index
|      | POST      | /api/customers                                                  | customers.store   | App\Api\V1\Controllers\CustomerController@store
|      | GET|HEAD  | /api/customers/{customer}                                       | customers.show    | App\Api\V1\Controllers\CustomerController@show
|      | PUT|PATCH | /api/customers/{customer}                                       | customers.update  | App\Api\V1\Controllers\CustomerController@update
|      | DELETE    | /api/customers/{customer}                                       | customers.destroy | App\Api\V1\Controllers\CustomerController@destroy
|      | GET|HEAD  | /api/customers/{customer_id}/projects                           | projects.index    | App\Api\V1\Controllers\ProjectController@index
|      | POST      | /api/customers/{customer_id}/projects                           | projects.store    | App\Api\V1\Controllers\ProjectController@store
|      | GET|HEAD  | /api/customers/{customer_id}/projects/{project}                 | projects.show     | App\Api\V1\Controllers\ProjectController@show
|      | PUT|PATCH | /api/customers/{customer_id}/projects/{project}                 | projects.update   | App\Api\V1\Controllers\ProjectController@update
|      | DELETE    | /api/customers/{customer_id}/projects/{project}                 | projects.destroy  | App\Api\V1\Controllers\ProjectController@destroy
|      | GET|HEAD  | /api/customers/{customer_id}/projects/{project_id}/tasks        | tasks.index       | App\Api\V1\Controllers\TaskController@index
|      | POST      | /api/customers/{customer_id}/projects/{project_id}/tasks        | tasks.store       | App\Api\V1\Controllers\TaskController@store
|      | GET|HEAD  | /api/customers/{customer_id}/projects/{project_id}/tasks/{task} | tasks.show        | App\Api\V1\Controllers\TaskController@show
|      | PUT|PATCH | /api/customers/{customer_id}/projects/{project_id}/tasks/{task} | tasks.update      | App\Api\V1\Controllers\TaskController@update
|      | DELETE    | /api/customers/{customer_id}/projects/{project_id}/tasks/{task} | tasks.destroy     | App\Api\V1\Controllers\TaskController@destroy
|      | GET|HEAD  | /api/templates                                                  | templates.index   | App\Api\V1\Controllers\TemplateController@index
|      | POST      | /api/templates                                                  | templates.store   | App\Api\V1\Controllers\TemplateController@store
|      | GET|HEAD  | /api/templates/{template}                                       | templates.show    | App\Api\V1\Controllers\TemplateController@show
|      | PUT|PATCH | /api/templates/{template}                                       | templates.update  | App\Api\V1\Controllers\TemplateController@update
|      | DELETE    | /api/templates/{template}                                       | templates.destroy | App\Api\V1\Controllers\TemplateController@destroy
|      | GET|HEAD  | /api/templates/{template_id}/steps                              | steps.index       | App\Api\V1\Controllers\StepController@index
|      | POST      | /api/templates/{template_id}/steps                              | steps.store       | App\Api\V1\Controllers\StepController@store
|      | GET|HEAD  | /api/templates/{template_id}/steps/{step}                       | steps.show        | App\Api\V1\Controllers\StepController@show
|      | PUT|PATCH | /api/templates/{template_id}/steps/{step}                       | steps.update      | App\Api\V1\Controllers\StepController@update
|      | DELETE    | /api/templates/{template_id}/steps/{step}                       | steps.destroy     | App\Api\V1\Controllers\StepController@destroy
|      | GET|HEAD  | /api/templates/{template_id}/steps/{detail_id}/details          | details.index     | App\Api\V1\Controllers\DetailController@index
|      | POST      | /api/templates/{template_id}/steps/{detail_id}/details          | details.store     | App\Api\V1\Controllers\DetailController@store
|      | GET|HEAD  | /api/templates/{template_id}/steps/{detail_id}/details/{detail} | details.show      | App\Api\V1\Controllers\DetailController@show
|      | PUT|PATCH | /api/templates/{template_id}/steps/{detail_id}/details/{detail} | details.update    | App\Api\V1\Controllers\DetailController@update
|      | DELETE    | /api/templates/{template_id}/steps/{detail_id}/details/{detail} | details.destroy   | App\Api\V1\Controllers\DetailController@destroy
```
