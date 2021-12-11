<?php
session_start();
require_once 'Model/Model.php';
require_once 'Model/db_connect.php';
$msg =  $trainIdErr = '';
$valid = 1;
if (isset($_POST["submit"])) {
    if (empty($_POST["trainId"])) {
        $trainIdErr = "*Please enter train ID";
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


    if ($valid) {
        $msg = deletetrain($trainId);
    } else {
        $msg = '<span class="red">Delete failed</span>';
    }
}
