<?php
ob_start();
session_start();

//database credentials
define('DBHOST','z1ntn1zv0f1qbh8u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
define('DBUSER','y53ajkvojgger805');
define('DBPASS','l90ot8gjzjkm6os8');
define('DBNAME','mgrfp3jpscnl84tr');

$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//set timezone
date_default_timezone_set('Europe/London');

//load classes as needed
function __autoload($class) {
   
   $class = strtolower($class);

   //if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }  
   
   //if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
   
   //if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }     
    
}

$user = new User($db); 

include('functions.php');
?>
