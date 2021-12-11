<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Mid Project</title>
    <script>
        function showBookedBusTickets() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("displayBookedTickets").innerHTML = this.responseText;
                document.getElementById("viewBookedBusTickets").style.color = "violet";
             
                document.getElementById("viewBookedBusTickets").style.boxShadow = "0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19)";
                
            }
            xhttp.open("POST", "Controller/showBookedBusTicketsController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
        }

       

       
    </script>
</head>

<body>
   
  <?php require_once 'Controller/addBusTicketsController.php'; ?>
    <form method="post">

        <br>
        <label style='color:whitesmoke'>Go back to :</label><a href="Bus_Manager_Home.php">Home</a><br><br>

        <h2>SELECT BELOW TO VIEW BOOKED TICKETS</h2>

        <div style="padding: 10px;">
            <!-- <button type="button" class="button" id="viewBookedBusTickets" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;" onmouseover="showBookedBusTickets()">VIEW BOOKED BUS TICKET</button> -->
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
        </div>

        <div id="displayBookedTickets"></div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
        <br><br>

        <?php include 'Footer.php'; ?>
</body>

</html>