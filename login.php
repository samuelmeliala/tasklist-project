<?php 

// Include the functions file
require 'functions.php';

// If the login form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the login
  if (validate_login($conn, $username, $password)) {
    // Login successful
    header('Location: index.php');
  } else {
    // Login failed
    echo "Invalid login credentials.";
  }
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
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><button type="submit" name="login">Login</button></td>
            </tr>
        </table>

    </form>
    
</body>
</html>
