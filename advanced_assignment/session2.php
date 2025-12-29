<?php
session_start(); // Must start session on every page using session

echo "<h3>Session Data</h3>";

if(isset($_SESSION['username'])) {
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "Email: " . $_SESSION['email'] . "<br>";
} else {
    echo "No session data found!";
}

echo "<h3>Cookie Data</h3>";

if(isset($_COOKIE['user_city'])) {
    echo "City: " . $_COOKIE['user_city'];
} else {
    echo "Cookie not found!";
}
?>
