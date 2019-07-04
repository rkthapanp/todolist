<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
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

    public function getClose()
    {
        if (isset($this->conn)){
            $this->conn->close();
        }
    }

    public function delete($id){
        try{
            $sql = "UPDATE task SET status = '0' where taskID =" . $id;
            $result = $this->conn->query($sql);
        }catch (mysqli_sql_exception $exception){
            die ("We could not handle your requst <br> Consult your administrator");
        }
        
        return $result;
    }

    public function find_all($status){
        $sql = "SELECT * from task where status = '". $status ."'";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function find_by_id($id){
        $sql = "SELECT * from task where taskID =" . $id;
        return $this->conn->query($sql);

    }
}


$obj = new database();

if ($obj->errormsg != "") {
    echo $obj->errormsg;
}

// if ($obj->errormsg == ""){
//     echo "Contact your administrator about the database connection error";
// }
//print_r($obj);

?>