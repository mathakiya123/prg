<?php

class car
{
    public $make;
    public $model;
    public $year;
    function __construct($make,$model,$year)
    {
            $this->make =$make;
            $this->model =$model;
            $this->year =$year;
    }
    function display()
    {
         echo "Car Make :". $this->make."<br>";
           echo" Car Model :". $this->model."<br>";
             echo"Car Year :". $this->year."<br>";
    }
 }
$ob = new car('toyota','camry',2020);
$ob->display();



?>

