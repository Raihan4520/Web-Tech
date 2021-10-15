<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab task 4</title>
</head>

<body>
    <hr>
    <div class="row">
        <div class="column">
            <img src="xcompany.png" alt="XCompany" height="10%">
        </div>
        <span style="display:inline-block; width:100%; height:10%; text-align:right">
            <div class="column">
                <br>

                <?php

                if (isset($_SESSION['userName'])) {
                    echo " Logged in as ";
                    echo '<a href="View_Profile.php">';
                    echo $_SESSION["userName"];
                    echo '</a> | ';
                    echo "<a href='Logout.php'>Logout</a>";
                } else {
                    echo '<a href="Public_Home.php">Home</a> |
                        <a href="Login.php">Login</a> |
                        <a href="Registration.php">Registration</a> ';
                }
                ?>
            </div>
        </span>
    </div>
    <hr>
</body>

</html>