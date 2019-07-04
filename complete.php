<?php
    $db_server = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_table = 'todolist';

    //creating connection
    //when using serverm,user and passwrod value even if user is incorrect it does not triger error
    //when using four argument it will triger error but gives warning message as well with our errro message
    $conn = new mysqli($db_server, $db_user, $db_password,$db_table);

    //check connection
    if ($conn->connect_error){
        die("Connection failed " . $conn->connect_error);
    }

    $sql = "SELECT * from task where status = '0'";
    $result = $conn->query($sql);

    //checking error in query
    if (!$result){
        die ("your query is error");
    }

    $conn->close();
    //print_r($result->fetch_assoc());
?>

<table class="table table-hover">
    <thead class="thead-light">
    <tr>
        <th>Task</th>
        <th>Detail</th>
        <th>Assign To</th>
        <th>Priority</th>
        <th>Deadline</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $msg = "<tr>";
                $msg .= "<td>" . $row['title'] . "</td>";
                $msg .= "<td>" . $row['message'] . "</td>";
                $msg .= "<td>" . $row['assignto'] . "</td>";
                $msg .= "<td>" . $row['priority'] . "</td>";
                $msg .= "<td>" . $row['deadline'] . "</td>";
                $msg .= "<td><a href='reasign.php?id=" . $row['taskID'] . "' ><span class='fa fa-calendar'></span></td>";
                $msg .= "</tr>";
                echo $msg;
            }
        }
    ?>
    </tbody>
</table>
                





