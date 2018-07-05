<?php

return [

    'default' => env('OXXA_CONNECTION', 'default'),

    'connections' => [

        'default' => [
            'username' => env('OXXA_DEFAULT_USERNAME'),
            'password' => env('OXXA_DEFAULT_PASSWORD'),
        ],

        'test' => [
            'username' => env('OXXA_TEST_USERNAME'),
            'password' => env('OXXA_TEST_PASSWORD'),
            'test' => true,
        ],

    ],

];