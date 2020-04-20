<?php 


class Db_object {


    public static function find_all(){

        return static::find_by_query("SELECT * FROM " . static::$table . " "); //self used when static is called
    }


    public static function find_by_id($id){

        $the_result_array = static::find_by_query("SELECT * FROM " . static::$table . " WHERE id=$id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false; //ternary operation you can use if else also

    }

    public static function find_by_query($sql){
        global $database;
        $reselt_set = $database->query($sql);

        $the_object_array = array();
        while($row = mysqli_fetch_array($reselt_set)){
            $the_object_array[] = static::instatiation($row);
        }

        return $the_object_array;
    }


    public static function instatiation($the_table_record){

        $calling_class = get_called_class();

        $the_object = new $calling_class;

        foreach ($the_table_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute){

        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);

    }



}//Class End Here


?>