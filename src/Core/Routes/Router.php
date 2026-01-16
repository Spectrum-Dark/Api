<?php

namespace App\Core\Routes;

use App\Core\Helpers\Response;

class Router
{
    private array $routes = [];
    private string $prefix = '';

    public function prefix(string $prefix, callable $callback)
    {
        $previous = $this->prefix;
        $this->prefix .= $prefix;
        $callback($this);
        $this->prefix = $previous;
    }

    private function add(string $method, string $uri, callable $action, array $middleware)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $this->prefix . $uri,
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function get(string $uri, callable $action, array $middleware = [])
    {
        $this->add('GET', $uri, $action, $middleware);
    }

    public function post(string $uri, callable $action, array $middleware = [])
    {
        $this->add('POST', $uri, $action, $middleware);
    }

    public function put(string $uri, callable $action, array $middleware = [])
    {
        $this->add('PUT', $uri, $action, $middleware);
    }

    public function delete(string $uri, callable $action, array $middleware = [])
    {
        $this->add('DELETE', $uri, $action, $middleware);
    }

    private function toRegex(string $uri): string
    {
        // Convierte {id} en regex
        return "#^" . preg_replace('/\{(\w+)\}/', '([^/]+)', $uri) . "$#";
    }

    public function run()
    {
        $requesUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        /* Incluimos el basepath para que no afecte a las rutas */
        $basePath = str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));
        $requesUri = str_replace($basePath, '', $requesUri);

        foreach ($this->routes as $route) {
            // Verificamos Método y URI
            if ($route['method'] === $requestMethod && preg_match($this->toRegex($route['uri']), $requesUri, $params)) {
                array_shift($params);

                // EJECUTAR MIDDLEWARE
                foreach ($route['middleware'] as $middleware) {
                    // Instanciamos la clase del middleware y llamamos a handle
                    call_user_func([new $middleware, 'handle']);
                }

                return call_user_func_array($route['action'], $params);
            }
        }
        //Helper para el 404
        Response::Json(404, 'Ruta no encontrada');
    }
}
