<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Mid Project</title>
</head>

<body>
    <?php require_once 'Controller/changePasswordController.php'; ?>

    <?php include 'Header.php'; ?>

    <span style="display:inline-block; width:100%;text-align:left; height: 40%;">

        <?php

        if (isset($_SESSION['email'])) {
            include 'Customer_Top_Menu_Bar.php';

            echo '<div class="row">';
            echo '<span style = "display:inline-block; width:30%; height:100%; text-align:left">';
            echo '<div class="column" >';
            include 'Customer_Menu.php';
            echo '</div>';
            echo '</span>';
            echo '<div class="column" >';
            echo '<form method= "post"';
            echo '<h2> </h2>';
            echo '<h2> CHANGE PASSWORD</h2><br>';
            if (isset($error)) {
                echo '<span class="red">';
                echo $error;
                echo '</span><br>';
            }
            echo '</span>';
            echo '<form method="post" >';
            echo '<label style = "display:inline-block; width:165px;text-align:right;">Current Password : </label>';
            echo '<input type="Password" name="currentPassword" id="currPass" class="form-control" /> <br>';
            echo '<span style = "display:inline-block; width:260px; text-align:right;">';
            echo ' <input type="checkbox" onclick="showCurrPass()"> Show password <br>';
            echo '</span><br>';
            echo '<label style = "color:green; display:inline-block; width:165px;text-align:right;">New Password : </label>';
            echo '<input type="Password" name="newPassword" id="newPass" class="form-control" /> <br>';
            echo '<span style = "display:inline-block; width:260px; text-align:right;">';
            echo ' <input type="checkbox" onclick="showNewPass()"> Show password <br>';
            echo '</span><br>';
            echo '<label style = "color:red; display:inline-block; width:165px;text-align:right;">Retype Password : </label>';
            echo '<input type="Password" name="reNewPassword" id="reNewPass" class="form-control" /> <br>';
            echo '<span style = "display:inline-block; width:260px; text-align:right;">';
            echo ' <input type="checkbox" onclick="showReNewPass()"> Show password <br>';
            echo '</span><br>';
            echo '<br>';
            echo '<span style = "display:inline-block; width:260px; text-align:right;"><input type="submit" value="Update" name="submit"> </span><br>';
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
    <br><br><br><br><br><br><br><br><br>
    <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
    <br><br>

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