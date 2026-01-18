<?php
header("Content-Type: application/json");

// Simulated data (normally from database)
$users = [
    ["id" => 1, "name" => "Rahul"],
    ["id" => 2, "name" => "Amit"],
    ["id" => 3, "name" => "Priya"]
];

// Get HTTP method
$method = $_SERVER['REQUEST_METHOD'];

// Get ID from URL (example: users.php?id=1)
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

/*
 RESTful Routes:
 GET    /users.php        → get all users
 GET    /users.php?id=1   → get single user
 POST   /users.php        → create user
*/

// ===================
// GET Request
// ===================
if ($method == "GET") {

    if ($id) {
        // Resource Identification
        foreach ($users as $user) {
            if ($user['id'] == $id) {
                echo json_encode($user);
                exit;
            }
        }
        http_response_code(404);
        echo json_encode(["message" => "User not found"]);

    } else {
        echo json_encode($users);
    }
}

// ===================
// POST Request
// ===================
elseif ($method == "POST") {

    // Statelessness: data comes in request body
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['name'])) {
        http_response_code(400);
        echo json_encode(["message" => "Name required"]);
        exit;
    }

    $newUser = [
        "id" => rand(100, 999),
        "name" => $data['name']
    ];

    http_response_code(201);
    echo json_encode([
        "message" => "User created",
        "user" => $newUser
    ]);
}

else {
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed"]);
}
