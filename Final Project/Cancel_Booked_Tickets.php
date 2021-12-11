<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Final Project</title>
    <script src="JS/Form_Validation.js"></script>
    <script>
        function showBookedBusTickets() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("displayBookedTickets").innerHTML = this.responseText;
                document.getElementById("viewBookedBusTickets").style.color = "violet";
                document.getElementById("viewBookedPlaneTickets").style.color = "white";
                document.getElementById("viewBookedTrainTickets").style.color = "white";
                document.getElementById("viewBookedBusTickets").style.boxShadow = "0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19)";
                document.getElementById("viewBookedPlaneTickets").style.boxShadow = "";
                document.getElementById("viewBookedTrainTickets").style.boxShadow = "";
            }
            xhttp.open("POST", "Controller/showBookedBusTicketsController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
        }

        function showBookedPlaneTickets() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("displayBookedTickets").innerHTML = this.responseText;
                document.getElementById("viewBookedBusTickets").style.color = "white";
                document.getElementById("viewBookedPlaneTickets").style.color = "violet";
                document.getElementById("viewBookedTrainTickets").style.color = "white";
                document.getElementById("viewBookedBusTickets").style.boxShadow = "";
                document.getElementById("viewBookedPlaneTickets").style.boxShadow = "0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19)";
                document.getElementById("viewBookedTrainTickets").style.boxShadow = "";
            }
            xhttp.open("POST", "Controller/showBookedPlaneTicketsController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
        }

        function showBookedTrainTickets() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("displayBookedTickets").innerHTML = this.responseText;
                document.getElementById("viewBookedBusTickets").style.color = "white";
                document.getElementById("viewBookedPlaneTickets").style.color = "white";
                document.getElementById("viewBookedTrainTickets").style.color = "violet";
                document.getElementById("viewBookedBusTickets").style.boxShadow = "";
                document.getElementById("viewBookedPlaneTickets").style.boxShadow = "";
                document.getElementById("viewBookedTrainTickets").style.boxShadow = "0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19)";
            }
            xhttp.open("POST", "Controller/showBookedTrainTicketsController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
        }
    </script>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    include 'Header.php';
    ?>

    <?php require_once 'Controller/cancelBookedTicketsController.php'; ?>

    <form method="post">

        <br>
        <label style='color:whitesmoke'>Go back to :</label>
        <a href="Customer_Home.php">Home</a><br><br>
        <h2>SELECT BELOW TO VIEW BOOKED TICKETS</h2>

        <div style="padding: 10px;">
            <button type="button" class="button" id="viewBookedBusTickets" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;" onmouseover="showBookedBusTickets()">VIEW BOOKED BUS TICKET</button>
            <button type="button" class="button" id="viewBookedPlaneTickets" onmouseover="showBookedPlaneTickets()">VIEW BOOKED PLANE TICKET</button>
            <button type="button" class="button" id="viewBookedTrainTickets" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;" onmouseover="showBookedTrainTickets()">VIEW BOOKED TRAIN TICKET</button>
        </div>
        <br>
        <div id="displayBookedTickets"></div>
        <br>

        <h2>Please enter below the 'Ticket ID' that you want to cancel:</h2>
        <span style="display:inline-block; width: 100%; text-align:center;">
            <span style="display:inline-block; width: 175px; height: 0px; text-align:right;">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
            </span>
            <br>
            <div class="row">
                <div class="column">
                    <label style='color:whitesmoke'>Ticket ID :</label>
                    <input type="text" name="ticketId" id="ticketId" onblur="checkTicketId()" onkeyup="checkTicketId()">
                    <br>
                    <span class="red">
                        <p id="ticketIdErr">
                            <?php
                            if ($ticketIdErr) {
                                echo $ticketIdErr;
                            }
                            ?>
                        </p>
                    </span>
                    <br>
                    <label style='color:whitesmoke'>Confirm Email :</label>
                    <input type="text" name="email" id="email" onblur="checkEmail()" onkeyup="checkEmail()">
                    <br>
                    <span class=" red">
                        <p id="emailErr">
                            <?php
                            if ($emailErr) {
                                echo $emailErr;
                            }
                            ?>
                        </p>
                    </span>
                </div>
            </div>
            <br>

            <input type="submit" name="submit" value="Cancel Ticket">
            <input type="reset" name="reset" value="Reset"><br>
        </span>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
        <br><br>

        <?php include 'Footer.php'; ?>
</body>

</html>