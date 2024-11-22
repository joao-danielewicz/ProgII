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
    '/updatecurso' => 'CursosController@UpdateCurso',
    '/deletecurso' => 'CursosController@DeleteCurso',

    // Tarefa
    '/tarefas' => 'TarefasController@index',
    '/cadtarefa' => 'TarefasController@InsertTarefa',
    '/userupdatetarefa' => 'TarefasController@UserUpdateTarefa',
    '/deletetarefa' => 'TarefasController@DeleteTarefa',
    '/estudo' => 'TarefasController@estudo',
    '/estudartarefa' => 'TarefasController@estudartarefas',

    // Itens cosméticos
    '/itensadmin' => 'CosmeticsController@admin',
    '/caditem' => 'CosmeticsController@InsertItem',
    '/updateitem' => 'CosmeticsController@UpdateItem',
    '/deleteitem' => 'CosmeticsController@DeleteItem'
];