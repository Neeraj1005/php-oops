<?php

class Cars {
    
    function greeting1(){
        
    }
    
    function greeting2(){

    }


}

$my_methods = get_class_methods('Cars');

foreach ($my_methods as $method) {
    echo $method . "<br>";
}


?>