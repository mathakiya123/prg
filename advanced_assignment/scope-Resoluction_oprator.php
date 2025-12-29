<?php
// 1)Create a class with static properties and methods ,and demonstrate their access using the
//  scope resolution operator. ?

class Math {
    public static $number = 10;   // static property

    public static function square() {   // static method
        return self::$number * self::$number;  // access using self::
    }
}


echo "Number: " . Math::$number . "<br>";


echo "Square: " . Math::square();
?>
