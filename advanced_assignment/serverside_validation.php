<?php
// Initialize variables
$email = $password = "";
$errors = [];
$success = "";

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Email regex validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $errors[] = "Invalid email format.";
    }

    // Password regex validation
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters and include uppercase, lowercase, and a number.";
    }

    // If no errors
    if (empty($errors)) {
        $success = "Registration successful!";
        // Normally, you would hash & store the password in database
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body { font-family: Arial; }
        .error { color: red; }
        .success { color: green; }
        form { width: 300px; margin: auto; }
        input { width: 100%; padding: 8px; margin: 5px 0; }
        button { padding: 8px; width: 100%; }
    </style>
</head>
<body>

<h2 align="center">User Registration</h2>

<form method="post">
    <?php
    if (!empty($errors)) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        echo '</div>';
    }

    if ($success) {
        echo '<div class="success">' . $success . '</div>';
    }
    ?>

    <input type="text" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($email); ?>">
    <input type="password" name="password" placeholder="Enter Password">
    <button type="submit">Register</button>
</form>

</body>
</html>
