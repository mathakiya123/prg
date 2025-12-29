<?php
// 1) Create a class that uses magic methods to handle property access and modification
//  dynamically.

class Student {
    private $data = [];

  
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

   
    public function __get($name) {
        return $this->data[$name];
    }
}


$stu = new Student();


$stu->name = "inzamul";
$stu->age = 20;

echo "Name: " . $stu->name . "<br>";
echo "Age: " . $stu->age;
?>
