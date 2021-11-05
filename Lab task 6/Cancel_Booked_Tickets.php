<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mid Project</title>
    <style type="text/css">
        table,
        th,
        td {
            border: 1px solid #dddddd;
            border-collapse: collapse;
            padding: 12px;
            text-align: center;
            border-style: solid;
        }

        .tableStyle {
            width: 100%;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include 'Header.php';
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <?php require_once 'Controller/cancelBookedTicketsController.php'; ?>

    <form method="post">

        Go back to : <a href="Customer_Home.php">Home</a><br><br>
        <fieldset>
            <legend><b>BOOKED BUS TICKETS</b></legend><br>
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
        </fieldset>
        <hr>
        <fieldset>
            <legend><b>BOOKED TRAIN TICKETS</b></legend><br>
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
        </fieldset>
        <hr>
        <fieldset>
            <legend><b>BOOKED PLANE TICKETS</b></legend><br>
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
            <br>
        </fieldset>

        <br>
        <hr>

        <h3>Please enter below the 'Ticket ID' that you want to cancel booking:</h3>
        Ticket ID : <input type="text" name="ticketId"><span class="red">
            <?php
            if ($ticketIdErr) {
                echo $ticketIdErr;
            }
            ?></span>
        <br><br>
        Confirm Email: <input type="text" name="email"><span class="red">
            <?php
            if ($emailErr) {
                echo $emailErr;
            }
            ?></span>
        <br><br>

        <input type="submit" name="submit" value="Cancel Ticket">
        <input type="reset" name="reset" value="Reset"><br>

        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?><br>

        <?php include 'Footer.php'; ?>
</body>

</html>