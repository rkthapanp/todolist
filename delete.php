<?php require_once('class/database.class.php'); ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    if (!empty($_GET['id'])){
        
        // $db_server = 'localhost';
        // $db_user = 'root';
        // $db_password = '';
        // $db_table = 'todolist';

        // //creating connection
        // //when using serverm,user and passwrod value even if user is incorrect it does not triger error
        // //when using four argument it will triger error but gives warning message as well with our errro message
        // $conn = new mysqli($db_server, $db_user, $db_password,$db_table);

        // //check connection
        // if ($conn->connect_error){
        //     die("Connection failed " . $conn->connect_error);
        // }

        // $sql = "UPDATE task SET status = '0' where taskID =" . $_GET['id'];
        // $result = $conn->query($sql);

        //checking error in query
        
        $result = $obj->delete($_GET['id']);    

               
        header("Location: index.php");
    }
}
?>