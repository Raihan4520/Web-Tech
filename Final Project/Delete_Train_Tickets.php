<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delate train ticket</title>
    <script src="JS/Form_Validation.js"></script>
    <style type="text/css">
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
    <title></title>
</head>

<body>
    <?php require_once 'Controller/deleteTrainTicketsController.php'; ?>

    <?php include 'Header.php'; ?>

    <?php
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <form method="post">
<br>
       <label>Go back to :</label>
         <a href="Train_Manager_Home.php">Home</a><br><br>
       <div class="ticadd"style="height:200px;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">
        <h2>DELETE_INFO</h2>

        
            <label>Ticket_ID: </label>
            <input type="text" name="ticketId" id="ticketId" onclick="validTicketId()" onkeyup="validTicketId()">
            <br>
            <span class="red">
            <p id="ticketId">
                <?php
                if ($ticketIdErr) {
                    echo $ticketIdErr;
                }
                ?>
               </p> 
            </span>
           

            <input type="submit" name="submit" value="DELETE">
    </div>
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?><br>
      
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <?php include 'Footer.php'; ?>

    </form>

</body>

</html>