<?php

require_once 'Model/Model.php';
require_once 'Model/db_connect.php';

session_start();
 $trainId =  $trainName = $trainLocation ='';
$msg =   $trainIdErr = $trainNameErr =    $trainLocationErr = '';
$valid = 1;

if (isset($_POST['search'])) {
    if (empty($_POST["trainId"])) {
        $trainIdErr = "*Please enter ticket ID";
        $valid = 0;
    }
    $trainId = $_POST["trainId"];

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `train` where t_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$_POST['trainId']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    $trainName = $row["t_name"];
    $trainLocation = $row["t_location"];
}

if (isset($_POST['submit'])) {
    if (empty($_POST["trainName"])) {
        $trainNameErr = "*Please enter train name";
        $valid = 0;
    } else if (str_word_count($_POST["trainName"]) != 1) {
        $trainNameErr = "*Train name must be a single word";
        $valid = 0;
    } else if (!preg_match("/^[A-Za-z]*$/", $_POST["trainName"])) {
        $trainNameErr = "*For train name only upper/lower case alphabets are allowed";
        $valid = 0;
    }

    if (empty($_POST["trainLocation"])) {
        $trainLocationErr = "*Please select a location";
        $valid = 0;
    }

   

    if ($valid) {
        $msg = updateTrain($_POST);
    } else {
        $msg = '<span class="red">Update Failed</span>';
    }
}
