<?php 
    include('config/config.php');
?>

<html>
<head>
    <title>Task Manager app</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <h1>TASK MANAGER</h1>
        <!--Menu starts-->
        <div class="menu">
            <a href="index.php">Home</a>
            <a href="#">ToDo</a>
            <a href="#">Current</a>
            <a href="#">Finished</a>
            <a href="#">Manage</a>
        </div>
        <!--Menu Ends-->

        <!--Tasks Starts-->
        <div class="all-task">
            <a class="btn-primary" href="add-task.php">Add Task</a>
            <table class="tbl-data">
                <tr>
                    <th>ID</th>
                    <th>Task Name</th>
                    <th>Priority</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>

                <?php 
                    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error());

                    $sql = "SELECT * from tbl_tasks";
                    $res = mysqli_query($conn, $sql);

                    $count_rows = mysqli_num_rows($res);

                    if ($count_rows > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $task_id = $row['task_id'];
                            $task_name = $row['task_name'];
                            $priority = $row['priority'];
                            $deadline = $row['deadline'];
                ?>
                <tr id="task_<?php echo $task_id; ?>">
                    <td><?php echo $task_id ?></td>
                    <td><?php echo $task_name ?></td>
                    <td><?php echo $priority ?></td>
                    <td><?php echo $deadline ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>update.php?task_id=<?php echo $task_id; ?>">Update</a>
                        <a href="#" onclick="deleteTask(<?php echo $task_id; ?>)">Delete</a>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
    <!--Tasks Ends-->

    <script>
        function deleteTask(taskId) {
            if (confirm("Are you sure you want to delete this task?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "<?php echo SITEURL; ?>delete.php?task_id=" + taskId, true);

                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        // Request was successful, remove the task from the table
                        var deletedElement = document.getElementById("task_" + taskId);
                        if (deletedElement) {
                            deletedElement.parentNode.removeChild(deletedElement);
                        }
                    } else {
                        // Request failed, handle the error
                        console.error('Request failed with status ' + xhr.status);
                    }
                };

                xhr.onerror = function() {
                    // Request failed, handle the error
                    console.error('Request failed');
                };

                xhr.send();
            }
        }
    </script>
</body>
</html>
