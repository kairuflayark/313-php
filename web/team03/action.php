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
    <?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $major = test_input($_POST["major"]);
      $comment = test_input($_POST["comment"]);
      $country = $_POST["country"];
      $arrayLength = count($country);
      $Continent = array("NA" => "North America", "SA" => "South America", "E" => "Europe", "As" => "Asia", "Au" => "Austrailia", "Af" => "Africa", "An" => "Antartica");

      echo "Name: " . $name . "<br>";
      echo "Email: " . $email . "<br>";
      echo "Major: " . $major . "<br>";
      echo "Comments: " . $comment . "<br>";
      echo "Places Visited: <br>";
      foreach($country as $value) {
          echo $Continent["$value"] . "<br>";
      }    
    ?>
    </div>

</body>
</html>