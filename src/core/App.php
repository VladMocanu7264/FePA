<?php

//require_once __DIR__ . '/../vendor/altorouter/altorouter/AltoRouter.php';
require_once __DIR__ . '/Controller.php';

class App
{
    protected $router;

    public function __construct($router)
    {
        $this->router = $router;
        require_once __DIR__ . '/../routes/web.php';
        $this->dispatch();
    }

    public function setRouter($router)
    {
        $this->router = $router;
    }

    public function dispatch()
    {
        $match = $this->router->match();

        if ($match) {
            list($controller, $action) = explode('@', $match['target']);
            require_once __DIR__ . '/../controllers/' . $controller . '.php';
            if (is_callable(array(new $controller, $action))) {
                call_user_func_array(array(new $controller, $action), $match['params']);
            } else {
                echo "The method {$action} is not defined in the controller {$controller}";
            }
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            echo '404 Not Found';
            echo '<pre>';
            echo 'Requested URL: ' . htmlspecialchars($_SERVER['REQUEST_URI']) . "\n";
            echo 'Routes: ' . print_r($this->router->getRoutes(), true) . "\n";
            echo '</pre>';
        }
    }
}
