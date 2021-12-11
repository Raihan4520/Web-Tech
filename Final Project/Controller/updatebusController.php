<?php

require_once 'Model/Model.php';
require_once 'Model/db_connect.php';

session_start();
 $busId =  $busName = $busLocation ='';
$msg =   $busIdErr = $busNameErr =    $busLocationErr = '';
$valid = 1;

if (isset($_POST['search'])) {
    if (empty($_POST["busId"])) {
        $busIdErr = "*Please enter ticket ID";
        $valid = 0;
    }
    $busId = $_POST["busId"];

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `bus` where b_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$_POST['busId']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    $busName = $row["b_name"];
    $busLocation = $row["b_location"];
}

if (isset($_POST['submit'])) {
    if (empty($_POST["busName"])) {
        $busNameErr = "*Please enter bus name";
        $valid = 0;
    } else if (str_word_count($_POST["busName"]) != 1) {
        $busNameErr = "*Bus name must be a single word";
        $valid = 0;
    } else if (!preg_match("/^[A-Za-z]*$/", $_POST["busName"])) {
        $busNameErr = "*For bus name only upper/lower case alphabets are allowed";
        $valid = 0;
    }

    if (empty($_POST["busLocation"])) {
        $busLocationErr = "*Please select a location";
        $valid = 0;
    }

   

    if ($valid) {
        $msg = updateBus($_POST, $busId);
    } else {
        $msg = '<span class="red">Update Failed</span>';
    }
}
