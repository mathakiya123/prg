<?php
require 'config.php';
require 'app/controllers/UserController.php';

$controller = new UserController($conn);
$action = $_GET['action'] ?? 'index';

if (method_exists($controller, $action)) {
    $controller->$action();
}
?>