<?php
//1)Write a class that implements a destructor to perform clean up tasks when an object is
// destroyed.

class emp
{
    public $a;
    public $b;

    function __construct($a,$b)
    {
       $this->a=$a;
         $this->b=$b;
    }
   function __destruct()
   {
       echo "object is destroy";
   }
}

$ob= new emp(12,30);

?>
