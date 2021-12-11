<?php

require_once 'Model/Model.php';

session_start();

$msg = $PlaneIdErr  = $ticketIdErr  = $fromErr = $toErr = '';
$valid = 1;

if (isset($_POST["submit"])) {
    

    if (empty($_POST["PlaneFrom"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["PlaneTo"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        $msg = addPlaneTicket($_POST);
    } else {
        $msg = '<span class="red">Adding Plane ticket failed</span>';
    }
}
