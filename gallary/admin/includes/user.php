<?php



class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users(){

        // global $database;
        // $reselt_set = $database->query("SELECT * FROM users");
        // return $reselt_set; //These three line would be shorter by find_this_query

        return self::find_this_query("SELECT * FROM users"); //self used when static is called
    }

    public static function find_user_by_id($id){

        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id=$id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false; //ternary operation you can use if else also

    }

    public static function find_this_query($sql){
        global $database;
        $reselt_set = $database->query($sql);

        $the_object_array = array();
        while($row = mysqli_fetch_array($reselt_set)){
            $the_object_array[] = self::instatiation($row);
        }

        return $the_object_array;
    }
    
    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    public static function instatiation($the_table_record){
        $the_object = new self;

        // $the_object->id = $the_table_record['id'];
        // $the_object->username = $the_table_record['username'];
        // $the_object->password = $the_table_record['password'];
        // $the_object->first_name = $the_table_record['first_name'];
        // $the_object->last_name = $the_table_record['last_name'];

        //NOw applying the loopin wil automaticall fetch the table column instead of defining manually
        //Now below we call the records dynamically instead of defining manually

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



}














?>