<?php
session_start();
$products = [
    1 => ["name" => "Laptop", "price" => 55000],
    2 => ["name" => "Mobile", "price" => 20000],
    3 => ["name" => "Headphones", "price" => 3000]
];
?>
<!DOCTYPE html>
<html>
<body>
<h2>Products</h2>
<?php foreach ($products as $id => $p) { ?>
<p>
<b><?= $p['name'] ?></b> - ₹<?= $p['price'] ?>
<a href="cart.php?id=<?= $id ?>">Add to Cart</a>
</p>
<?php } ?>
<a href="cart.php">View Cart</a>
</body>
</html>