<?php
//1) Create a script that reads from a text file and displays its content on a webpage
$file=fopen('tops.txt','r')
 or
  die('failed ');
  
echo fread($file,500);

?>



