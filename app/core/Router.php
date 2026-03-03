<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    /** @var array<string, array<int, array{pattern:string,action:array}>> */
    private array $routes = ['GET' => [], 'POST' => []];

    public function get(string $path, array $action): void
    {
        $this->routes['GET'][] = ['pattern' => $this->pattern($path), 'action' => $action];
    }

    public function post(string $path, array $action): void
    {
        $this->routes['POST'][] = ['pattern' => $this->pattern($path), 'action' => $action];
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $routes = $this->routes[$method] ?? [];

        foreach ($routes as $route) {
            if (preg_match($route['pattern'], $path, $matches)) {
                array_shift($matches);
                [$controllerClass, $controllerMethod] = $route['action'];
                $controller = new $controllerClass();
                $controller->$controllerMethod(...$matches);
                return;
            }
        }

        http_response_code(404);
        echo 'Page not found';
    }

    private function pattern(string $path): string
    {
        $escaped = preg_replace('#\{[a-zA-Z_][a-zA-Z0-9_]*\}#', '([^/]+)', $path);
        return '#^' . $escaped . '$#';
    }
}
