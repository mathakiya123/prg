<?php
//1) Write a class thats hows examples of each visibility type and how they restrict access to
 //properties and methods.

class A {
    public $public="  i am a public";

    protected $protected="I am a protected";

    private $privete=" I am a privare";

    function display()
    {
         echo $this->public.'<br>';
       echo  $this->protected.'<br>';
         echo $this->private."<br>";
    }

}

$a = new A();
$a->display();

?>
