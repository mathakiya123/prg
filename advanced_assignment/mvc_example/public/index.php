<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . '/../app/controller/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require $controllerFile;
    $controllerObj = new $controllerName();

    if (method_exists($controllerObj, $action)) {
        $controllerObj->$action();
    } else {
        echo "Action not found!";
    }
} else {
    echo "Controller not found!";
}
