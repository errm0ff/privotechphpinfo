<?php
class Router {
    private $routes = [];
    private $basePath = '';

    public function __construct($basePath = '') {
        $this->basePath = rtrim($basePath, '/');
    }

    public function addRoute($route, $handler, $method = 'GET') {
        $this->routes[] = [
            'route' => $this->basePath . $route,
            'handler' => $handler,
            'method' => strtoupper($method)
        ];
    }

    public function handleRequest() {
        $requestUri = str_replace($this->basePath, '', $_SERVER['REQUEST_URI']);
        $requestUri = parse_url($requestUri, PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        // Remove trailing slash and ensure it starts with /
        $requestUri = '/' . trim($requestUri, '/');

        foreach ($this->routes as $route) {
            // Convert route pattern to regex
            $pattern = $this->convertRouteToRegex($route['route']);
            
            if (preg_match($pattern, $requestUri, $matches) && $route['method'] === $requestMethod) {
                array_shift($matches); // Remove full match
                $this->callHandler($route['handler'], $matches);
                return;
            }
        }

        // No route found - show 404
        $this->show404();
    }

    private function convertRouteToRegex($route) {
        $pattern = preg_replace('/\//', '\\/', $route);
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^\/]+)', $pattern);
        return '/^' . $pattern . '$/';
    }

    private function callHandler($handler, $params = []) {
        if (is_callable($handler)) {
            call_user_func_array($handler, $params);
        } elseif (is_string($handler) && file_exists($handler)) {
            include $handler;
        } else {
            $this->show404();
        }
    }

    private function show404() {
        header("HTTP/1.0 404 Not Found");
        include '404.php';
        exit;
    }
}
?>