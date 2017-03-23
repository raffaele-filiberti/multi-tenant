<?php

return [

    'sign_up_as_agency' => [
        'release_token' => env('SIGN_UP_RELEASE_TOKEN'),
        'validation_rules' => [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'agency' => 'required|max:255'
        ]
    ],

    'sign_up_as_subscriber' => [
        'release_token' => env('SIGN_UP_RELEASE_TOKEN'),
        'validation_rules' => [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'agency_id' => 'required|integer'
        ]
    ],


    'login' => [
        'validation_rules' => [
            'email' => 'required|email',
            'password' => 'required'
        ]
    ],

    'forgot_password' => [
        'validation_rules' => [
            'email' => 'required|email'
        ]
    ],

    'reset_password' => [
        'release_token' => env('PASSWORD_RESET_RELEASE_TOKEN', false),
        'validation_rules' => [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]
    ]

];
