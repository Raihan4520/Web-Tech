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


    <?php include 'Header.php'; ?>

    <?php require_once 'Controller/addCustomerController.php'; ?>

    <div class="reg-main">
        <div class="reg">
            <form method="post">
                <h2>REGISTRATION</h2>
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <div class="row">
                    <div class="column">
                        <label style="display:inline-block; width: 33%; height: 0px; text-align:right;">Full Name :</label>
                        <input type="text" name="name"><br><span class="red">
                            <?php
                            if ($nameErr) {
                                echo $nameErr;
                            }
                            ?></span>
                        <br>

                        <label style="display:inline-block; width: 33%; height: 0px; text-align:right;">Email :</label>
                        <input type="text" name="email"><br><span class="red">
                            <?php
                            if ($emailErr) {
                                echo $emailErr;
                            }
                            ?></span>
                        <br>

                        <label style="display:inline-block; width: 33%; height: 0px; text-align:right;">Phone number: +88 :</label>
                        <input type="text" name="phoneNo"><br><span class="red">
                            <?php
                            if ($phoneNoErr) {
                                echo $phoneNoErr;
                            }
                            ?></span>
                        <br>

                        <label style="display:inline-block; width: 33%; height: 0px; text-align:right;">Gender :</label>
                        <input type="radio" id="male" name="gender" value="Male">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="Other">
                        <label for="other">Other</label><br><span class="red">
                            <?php
                            if ($genderErr) {
                                echo $genderErr;
                            }
                            ?></span><br>
                    </div>

                    <div class="column">
                        <label style="display:inline-block; width: 33%; height: 0px; text-align:right;">Password :</label>
                        <input type="password" name="password" id="pass"><br><span class="red">
                            <?php
                            if ($passErr) {
                                echo $passErr;
                            }
                            ?></span><br>
                        <input type="checkbox" onclick="showPass()"> Show password
                        <br>

                        <label style="display:inline-block; width: 33%; height: 0px; text-align:right;">Confirm Password :</label>
                        <input type="password" name="confirmPassword" id="conPass"><br><span class="red">
                            <?php
                            if ($conPassErr) {
                                echo $conPassErr;
                            }
                            ?></span><br>
                        <input type="checkbox" onclick="showConPass()"> Show password
                        <br>

                        <label style="display:inline-block; width: 33%; height: 0px; text-align:right;">Date of Birth :</label>
                        <input type="Date" name="dateOfBirth"> (mm/dd/yyyy) <br><span class="red">
                            <?php
                            if ($dobErr) {
                                echo $dobErr;
                            }
                            ?></span><br>
                        <br>
                    </div>
                </div>

                <input type="submit" name="submit" value="Sign up">
                <input type="reset" name="reset" value="Reset"><br><br>

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
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
    <br><br>

    <?php include 'Footer.php'; ?>

    </form>
</body>

</html>