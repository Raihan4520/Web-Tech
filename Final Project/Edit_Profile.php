<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Final Project</title>
    <script src="JS/Form_Validation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $("#panel").slideToggle("medium");
            });
        });

        function formSubmit() {
            $.ajax({
                type: 'POST',
                url: 'Controller/EditProfileController.php',
                data: $('#editProfile').serialize(),
                success: function(response) {
                    $('#success').html(response);
                }
            });
            return false;
        }
    </script>
    <style>
        #flip {
            background-color: DarkSlateBlue;
            text-decoration: none;
            color: lavender;
            font-size: 20px;
        }

        #panel {
            display: none;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    include 'Header.php';
    ?>

    <?php

    if (isset($_SESSION['email'])) {
        echo '<div id="flip" style = "display:inline-block; width:100%; padding-right: 2%; text-align:right"> <label>SHOW/HIDE MENU BAR</label> </div>';
        include 'Customer_Top_Menu_Bar.php';

        echo '<div class="row">';
        echo '<span style = "display:inline-block; width:36%; height:100%; text-align:left">';
        echo '<div class="column" >';
        include 'Customer_Menu.php';
        echo '</div>';
        echo '</span>';
        echo '<div class="column" >';
        echo '<form method= "post" action="Controller/EditProfileController.php" id="editProfile" onsubmit="return formSubmit();"';
        echo '<h2> </h2>';
        echo '<h2>EDIT PROFILE</h2><br>';
        echo '<label>Name :</label> ';
        echo '<input type="text" name="name" id="fname" onblur="checkName()" onkeyup="checkName()" value= "';
        echo $_SESSION['name'];
        echo  '"><span class="red"> <p id="nameErr">';
        echo $nameErr;
        echo '</p></span><br>';
        echo '<label>Phone number : +88</label>';
        echo '<input type="text" name="phoneNo" id="phoneNo" onblur="checkPhoneNo()" onkeyup="checkPhoneNo()" value= "';
        echo $_SESSION['phoneNo'];
        echo  '"><span class="red"> <p id="phoneNoErr">';
        echo $phoneNoErr;
        echo '</p></span><br>';
        echo '<label>Gender : </label> ';
        echo '<input type="radio" id="male" name="gender" value="Male"';
        if ($_SESSION["gender"] == "Male") {
            echo 'checked';
        }
        echo '>';
        echo '<label for="male">Male</label>';
        echo '<input type="radio" id="female" name="gender" value="Female"';
        if ($_SESSION["gender"] == "Female") {
            echo 'checked';
        }
        echo '>';
        echo '<label for="female">Female</label>';
        echo '<input type="radio" id="other" name="gender" value="Other"';
        if ($_SESSION["gender"] == "Other") {
            echo 'checked';
        }
        echo '>';
        echo '<label for="other">Other</label>';
        echo '<span class="red"> ';
        echo $genderErr;
        echo '</span><br><br>';
        echo '<label>Date of birth : </label> ';
        echo ' <input type="date" name="dateOfBirth" id="dob" onblur="checkDOB()" onkeyup="checkDOB()" value= "';
        echo $_SESSION['dateOfBirth'];
        echo  '"> (mm/dd/yyyy)<span class="red"> <p id="dobErr">';
        echo $dobErr;
        echo '</p></span><br>';
        echo '<input type="submit" name="submit" value="Update" class="btn btn-info" />';
        echo '<div id="success"></div>';

        echo '</form>';
        echo '</div>';
        echo '</div>';
    } else {
        header("location:Login.php");
    }

    ?>
    <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
    <br>
    <?php include 'Footer.php'; ?>

</body>

</html>