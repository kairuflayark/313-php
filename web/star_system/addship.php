<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <form action="">
        <?php
        include "connect.php";
        $printout = array('ship_name', 'type', 'commanding_officer', 'ship_size', 'crew_size');
        foreach ($printout as $row){
            echo "<label>$row: </label><input type='text' name='$row'><br>";
        }

        $orbit = array();
        
        foreach ($db->query('SELECT l.location_id, ss.system_name, s.star_name, p.planet_name from location l 
            left join star_system ss on l.system_id = ss.system_id
            left join star s on l.star_id = s.star_id
            left join planet p on l.planet_id = p.planet_id') as $row){

            if ($row['planet_name'] != "") {
                $orbit[$row['location_id']] = $row['system_name'] . ", " . $row['planet_name'];
            } elseif ($row['star_name'] != ""){
                $orbit[$row['location_id']] =$row['system_name'] . ", " . $row['star_name'];
            } else {
                $orbit[$row['location_id']] =$row['system_name'];
            }
        } 
        echo "<td><select id='location'>";
        foreach ($orbit as $key => $location){
            echo "<option value='$key'>" . $location . "</option>";
        }

        echo "</input></td>";

        
        $fleets = array();
        foreach ($db->query("SELECT * from politics") as $row){
            $fleets[$row['fleet_id']] = $row['fleet_name'];
        }
        echo "<td><select id='fleet_name'>";
        foreach ($fleets as $key => $fleet){
            echo "<option value='$key'>" . $fleet . "</option>";
        }
        echo "</input></td>";

        $affiliation = array();
        foreach ($db->query("SELECT * from politics") as $row){
            $affiliation[$row['affiliation_id']] = $row['affiliation'];
        }
        echo "<td><select id='politics'>";
        foreach ($affiliation as $key => $politics){
            echo "<option value='$key'>" . $politics . "</option>";
        }
        echo "</input></td>";
        print_r($affiliation);

        ?>


    </form>
<body>
    
</body>
</html>