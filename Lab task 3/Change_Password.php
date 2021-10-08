<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <?php
    $currPass = "abc@1234";
    $passErr = $newPassErr =  $reNewPassErr = "";
    $pass = $newPass = $reNewPass = "";
    $valid = 1;

    // Function for testing and cleaning input
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validating Current Pasword
        if (empty($_POST["pass"])) {
            $passErr = "Please enter current password";
            $valid = 0;
        } else {
            $pass = test_input($_POST["pass"]);
            if ($pass != $currPass) {
                $passErr = "Incorrect password";
                $pass = "";
                $valid = 0;
            }
        }

        // Validating New Password
        if (empty($_POST["newPass"])) {
            $newPassErr = "New password is required";
            $valid = 0;
        } else {
            $newPass = test_input($_POST["newPass"]);
            if (!preg_match('/[@#$%]+/', $newPass)) {
                $newPassErr = "Must contain one of the special characters (@, #, $, %)";
                $newPass = "";
                $valid = 0;
            } else {
                if (strlen($newPass) < 8) {
                    $newPassErr = "Password must be at least (8) characters long";
                    $newPass = "";
                    $valid = 0;
                } else {
                    if ($currPass == $newPass) {
                        $newPassErr = "Current password and new password must be different";
                        $valid = 0;
                    }
                }
            }
        }

        // Validating Retype New Password
        if (empty($_POST["reNewPass"])) {
            $reNewPassErr = "Retyping new password is required";
            $valid = 0;
        } else {
            $reNewPass = test_input($_POST["reNewPass"]);
            if ($newPass != $reNewPass) {
                $reNewPassErr = "New password and retyped password must be same";
                $reNewPass = "";
                $valid = 0;
            }
        }

        // Validating Change Password
        if ($valid == 1) {
            echo '<span class="green"><h2>Password successfully changed</h2></span>';
        } else {
            echo '<span class="red"><h2>Failed to change password</h2></span>';
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend><b>CHANGE PASSWORD</b></legend>
            <label>Current Password: </label>
            <input type="password" name="pass" value="<?php echo $pass; ?>">
            <span class="red">* <?php echo $passErr; ?></span><br>

            <label><span class="green">New Password</span>: </label>
            <input type="password" name="newPass" value="<?php echo $newPass; ?>">
            <span class="red">* <?php echo $newPassErr; ?></span><br>

            <label><span class="red">Retype New Password</span>: </label>
            <input type="password" name="reNewPass" value="<?php echo $reNewPass; ?>">
            <span class="red">* <?php echo $reNewPassErr; ?></span><br>

            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>

</body>

</html>