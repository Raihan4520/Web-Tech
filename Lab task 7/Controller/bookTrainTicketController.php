<?php
require_once 'Model/Model.php';

$msg = $ticketIdErr = $emailErr = '';
$valid = 1;

if (isset($_POST["submit"])) {
    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter a Ticket ID to book";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{8}$/', $_POST["ticketId"])) {
        $ticketIdErr = "*Ticket ID must be eight (8) digits";
        $valid = 0;
    }

    if (empty($_POST["email"])) {
        $emailErr = "*Email address is required";
        $valid = 0;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "*Please enter a valid email address";
        $valid = 0;
    } else if ($_POST["email"] != $_SESSION["email"]) {
        $emailErr = "*Please enter your email address";
        $valid = 0;
    }

    if ($valid) {
        if (file_exists('Train_Tickets_Data.json')) {
            $msg = bookTrainTicket($_POST);
        } else {
            $msg = '<span class="red">JSON file does not exit</span>';
        }
    } else {
        $msg = '<span class="red">Booking failed</span>';
    }
}
