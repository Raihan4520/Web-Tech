<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Final Project</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $("#panel").slideToggle("medium");
            });
        });
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

    <span style="display:inline-block; width:100%;text-align:left; height: 40%;">


        <?php
        $msg = '';
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
            echo "<h2> Welcome " . $_SESSION['name'] . "</h2>";
            echo '</div>';
            echo '</div>';
        } else {
            $msg = "Error";
            header("location:Login.php");
        }

        ?>
    </span>
    <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
    <br>
    <?php include 'Footer.php'; ?>

</body>

</html>