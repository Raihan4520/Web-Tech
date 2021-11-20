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
    <?php require_once 'Controller/EditProfileController.php'; ?>

    <?php include 'Header.php'; ?>

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
        echo '<form method= "post"';
        echo '<h2> </h2>';
        echo '<h2>EDIT PROFILE</h2><br>';
        echo '<label>Name :</label> ';
        echo '<input type="text" name="name" value= "';
        echo $_SESSION['name'];
        echo  '"><span class="red"> ';
        echo $nameErr;
        echo '</span><br><br>';
        echo '<label>Phone number : +88</label>';
        echo '<input type="text" name="phoneNo" value= "';
        echo $_SESSION['phoneNo'];
        echo  '"><span class="red"> ';
        echo $phoneNoErr;
        echo '</span><br><br>';
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
        echo ' <input type="date" name="dateOfBirth" class="form-control" value= "';
        echo $_SESSION['dateOfBirth'];
        echo  '"> (mm/dd/yyyy)<span class="red"> ';
        echo $dobErr;
        echo '</span><br><br>';
        echo '<input type="submit" name="submit" value="Update" class="btn btn-info" />';

        if (isset($msg)) {
            echo $msg;
        }

        echo '</form>';
        echo '</div>';
        echo '</div>';
    } else {
        $msg = '<span class="red">Error</span>';
        header("location:Login.php");
    }

    ?>
    <br><br><br><br><br><br><br><br><br>
    <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
    <br><br>

    <?php include 'Footer.php'; ?>

</body>

</html>