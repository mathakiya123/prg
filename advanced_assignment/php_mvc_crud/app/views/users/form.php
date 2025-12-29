<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f8;
            margin:0;
            padding:0;
        }
        .container{
            width:40%;
            margin:60px auto;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }
        h2{
            text-align:center;
            color:#333;
            margin-bottom:25px;
        }
        .form-group{
            margin-bottom:18px;
        }
        .form-group input{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:6px;
            font-size:15px;
            outline:none;
        }
        .form-group input:focus{
            border-color:#007bff;
        }
        .btn{
            width:100%;
            padding:12px;
            background:#007bff;
            color:#fff;
            border:none;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;
            font-weight:bold;
        }
        .btn:hover{
            background:#0056b3;
        }
        .back{
            display:block;
            margin-top:15px;
            text-align:center;
            text-decoration:none;
            color:#555;
        }
        .back:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>

<div class="container">

    <h2><?= isset($data) ? 'Edit User' : 'Add User' ?></h2>

    <form method="post">
        <div class="form-group">
            <input type="text"
                   name="name"
                   placeholder="Name"
                   value="<?= $data['name'] ?? '' ?>"
                   required>
        </div>

        <div class="form-group">
            <input type="email"
                   name="email"
                   placeholder="Email"
                   value="<?= $data['email'] ?? '' ?>"
                   required>
        </div>

        <button type="submit" class="btn">Save</button>
    </form>

    <a href="index.php" class="back">← Back to List</a>

</div>

</body>
</html>
