<?php 
require 'functions.php';
if(isset($_POST["register"])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // validasi input
    if(empty(trim($name)) || empty(trim($username)) || empty(trim($password)) || empty(trim($password2))){
        echo "<script>alert('Please fill all required fields');</script>";
    } else {
        // tambahkan user baru
        if(register($_POST) > 0){
            echo "<script>window.alert('A new user has been added!');</script>";
            header("Location: index.php");
            exit;
        } else {
            echo mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Register Here</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="name">Name </label></td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td><label for="username">Username </label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password </label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><label for="password2">Confirm Password </label></td>
                <td><input type="password" name="password2" id="password2"></td>
            </tr>
            <tr>
                <td><button type="submit" name="register">Register Now</button></td>
            </tr>
        </table>
    </form>
</body>
</html>