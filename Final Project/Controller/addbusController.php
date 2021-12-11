<?php

require_once 'Model/Model.php';

session_start();

$msg =  $busNameErr = $busLocationErr='';
$valid = 1;

if (isset($_POST["submit"])) {
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
        $msg = addBus($_POST);
    } else {
        $msg = '<span class="red">Adding bus </span>';
    }
}
