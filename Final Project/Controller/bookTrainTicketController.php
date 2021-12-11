<?php
require_once 'Model/Model.php';

$msg = $ticketIdErr = $emailErr = '';
$valid = 1;

$conn = db_conn();
$selectQuery = 'SELECT * FROM `tickets` WHERE transportType = "Train"';
try {
    $stmt = $conn->query($selectQuery);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conn = null;

$conn = db_conn();
$selectQuery = "SELECT * FROM `tickets` where ticket_id = ? and bookedBy = '' and transportType = 'Train'";
try {
    $stmt = $conn->prepare($selectQuery);
    $stmt->execute([$_POST["ticketId"]]);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$conn = null;

if (isset($_POST["submit"])) {
    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter a Ticket ID to book";
        $valid = 0;
    } else if ($row["ticket_id"] != $_POST["ticketId"]) {
        $ticketIdErr = "*Please enter a valid Ticket ID";
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
        $msg = bookTicket($_POST);
        setcookie("activity", "Train Ticket with ID: " . $_POST["ticketId"], time() + 60);
        header("location:Book_Train_Tickets.php");
    } else {
        $msg = '<span class="red">Booking failed</span>';
    }
}
