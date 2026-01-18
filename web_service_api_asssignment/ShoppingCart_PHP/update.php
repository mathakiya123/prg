<?php
session_start();
$id = $_GET['id'];
$action = $_GET['action'];
if ($action == "add") $_SESSION['cart'][$id]++;
if ($action == "minus") {
    $_SESSION['cart'][$id]--;
    if ($_SESSION['cart'][$id] <= 0) unset($_SESSION['cart'][$id]);
}
header("Location: cart.php");
