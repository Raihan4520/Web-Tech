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
        function searchTicketFrom(str) {
            if (str == "") {
                document.getElementById("busFrom").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("displayTicket").innerHTML = this.responseText;
            }
            xhttp.open("POST", "Controller/searchBusTicketController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("q=" + str);
        }

        function searchTicketTo(str) {
            if (str == "") {
                document.getElementById("busTo").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("displayTicket").innerHTML = this.responseText;
            }
            xhttp.open("POST", "Controller/searchBusTicketController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("s=" + str);
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

    <?php require_once 'Controller/bookBusTicketController.php'; ?>

    <form method="post">

        <br>
        <label style='color:whitesmoke'>Go back to :</label>
        <a href="Customer_Home.php">Home</a><br><br>
        <h2>BOOK BUS TICKETS</h2><br>

        <label style='color:whitesmoke'>SEARCH TICKET:</label><br>
        <label style='color:whitesmoke'>From: </label>
        <select name="busFrom" id="busFrom" onchange="searchTicketFrom(this.value)">
            <option value="" disabled selected>Select a location</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Barishal">Barishal</option>
            <option value="Cumilla">Cumilla</option>
            <option value="Sylet">Sylet</option>
            <option value="Bagura">Bagura</option>
            <option value="khulna">khulna</option>
            <option value="Chittagong">Chittagong</option>
        </select>
        <span class="red">
            <?php
            if ($fromErr) {
                echo $fromErr;
            }
            ?>
        </span>

        <label style='color:whitesmoke'>To: </label>
        <select name="busTo" id="busTo" onchange="searchTicketTo(this.value)">
            <option value="" disabled selected>Select a location</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Barishal">Barishal</option>
            <option value="Cumilla">Cumilla</option>
            <option value="Sylet">Sylet</option>
            <option value="Bagura">Bagura</option>
            <option value="khulna">khulna</option>
            <option value="Chittagong">Chittagong</option>
        </select>
        <span class="red">
            <?php
            if ($toErr) {
                echo $toErr;
            }
            ?>
        </span>
        <br><br>

        <div style="overflow:auto;" id="displayTicket">
            <table class="tableStyle">
                <tr>
                    <th>Bus ID</th>
                    <th>Bus Name</th>
                    <th>Bus Location</th>
                    <th>Ticket ID</th>
                    <th>Transport Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                <?php
                foreach ($rows as $i => $tData) {
                    if ($tData['bookedBy'] == "") {
                        $conn = db_conn();
                        $selectQuery = "SELECT * FROM `bus` where b_id = ?";
                        try {
                            $stmt = $conn->prepare($selectQuery);
                            $stmt->execute([$tData["b_id"]]);
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                        $bData = $stmt->fetch(PDO::FETCH_ASSOC);
                        $conn = null;

                        echo '<tr> 
                                <td>' . $bData["b_id"] . '</td>
                                <td>' . $bData["b_name"] . '</td>
                                <td>' . $bData["b_location"] . '</td>                                  
                                <td>' . $tData["ticket_id"] . '</td>
                                <td>' . $tData["transportType"] . '</td>
                                <td>' . $tData["location_from"] . '</td>
                                <td>' . $tData["location_to"] . '</td>
                                <td>' . $tData["price"] . '</td>
                                <td>' . $tData["date"] . '</td>
                                <td>' . $tData["time"] . '</td>
                            </tr>';
                    }
                }
                ?>
            </table>
        </div>

        <br>
        <h2>Please enter below the bus 'Ticket ID' that you want to book:</h2>
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

            <input type="submit" name="submit" value="Book Ticket">
            <input type="reset" name="reset" value="Reset"><br>
        </span>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
        <br><br>

        <?php include 'Footer.php'; ?>
</body>

</html>