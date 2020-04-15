<?php

class Cars {

    var $wheels = 4;

    function carsDetails(){

        return "Hello world "; 

    }

}

$bmw = new Cars();

class Trucks extends Cars{

    // var $wheels = 10;

}

$eicher = new Trucks();

echo $eicher->wheels;


?>