<?php

require_once 'Model/Model.php';

session_start();

$msg = $PlaneIdErr = $PlaneNameErr = $PlaneLocationErr='';
$valid = 1;

if (isset($_POST["submit"])) {
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
        $msg = addPlane($_POST);
    } else {
        $msg = '<span class="red">Adding Plane </span>';
    }
}
