<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secure Login</title>
</head>
<body>
    <?php
    echo "Inspecting Credentials";
    if (isset($_POST['username']) && isset($_POST['password']))
    {
        
        $username = $_POST['username'];
        $password = $_POST['password'];        
        require('connect.php');
        foreach ($db->query("SELECT password_hash, permissions from users where username= '$username'") as $fromDB){

            if (password_verify($password, $fromDB['password_hash'])){
                $_SESSION['username'] = $username;
                $_SESSION['permission'] = $fromDB['permissions'];
                header("location: list.php");
                die();
            }
        }
    }
    else
    {
        echo "<br> ERROR!";
    }

    ?>


    <Form id="signin" action="login.php" method="Post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Log in">
    </Form>
</body>
</html>