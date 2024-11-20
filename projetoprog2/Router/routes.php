<?php
$routes = [
    // Início
    '/' => 'HomeController@index',

    // Usuário
    '/login' => 'UsuariosController@login',
    '/cadastro' => 'UsuariosController@cadastro',
    '/caduser' => 'UsuariosController@InsertUsuario',
    '/loginuser' => 'UsuariosController@VerificarLogin',

    // Curso
    '/meuscursos' => 'CursosController@index',
    '/cadcurso' => 'CursosController@InsertCurso',

    // Tarefa
    '/curso' => 'TarefasController@index',
    '/cadtarefa' => 'TarefasController@InsertTarefa'
];