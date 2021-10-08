<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 Task 1</title>
    <style>
        .error {
            color: red;
        }

        .correct {
            color: green;
        }
    </style>
</head>

<body>
    <?php
    $name = "raihan";
    $pass = "@123456#";
    $userName = $password = "";
    $userNameErr = $passwordErr = "";
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

        // Validating User Name
        if (empty($_POST["userName"])) {
            $userNameErr = "User name is required";
            $valid = 0;
        } else {
            $userName = test_input($_POST["userName"]);
            // check if user name contains alpha numeric characters, period, dash or underscore only
            if (!preg_match("/^[a-zA-Z0-9.-_]*$/", $userName)) {
                $userNameErr = "Only letters, numbers, period, dash or underscore allowed";
                $userName = "";
                $valid = 0;
            } else {
                if (strlen($userName) < 2) {
                    $userNameErr = "Must be at least 2 characters";
                    $userName = "";
                    $valid = 0;
                } else {
                    if ($userName != $name) {
                        $valid = 0;
                    }
                }
            }
        }

        // Validating Password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
            $valid = 0;
        } else {
            $password = test_input($_POST["password"]);
            if (!preg_match('/[@#$%]+/', $password)) {
                $passwordErr = "Must contain one of the special characters (@, #, $, %)";
                $password = "";
                $valid = 0;
            } else {
                if (strlen($password) < 8) {
                    $passwordErr = "Password must be at least (8) characters long";
                    $password = "";
                    $valid = 0;
                } else {
                    if ($password != $pass) {
                        $valid = 0;
                    }
                }
            }
        }
    }

    // Validating Login
    if ($valid == 1) {
        echo '<span class="correct"><h2>Login successful</h2></span>';
    } else {
        echo '<span class="error"><h2>Login failed. Please enter a valid User Name and Password</h2></span>';
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend><b>LOGIN</b></legend>
            <label>User Name: </label>
            <input type="text" name="userName" value="<?php echo $userName; ?>">
            <span class="error">* <?php echo $userNameErr; ?></span><br>

            <label>Password: </label>
            <input type="password" name="password" value="<?php echo $password; ?>">
            <span class="error">* <?php echo $passwordErr; ?></span><br>
            <hr>

            <input type="checkbox" name="rememberMe" value="rememberMe">
            <label>Remember Me</label><br><br>

            <input type="submit" name="submit" value="Submit">
            <a href="https://www.w3schools.com">Forgot password?</a>
        </fieldset>
    </form>

</body>

</html>