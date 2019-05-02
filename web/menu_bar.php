<h1> Mountain Root Beer </h1>

<?php
    $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
    if ( $file === 'home'){
        echo "<ul><li class=\"current\"><a href=\"home.php\" >Home</a></li>";
    } else {
        echo "<ul><li><a href=\"home.php\">Home</a></li>";
    }
    if ( $file === 'about-us') {
        echo "<li class=\"current\"><a href=\"about-us.php\" >About Us</a></li>";
    } else {   
        echo "<li><a href=\"about-us.php\">About Us</a></li>";
    }
    if ( $file === 'login') {
        echo "<li class=\"current\"><a href=\"login.php\">Login</a></li>";
    } else {
    "<li><a href="login.php" class=>Login</a></li>";
    }
    echo "</ul>";
    echo $file;
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