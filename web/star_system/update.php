<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


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
    elseif (isset($_GET['delete'])){
        $ship = $_GET['delete'];
        $db->query("DELETE from ships where ship_id = $ship");
    }
    else {
        $printout = array('ship_name', 'ship_type_id', 'commanding_officer', 'fleet_id', 'affiliation_id', 'location_id', 'ship_size', 'crew_size');
        $list = array();
        $end = end($printout);
        $queryline = 'INSERT INTO ships (';
        foreach ($printout as $column){
            if ($end != $column){
                $queryline .= $column . ", ";
            }
            else {
                $queryline .= $column . ") VALUES (";
            }
        }
        foreach ($printout as $column){
            if ($end != $column){
                $queryline .= "'". test_input($_GET[$column]) . "'" . ", ";
            }
            else {
                $queryline .="'". test_input($_GET[$column]) . "'" . ")";
            }
        }
        $queryline = str_replace($queryline, "%", " ");
        print $queryline;

    }

    ?>