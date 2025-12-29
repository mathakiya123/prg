
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

        .form-container {
            width: 400px;
            margin: 50px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 500px;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #007bff;
        }

        input[type="submit"] {
            width: 500px;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <center>
<h2><?= isset($studentData) ? "Edit Student" : "Add Student" ?></h2>
<form method="post">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= $studentData['name'] ?? '' ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $studentData['email'] ?? '' ?>" required><br><br>

    <input type="submit" name="submit" value="<?= isset($studentData) ? "Update" : "Add" ?>">
</form>
</center>


</body>
</html>