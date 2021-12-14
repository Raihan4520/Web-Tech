<?php
session_start();
require_once 'Model/Model.php';
require_once 'Model/db_connect.php';
$msg =  $planeIdErr = '';
$valid = 1;
if (isset($_POST["submit"])) {
    if (empty($_POST["planeId"])) {
        $planeIdErr = "*Please enter Plane ID";
        $valid = 0;
    }
    $planeId= $_POST["planeId"];

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `plane` where p_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$_POST['planeId']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    if ($valid) {
        $msg = deletePlane($planeId);
    } else {
        $msg = '<span class="red">delete succesfully</span>';
    }
  
}
