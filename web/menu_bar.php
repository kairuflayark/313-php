<?php
    echo "<ul><li><a href=\"home.php\">Home</a></li>";
    echo "<li><a href=\"about-us.php\">About Us</a></li>";
    echo "<li><a href=\"login.php\">Login</a></li>";
    echo "</ul>";
    echo $_SERVER['PHP_SELF'];
    echo "<br>";
    echo $_SERVER['SERVER_NAME'];
    echo "<br>";
    echo $_SERVER['HTTP_HOST'];
    echo "<br>";
    echo $_SERVER['HTTP_REFERER'];
    echo "<br>";
    echo $_SERVER['HTTP_USER_AGENT'];
    echo "<br>";
    echo $_SERVER['SCRIPT_NAME'];
    ?>