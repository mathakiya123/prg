<?php

if (isset($_POST['upload'])) {

    $uploadDir = "uploads/"; // folder already exists

    $fileName = basename($_FILES['myfile']['name']);
    $fileTmp  = $_FILES['myfile']['tmp_name'];

    // Create unique name to avoid overwrite
    $newName = time() . "_" . $fileName;

    $targetPath = $uploadDir . $newName;

    if (move_uploaded_file($fileTmp, $targetPath)) {
        echo "File uploaded successfully <br>";
        echo "Saved as: " . $newName;
    } else {
        echo "File upload failed";
    }
}
?>

