<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

define('DB_SERVER', 'localhost');
define('DB_USER', 'root1');
define('DB_PASSWORD', '');
define('DB_NAME', 'todolist');

class Database{

    // private $host = "localhost";
    // private $db_name = "todolist";
    // private $username = "root";
    // private $password = "";
    public $conn;
    public $errormsg = "";
  
    // get the database connection
    public function __construct(){
        return $this->getConnection();
        //echo 'You have created database successsfully';
    }

    public function getConnection(){
  
        $this->conn = null;
  
        try{
            //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        //}catch(PDOException $exception){  
        }catch(mysqli_sql_exception $exception){
            $msg = "<h1>Connection error: </h1>"; 
            $msg .= "Code Error " . $exception->getCode() . " <br>";
            $msg .= "Message " . $exception->getMessage() . " ";
            return $this->errormsg = $msg;
        }
  
        return $this->conn;
    }
}


$obj = new database;

if ($obj->errormsg != "") {
    echo 'Contact your DBA for the databse eror';
}else{
    echo 'success';
} 

// if ($obj->errormsg == ""){
//     echo "Contact your administrator about the database connection error";
// }
//print_r($obj);

?>