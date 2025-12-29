


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th {
            background: #007bff;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        .action-btn {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 14px;
            color: #fff;
        }

        .edit-btn {
            background: #ffc107;
        }

        .edit-btn:hover {
            background: #e0a800;
        }

        .delete-btn {
            background: #dc3545;
        }

        .delete-btn:hover {
            background: #c82333;
        }

        .no-data {
            text-align: center;
            color: #777;
            font-weight: bold;
        }
    </style>
</head>
<body>
    

<h2>Student List</h2>
<a href="index.php?action=create">Add New Student</a>
<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</tr>
<?php if($students && $students->num_rows > 0): ?>
<?php while($row = $students->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="index.php?action=edit&id=<?= $row['id'] ?>">Edit</a> |
        <a href="index.php?action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr><td colspan="4">No students found</td></tr>
<?php endif; ?>
</table>




</body>
</html>