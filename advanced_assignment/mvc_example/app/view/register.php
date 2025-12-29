<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="index.php?controller=auth&action=register" method="post">
    enter first name<input type="text" name="fname" placeholder="fname" required><br><br>
     enter email<input type="email" name="email" placeholder="email" required><br><br>
      enter password<input type="password" name="password" placeholder="password" required><br><br>
     enter confirm_password <input type="password" name="confirm_password" placeholder="confirm_password" required><br><br>
       <input type="submit" name="register" ><br><br>
        
</form>
    
</body>
</html>