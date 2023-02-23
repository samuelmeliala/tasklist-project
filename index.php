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
    <h1>Hello, </h1>
    <form action="" method="post">
    <h2>Add New Task</h2>
    <table>
        <tr>
            <td><label for="">Add New Task : </label></td>
            <td><input type="text" name="task-name" placeholder="Enter Task Name"></td>
        </tr>
        <tr>
            <td><label for="">Deadline : </label></td>
            <td><input type="date" name="task-date" id="task-date"></td>    
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
        </tr>
    </table>
    </form>
    <h1>Tasks</h1>
    <h1>Completed Tasks</h1>
</body>
</html>