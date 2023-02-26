<?php 
$conn = mysqli_connect("localhost", "root", "", "midprojectlnt");

function register($data){
    global $conn;

    $name = mysqli_real_escape_string($conn, $data["name"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username already registered!');
            </script>";
        return false;
    }

    if($password !== $password2){
        echo "<script> 
                alert('Password not the same!');
                </script>";
        return false;
    } 


    mysqli_query($conn, "INSERT INTO user VALUES('', '$name','$username', '$password')");

    return mysqli_affected_rows($conn);

}

function validate_login($conn, $username, $password) {
    global $conn;
    // Check if the username and password match a row in the database
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      // Login successful
      return true;
    } else {
      // Login failed
      return false;
    }
  }

  function add_task($taskname, $date) {
    global $conn;
    $stmt = mysqli_prepare($conn, "INSERT INTO tasks (taskname, date) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $taskname, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function delete_task($id) {
    global $conn;
    $stmt = mysqli_prepare($conn, "DELETE FROM tasks WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function mark_task_done($id) {
    global $conn;
    $stmt = mysqli_prepare($conn, "UPDATE tasks SET done = 1 WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function get_all_tasks() {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM tasks WHERE done = 0 ORDER BY date ASC");
    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $tasks;
}

function get_completed_tasks() {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM tasks WHERE done = 1 ORDER BY date ASC");
    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $tasks;
}
?>