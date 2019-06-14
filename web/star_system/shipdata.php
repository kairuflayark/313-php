<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ship Data</title>
</head>
<body>
    
<?php


    $printout = array('ship_name', 'type', 'commanding_officer', 'fleet_name', 'affiliation', 'system_name', 'planet_name', 'ship_size', 'crew_size');
    if (isset($_GET['show'])) {
        $ship = $_GET['show'];
        echo "<table><tr>";

        foreach ($db->query("SELECT s.ship_id, s.ship_name, t.type, s.commanding_officer, f.fleet_name, a.affiliation, l.location_id, ss.system_name, star.star_name, p.planet_name, s.ship_size, s.crew_size from ships s
            left join ship_type t on s.ship_type_id=t.ship_type_id
            left join location l on s.location_id=l.location_id
            left join star_system ss on l.system_id=ss.system_id
            left join star on l.star_id=star.star_id
            left join planet p on l.planet_id=p.planet_id
            left join fleet f on s.fleet_id=f.fleet_id
            left join politics a on s.affiliation_id = a.affiliation_id
            where s.ship_id=$ship") as $row)
        {
      
                foreach ($printout as $column){
                    echo '<td>' . $row[$column] . "</td>";
                }
            echo "<td><a href='shipdata.php?show=" . $row['ship_id'] . "'><button>Update Data</button></a></td> ";
            echo "<td><a href='shipdata.php?update=" . $row['ship_id'] . "'><button>Update Data</button></a></td> ";
            echo "</tr>";
        }
        echo "</table><br>";
    }


?>
</body>
</html>