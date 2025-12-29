<?php
//1) Create a class that demonstrates method overloading by defining multiple methods with the
 //same name but different parameters.


class A
{
    
    function display($a,$b)
    {
        echo "Addition   :".($a + $b);
    }
}
class B extends A
{

    function display($a,$b,$c =null)
    {
    if($c ==   null)
    {
        parent::display($a,$b);

    }
    else
    {
        
        echo "multiplication   :".($a*$b*$c);   
    
    }
}
   
}

$b1 = new B();
// $b1->display(2,3,4);
$b1->display(10,20,30);
echo "<br>";
$b1->display(20,30);


?>

