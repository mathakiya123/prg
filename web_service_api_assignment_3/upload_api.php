<?php
header("Content-Type: application/json");

// Check request method
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Only POST method allowed"]);
    exit;
}

// Check file exist
if (!isset($_FILES['image'])) {
    http_response_code(400);
    echo json_encode(["error" => "No image file uploaded"]);
    exit;
}

$file = $_FILES['image'];

// Allowed image types
$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

// Validate file type
if (!in_array($file['type'], $allowedTypes)) {
    http_response_code(400);
    echo json_encode(["error" => "Only JPG and PNG images allowed"]);
    exit;
}

// Validate file size (2MB)
if ($file['size'] > 2 * 1024 * 1024) {
    http_response_code(400);
    echo json_encode(["error" => "Image size must be less than 2MB"]);
    exit;
}

// Upload directory
$uploadDir = "uploads/";

// Generate unique file name
$fileName = time() . "_" . basename($file['name']);
$targetPath = $uploadDir . $fileName;

// Move uploaded file
if (move_uploaded_file($file['tmp_name'], $targetPath)) {

    echo json_encode([
        "status" => "success",
        "message" => "Image uploaded successfully",
        "file_name" => $fileName,
        "file_path" => $targetPath
    ]);

} else {
    http_response_code(500);
    echo json_encode(["error" => "Image upload failed"]);
}
?>
