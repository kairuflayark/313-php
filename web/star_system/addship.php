<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <form action="update.php" method='POST' id="data">
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
        </tr>
        <tr>
        <td><input type="text" name="ship_name" id="ship_name"> </td>


        <?php
        include "connect.php";
        $types = array();
        foreach ($db->query("SELECT * from ship_type") as $row){
            $types[$row['ship_type_id']] = $row['ship_type'];
        }
        echo "<td><select id='ship_type_id'>";
        foreach ($types as $key => $type){
            echo "<option value='$key'>" . $type . "</option>";
        }
        echo "</select></td>";
        ?>

        <td><input type="text" name="commanding_officer" id="commanding_officer"> </td>

        <?php
            $fleets = array();
            foreach ($db->query("SELECT * from fleet") as $row){
                $fleets[$row['fleet_id']] = $row['fleet_name'];
            }
            echo "<td><select id='fleet_name'>";
            foreach ($fleets as $key => $fleet){
                echo "<option value='$key'>" . $fleet . "</option>";
            }
            echo "</select></td>";

            $affiliation = array();
            foreach ($db->query("SELECT * from politics") as $row){
                $affiliation[$row['affiliation_id']] = $row['affiliation'];
            }
            echo "<td><select id='politics'>";
            foreach ($affiliation as $key => $politics){
                echo "<option value='$key'>" . $politics . "</option>";
            }
            echo "</select></td>";

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
            echo "</select></td>";
        
        ?>
        <td><input type="text" name="ship_size" id="ship_size"> </td>
        <td><input type="text" name="crew_size" id="crew_size"> </td>
        </tr></table>
        

    </form>
<body>
    
</body>
</html>