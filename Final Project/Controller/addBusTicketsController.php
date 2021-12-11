<?php

require_once 'Model/Model.php';

session_start();

$msg = $busIdErr = $ticketIdErr = $fromErr = $toErr = $priceErr = '';
$valid = 1;
$conn = db_conn();
$selectQuery = 'SELECT * FROM `tickets` WHERE transportType = "Bus"';
try {
    $stmt = $conn->query($selectQuery);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conn = null;

$conn = db_conn();
$selectQuery = "SELECT * FROM `tickets` where ticket_id = ? and transportType = 'Bus'";
try {
    $stmt = $conn->prepare($selectQuery);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$conn = null;
if (isset($_POST["submit"])) {

    if (empty($_POST["busId"])) {
        $busIdErr = "*Please enter a Bus ID to bookeed";
        $valid = 0;
    }
    if (empty($_POST["busFrom"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["busTo"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }
    if (empty($_POST["price"])) {
        $priceErr = "*Price cannot be blank";
        $valid = 0;
    } else if (!preg_match('/^[0-9]*$/', $_POST["price"])) {
        $priceErr = "*Price will be Digit 0-9";
        $valid = 0;
    }

    if ($valid) {
        $msg = addBusTicket($_POST);
    } else {
        $msg = '<span class="red">Booking failed</span>';
    }
}
