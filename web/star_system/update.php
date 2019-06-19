<?php
    include "connect.php";
    print_r($_GET);
    if (isset($_GET['ship_id']))
    {   
        print "runSecond";
        $location = $_GET['location_id'];
        $ship = $_GET['ship_id'];

        $db->query("UPDATE ships SET location_id = $location where ship_id = $ship");
        print $ship . $location;
    }


    ?>