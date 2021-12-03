<?php

require_once 'Model/Model.php';

session_start();

$msg = $error = '';

if (isset($_POST["submit"])) {
    if (empty($_POST["currentPassword"])) {
        $error = "<label class='text-danger'>Please enter current password</label>";
    } else if ($_POST["currentPassword"] != $_SESSION["password"]) {
        $error = "Incorrect current password";
    } else if (empty($_POST["newPassword"])) {
        $error = "<label class='text-danger'>New password is required</label>";
    } else if (strlen($_POST["newPassword"]) < 6) {
        $error = "*New password must not be less than six (6) characters";
    } else if (!preg_match('/[A-Z]+/', $_POST["newPassword"])) {
        $error = "*New password must contain at least one upper case letter, one lower case letter and one numeric character";
    } else if (!preg_match('/[a-z]+/', $_POST["newPassword"])) {
        $error = "*New password must contain at least one upper case letter, one lower case letter and one numeric character";
    } else if (!preg_match('/[0-9]+/', $_POST["newPassword"])) {
        $error = "*New password must contain at least one upper case letter, one lower case letter and one numeric character";
    } else if ($_SESSION["password"] == $_POST["newPassword"]) {
        $error = "Current password and new password must be different";
    } else if (empty($_POST["reNewPassword"])) {
        $error = "Retyping new password is required";
    } else if ($_POST["newPassword"] != $_POST["reNewPassword"]) {
        $error = "New password and retyped password must be same";
    } else {
        $_SESSION['password'] = $_POST['newPassword'];
        $msg = updatePassword($_POST);
    }
}
