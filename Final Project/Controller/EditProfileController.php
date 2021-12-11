<?php

require_once '../Model/Model.php';

session_start();

$msg = $nameErr = $phoneNoErr = $genderErr = $dobErr = '';
$valid = 1;

if (empty($_POST["name"])) {
    $nameErr = "*Please enter your full name";
    $valid = 0;
} else if (str_word_count($_POST["name"]) < 2) {
    $nameErr = "*Full name must be at least 2 words";
    $valid = 0;
} else if (!preg_match("/^[A-Za-z ]*$/", $_POST["name"])) {
    $nameErr = "*For full name only upper/lower case letters and white spaces are allowed";
    $valid = 0;
}

if (empty($_POST["phoneNo"])) {
    $phoneNoErr = "*Please enter your phone number";
    $valid = 0;
} else if (!preg_match('/^[0-9]{11}$/', $_POST["phoneNo"])) {
    $phoneNoErr = "*Phone number must be eleven (11) digits (excluding +88)";
    $valid = 0;
}

if (empty($_POST["gender"])) {
    $genderErr = "*Please select a gender";
    $valid = 0;
}

if (empty($_POST["dateOfBirth"])) {
    $dobErr = "*Please enter your date of birth";
    $valid = 0;
} else {
    $age = date_diff(date_create($_POST["dateOfBirth"]), date_create(date("Y-m-d")));
    if ($age->format('%y') < 18) {
        $dobErr = "*You must be 18 years or older";
        $valid = 0;
    }
}

if ($valid) {
    if (!empty($_POST["name"])) {
        $_SESSION['name'] = $_POST['name'];
    }
    if (!empty($_POST["phoneNo"])) {
        $_SESSION['phoneNo'] = $_POST['phoneNo'];
    }
    if (!empty($_POST["gender"])) {
        $_SESSION['gender'] = $_POST['gender'];
    }
    if (!empty($_POST["dateOfBirth"])) {
        $_SESSION['dateOfBirth'] = $_POST['dateOfBirth'];
    }
    $msg = updateProfileInfo($_POST);
} else {
    $msg = '<span class="red">Update failed</span>';
}

if (isset($msg)) {
    echo $msg;
}
