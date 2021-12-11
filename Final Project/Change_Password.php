<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Final Project</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $("#panel").slideToggle("medium");
            });
        });

        function checkCurrPass() {
            if (document.getElementById("currPass").value == "") {
                document.getElementById("currPassErr").innerHTML = "*Current Password cannot be blank";
                document.getElementById("currPass").style.borderColor = "red";
            } else {
                document.getElementById("currPassErr").innerHTML = "";
                document.getElementById("currPass").style.borderColor = "purple";
            }
        }

        function checkNewPass() {
            if (document.getElementById("newPass").value == "") {
                document.getElementById("newPassErr").innerHTML = "*New Password cannot be blank";
                document.getElementById("newPass").style.borderColor = "red";
            } else if (document.getElementById("newPass").value.length < 6) {
                document.getElementById("newPassErr").innerHTML = "*New Password must not be less than six (6) characters";
                document.getElementById("newPass").style.borderColor = "red";
            } else if (!document.getElementById("newPass").value.match(/[A-Z]+/)) {
                document.getElementById("newPassErr").innerHTML = "*New Password must contain at least one upper case letter, one lower case letter and one numeric character";
                document.getElementById("newPass").style.borderColor = "red";
            } else if (!document.getElementById("newPass").value.match(/[a-z]+/)) {
                document.getElementById("newPassErr").innerHTML = "*New Password must contain at least one upper case letter, one lower case letter and one numeric character";
                document.getElementById("newPass").style.borderColor = "red";
            } else if (!document.getElementById("newPass").value.match(/[0-9]+/)) {
                document.getElementById("newPassErr").innerHTML = "*New Password must contain at least one upper case letter, one lower case letter and one numeric character";
                document.getElementById("newPass").style.borderColor = "red";
            } else {
                document.getElementById("newPassErr").innerHTML = "";
                document.getElementById("newPass").style.borderColor = "purple";
            }
        }

        function checkReNewPass() {
            if (document.getElementById("reNewPass").value == "") {
                document.getElementById("reNewPassErr").innerHTML = "*Retype Password cannot be blank";
                document.getElementById("reNewPass").style.borderColor = "red";
            } else if (document.getElementById("reNewPass").value != document.getElementById("newPass").value) {
                document.getElementById("reNewPassErr").innerHTML = "*Retype Password and New password does not match";
                document.getElementById("reNewPass").style.borderColor = "red";
            } else {
                document.getElementById("reNewPassErr").innerHTML = "";
                document.getElementById("reNewPass").style.borderColor = "purple";
            }
        }
    </script>
    <style>
        #flip {
            background-color: DarkSlateBlue;
            text-decoration: none;
            color: lavender;
            font-size: 20px;
        }

        #panel {
            display: none;
        }
    </style>
</head>

<body>

    <?php require_once 'Controller/changePasswordController.php'; ?>

    <?php
    session_start();
    include 'Header.php';
    ?>

    <?php

    if (isset($_SESSION['email'])) {
        echo '<div id="flip" style = "display:inline-block; width:100%; padding-right: 2%; text-align:right"> <label>SHOW/HIDE MENU BAR</label> </div>';
        include 'Customer_Top_Menu_Bar.php';

        echo '<div class="row">';
        echo '<span style = "display:inline-block; width:36%; height:100%; text-align:left">';
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
        echo '<input type="Password" name="currentPassword" id="currPass" onblur="checkCurrPass()" class="form-control" /> <br> <span class="red"><p id="currPassErr"></p></span> <br>';
        echo '<span style = "display:inline-block; width:260px; text-align:right;">';
        echo ' <input type="checkbox" onclick="showCurrPass()"> Show password <br>';
        echo '</span><br>';
        echo '<label style = "color:green; display:inline-block; width:165px;text-align:right;">New Password : </label>';
        echo '<input type="Password" name="newPassword" id="newPass" onblur="checkNewPass()" class="form-control" /> <br> <span class="red"><p id="newPassErr"></p></span> <br>';
        echo '<span style = "display:inline-block; width:260px; text-align:right;">';
        echo ' <input type="checkbox" onclick="showNewPass()"> Show password <br>';
        echo '</span><br>';
        echo '<label style = "color:red; display:inline-block; width:165px;text-align:right;">Retype Password : </label>';
        echo '<input type="Password" name="reNewPassword" id="reNewPass" onblur="checkReNewPass()" class="form-control" /> <br> <span class="red"><p id="reNewPassErr"></p></span> <br>';
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
        header("location:Login.php");
    }

    ?>
    <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
    <br>
    <?php include 'Footer.php'; ?>

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

</body>

</html>