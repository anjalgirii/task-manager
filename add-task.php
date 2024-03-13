<?php
    include('config/config.php');
?>

<html>
    <head>
        <title>Manage Task</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <h1>TASK MANAGER</h1>
            <div class="all-task">
                <a class="btn-primary" href="<?php echo SITEURL;?>index.php">Home</a>
                <h2>Add Tasks</h2>
            <form method="POST" action="">
                <table class="tbl-half">
                    <tbody>
                        <tr>
                            <td>
                                Task Name:
                            </td>
                            <td>
                                <input type="text" name="task_name" placeholder="Type your name" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Description:
                            </td>
                            <td>
                                <textarea name="task_description" placeholder="Enter Description"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                List:
                            </td>
                            <td>
                                <select name="list_id">
                                    <option value="1">ToDo</option>
                                    <option value="2">Current</option>
                                    <option value="3">Done</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Priority:
                            </td>
                            <td>
                                <select name="priority">
                                    <option value="1">Low</option>
                                    <option value="2">Medium</option>
                                    <option value="3">High</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Deadline:
                            </td>
                            <td>
                                <input type="date" name="deadline">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="btn-primary" type="submit" name="submit" value="SAVE">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>

<?php
    if (isset($_POST['submit']))
    {
        $task_name = ($_POST['task_name']);
        $task_description = ($_POST['task_description']);
        $list_id = ($_POST['list_id']);
        $priority = ($_POST['priority']);
        $deadline = ($_POST['deadline']);

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        $db_select = mysqli_select_db($conn, DB_NAME);

        $sql = "INSERT INTO tbl_tasks SET
            task_name = '$task_name',
            task_description = '$task_description',
            list_id = '$list_id',
            priority = '$priority',
            deadline = '$deadline'
            ";

        // echo "SQL Query: " . $sql . "<br>";
        
        $res = mysqli_query($conn, $sql);

        if ($res==true){
            echo "Task Added.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
