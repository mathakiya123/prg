<?php
session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}

$products = [
    1 => ["name" => "Laptop", "price" => 55000],
    2 => ["name" => "Mobile", "price" => 20000],
    3 => ["name" => "Headphones", "price" => 3000]
];
?>
<!DOCTYPE html>
<html>
<body>
<h2>Your Cart</h2>
<?php
$total = 0;
foreach ($_SESSION['cart'] as $id => $qty) {
    $subtotal = $products[$id]['price'] * $qty;
    $total += $subtotal;
?>
<p>
<?= $products[$id]['name'] ?> |
₹<?= $products[$id]['price'] ?> × <?= $qty ?> =
₹<?= $subtotal ?>
<a href="update.php?id=<?= $id ?>&action=add">+</a>
<a href="update.php?id=<?= $id ?>&action=minus">-</a>
<a href="remove.php?id=<?= $id ?>">Remove</a>
</p>
<?php } ?>
<h3>Total: ₹<?= $total ?></h3>
<a href="products.php">Continue Shopping</a>
</body>
</html>