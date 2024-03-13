<?php 
    include('config/config.php');

    if(isset($_GET['task_id'])){
        $task_id = $_GET['task_id'];

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error());

        $sql = "DELETE FROM tbl_tasks WHERE task_id=$task_id";

        $res = mysqli_query($conn, $sql);
    }
?>