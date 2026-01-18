<?php
$message = "";

// Create uploads folder if not exists
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (isset($_POST['upload'])) {

    $file = $_FILES['document'];

    // Allowed file types
    $allowedTypes = ['pdf', 'doc', 'docx', 'txt'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    $fileName = basename($file['name']);
    $fileSize = $file['size'];
    $fileTmp  = $file['tmp_name'];
    $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Validation
    if (!in_array($fileExt, $allowedTypes)) {
        $message = "Invalid file type!";
    }
    elseif ($fileSize > $maxSize) {
        $message = "File size must be less than 2MB!";
    }
    else {
        // Secure filename
        $newName = uniqid() . "." . $fileExt;
        $destination = $uploadDir . $newName;

        if (move_uploaded_file($fileTmp, $destination)) {
            $message = "File uploaded successfully!";
        } else {
            $message = "Upload failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .box {
            width: 400px;
            margin: 50px auto;
            background:#fff;
            padding:20px;
            border-radius:5px;
        }
        input, button {
            width:100%;
            padding:8px;
            margin-top:10px;
        }
        .msg { text-align:center; color:green; }
        .error { color:red; text-align:center; }
    </style>
</head>
<body>

<div class="box">
    <h2>Upload Document</h2>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="document" required>
        <button type="submit" name="upload">Upload</button>
    </form>

    <?php if ($message) { ?>
        <p class="<?php echo (strpos($message, 'success') !== false) ? 'msg' : 'error'; ?>">
            <?php echo $message; ?>
        </p>
    <?php } ?>
</div>

</body>
</html>
