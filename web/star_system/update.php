<?php
    include "connect.php";
    print_r($_POST);
    if (isset($_POST['ship_id']))
    {   
        print "runSecond";
        $location = $_POST['location_id'];
        $ship = $_POST['ship_id'];

        $db->query("UPDATE ships SET location_id = $location where ship_id = $ship");
        print $ship . $location;
    }


    ?>