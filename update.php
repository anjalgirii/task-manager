<?php 
    include('config/config.php');
    
    //Check the Task ID in URL
    
    if(isset($_GET['task_id']))
    {
        //Get the Values from DAtabase
        $task_id = $_GET['task_id'];
        
        //Connect Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error());
        
        //SQL Query to Get the detail of selected task
        $sql1 = "SELECT * FROM tbl_tasks WHERE task_id=$task_id";
        
        //Execute Query
        $res1 = mysqli_query($conn, $sql1);
    }
?>

<html>
    <head>
        <title>Manage Task</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <h1>UPDATE TASK</h1>
            <div class="all-task">
                <a class="btn-primary" href="<?php echo SITEURL;?>index.php">Home</a>
                <h2>Update Tasks</h2>
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
    if(isset($_POST['submit']))
    {
        $task_name = ($_POST['task_name']);
        $task_description = ($_POST['task_description']);
        $list_id = ($_POST['list_id']);
        $priority = ($_POST['priority']);
        $deadline = ($_POST['deadline']);

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error());

        $sql = "UPDATE tbl_tasks SET
            task_name = '$task_name',
            task_description = '$task_description',
            list_id = '$list_id',
            priority = '$priority',
            deadline = '$deadline'
            WHERE task_id = '$task_id'
        ";

        $res = mysqli_query($conn, $sql);

        if ($res==true){
            echo 'updated!';
        }
    }
?>


