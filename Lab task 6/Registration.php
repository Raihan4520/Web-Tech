<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid Project</title>
    <style type="text/css">
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <?php include 'Header.php'; ?>

    <?php require_once 'Controller/addCustomerController.php'; ?>

    <form method="post">

        <fieldset>
            <legend><b>REGISTRATION</b></legend><br>
            <label>Full Name : </label>
            <input type="text" name="name"><span class="red">
                <?php
                if ($nameErr) {
                    echo $nameErr;
                }
                ?></span>
            <hr>

            Email: <input type="text" name="email"><span class="red">
                <?php
                if ($emailErr) {
                    echo $emailErr;
                }
                ?></span>
            <hr>

            Phone number: +88<input type="text" name="phoneNo"><span class="red">
                <?php
                if ($phoneNoErr) {
                    echo $phoneNoErr;
                }
                ?></span>
            <hr>

            Password: <input type="password" name="password" id="pass"><span class="red">
                <?php
                if ($passErr) {
                    echo $passErr;
                }
                ?></span><br><br>
            <input type="checkbox" onclick="showPass()"> Show password
            <hr>

            Confirm Password: <input type="password" name="confirmPassword" id="conPass"><span class="red">
                <?php
                if ($conPassErr) {
                    echo $conPassErr;
                }
                ?></span><br><br>
            <input type="checkbox" onclick="showConPass()"> Show confirm password
            <hr>

            <fieldset>
                <legend>
                    <label>Gender : </label> <br>
                </legend>
                <input type="radio" id="male" name="gender" value="Male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="Other">
                <label for="other">Other</label><span class="red">
                    <?php
                    if ($genderErr) {
                        echo $genderErr;
                    }
                    ?></span> <br><br>
            </fieldset>
            <hr>

            <fieldset>
                <legend>
                    <label>Date of Birth : </label>
                </legend>
                <input type="Date" name="dateOfBirth"> (mm/dd/yyyy)<span class="red">
                    <?php
                    if ($dobErr) {
                        echo $dobErr;
                    }
                    ?></span><br>
            </fieldset>
            <hr>

            <input type="submit" name="submit" value="Sign up">
            <input type="reset" name="reset" value="Reset"><br><br>
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?><br>
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

            function showConPass() {
                var x = document.getElementById("conPass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>

        <?php include 'Footer.php'; ?>

    </form>

</body>

</html>