<?php

class Cars{


    static $wheels = 4;

    static function carDetails(){

        return self::$wheels;
    }
}

class Trucks extends Cars{

    static function display(){

        echo parent::carDetails();

    }

}

Trucks::display();






?>