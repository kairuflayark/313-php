<?php
session_start();
foreach ($_SESSION['Blenders'] as $value){
    if( isset($_POST["$value"]) ) {
    // save values from other page to session
        $_SESSION["$value"] = $_POST["$value"];
    }
}
?>