<?php

return [
    'GET' => [
        '/' => 'ServiceController@index',
        '/services' => 'ServiceController@index',
        '/services/create' => 'ServiceController@create',
        '/Appointments/create' => 'AppointmentController@create',
    ],

    'POST' => [
        '/services/store' => 'ServiceController@store',
        '/Appointments/store' => 'AppointmentController@store'
        
    ]
];

