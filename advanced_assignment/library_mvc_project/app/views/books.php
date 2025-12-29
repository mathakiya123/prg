<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        h2 {
            color: #007bff;
            margin-bottom: 15px;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        form input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
        }

        form input:focus {
            border-color: #007bff;
        }

        form button {
            padding: 10px 20px;
            border: none;
            background: #28a745;
            color: #fff;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        form button:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #007bff;
            color: #fff;
            padding: 12px;
            text-align: left;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        img {
            border-radius: 5px;
        }

        .action a {
            text-decoration: none;
            margin-right: 8px;
            color: #007bff;
            font-weight: bold;
        }

        .action a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Library Management System</h1>

    <!-- Add Book Form -->
    <h2>Add Book</h2>

    <form method="post"
          action="index.php?action=store"
          enctype="multipart/form-data">

        <input type="text" name="name" placeholder="Book Name" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="file" name="image" required>

        <button type="submit">Add Book</button>
    </form>

    <hr>

    <!-- Book List -->
    <h2>Book List</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php if ($books->num_rows > 0): ?>
            <?php while($row = $books->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td>
                        <?php if (!empty($row['image'])): ?>
                            <img src="public/uploads/<?= $row['image'] ?>" width="70">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td class="action">
                        <a href="index.php?action=edit&id=<?= $row['id'] ?>">Edit</a>
                        |
                        <a href="index.php?action=delete&id=<?= $row['id'] ?>"
                           onclick="return confirm('Are you sure you want to delete this book?')">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center;">
                    No Books Found
                </td>
            </tr>
        <?php endif; ?>
    </table>

</div>

</body>
</html>
