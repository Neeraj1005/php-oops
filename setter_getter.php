<?php

class Cars{


    private $wheels = 4;

    function get_values(){

        echo $this->wheels;
    }
    
    function set_values(){

        $this->wheels = 10;
    }
}

$bmw = new Cars();

$bmw->set_values();

$bmw->get_values();






?>