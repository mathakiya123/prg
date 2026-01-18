<?php
/* 7. WebServices
o Exercise:Create a webservice that return sproduct data.
o Tasks:
 Implementa RESTful service to fetch product details.
 Handle errors gracefully.*/


header("Content-Type: application/json");

// Sample product data (normally DB ma hoy)
$products = [
    1 => ["id" => 1, "name" => "Laptop", "price" => 55000],
    2 => ["id" => 2, "name" => "Mobile", "price" => 25000],
    3 => ["id" => 3, "name" => "Headphones", "price" => 3000],
];

// Only GET method allowed
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        "status" => "error",
        "message" => "Only GET method is allowed"
    ]);
    exit;
}

// Check product ID
if (!isset($_GET['id'])) {
    http_response_code(400); // Bad Request
    echo json_encode([
        "status" => "error",
        "message" => "Product ID is required"
    ]);
    exit;
}

$id = $_GET['id'];

// Fetch product
if (isset($products[$id])) {
    http_response_code(200); // OK
    echo json_encode([
        "status" => "success",
        "data" => $products[$id]
    ]);
} else {
    http_response_code(404); // Not Found
    echo json_encode([
        "status" => "error",
        "message" => "Product not found"
    ]);
}
?>
