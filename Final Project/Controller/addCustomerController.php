<?php

require_once 'Model/Model.php';

session_start();

$msg = $nameErr = $emailErr = $phoneNoErr = $passErr = $conPassErr = $genderErr = $dobErr = '';
$valid = 1;

if (isset($_POST["submit"])) {
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

    if (empty($_POST["email"])) {
        $emailErr = "*Please enter your email address";
        $valid = 0;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "*Please enter a valid email address";
        $valid = 0;
    }

    if (empty($_POST["phoneNo"])) {
        $phoneNoErr = "*Please enter your phone number";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{11}$/', $_POST["phoneNo"])) {
        $phoneNoErr = "*Phone number must be eleven (11) digits (excluding +88)";
        $valid = 0;
    }

    if (empty($_POST["password"])) {
        $passErr = "*Please enter a password";
        $valid = 0;
    } else if (strlen($_POST["password"]) < 6) {
        $passErr = "*Password must not be less than six (6) characters";
        $valid = 0;
    } else if (!preg_match('/[A-Z]+/', $_POST["password"])) {
        $passErr = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        $valid = 0;
    } else if (!preg_match('/[a-z]+/', $_POST["password"])) {
        $passErr = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        $valid = 0;
    } else if (!preg_match('/[0-9]+/', $_POST["password"])) {
        $passErr = "*Password must contain at least one upper case letter, one lower case letter and one numeric character";
        $valid = 0;
    }

    if (empty($_POST["confirmPassword"])) {
        $conPassErr = "*Please enter confirm password";
        $valid = 0;
    } else if ($_POST["password"] != $_POST["confirmPassword"]) {
        $conPassErr = "*Password and confirm password does not match";
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
        $_SESSION['name'] = test_input($_POST["name"]);
        $_SESSION['email'] = test_input($_POST["email"]);
        $_SESSION['phoneNo'] = test_input($_POST["phoneNo"]);
        $_SESSION['password'] = test_input($_POST["password"]);
        $_SESSION['gender'] = test_input($_POST["gender"]);
        $_SESSION['dateOfBirth'] = test_input($_POST["dateOfBirth"]);
        $_SESSION['profilePic'] = 'Dummy.png';

        $msg = addCustomer($_POST);
        header("location:Customer_Home.php");
    } else {
        $msg = '<span class="red">Registration failed</span>';
    }
}
