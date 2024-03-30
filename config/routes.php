<?php

return [
    [
        'method' => 'GET',
        'path' => '/',
        'controller' => 'App\\Controller\\BadmController:formBadm'
    ],
    [
        'method' => 'GET',
        'path' => '/list',
        'controller' => 'Tutorial\\Fastroute\\Controller\\LinksController:index'
    ],
    [
        'method' => ['GET', 'POST'],
        'path' => '/add',
        'controller' => 'Tutorial\\Fastroute\\Controller\\LinksController:add'
    ],
];
