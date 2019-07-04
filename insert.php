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

    $sql = "SELECT * from task where status = '1'";
    $result = $conn->query($sql);

    //checking error in query
    if (!$result){
        die ("your query is error");
    }

    $title = $message = $assignto = "";
    $titleErr = $messageErr = $assigntoErr = "";
    $status = "1";
    $taskError = 0;
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if (!empty($_GET['id'])){
            echo "the data to be delete is as follows " . $_GET['id'];
        }
        
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST['title'])){
            $titleErr = "Please give some Title";
            $taskError = 1;
        }else {
            $title = $_POST["title"];
        }
        
        if (empty($_POST['message'])){
            $messageErr = "Please give some message";
            $taskError = 1;
        }else {
            $message = $_POST["message"];
        }

        if (empty($_POST['assignto'])){
            $assigntoErr = "Please give some assingto";
            $taskError = 1;
        }else {
            $assignto = $_POST["assignto"];
        }

        if ($taskError == 0){
            $msg = "your value are <br>";
            $msg .= "Title: " . $title . "<br>";
            $msg .= "Message: " . $message. "<br>";
            $msg .= "Assign To: " . $assignto. "<br>";
            echo $msg;


            $stmt = $conn->prepare("INSERT INTO task (title, message, assignto, status) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $title, $message, $assignto, $status);
            $stmt->execute();

            echo "new record added successfully";
            //header("Refresh:0");
            header("Location: index.php?page=database");
        }
        
    }

    $conn->close();


?>
<!-- <form action="database.php" method="post"> -->

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) .'?page=insert';?>" method="post">
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="message" class="col-sm-2 col-form-label">Message</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="message" name="message" placeholder="Message" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="assignto" class="col-sm-2 col-form-label">Assign To</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="assignto" name="assignto" placeholder="Assign To" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>                    

