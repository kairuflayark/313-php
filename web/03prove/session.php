<?php
session_start();
$blenders = array("Binastone", "Ninja", "Electrolux", "Philips");
$_SESSION['Blenders'] = $blenders;
$_SESSION['orange'] = 2;
foreach ($_SESSION['Blenders'] as $value){
    if( isset($_POST["$value"]) ) {
    // save values from other page to session
        $_SESSION["$value"] = $_POST["$value"];
    }
}
?>