<?php
// 1) Create a "Vehicle"class and extend it with a"Car"class.Include properties and methods in
//  classes,demonstrating inherited behavior.
// =>



class Vehicle
{
   public $brand;
     public $model;

     function __construct($brand,$model)
     {
        $this->brand =$brand;
        $this->model =$model;

     }
     function display()
     {
        echo "Brand    :".$this->brand."<br>";
        echo "Model  :".$this->model."<br>";
     }
}
class car extends Vehicle
{
     public $year;

     function __construct($brand,$model,$year)
     {
        parent::__construct($brand,$model);
        $this->year =$year;
     }
     
     function getdisplay()
     {
         echo "year   :".$this->year;
     }
}

$obj = new car('BMW','3 series',2020);
$obj->display();
$obj->getdisplay();
?>

