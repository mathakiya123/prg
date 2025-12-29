
<?php
$conn = mysqli_connect("localhost","root","","sql_injection_demo");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn,"SELECT * FROM users WHERE username=? AND password=?");
    mysqli_stmt_bind_param($stmt,"ss",$username,$password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)>0){
        echo "<h3>Login Successful (SECURE)</h3>";
    } else {
        echo "<h3>Invalid Login</h3>";
    }
}
?>
<form method="post">
<input name="username" placeholder="Username"><br><br>
<input name="password" placeholder="Password"><br><br>
<button name="login">Login</button>
</form>
