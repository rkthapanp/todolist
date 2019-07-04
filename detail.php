<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if (!empty($_GET['id'])){
            
    //         $db_server = 'localhost';
    //         $db_user = 'root';
    //         $db_password = '';
    //         $db_table = 'todolist';

    //         //creating connection
    //         //when using serverm,user and passwrod value even if user is incorrect it does not triger error
    //         //when using four argument it will triger error but gives warning message as well with our errro message
    //         $conn = new mysqli($db_server, $db_user, $db_password,$db_table);

    //         //check connection
    //         if ($conn->connect_error){
    //             die("Connection failed " . $conn->connect_error);
    //         }

    //         $sql = "SELECT * from task where taskID =" . $_GET['id'];
    //         $result = $conn->query($sql);

    //         //checking error in query
    //         if (!$result){
    //             die ("your query is error");
            
                require_once('class/database.class.php');
                $result = $obj->find_by_id($_GET['id']);        
                //print_r($result->fetch_assoc());
                $row = $result->fetch_assoc();        
            }
            
            
    }
?>

<table class="table table-hover">
    <tr>
        <th>Title</th>
        <td><?= $row['title']; ?></td>
    </tr>
    <tr>
        <th>Message</th>
        <td><?= $row['message']; ?></td>
    </tr>
    <tr>
        <th>Assign To</th>
        <td><?= $row['assignto']; ?></td>
    </tr>
    <tr>
        <th>Priority</th>
        <td><?= $row['priority']; ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?= $row['status']; ?></td>
    </tr>
    <tr>
        <th>Deadline</th>
        <td><?= $row['deadline']; ?></td>
    </tr>

</table>
