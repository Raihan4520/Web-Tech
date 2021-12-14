<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Mid Project</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $("#panel").slideToggle("slow");
            });
        });
    </script>
    <style>
        #flip {
            padding: 5px;
            text-align: center;
            background-color: darkslateblue;
            border: solid 1px black;
        }

        #panel {
            text-align: center;
            padding: 50px;
            display: none;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    include 'Header.php';
    ?>

    <span style="display:inline-block; width:100%;text-align:left; height: 40%;">


        <?php

        if (isset($_SESSION['email'])) {
            echo '<span style="display:inline-block; width:100%;text-align:center; height: 100%; padding:10px; border-right:2px solid black">';
            echo '<h2>********WELCOME PLANE MANAGERS*********</h2>';
            echo '<br>';
            echo '<div id="flip" style="color:whitesmoke">Click to show/hide menu</div>';
            echo '<div id="panel">';
            echo '<a href="Add_Plane.php">Add Plane</a>';
            echo '<br>';
            echo '<br>';
            echo '<a href="Update_Plane.php">Update Plane</a>';
            echo '<br>';
            echo '<br>';
            echo '<a href="Remove_Plane.php">Remove Plane</a>';
            echo '<br>';
            echo '<br>';
            echo '<a href="Add_Plane_Tickets.php">Add Plane Tickets</a>';
            echo '<br>';
            echo '<br>';
            echo '<a href="Update_Plane_Tickets.php">Update Plane Tickets</a>';
            echo '<br>';
            echo '<br>';
            echo '<a href="Delete_Plane_Tickets.php">Delete Plane Tickets</a>';
            echo '</div>';
            echo '<br>';
            echo '<span style="display:inline-block; width:100%; height:100%; text-align:center"><a href="Logout.php">Logout</a></span>';
            echo '</span>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
        } else {
            $msg = "Error";
            header("location:Login.php");
        }
        ?>
    </span>
    <br><br><br><br><br><br><br><br><br>
    <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
    <br><br>
    <?php include 'Footer.php'; ?>

</body>

</html>