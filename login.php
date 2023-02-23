<?php 

require 'functions.php';

if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);

        if(password_verif($password, $row["password"])) {
            header("Location: index.php");
            exit;
        }
    }

    $error = true;


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login</h1>

    <?php if(isset($error)) : ?>
        <p style="color: red; font-style: italic;"> Username / Password is Wrong!</p>
    <?php endif; ?>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="username">Username </label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password </label></td>
                <td><input type="text" name="password" id="password"></td>
            </tr>
            <tr>
                <td><button type="submit" name="login">Login</button></td>
            </tr>
        </table>

    </form>
    
</body>
</html>