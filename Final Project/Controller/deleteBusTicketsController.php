<?php
session_start();
require_once 'Model/Model.php';
require_once 'Model/db_connect.php';
$msg =  $ticketIdErr = '';
$valid = 1;
if (isset($_POST["submit"])) {
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


    if ($valid) {
        $msg = deletebustickes($ticketId);
    } else {
        $msg = '<span class="red">delete succesfully</span>';
    }

}
