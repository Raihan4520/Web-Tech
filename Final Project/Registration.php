<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Final Project</title>
    <script src="JS/Form_Validation.js"></script>
    <script>
        function isEmailAvailable(str) {
            if (str == "") {
                document.getElementById("availableEmail").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("availableEmail").innerHTML = this.responseText;
                if (document.getElementById("availableEmail").innerHTML !== "") {
                    document.getElementById("submit").style.visibility = "hidden";
                } else {
                    document.getElementById("submit").style.visibility = "visible";
                }
            }
            xhttp.open("POST", "Controller/checkAvailableEmailController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("q=" + str);
        }
    </script>
</head>

<body>

    <?php
    include 'Header.php';
    require_once 'Controller/addCustomerController.php';
    ?>

    <div class="reg-main">
        <div class="reg">
            <form method="post">
                <h2>REGISTRATION</h2>
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?><br>
                <div class="row">
                    <div class="column">
                        <label style="display:inline-block; width: 20%; height: 0px; text-align:right;">Full Name :</label>
                        <input type="text" name="name" id="fname" onblur="checkName()" onkeyup="checkName()">
                        <br>
                        <span class="red">
                            <p id="nameErr">
                                <?php
                                if ($nameErr) {
                                    echo $nameErr;
                                }
                                ?>
                            </p>
                        </span>
                        <br>

                        <label style="display:inline-block; width: 20%; height: 0px; text-align:right;">Email :</label>
                        <input type="text" name="email" id="email" onblur="checkEmail()" onkeyup="checkEmail()" onchange="isEmailAvailable(this.value)">
                        <br>
                        <p id="availableEmail"></p>
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

                        <label style="display:inline-block; width: 20%; height: 0px; text-align:right;">Phone number: +88 :</label>
                        <input type="text" name="phoneNo" id="phoneNo" onblur="checkPhoneNo()" onkeyup="checkPhoneNo()">
                        <br>
                        <span class="red">
                            <p id="phoneNoErr">
                                <?php
                                if ($phoneNoErr) {
                                    echo $phoneNoErr;
                                }
                                ?>
                            </p>
                        </span>
                        <br>

                        <label style="display:inline-block; width: 15%; height: 0px; text-align:right;">Gender :</label>
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

                        <label style="display:inline-block; width: 20%; height: 0px; text-align:right;">Date of Birth :</label>
                        <input type="Date" name="dateOfBirth" id="dob" onblur="checkDOB()" onkeyup="checkDOB()"> (mm/dd/yyyy)
                        <br>
                        <span class="red">
                            <p id="dobErr">
                                <?php
                                if ($dobErr) {
                                    echo $dobErr;
                                }
                                ?>
                            </p>
                        </span>
                        <br>
                    </div>
                </div>

                <input type="submit" name="submit" id="submit" value="Sign up">
                <input type="reset" name="reset" value="Reset"><br><br>
                <label>Want to register as a manager?</label>
                <a href="managerRegistration.php">Click here</a><br><br>

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