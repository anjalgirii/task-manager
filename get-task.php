<html>
    <body>
        <?php echo $_POST["task_name"]; ?><br>
        <?php echo $_POST["task_description"]; ?> <br>
        <?php echo $_POST["list_id"]; ?> <br>
        <?php echo $_POST["priority"]; ?> <br>
        <?php echo $_POST["deadline"]; ?>

        <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "task";

        //connect
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO tbl_tasks (tasks_name, task_description, list_id, priority, deadline) VALUES ('efwf', 'fwe', '3', '2', '2024-03-07')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        ?>
    </body>