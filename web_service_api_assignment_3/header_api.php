<?php
/*  CreateAPIwithHeader
- Tasks:
 Create an API end point that accepts a custom header and responds
with the header value. */





// REST API header
header("Content-Type: application/json");

// Custom header read karna
// Apache / XAMPP me mostly getallheaders() use hota hai
$headers = getallheaders();

// Check custom header exist kare chhe ke nahi
if (isset($headers['X-Student-Name'])) {

    $studentName = $headers['X-Student-Name'];

    echo json_encode([
        "status" => "success",
        "message" => "Custom header received",
        "student_name" => $studentName
    ]);

} else {

    http_response_code(400);

    echo json_encode([
        "status" => "error",
        "message" => "Custom header X-Student-Name missing"
    ]);
}
?>
