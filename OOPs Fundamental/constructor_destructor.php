<?php
//Note: this two method in php less uses.
class Cars{


    public $wheels = 4;
    static $doors = 4;

    // function __construct()
    // {

    //     //This constructor automatically called

    //     echo $this->wheels;
    //     echo self::$doors++;
    // }
    function __destruct()
    {
        // is oposite of constructor
        //This constructor automatically called

        // echo $this->wheels;
        echo self::$doors--;
    }

}

$bmw = new Cars();
$bmw_1 = new Cars();
$bmw_2 = new Cars();







?>