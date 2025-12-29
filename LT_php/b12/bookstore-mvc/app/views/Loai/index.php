<?php
// Define constants for path
define('ROOT', dirname(__DIR__));
define('APP', ROOT . '/app');

//load config;
require_once ROOT . '/config/database.php';

//auto class loadding
require ROOT . '/config/autoload.php';

// A simple router to determine the controller and action
$url = $_GET['url'] ?? 'loai/index'; // Default route
$url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));

$controllerName = ucfirst($url[0]) . 'Controller'; //HomeController
$action = $url[1] ?? 'index';
$controllerPath = APP . '/controllers/' . $controllerName . '.class.php';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        // Handle 404 action not found
        echo "Action not found";
    }
} else {
    // Handle 404 controller not found
    echo "Controller not found";
}
