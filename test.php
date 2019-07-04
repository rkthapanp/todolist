<!doctype html>
<html>
    <head>
        <title>To Do List</title>
    </head>
    <body>
    testing body<br />
    </body>
</html>
<?php
//database credentials
define('DB_SERVER', 'localhost');
define('DB_USER', 'root1');
define('DB_PASSWORD', '');
define('DB_NAME', 'todolist');

// //to hide all the warning message
// //error_reporting(E_ERROR | E_PARSE);

// //hide all the error reporting
// //error_reporting(0);

// function dbconnect(){
//     $connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
//     confirm_db_connect($connection);
//     echo "connection has been successful";
//     return $connection;
// }

// function confirm_db_connect($connection){
//     if ($connection->connect_errno){
//         $msg = "Datbase connection failed ";
//         $msg .= $connection->connect_error;
//         $msg .= " (" . $connection->connect_errno .")";
//         exit($msg); 
//     }
// }

// $database = dbconnect();



// Ensure reporting is setup correctly
//mysqli_report(MYSQLI_REPORT_STRICT);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "todolist";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        //}catch(PDOException $exception){  
        }catch(mysqli_sql_exception $exception){
            $msg = "Connection error: "; 
            $msg .= "Code Error " . $exception->getCode() . " ";
            $msg .= "Message " . $exception->getMessage() . " ";
            echo $msg;
        }
  
        return $this->conn;
    }



}


$database = new database();
$database->getConnection();

?>