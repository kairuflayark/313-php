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
    include "connect.php";
    
    $all_ships = array();
    $ship_data = array();
    $printout = array('ship_name', 'type', 'fleet_name', 'affiliation', 'system_name', 'planet_name', 'ship_size', 'crew_size');
    foreach ($db->query("SELECT s.ship_name, t.type, f.fleet_name, a.affiliation, l.location_id, ss.system_name, star.star_name, p.planet_name, s.ship_size, s.crew_size from ships s
      left join ship_type t on s.ship_type_id=t.ship_type_id
      left join location l on s.location_id=l.location_id
      left join star_system ss on l.system_id=ss.system_id
      left join star on l.star_id=star.star_id
      left join planet p on l.planet_id=p.planet_id
      left join fleet f on s.fleet_id=f.fleet_id
      left join politics a on s.affiliation_id = a.affiliation_id") as $row){
      
        foreach ($printout as $column){

        
          $ship_data[$column] = $row[$column];
        }
        array_push($all_ships, $ship_data);
      }
    echo json_encode($all_ships);


  ?>
    
</body>
</html>