<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', 'C:' . DS . 'XAMPP' . DS . 'htdocs' . DS . 'PracticeProject' . DS . 'phpoop' . DS . 'gallary');
// define('SITE_ROOT', DS . 'XAMPP' . DS . 'htdocs' . DS . 'PracticeProject' . DS . 'phpoop' . DS . 'gallary');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS. 'admin' .DS.'includes');



require_once("functions.php");
require_once("config.php");
require_once("database.php");
require_once("db_object.php");
require_once("photo.php");
require_once("user.php");
require_once("session.php");

?>