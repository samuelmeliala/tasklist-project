<?php 
$conn = mysqli_connect("localhost", "root", "", "midprojectlnt");
if ($conn){
    echo "Success!";
} else {
    die("Error". mysqli_connect_error());
}

function registration($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($data["password"]);
    $password2 = mysqli_real_escape_string($data["password2"]);

    if($password !== $password2){
        echo
    }





}


?>