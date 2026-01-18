<?php
/* Implement end points for CRUD operations(Create,Read,Update,
Delete)onproducts */




header("Content-Type: application/json");

// Data file
$file = "products.json";

// Read existing products
$products = json_decode(file_get_contents($file), true);

// Get HTTP method
$method = $_SERVER['REQUEST_METHOD'];

/* ================= CREATE PRODUCT ================= */
if ($method == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['name']) || !isset($data['price'])) {
        http_response_code(400);
        echo json_encode(["error" => "Name and price required"]);
        exit;
    }

    $newProduct = [
        "id" => time(),
        "name" => $data['name'],
        "price" => $data['price']
    ];

    $products[] = $newProduct;
    file_put_contents($file, json_encode($products, JSON_PRETTY_PRINT));

    echo json_encode(["status" => "Product created", "product" => $newProduct]);
}

/* ================= READ PRODUCTS ================= */
elseif ($method == "GET") {

    echo json_encode($products);
}

/* ================= UPDATE PRODUCT ================= */
elseif ($method == "PUT") {

    $data = json_decode(file_get_contents("php://input"), true);

    foreach ($products as &$product) {
        if ($product['id'] == $data['id']) {
            $product['name'] = $data['name'];
            $product['price'] = $data['price'];
        }
    }

    file_put_contents($file, json_encode($products, JSON_PRETTY_PRINT));

    echo json_encode(["status" => "Product updated"]);
}

/* ================= DELETE PRODUCT ================= */
elseif ($method == "DELETE") {

    $data = json_decode(file_get_contents("php://input"), true);

    $products = array_filter($products, function ($product) use ($data) {
        return $product['id'] != $data['id'];
    });

    file_put_contents($file, json_encode(array_values($products), JSON_PRETTY_PRINT));

    echo json_encode(["status" => "Product deleted"]);
}

else {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed"]);
}
?>
