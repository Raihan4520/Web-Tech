<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
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

    <?php require_once 'Controller/bookTrainTicketController.php'; ?>

    <form method="post">

        <br>
        <label>Go back to :</label><a href="Customer_Home.php">Home</a><br><br>
        <h2>BOOK TRAIN TICKETS</h2><br>
        <div style="overflow:auto;">
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
                    if ($row['Booked_By'] == "") {
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
        </div>

        <br>
        <h2>Please enter below the train 'Ticket ID' that you want to book:</h2>
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
                    <label>Ticket ID :</label>
                    <input type="text" name="ticketId"><br><span class="red">
                        <?php
                        if ($ticketIdErr) {
                            echo $ticketIdErr;
                        }
                        ?></span>
                    <br>
                    <label>Confirm Email :</label>
                    <input type="text" name="email"><br><span class="red">
                        <?php
                        if ($emailErr) {
                            echo $emailErr;
                        }
                        ?></span>
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