<?php
require_once "Router.php";

$router = new Router();

$router->AdicionarRota('GET', '/', [HomeController::class, 'index']);
$router->AdicionarRota('GET', '/login', [UsuariosController::class, 'index']);

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($path); 