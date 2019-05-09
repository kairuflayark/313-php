<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<form action="action.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Major:<br>
<?php
    $majors = array("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering");
    foreach ($majors as $value) {
        echo "<input type='radio' name='major' value='$value'>$value<br>";
    }
    ?>
    <!--<input type="radio" name="major" value="Computer Science">Computer Science<br>
    <input type="radio" name="major" value="Web Design and Development">Web Design and Development<br>
    <input type="radio" name="major" value="Computer Information Technology">Computer Information Technology<br>
    <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br>-->
<br>
Places You have visited: <br>
<input type="checkbox" name="country[]" value="NA">North America<br>
<input type="checkbox" name="country[]" value="SA">South America<br>
<input type="checkbox" name="country[]" value="E">Europe<br>
<input type="checkbox" name="country[]" value="As">Asia<br>
<input type="checkbox" name="country[]" value="Au">Australia<br>
<input type="checkbox" name="country[]" value="Af">Africa<br>
<input type="checkbox" name="country[]" value="An">Antarctica<br>
Comment: <br><br>
 <textarea name="comment" rows="5" cols="40"></textarea><br>
<input type="submit">
</form>
</div>
</body>
</html>