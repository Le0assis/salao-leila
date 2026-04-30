<?php

namespace App\Core;

use \PDO;

class Router
{
    private $pdo;
    private array $routes = [];

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function load(array $routes): void
    {
        $this->routes = $routes;
    }

    public function dispatch(string $uri, string $httpMethod): void
    {
        
        $uri = parse_url($uri, PHP_URL_PATH);

        $basePath = '/salao-leila/public';
        $uri = str_replace($basePath, '', $uri);

        $uri = rtrim($uri, '/');

        if ($uri === '') {
            $uri = '/';
        }

        if (isset($this->routes[$httpMethod][$uri])) {
            $action = $this->routes[$httpMethod][$uri];

            [$controller, $method] = explode('@', $action);

            require_once __DIR__ . '/../Controllers/' . $controller . '.php';

            $controllerClass = "App\\Controllers\\$controller";
            $instance = new $controllerClass($this->pdo);

            $instance->$method();

            return;
        }

        http_response_code(404);
        echo "Página não encontrada";
    }
}