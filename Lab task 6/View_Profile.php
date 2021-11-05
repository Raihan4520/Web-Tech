<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid Project</title>
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

    include 'Header.php'; ?>

    <span style="display:inline-block; width:100%;text-align:left; height: 40%;">


        <?php

        if (isset($_SESSION['email'])) {
            include 'Customer_Top_Menu_Bar.php';

            echo '<div class="row">';
            echo '<span style = "display:inline-block; width:36%; height:100%; text-align:left">';
            echo '<div class="column" >';
            include 'Customer_Menu.php';
            echo '</div>';
            echo '</span>';
            echo '<div class="column" >';
            echo '<b>PROFILE </b><br><br>';
            if (isset($_SESSION['profilePic'])) {
                echo '<img src="Uploads/';
                echo $_SESSION['profilePic'];
                echo ' " alt="Profile picture" height=150px width:150px>';
            } else {
                echo '<img src="Uploads/Dummy.png" width="20%" height="20% alt="Profile picture">';
            }
            echo '<a href="Change_Profile_Picture.php">Change</a><br><br>';
            echo " Full Name: " . $_SESSION['name'] . "<br>";
            if (isset($_SESSION['email'])) {
                echo " Email: " . $_SESSION['email'] . "<br>";
            }

            if (isset($_SESSION['phoneNo'])) {
                echo " Phone Number: +88" . $_SESSION['phoneNo'] . "<br>";
            }

            if (isset($_SESSION['gender'])) {
                echo " Gender: " . $_SESSION['gender'] . "<br>";
            }

            if (isset($_SESSION['dateOfBirth'])) {
                echo " Date Of Birth: " . $_SESSION['dateOfBirth'] . "<br>";
            }

            echo '<hr>';
            echo '<a href="Edit_Profile.php">Edit_Profile</a>';
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