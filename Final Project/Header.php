<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Final Project</title>
</head>

<body>
    <div class="header">
        <h1 style="padding: 5px;"> Transport Management</h1><br>

        <?php
        if (isset($_SESSION['name'])) {
            echo '<div class="row"><div class="column" style="color:whitesmoke"><label>Recently Booked Ticket: ';
            if (isset($_COOKIE['activity'])) {
                echo $_COOKIE['activity'];
            } else {
                echo "None.";
            }
            echo '</label></div>';

            echo '<div class="column">';
            echo '<span style="display:inline-block; width:99%; height:4%; text-align:right">';
            echo "<label style='color:whitesmoke'> Logged in:</label>";
            echo '<a href="View_Profile.php">';
            echo $_SESSION["name"];
            echo '</a> ';
            echo "<a href='Logout.php'>Logout</a>";
            echo '</div>';
            echo '</div>';
            echo '</span>';
            echo '<br>';
        } else if (isset($_SESSION['email'])) {
            echo '<span style="display:inline-block; width:99%; height:4%; text-align:right">';
            echo "<label> Logged in: ";
            echo $_SESSION["email"];
            echo '</label>';
            echo "<a href='Logout.php'>Logout</a>";
            echo '</span>';
            echo '<br><br>';
        } else {
            echo '<span style="display:inline-block; width:99%; height:4%; text-align:right">';
            echo '<a href="Public_Home.php">Home</a> <a href="Login.php">Login</a> <a href="Registration.php">Registration</a> ';
            echo '</span>';
            echo '<br><br>';
        }
        ?>
    </div>

</body>

</html>