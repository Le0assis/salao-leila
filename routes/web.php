<?php

return [
    'GET' => [
        '/' => 'ServiceController@index',
        '/services' => 'ServiceController@index',
        '/services/create' => 'ServiceController@create',
        '/appointments/create' => 'AppointmentController@create',
        '/appointments' => 'AppointmentController@index',
        '/appointments/edit/{id}' => 'AppointmentController@edit',
        '/appointments/history' => 'AppointmentController@history'

    ],

    'POST' => [
        '/services/store' => 'ServiceController@store',
        '/appointments/store' => 'AppointmentController@store',
        '/appointments/update/{id}' => 'AppointmentController@update',
        
    ]
];

