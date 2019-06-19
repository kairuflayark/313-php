<?php
    include "connect.php";

    if (isset($_POST['ship_id']))
    {   
        $location = $_POST['location_id'];
        $ship = $_POST['ship_id'];

        $db->query("UPDATE ships SET location_id = $location where ship_id = $ship");

    }


    ?>