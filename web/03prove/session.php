<?php
session_start();
$_SESSION['address'] = array("fName","lName","street","city","state","zCode");
foreach ($_SESSION['Blenders'] as $value){
    if( isset($_POST["$value"]) ) {
    // save values from other page to session
        $_SESSION["$value"] = $_POST["$value"];
    }
}
foreach ($_SESSION['address'] as $value){
    if (isset($_GET["$value"])){
        $_SESSION["$value"] = $_GET["$value"];
    }
}
?>