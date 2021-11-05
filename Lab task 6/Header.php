<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid Project</title>
</head>

<body>
    <h1>Transport Management</h1>
    <span style="display:inline-block; width:100%; height:5%; text-align:right">
        <?php

        if (isset($_SESSION['email'])) {
            echo " Logged in: ";
            echo '<a href="View_Profile.php">';
            echo $_SESSION["name"];
            echo '</a> | ';
            echo "<a href='Logout.php'>Logout</a>";
        } else {
            echo '<a href="Public_Home.php">Home</a> | <a href="Login.php">Login</a> | <a href="Registration.php">Registration</a> ';
        }

        ?>
    </span>
    <hr>
</body>

</html>