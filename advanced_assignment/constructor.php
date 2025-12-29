<?php
//1)Create a class with a constructor that initializes properties when an objectis created ?

class argument
{

    public function __construct($name,$email,$phone,$pincode){

        echo " name is:  ".$name.'<br>';
        echo " email is ".$email.'<br>';
        echo " phone number is:  ".$phone.'<br>';
        echo " pin code number is:   ".$pincode.'<br>';

    }


}

$ob =new argument("inzazmul","In@gmail.com",8238489638,363621);

?>
