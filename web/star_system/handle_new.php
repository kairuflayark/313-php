<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $username= test_input($_POST['username']);
    $password= test_input($_POST['password']);
    $permissions = $_POST['permissions'];

    if (!isset($username) || $username == ""|| !isset($password) || $password == "")
    {
        header("Location: create_account.php");
        die();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);



    require('connect.php');

    $db->query("INSERT INTO users (username, password, permissions) values ('$username', '$hashedPassword', '$permissions')");

    header("location: login.php");
    die();

?>