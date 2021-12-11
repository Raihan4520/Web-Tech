<!DOCTYPE html>
<html>

<head>
    <title>Update tickest</title>
    <style type="text/css">
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <?php require_once 'Controller/updateBusTicketsController.php'; ?>

    <?php include 'Header.php'; ?>

    <?php
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <form method="post">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
<br>
        <label>Go back to :</label>
        
     <a href="Bus_Manager_Home.php">Home</a><br><br>
  <div class="ticadd"style="height:500px;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">
     <h2>UPDATE TICKETS FOR BUS</h2>
           <br>
            <label>Ticket ID: </label>
            <input type="text" name="ticketId" value="<?php echo $ticketId ?>"><span class="red">
                <?php
                if ($ticketIdErr) {
                    echo $ticketIdErr;
                }
                ?></span>
            <input type="submit" name="search" value="Search" class="btn btn-info" />
            <br>
          <label>Bus Id: </label>
            <input type="text" name="busId" value="<?php echo $busId ?>"><span class="red">
                <?php
                if ($busIdErr) {
                    echo $busIdErr;
                }
                ?></span>
            
<br>
           

            <label>From: </label>
            <select name="busFrom">
                <option value="<?php echo $from ?>"><?php echo $from ?></option>
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Sylet">Sylet</option>
                <option value="Bagura">Bagura</option>
                <option value="khulna">khulna</option>
                <option value="Chittagong">Chittagong</option>
            </select><span class="red">
                <?php
                if ($fromErr) {
                    echo $fromErr;
                }
                ?></span>
            <br>

            <label>To: </label>
            <select name="busTo">
                <option value="<?php echo $to ?>"><?php echo $to ?></option>
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Sylet">Sylet</option>
                <option value="Bagura">Bagura</option>
                <option value="khulna">khulna</option>
                <option value="Chittagong">Chittagong</option>
            </select><span class="red">
                <?php
                if ($toErr) {
                    echo $toErr;
                }
                ?></span>
          <br>

            <label>Price: </label>
            <input type="text" name="price" value="<?php echo $price ?>" /><br />
        <br>

                    <label>Date: </label>
        
                <input type="Date" name="date" value="<?php echo $date ?>" /> (mm/dd/yyyy)<br />
         <br>
                    <label>Time: </label>
              
                <input type="time" name="time" value="<?php echo $time ?>" /> (mm:ss am/pm)<br />
      <br>

            <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            <input type="reset" name="reset" value="Reset" class="btn btn-info" /><br />


            </div>
        

        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

       
    </form>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br />
 <?php include 'Footer.php'; ?>
</body>

</html>