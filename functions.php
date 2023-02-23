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

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$name','$username', '$password')");

    return mysqli_affected_rows($conn);

}

function createtask($data){
    
}












?>