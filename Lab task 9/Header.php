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
    <div class="header">
        <h1 style="padding: 5px;"> Transport Management</h1><br>
        <span style="display:inline-block; width:96%; height:4%; text-align:right">
            <?php

            if (isset($_SESSION['email'])) {
                echo "<label style='color:whitesmoke'> Logged in:</label>";
                echo '<a href="View_Profile.php">';
                echo $_SESSION["name"];
                echo '</a> ';
                echo "<a href='Logout.php'>Logout</a>";
                echo '<br><br>';
            } else {
                echo '<a href="Public_Home.php">Home</a> <a href="Login.php">Login</a> <a href="Registration.php">Registration</a> ';
                echo '<br><br>';
            }

            ?>
        </span>
    </div>

</body>

</html>