<?php
session_start(); 


$_SESSION['username'] = "John Doe";
$_SESSION['email'] = "john@example.com";


setcookie("user_city", "Mumbai", time() + 3600, "/");

echo "Session data and cookie set successfully!";
?>

<br><br>
<a href="session2.php">Go to Page 2</a>

