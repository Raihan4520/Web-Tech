<?php
session_start();
require_once 'Model/Model.php';
require_once 'Model/db_connect.php';
$msg =  $PlaneIdErr = '';
$valid = 1;
if (isset($_POST["submit"])) {
    if (empty($_POST["PlaneId"])) {
        $PlaneIdErr = "*Please enter Plane ID";
        $valid = 0;
    }
    $PlaneId= $_POST["PlaneId"];

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `Plane` where t_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$_POST['PlaneId']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    if ($valid) {
        $msg = deletePlane($PlaneId);
    } else {
        $msg = '<span class="red">delete succesfully</span>';
    }
  
}
