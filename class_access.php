<?php

class Cars {

    public $wheels = 4;

    private $doors = 5;
    
    protected $seat = 6;

    function carsDetails(){

        echo $this->wheels; 
        echo $this->doors; 
        echo $this->seat; 

    }

}

$bmw = new Cars();

// echo $bmw->wheels; 
// echo $bmw->doors; 
// echo $bmw->seat;

echo $bmw->carsDetails();

?>