<?php
session_start();
require_once 'Model/Model.php';
require_once 'Model/db_connect.php';
$msg =  $busIdErr = '';
$valid = 1;
if (isset($_POST["submit"])) {
    if (empty($_POST["busId"])) {
        $busIdErr = "*Please enter bus ID";
        $valid = 0;
    }
    $busId= $_POST["busId"];

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `bus` where b_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$_POST['busId']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    if ($valid) {
        $msg = deletebus($busId);
    } else {
        $msg = '<span class="red">delete succesfully</span>';
    }
  
}
