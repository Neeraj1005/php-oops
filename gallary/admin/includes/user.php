<?php



class User extends Db_object {

    protected static $table = "users";
    protected static $table_field = array('username','password','first_name','last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
 
    
    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

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
    public function clean_properties()
    {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {

            $clean_properties[$key] = $database->escape_string($value);
        
        }
        return $clean_properties;
    }

    public function save()
    {
        return isset($this->id) ? $this->Update() : $this->Create();
    }


    public function Create()
    {
        global $database;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . self::$table . " (" .implode(",", array_keys($properties)) . ")";
        $sql .= " VALUES ('". implode("','", array_values($properties)) ."')";

        if ($database->query($sql)) {

            $this->id = $database->the_insert_id();

            return true;
        } else {
            return false;
        }
        
    }
    
    public function Update(){
        global $database;

        $properties = $this->clean_properties();
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