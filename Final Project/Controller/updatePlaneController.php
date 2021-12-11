<?php

require_once 'Model/Model.php';
require_once 'Model/db_connect.php';

session_start();
 $PlaneId =  $PlaneName = $PlaneLocation ='';
$msg =   $PlaneIdErr = $PlaneNameErr =    $PlaneLocationErr = '';
$valid = 1;

if (isset($_POST['search'])) {
    if (empty($_POST["PlaneId"])) {
        $PlaneIdErr = "*Please enter ticket ID";
        $valid = 0;
    }
    $PlaneId = $_POST["PlaneId"];

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `Plane` where p_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$_POST['PlaneId']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    $PlaneName = $row["p_name"];
    $PlaneLocation = $row["p_location"];
}

if (isset($_POST['submit'])) {
    if (empty($_POST["PlaneName"])) {
        $PlaneNameErr = "*Please enter Plane name";
        $valid = 0;
    } else if (str_word_count($_POST["PlaneName"]) != 1) {
        $PlaneNameErr = "*Plane name must be a single word";
        $valid = 0;
    } else if (!preg_match("/^[A-Za-z]*$/", $_POST["PlaneName"])) {
        $PlaneNameErr = "*For Plane name only upper/lower case alphabets are allowed";
        $valid = 0;
    }

    if (empty($_POST["PlaneLocation"])) {
        $PlaneLocationErr = "*Please select a location";
        $valid = 0;
    }

   

    if ($valid) {
        $msg = updatePlane($_POST);
    } else {
        $msg = '<span class="red">Update Failed</span>';
    }
}
