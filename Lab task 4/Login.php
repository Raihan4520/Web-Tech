<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab task 4</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php include 'Header.php'; ?>

    <?php

    session_start();

    $msg = "";

    if (isset($_POST['userName']) && isset($_POST['password'])) {
        $data = file_get_contents("data.json");
        $data = json_decode($data, true);
        foreach ($data as $row) {
            if ($row["userName"] == $_POST['userName'] && $row["password"] == $_POST['password']) {
                $_SESSION['userName'] = $row["userName"];
                $_SESSION['password'] = $row["password"];

                if (!isset($_SESSION['email'])) {
                    $_SESSION['email'] = $row["email"];
                }
                if (!isset($_SESSION['gender'])) {
                    $_SESSION['gender'] = $row["gender"];
                }
                if (!isset($_SESSION['name'])) {
                    $_SESSION['name'] = $row["name"];
                }
                if (!isset($_SESSION['dateOfBirth'])) {
                    $_SESSION['dateOfBirth'] = $row["dateOfBirth"];
                }

                if (!empty($_POST['rememberMe'])) {
                    setcookie("userName", $_POST['userName'], time() + 10);
                    setcookie("password", $_POST['password'], time() + 10);
                    echo "Cookie set successfully";
                } else {
                    setcookie("userName", "");
                    setcookie("password", "");
                    echo "Cookie not set";
                }

                header("location:Logged_In_Dashboard.php");
            } else {
                $msg = "Username or password invalid";
            }
        }
    }

    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend><b>LOGIN</b></legend>
            <label>User Name: </label>
            <input type="text" name="userName" value="<?php if (isset($_COOKIE['userName'])) {
                                                            echo $_COOKIE['userName'];
                                                        } ?>"><br>

            <label>Password: </label>
            <input type="password" name="password" value="<?php if (isset($_COOKIE['password'])) {
                                                                echo $_COOKIE['password'];
                                                            } ?>"><br>

            <span class="error"> <?php echo $msg; ?></span><br>
            <hr>

            <input type="checkbox" name="rememberMe" value="rememberMe">
            <label>Remember Me</label><br><br>

            <input type="submit" name="submit" value="Submit">
            <a href="Forget_Password.php">Forgot password?</a>
        </fieldset>
    </form>

    <?php include 'Footer.php'; ?>

</body>

</html>