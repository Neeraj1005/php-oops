<?php



class Comment extends Db_object {

    protected static $table = "comments";
    protected static $table_field = array('id','photo_id','author','body');
    public $id;
    public $photo_id;
    public $author;
    public $body;
 

    public static function create_comment($photo_id, $author="John", $body="")
    {
        if (!empty($photo_id) && !empty($author) && !empty($body)) {
            
            $comment = new Comment();
            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->body = $body;

            return $comment;            
        }
        else {
            return false;
        }
    }

    public function find_the_comments($photo_id=0)
    {
        global $database;

        $sql = "SELECT * FROM " . self::$table;
        $sql .= " WHERE photo_id = " . $database->escape_string($photo_id);
        $sql .= " ORDER BY photo_id ASC";

        return self::find_by_query($sql);
    }




}//class End here

?>