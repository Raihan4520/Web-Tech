<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab task 4</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
        }

        .column {
            flex: 50%;
            padding: 10px;
            height: 50%;
        }
    </style>
</head>

<body>

    <?php
    session_start();

    if (isset($_POST["submit"])) {
        if (!empty($_POST["name"])) {
            $_SESSION['name'] = $_POST['name'];
        }
        if (!empty($_POST["email"])) {
            $_SESSION['email'] = $_POST['email'];
        }
        if (!empty($_POST["gender"])) {
            $_SESSION['gender'] = $_POST['gender'];
        }
        if (!empty($_POST["dateOfBirth"])) {
            $_SESSION['dateOfBirth'] = $_POST['dateOfBirth'];
        }
    }

    include 'Header.php'; ?>

    <span style="display:inline-block; width:100%;text-align:left; height: 40%;">

        <?php

        if (isset($_SESSION['userName'])) {

            echo '<div class="row">';
            echo '<span style = "display:inline-block; width:36%; height:100%; text-align:left">';
            echo '<div class="column" >';
            include 'Account.php';
            echo '</div>';
            echo '</span>';
            echo '<div class="column" >';
            echo '<form method= "post"';
            echo '<b>EDIT PROFILE </b><br><br>';
            echo '<label>Name : </label> ';
            echo ' <input type="text" name="name" class="form-control" value= "';
            echo $_SESSION['name'];
            echo  '"><br><br>';
            echo '<label>Email : </label> ';
            echo ' <input type="text" name="email" class="form-control" value= "';
            echo $_SESSION['email'];
            echo  '"><br><br>';
            echo '<label>Gender : </label> ';
            echo '<input type="radio" id="male" name="gender" value="male"';
            if ($_SESSION["gender"] == "male") {
                echo 'checked';
            }
            echo '>';
            echo '<label for="male">Male</label>';
            echo '<input type="radio" id="female" name="gender" value="female"';
            if ($_SESSION["gender"] == "female") {
                echo 'checked';
            }
            echo '>';
            echo '<label for="female">Female</label>';
            echo '<input type="radio" id="other" name="gender" value="other"';
            if ($_SESSION["gender"] == "other") {
                echo 'checked';
            }
            echo '>';
            echo '<label for="other">Other</label>  <br><br>';
            echo '<label>Date of birth : </label> ';
            echo ' <input type="date(dd/mm/yyyy)" name="dateOfBirth" class="form-control" value= "';
            echo $_SESSION['dateOfBirth'];
            echo  '"><br><br>';


            echo '<hr>';
            echo '<input type="submit" name="submit" value="Submit" class="btn btn-info" />';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        } else {
            $msg = "error";
            header("location:Login.php");
        }

        ?>
    </span>
    <?php include 'Footer.php'; ?>

</body>

</html>