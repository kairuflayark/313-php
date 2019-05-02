<h1> Mountain Root Beer </h1>

<?php
    
    if ( $_SERVER['PHP_SELF' ] == "\home.php"){
        echo "<ul><li class=\"current\"><a href=\"home.php\" >Home</a></li>";
    } else {
        echo "<ul><li><a href=\"home.php\">Home</a></li>";
    }
    if ( $_SERVER['PHP_SELF' ] == "\about-us.php") {
        echo "<li class=\"current\"><a href=\"about-us.php\" >About Us</a></li>";
    } else {   
        echo "<li><a href=\"about-us.php\">About Us</a></li>";
    }
    if ( $_SERVER['PHP_SELF' ] == "\login.php") {
        echo "<li class=\"current\"><a href=\"login.php\">Login</a></li>";
    } else {
       echo "<li><a href=\"login.php\" class=>Login</a></li>";
    }
    echo "</ul>";
    echo $_SERVER['PHP_SELF' ];
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