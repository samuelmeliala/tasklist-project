<?php 

session_start();
require 'functions.php';

if (isset($_SESSION["username"])) {
    $name = $_SESSION["username"];
    $print_name = $name;
} else {
    $print_name = "You are not logged in";
}

if (isset($_POST['submit'])) {
    $taskname = $_POST['taskname'];
    $date = $_POST['taskdate'];
    add_task($taskname, $date);
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    delete_task($id);
}

if (isset($_POST['done'])) {
    $id = $_POST['id'];
    mark_task_done($id);
}

$tasks = get_all_tasks();
$completed_tasks = get_completed_tasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hello, <?php echo $print_name; ?></h1>
    <form action="logout.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    <form action="" method="post">
    <h2>Add New Task</h2>
    <table>
        <tr>
            <td><label for="">Add New Task : </label></td>
            <td><input type="text" name="taskname" placeholder="Enter Task Name"></td>
        </tr>
        <tr>
            <td><label for="">Deadline : </label></td>
            <td><input type="date" name="taskdate" id="task-date"></td>    
        </tr>
        <tr>
            <td><button type="submit" value="submit">Add Task</button></td>
        </tr>
    </table>
    </form>
    <h1>Tasks</h1>
    <h1>Completed Tasks</h1>
</body>
</html>