<?php
$routes = [
    '/' => 'HomeController@index',
    '/login' => 'UserController@index',
    '/users/{id}' => 'UserController@show'
];