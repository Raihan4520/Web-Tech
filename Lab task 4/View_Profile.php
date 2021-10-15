<html>

<head>
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

        if (isset($_SESSION['userName'])) {

            echo '<div class="row">';
            echo '<span style = "display:inline-block; width:36%; height:100%; text-align:left">';
            echo '<div class="column" >';
            include 'Account.php';
            echo '</div>';
            echo '</span>';
            echo '<div class="column" >';
            echo '<b>PROFILE </b><br><br>';
            if (isset($_SESSION['profilePic'])) {
                echo '<img src="Uploads/';
                echo $_SESSION['profilePic'];
                echo ' " alt="LOGO" height=150px width:150px>';
            } else {
                echo '<img src="Uploads/dummy.png" alt="LOGO" height="30%">';
            }
            echo '<a href="Profile_Picture.php">Change</a><br><br>';
            echo " Name: " . $_SESSION['name'] . "<br>";
            if (isset($_SESSION['email'])) {
                echo " Email: " . $_SESSION['email'] . "<br>";
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