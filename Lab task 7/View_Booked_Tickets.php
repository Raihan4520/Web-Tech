<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid Project</title>
</head>

<body>
    <?php
    session_start();
    include 'Header.php';
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <form method="post">

        <br>
        <label>Go back to :</label><a href="Customer_Home.php">Home</a><br><br>
        <h2>BOOKED BUS TICKETS</h2><br>
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
            $data = file_get_contents("Bus_Tickets_Data.json");
            $data = json_decode($data, true);
            foreach ($data as $row) {
                if ($row['Booked_By'] == $_SESSION['email']) {
                    echo '<tr>
                                   <td>' . $row["B_ID"] . '</td>
                                   <td>' . $row["B_Name"] . '</td>
                                   <td>' . $row["B_Location"] . '</td>
                                   <td>' . $row["Ticket_ID"] . '</td>
                                   <td>' . $row["Transport_Type"] . '</td>
                                   <td>' . $row["From"] . '</td>
                                   <td>' . $row["To"] . '</td>
                                   <td>' . $row["Price"] . '</td>
                                   <td>' . $row["Date"] . '</td>
                                   <td>' . $row["Time"] . '</td>
                                   </tr>';
                }
            }
            ?>
        </table>
        <br>
        <h2>BOOKED TRAIN TICKETS</h2><br>
        <table class="tableStyle">
            <tr>
                <th>Train ID</th>
                <th>Train Name</th>
                <th>Train Location</th>
                <th>Ticket ID</th>
                <th>Transport Type</th>
                <th>From</th>
                <th>To</th>
                <th>Price</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php
            $data = file_get_contents("Train_Tickets_Data.json");
            $data = json_decode($data, true);
            foreach ($data as $row) {
                if ($row['Booked_By'] == $_SESSION['email']) {
                    echo '<tr>
                                   <td>' . $row["T_ID"] . '</td>
                                   <td>' . $row["T_Name"] . '</td>
                                   <td>' . $row["T_Location"] . '</td>
                                   <td>' . $row["Ticket_ID"] . '</td>
                                   <td>' . $row["Transport_Type"] . '</td>
                                   <td>' . $row["From"] . '</td>
                                   <td>' . $row["To"] . '</td>
                                   <td>' . $row["Price"] . '</td>
                                   <td>' . $row["Date"] . '</td>
                                   <td>' . $row["Time"] . '</td>
                                   </tr>';
                }
            }
            ?>
        </table>
        <br>
        <h2>BOOKED PLANE TICKETS</h2><br>
        <table class="tableStyle">
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
            </tr>
            <?php
            $data = file_get_contents("Plane_Tickets_Data.json");
            $data = json_decode($data, true);
            foreach ($data as $row) {
                if ($row['Booked_By'] == $_SESSION['email']) {
                    echo '<tr>
                                   <td>' . $row["P_ID"] . '</td>
                                   <td>' . $row["P_Name"] . '</td>
                                   <td>' . $row["P_Location"] . '</td>
                                   <td>' . $row["Ticket_ID"] . '</td>
                                   <td>' . $row["Transport_Type"] . '</td>
                                   <td>' . $row["From"] . '</td>
                                   <td>' . $row["To"] . '</td>
                                   <td>' . $row["Price"] . '</td>
                                   <td>' . $row["Date"] . '</td>
                                   <td>' . $row["Time"] . '</td>
                                   </tr>';
                }
            }
            ?>
        </table>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
        <br><br>

        <?php include 'Footer.php'; ?>
</body>

</html>