<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid Project</title>
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
    <?php require_once 'Controller/changePasswordController.php'; ?>

    <?php include 'Header.php'; ?>

    <span style="display:inline-block; width:100%;text-align:left; height: 40%;">


        <?php

        if (isset($_SESSION['email'])) {
            include 'Customer_Top_Menu_Bar.php';

            echo '<div class="row">';
            echo '<span style = "display:inline-block; width:36%; height:100%; text-align:left">';
            echo '<div class="column" >';
            include 'Customer_Menu.php';
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
            echo '<input type="Password" name="currentPassword" id="currPass" class="form-control" /><br />';
            echo '<input type="checkbox" onclick="showCurrPass()"> Show current password <br><br>';
            echo '<label style = "color:green; display:inline-block; width:160px;text-align:right;">New Password : </label>';
            echo '<input type="Password" name="newPassword" id="newPass" class="form-control" /><br />';
            echo '<input type="checkbox" onclick="showNewPass()"> Show new password <br><br>';
            echo '<label style = "color:red; display:inline-block; width:160px;text-align:right;">Retype New Password : </label>';
            echo '<input type="Password" name="reNewPassword" id="reNewPass" class="form-control" /><br />';
            echo '<input type="checkbox" onclick="showReNewPass()"> Show retyped new password <br><br>';
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

    <script>
        function showCurrPass() {
            var x = document.getElementById("currPass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showNewPass() {
            var x = document.getElementById("newPass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showReNewPass() {
            var x = document.getElementById("reNewPass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <?php include 'Footer.php'; ?>

</body>

</html>