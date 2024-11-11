<?php
declare(strict_types=1);

class Router {
    private array $routes = [];

    private function normalizarCaminho(string $caminho): string {
        $caminho = trim($caminho, '/');
        $caminho = "/{$caminho}/";
        $caminho = preg_replace('#[/]{2,}#', '/', $caminho);
        return $caminho;
    }
    
    public function AdicionarRota(string $metodo, string $caminho, array $controller){
        $caminho = $this->normalizarCaminho($caminho);

        $this->routes[] = [
            'path' => $caminho,
            'method' => strtoupper($metodo),
            'controller' => $controller,
            'middlewares' => []
        ]; 
    }

    public function dispatch(string $caminho) {
        $caminho = $this->normalizarCaminho($caminho);
        $method = strtoupper($_SERVER['REQUEST_METHOD']);

        foreach ($this->routes as $route) {
        if (
            !preg_match("#^{$route['path']}$#", $caminho) ||
            $route['method'] !== $method
        ) {
            continue;
        }

        $controller = $route['controller'][0];
        require_once __DIR__."/Controllers/$controller.php";
        
        [$class, $function] = $route['controller'];

        $controllerInstance = new $class;

        $controllerInstance->{$function}();
        }
    }

}