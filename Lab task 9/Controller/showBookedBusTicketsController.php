<?php
session_start();

require_once '../Model/db_connect.php';

$conn = db_conn();
$selectQuery = "SELECT * FROM `tickets` WHERE bookedBy = ? and transportType = 'Bus'";
try {
    $stmt = $conn->prepare($selectQuery);
    $stmt->execute([$_SESSION['id']]);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $stmt->rowCount();
$conn = null;

if ($rowCount != 0) {
    echo '<h2>BOOKED BUS TICKETS</h2><br>
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
            </tr>';

    foreach ($rows as $i => $tData) {
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
    echo '</table>';
} else {
    echo "<h2>No Booked Bus Tickets</h2>";
}
