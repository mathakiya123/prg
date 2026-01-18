<?php

/*  Createa database schema for products.
 Develop an interface to display products. */



// Database connection
$conn = new mysqli("localhost", "root", "", "product_catalog");

if ($conn->connect_error) {
    die("Database connection failed");
}

// Fetch products
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
    <style>
        body { font-family: Arial; }
        .product {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px;
            width: 250px;
            display: inline-block;
            vertical-align: top;
        }
        img {
            width: 100%;
            height: 150px;
        }
    </style>
</head>
<body>

<h2>Product Catalog</h2>

<?php while ($row = $result->fetch_assoc()) { ?>
    <div class="product">
        <img src="uploads/<?= $row['image'] ?>" alt="Product Image">
        <h3><?= $row['name'] ?></h3>
        <p><?= $row['description'] ?></p>
        <strong>₹<?= $row['price'] ?></strong>
    </div>
<?php } ?>

</body>
</html>
