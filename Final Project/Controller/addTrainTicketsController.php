<?php

require_once 'Model/Model.php';

session_start();

$msg = $trainIdErr  = $ticketIdErr  = $fromErr = $toErr = '';
$valid = 1;

if (isset($_POST["submit"])) {
    

    if (empty($_POST["trainFrom"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["trainTo"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        $msg = addTrainTicket($_POST);
    } else {
        $msg = '<span class="red">Adding train ticket failed</span>';
    }
}
