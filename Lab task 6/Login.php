<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid Project</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include 'Header.php';
    require_once 'Model/db_connect.php';
    ?>

    <?php

    session_start();

    $msg = '';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $conn = db_conn();
        $selectQuery = "SELECT * FROM `customer_info` where C_Email = ?";

        try {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([$_POST['email']]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row["C_Email"] == $_POST['email'] && $row["C_Password"] == $_POST['password']) {
            $_SESSION['email'] = $row["C_Email"];
            $_SESSION['password'] = $row["C_Password"];

            if (!isset($_SESSION['name'])) {
                $_SESSION['name'] = $row["C_Name"];
            }

            if (!isset($_SESSION['phoneNo'])) {
                $_SESSION['phoneNo'] = $row["C_PhoneNumber"];
            }

            if (!isset($_SESSION['gender'])) {
                $_SESSION['gender'] = $row["C_Gender"];
            }

            if (!isset($_SESSION['dateOfBirth'])) {
                $_SESSION['dateOfBirth'] = $row["C_DOB"];
            }

            if (!isset($_SESSION['profilePic'])) {
                $_SESSION['profilePic'] = $row["C_ProfilePicture"];
            }

            if (!empty($_POST['rememberMe'])) {
                setcookie("email", $_POST['email'], time() + 60);
                setcookie("password", $_POST['password'], time() + 60);
                echo "Cookie set successfully";
            } else {
                setcookie("email", "");
                setcookie("password", "");
                echo "Cookie not set";
            }

            header("location:Customer_Home.php");
        } else {
            $msg = "Username or password invalid";
        }
    }

    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend><b>LOGIN</b></legend>
            Email: <input type="text" name="email" value="<?php if (isset($_COOKIE['email'])) {
                                                                echo $_COOKIE['email'];
                                                            } ?>"><br><br>

            Password: <input type="password" name="password" id="pass" value="<?php if (isset($_COOKIE['password'])) {
                                                                                    echo $_COOKIE['password'];
                                                                                } ?>"><br><br>
            <input type="checkbox" onclick="showPass()"> Show password <br>

            <span class="error"> <?php echo $msg; ?></span><br>
            <hr>

            <input type="checkbox" name="rememberMe" value="rememberMe">
            <label>Remember me for a mintute</label><br><br>

            <input type="submit" name="submit" value="Login">
            <a href="Forget_Password.php">Forgot password?</a>
        </fieldset>
        <script>
            function showPass() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </form>

    <?php include 'Footer.php'; ?>

</body>

</html>