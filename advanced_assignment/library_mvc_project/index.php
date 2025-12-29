<?php
// Controller load
require_once "app/controllers/BookController.php";

// Controller object create
$controller = new BookController();

// Action set (important)
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Routing
if ($action == "store") {
    $controller->store();
}
elseif ($action == "edit") {
    $controller->edit();
}
elseif ($action == "update") {
    $controller->update();
}
elseif ($action == "delete") {
    $controller->delete();
}
else {
    $controller->index();
}
