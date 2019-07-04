<?php
    $db_server = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_table = 'todolist';
    $id = $title = $message = $assignto = $priority = $status = $deadline = "";
    $titleErr = $messageErr = $assigntoErr =  "";
    $taskError = 0;

    //creating connection
    //when using serverm,user and passwrod value even if user is incorrect it does not triger error
    //when using four argument it will triger error but gives warning message as well with our errro message
    $conn = new mysqli($db_server, $db_user, $db_password,$db_table);

    //check connection
    if ($conn->connect_error){
        die("Connection failed " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if (!empty($_GET['id'])){
            
            $id = $_GET['id'];
           

            

            $sql = "SELECT * from task where taskID =" . $id;
            $result = $conn->query($sql);

            //checking error in query
            if (!$result){
                die ("your query is error");
            }
            
            
            //print_r($result->fetch_assoc());
            $row = $result->fetch_assoc();
            $title = $row['title'];
            $message = $row['message'];
            $assignto = $row['assignto'];
            $priority = $row['priority'];
            $status = $row['status'];
            $deadline = $row['deadline'];
            //$id = $row['taskID'];
        
        }
        
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {   
        empty($_POST['title']) ? $taskError = 1 : $title = $_POST["title"] ;
        empty($_POST['message']) ? $taskError = 1 : $message = $_POST["message"] ;
        empty($_POST['assignto']) ? $taskError = 1 : $assignto = $_POST["assignto"] ;
        
        empty($_POST['priority']) ? : $priority = $_POST["priority"] ;
        empty($_POST['status']) ? $status='1' : $status = $_POST["status"] ; 
        //This values are consider to be falase with this operator
        // Boolean false;
        // Integer 0;
        // Float 0.0;
        // String '0' or "0";
        // An empty string (i.e. '' or "");
        // An empty array (i.e. [] or array());
        // null;
        // SimpleXML objects created from empty tags.

        empty($_POST['deadline']) ? : $deadline = $_POST["deadline"] ;
        empty($_POST['id']) ? : $id = $_POST["id"] ;

        // echo empty($_POST['status']);
        // die();
        //$status = !(empty($_POST['status'])) ?? 0 ;   
        // $status =  $_POST['status'] ?? 'Error';   
        // $priority =  $_POST['priority'] ?? 'Error';   
        // $deadline =  $_POST['deadline'] ?? 'Error';   
       
      
        
        
        //echo 'your status is: ' . $status . ' and Your post value for status is ' . $_POST['status'];
        // die ();
        //(!empty($_POST['status'])) ? $status = $_POST["status"] : ;
        
        
            
        // if (!empty($_POST['priority'])){
        //     $priority = $_POST['priority'];
        // }

        // if (!empty($_POST['status'])){
        //     $status = $_POST['status'];
        //     // echo 'this is status' . $status;
        // }

        // if (!empty($_POST['deadline'])){
        //     $deadline = $_POST['deadline'];
        //     // echo $deadline;
        // }
        
        // if (!empty($_POST['id'])){
        //     $id = $_POST['id'];
        //     //echo $id;
        // }


        if ($taskError == 0){
            // echo "our id no is " . $id;
            // $msg = "your value are <br>";
            // $msg .= "Title: " . $title . "<br>";
            // $msg .= "Message: " . $message. "<br>";
            // $msg .= "Assign To: " . $assignto. "<br>";
            // $msg .= "Priority: " . $priority . "<br>";
            // $msg .= "Status: " . $status. "<br>";
            // $msg .= "Deadline: " . $deadline. "<br>";
            // echo 'status ' . $_POST['status'];
            // die($msg);

            // when using disable input post was not taking the value so i have to make it readonly then it is taking the value
            //$stmt = $conn->prepare("INSERT INTO task (title, message, assignto) VALUES (?, ?, ?)");
            //$stmt->bind_param("sss", $title, $message, $assignto);
            //$stmt->execute();

            //echo "new record added successfully";
            //header("Refresh:0");

            $sql = "UPDATE task SET ";
            $sql .= "title ='" . $title;
            $sql .= "', message ='" . $message;
            $sql .= "', assignto ='" . $assignto;
            $sql .= "', priority ='" . $priority;
            $sql .= "', status ='" . $status;
            $sql .= "', deadline ='" . $deadline;
            $sql .= "' where taskID =" . $id;
            $result = $conn->query($sql);

            //checking error in query
            if (!$result){
                echo $sql;
                die ("We could not handle your requst <br> Consult your administrator");
            }
            $conn->close();
            
            header("Location: index.php?page=database");
        }
        
    }

?>


<!-- <form action="database.php" method="post"> -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?page=edit';?>" method="post">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value = "<?= $title; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="message" class="col-sm-2 col-form-label">Message</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="message" name="message" placeholder="Message" value = "<?= $message; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="assignto" class="col-sm-2 col-form-label">Assign To</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="assignto" name="assignto" placeholder="Assign To" value = "<?= $assignto; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="priority" class="col-sm-2 col-form-label">Priority</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="priority" name="priority" placeholder="Priority" value = "<?= $priority; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="status" name="status" placeholder="status" value = "<?= $status; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="deadline" class="col-sm-2 col-form-label">Deadline</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="deadline" name="deadline" placeholder="deadline" value = "<?= $deadline; ?>">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>                    




