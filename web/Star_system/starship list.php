<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
  <?php

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


        foreach ($db->query('SELECT * from fleet') as $fleet){
          echo $fleet['fleet_name'] . $fleet['commanding_officer'];
          $affiliation = $fleet['affiliation'];
          $affiliation = $db->query("SELECT affiliation from politics where id=$affiliation");
          echo " : $affiliation";
          $id = $fleet['id'];
          foreach ($db->query("SELECT * from ships where fleet=$id") as $ship) {
            echo "<br><br>" . $ship['name'] . " : ";
            $type = $ship['type'];
            $type = $db->query("SELECT type from ship_type where id=$type");
            echo "$type : ";
            echo $ship['commanding_officer'];
            $affiliation = $ship['affiliation'];
            $affiliation = $db->query("SELECT affiliation from politics where id=$affiliation");
            echo " : $affiliation";
          }

        }


  ?>
    
</body>
</html>