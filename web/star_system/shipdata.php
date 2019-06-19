<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="script.js"></script>
    <title>Ship Data</title>
</head>
<body>
    <table>
        <tr>
        <td>Ship Name</td>
        <td>Class</td>
        <td>Commanding Officer</td>
        <td>Assigned Fleet</td>
        <td>Political Affiliation</td>
        <td>System</td>
        <td>Orbit</td>
        <td>Ship Size</td>
        <td>Crew Size</td>
        <td>New Location</td>
        </tr>
<?php
    include "connect.php";

    $printout = array('ship_name', 'type', 'commanding_officer', 'fleet_name', 'affiliation', 'system_name', 'planet_name', 'ship_size', 'crew_size');
    if (isset($_GET['show'])) {
        $ship = $_GET['show'];
    }
    else if (isset($_GET['update'])){
        $ship = $_GET['update'];
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
    } 
    echo "<tr>";

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
        if (isset($_GET['update'])){
            echo "<td><select id='location'>";
            foreach ($orbit as $location){
                echo "<option value='" . key($location) . "'>" . $location . "</option>";
            }

            echo "</input></td>";
           
        }
    }

?>
     <td><button onclick='update_location(1, document.getElementById("location").value)'>Update</button>
    </td></tr></table>




    



</body>
</html>