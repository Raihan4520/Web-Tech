<?php
require_once '../Model/db_connect.php';

$q = $_REQUEST["q"];
$s = $_REQUEST["s"];

if ($s == "") {
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `tickets` where transportType = 'Plane' and bookedBy = '' and location_from = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$q]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
} else if ($q == "") {
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `tickets` where transportType = 'Plane' and bookedBy = '' and location_to = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$s]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
} else {
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `tickets` where transportType = 'Plane' and bookedBy = '' and location_from = ? and location_to = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$q], [$s]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
}

echo "<table class='tableStyle'>
<tr>
    <th>Plane ID</th>
    <th>Plane Name</th>
    <th>Plane Location</th>
    <th>Ticket ID</th>
    <th>Transport Type</th>
    <th>From</th>
    <th>To</th>
    <th>Price</th>
    <th>Date</th>
    <th>Time</th>
</tr>";

foreach ($rows as $i => $tData) {
    if ($tData['bookedBy'] == "") {
        $conn = db_conn();
        $selectQuery = "SELECT * FROM `plane` where p_id = ?";
        try {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([$tData["p_id"]]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $bData = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;

        echo '<tr> 
                <td>' . $bData["p_id"] . '</td>
                <td>' . $bData["p_name"] . '</td>
                <td>' . $bData["p_location"] . '</td>                                  
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
