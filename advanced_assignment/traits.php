<?php
//Create two traits and use the min a class to demonstrate how to include multiple behaviors.

trait a 
{
    function first()
    {
    echo "this is a first trait";
    }
}


trait b 
{
    function second()
    {
    echo "this is a second traits";
    }
}
class emp 
{
    use a,b;
}
$ob= new emp();
$ob->first();
echo "<br>";
$ob->second();
?>

