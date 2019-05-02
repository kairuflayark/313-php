<?php
    if ( $_SERVER['PHP_SELF'] == "/home.php"){
        echo "<ul><li><a href=\"home.php\" class=\"current\">Home</a></li>";
    } else {
        echo "<ul><li><a href=\"home.php\">Home</a></li>";
    }
    if ( $_SERVER['PHP_SELF'] == "\about-us.php") {
        echo "<li><a href=\"about-us.php\" class=\"current\">About Us</a></li>";
    } else {   
        echo "<li><a href=\"about-us.php\">About Us</a></li>";
    }
    if ( $_SERVER['PHP_SELF'] == "/login.php") {
        echo "<li><a href=\"login.php\">Login</a></li>";
    } else {
        echo "<li><a href=\"login.php\" class=\"current\">Login</a></li>";
    }
    echo "</ul>";
    echo $_SERVER['PHP_SELF'];
    
    ?>