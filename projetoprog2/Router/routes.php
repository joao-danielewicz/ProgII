<?php
$routes = [
    '/' => 'HomeController@index',
    '/login' => 'UsuariosController@index',
    '/caduser' => 'UsuariosController@InsertUsuario',
    '/loginuser' => 'UsuariosController@VerificarLogin',
    '/cursos' => 'CursosController@index',
    '/tarefas' => 'TarefasController@index'
];