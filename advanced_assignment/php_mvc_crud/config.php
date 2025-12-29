<?php
$conn = new mysqli("localhost","root","","crude120");
if($conn->connect_error){
    die("DB Error");
}
?>