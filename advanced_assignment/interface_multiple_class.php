<?php
//1) Define an interface named Vehicle Interface with methods like start(),stop(),and
// implement this interface in multiple classes.

interface VehicleInterface {
    public function start();
    public function stop();
}

// Class 1: Car implements VehicleInterface
class Car implements VehicleInterface {
    public function start() {
        echo "Car engine started.<br>";
    }

    public function stop() {
        echo "Car engine stopped.<br>";
    }
}


class Bike implements VehicleInterface {
    public function start() {
        echo "Bike engine started.<br>";
    }

    public function stop() {
        echo "Bike engine stopped.<br>";
    }
}


$car = new Car();
$bike = new Bike();

$car->start();
$car->stop();

$bike->start();
$bike->stop();
?>

