<?php

class Cars{


    static $wheels = 4;

    static $doors = 2;

    function carsDetails(){

        echo Cars::$wheels;

        echo Cars::$doors;

    }
}

echo Cars::$wheels;
echo "<br>";
echo Cars::carsDetails();







?>