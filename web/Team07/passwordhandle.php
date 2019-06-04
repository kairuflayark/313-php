<?php
session_start();
$user = $_REQUEST["username"];
$password = $_REQUEST["password1"];
$password2 = $_REQUEST["password2"];

$hashed = $password_hash($password, 10);
try {
    $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $ex)
{
  echo 'Error Connecting!';
  die();
}

if ($password2 != "") {
    $db->query("INSERT INTO users (username, password) values ($user, $hashed)");
    header('Location: signin.php');
}
else {
    $return = ($db->query("SELECT password from users where username='$user'"));
    if ($return == $hashed){
        $_SESSION['user'] = $user;
        header('Location: welcome.php');
    }
    else {
        echo 'Invalid username';
    }
}












?>