<?php

require_once 'Model/Model.php';

session_start();

$msg = $trainIdErr = $trainNameErr = $trainLocationErr = '';
$valid = 1;

if (isset($_POST["submit"])) {
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
        $msg = addTrain($_POST);
    } else {
        $msg = '<span class="red">Adding train </span>';
    }
}
