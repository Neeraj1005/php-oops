<?php

class Cars {

    var $wheel_count = 4;
    var $door_count = 4;

    function carsDetails(){

        return "This car has " . $this->wheel_count . " wheels"; 

    }

}

$bmw = new Cars();
$mercedes = new Cars();

echo $bmw->wheel_count = 10;
echo "<br>";
echo $mercedes->wheel_count;
echo "<br>";
echo $bmw->carsDetails();
echo "<br>";
echo $mercedes->carsDetails();




?>