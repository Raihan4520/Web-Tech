<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="JS/Form_Validation.js"></script>
    <title>Mid Project</title>
</head>

<body>


    <?php include 'Header.php'; ?>

    <?php
    $msg = $nameErr = $emailErr  = $passErr = $conPassErr = $transportTypeErr = '';
    $valid = 1;

    if (isset($_POST["submit"]) && empty($_POST["transportType"])) {
        $transportTypeErr = "*Please select a transport type";
        $valid = 0;
    }
    ?>

    <?php require_once 'Controller/addBusManager.php'; ?>
    <?php require_once 'Controller/addPlaneManager.php'; ?>
    <?php require_once 'Controller/addTrainManager.php'; ?>

    <form method="post">
        <br><br>
        <div class="reg" style="height:700px;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">

            <h2>MANAGERS REGISTRATION</h2>
            <br>
            <label style="display:inline-block; width: 30%; height: 0px; text-align:right;">Transport type:</label>
            <input type="radio" id="busManager" name="transportType" value="Bus">
            <label for="busManager">Bus</label>
            <input type="radio" id="planeManager" name="transportType" value="Plane">
            <label for="planeManager">Plane</label>
            <input type="radio" id="trainManager" name="transportType" value="Train">
            <label for="trainManager">Train</label><br><span class="red">
                <?php
                if ($transportTypeErr) {
                    echo $transportTypeErr;
                }
                ?></span><br>
            <label style="display:inline-block; width: 20%; height: 0px; text-align:right;">Email :</label>
            <input type="text" name="email" id="email" onblur="checkEmail()" onkeyup="checkEmail()">
            <br>
            <span class="red">
                <p id="emailErr">
                    <?php
                    if ($emailErr) {
                        echo $emailErr;
                    }
                    ?>
                </p>
            </span>
            <br>

            <label style="display:inline-block; width: 20%; height: 0px; text-align:right;">Password :</label>
            <input type="password" name="password" id="pass" onblur="checkPass()">
            <br>
            <span class="red">
                <p id="passErr">
                    <?php
                    if ($passErr) {
                        echo $passErr;
                    }
                    ?>
                </p>
            </span>
            <br>
            <input type="checkbox" onclick="showPass()"> Show password
            <br>

            <label style="display:inline-block; width: 20%; height: 0px; text-align:right;">Confirm Password :</label>
            <input type="password" name="confirmPassword" id="conPass" onblur="checkConPass()">
            <br>
            <span class="red">
                <p id="conPassErr">
                    <?php
                    if ($conPassErr) {
                        echo $conPassErr;
                    }
                    ?>
                </p>
            </span>
            <br>
            <input type="checkbox" onclick="showConPass()"> Show password
            <br>
            <br>
            <input type="submit" name="submit" value="Sign up">

            <input type="reset" name="reset" value="Reset"><br><br>
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?><br>
            <label>Want to register as a customer?</label>
            <a href="Registration.php">Click here</a><br><br>
        </div>
        <script>
            function showPass() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function showConPass() {
                var x = document.getElementById("conPass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </form>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>

    <?php include 'Footer.php'; ?>

</body>

</html>