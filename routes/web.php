<?php

return [
    'GET' => [
        '/' => 'ServiceController@index',
        '/services' => 'ServiceController@index',
        '/services/create' => 'ServiceController@create',
        '/appointments/create' => 'AppointmentController@create',
        '/appointments' => 'AppointmentController@index',
        '/appointments/edit/{id}' => 'AppointmentController@edit',
        '/appointments/history' => 'AppointmentController@history',
        '/appointments/history/week' => 'AppointmentController@historyWeek',
        '/appointments/history/month' => 'AppointmentController@historyMonth',
        '/appointments/show/{id}' => 'AppointmentController@show'

    ],

    'POST' => [
        '/services/store' => 'ServiceController@store',
        '/appointments/store' => 'AppointmentController@store',
        '/appointments/update/{id}' => 'AppointmentController@update',
        
    ]
];

