<?php

require_once 'Model/Model.php';
require_once 'Model/db_connect.php';

session_start();

$ticketId = $trainId  = $from = $to = $price = $date = $time = '';
$msg = $trainIdErr = $ticketIdErr  = $fromErr = $toErr = '';
$valid = 1;

if (isset($_POST['search'])) {
    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter ticket ID";
        $valid = 0;
    }
    $ticketId = $_POST["ticketId"];

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `tickets` where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$_POST['ticketId']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;

    $to = $row["location_to"];
    $from = $row["location_from"];
    $price = $row["price"];
    $date = $row["date"];
    $time = $row["time"];
    $trainId = $row["t_id"];
    
}

if (isset($_POST['submit'])) {

if (empty($_POST["trainId"])) {
        $trainIdErr = "*Please enter train ID";
        $valid = 0;
    }
   
    if (empty($_POST["trainFrom"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["trainTo"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        $msg = updateTrainTicket($_POST, $ticketId);
    } else {
        $msg = '<span class="red">Update Failed</span>';
    }
}
