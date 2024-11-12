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
    '/cursos' => 'CursosController@index',
    '/cadcurso' => 'CursosController@InsertCurso',

    // Tarefa
    '/tarefas' => 'TarefasController@index'
];