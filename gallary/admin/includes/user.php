<?php



class User {

    protected static $table = "users";
    protected static $table_field = array('username','password','first_name','last_name');
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

    public function properties()
    {
        // return get_object_vars($this);//this will not used b-coz it consider all attribute include table name also so we make an array;

        $properties = array();

        foreach (self::$table_field as $db_field) {
            
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
            
        }
        return $properties;
    }

    public function save()
    {
        return isset($this->id) ? $this->Update() : $this->Create();
    }


    public function Create()
    {
        global $database;

        $properties = $this->properties();

        $sql = "INSERT INTO " . self::$table . " (" .implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('". implode("','", array_values($properties)) ."')";

        if ($database->query($sql)) {

            $this->id = $database->the_insert_id();

            return true;
        } else {
            return false;
        }
        
    }
    
    public function Update(){
        global $database;

        $properties = $this->properties();
        $properties_pairs = array();
        
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
            //"username= '" . $database->escape_string($this->username) . "', ";//follow this structure for above line
        }

        $sql = "UPDATE " .self::$table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id=" . $database->escape_string($this->id);
        
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
        
    }
    public function delete(){
        global $database;

        $sql = "DELETE FROM " .self::$table . "  ";
        $sql .= " WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
        
    }


}//class End here














?>