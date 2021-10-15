<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab task 4</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
        }

        .column {
            flex: 50%;
            padding: 10px;
            height: 50%;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    $error = '';
    $msg = '';
    if (isset($_POST["submit"])) {
        if (empty($_POST["currentPassword"])) {
            $error = "<label class='text-danger'>Please enter current password</label>";
        } else if ($_POST["currentPassword"] != $_SESSION["password"]) {
            $error = "Incorrect password";
        } else if (empty($_POST["newPassword"])) {
            $error = "<label class='text-danger'>New password is required</label>";
        } else if (!preg_match('/[@#$%]+/', $_POST["newPassword"])) {
            $error = "Must contain one of the special characters (@, #, $, %)";
        } else if (strlen($_POST["newPassword"]) < 8) {
            $error = "Password must be at least (8) characters long";
        } else if ($_SESSION["password"] == $_POST["newPassword"]) {
            $error = "Current password and new password must be different";
        } else if (empty($_POST["reNewPassword"])) {
            $error = "Retyping new password is required";
        } else if ($_POST["newPassword"] != $_POST["reNewPassword"]) {
            $error = "New password and retyped password must be same";
        } else {
            $msg = "Password successfully changed";
            $_SESSION['password'] = $_POST['newPassword'];
        }
    }
    include 'header.php'; ?>

    <span style="display:inline-block; width:100%;text-align:left; height: 40%;">


        <?php

        if (isset($_SESSION['userName'])) {

            echo '<div class="row">';
            echo '<span style = "display:inline-block; width:36%; height:100%; text-align:left">';
            echo '<div class="column" >';
            include 'Account.php';
            echo '</div>';
            echo '</span>';
            echo '<div class="column" >';
            echo '<form method= "post"';
            echo '<b>CHANGE PASSWORD </b><br><br>';
            echo '<span style ="color:red"';
            if (isset($error)) {
                echo '<span style ="color:red">';
                echo $error;
                echo '</span>';
            }
            echo '</span>';
            echo '<br><br><form method="post" >';
            echo '<label style = "display:inline-block; width:160px;text-align:right;">Current Password : </label>';
            echo '<input type="Password" name="currentPassword" class="form-control" /><br /><br>';
            echo '<label style = "color:green; display:inline-block; width:160px;text-align:right;">New Password : </label>';
            echo '<input type="Password" name="newPassword" class="form-control" /><br /><br>';
            echo '<label style = "color:red; display:inline-block; width:160px;text-align:right;">Retype New Password : </label>';
            echo '<input type="Password" name="reNewPassword" class="form-control" /><br /><br>';
            echo '<br>';
            echo '<span style = "display:inline-block; width:335px;text-align:right;"><input type="submit" value="Submit" name="submit"> </span><br>';
            if (isset($msg)) {
                echo '<span style ="color:green">';
                echo $msg;
                echo '</span>';
            }
            echo '</form>';
            echo '</div>';
            echo '</div>';
        } else {
            $msg = "error";
            header("location:Login.php");
        }

        ?>
    </span>
    <?php include 'footer.php'; ?>

</body>

</html>