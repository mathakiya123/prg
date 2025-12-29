<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f8;
            margin:0;
            padding:0;
        }
        .container{
            width:80%;
            margin:40px auto;
            background:#fff;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }
        h2{
            text-align:center;
            color:#333;
            margin-bottom:20px;
        }
        .add-btn{
            display:inline-block;
            margin-bottom:15px;
            padding:10px 18px;
            background:#28a745;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            font-weight:bold;
        }
        .add-btn:hover{
            background:#218838;
        }
        table{
            width:100%;
            border-collapse:collapse;
        }
        table th{
            background:#007bff;
            color:#fff;
            padding:12px;
            text-align:left;
        }
        table td{
            padding:10px;
            border-bottom:1px solid #ddd;
        }
        table tr:hover{
            background:#f1f1f1;
        }
        .action a{
            padding:6px 10px;
            text-decoration:none;
            color:#fff;
            border-radius:5px;
            font-size:14px;
            margin-right:5px;
        }
        .edit{
            background:#ffc107;
        }
        .edit:hover{
            background:#e0a800;
        }
        .delete{
            background:#dc3545;
        }
        .delete:hover{
            background:#c82333;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>User List</h2>

    <a href="index.php?action=create" class="add-btn">+ Add User</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php while($row = $users->fetch_assoc()){ ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td class="action">
                <a href="index.php?action=edit&id=<?= $row['id'] ?>" class="edit">Edit</a>
                <a href="index.php?action=delete&id=<?= $row['id'] ?>" 
                   class="delete"
                   onclick="return confirm('Are you sure?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>
