<!DOCTYPE html>
<html>

<head>
    <title>Add Bus Ticket</title>
    <script src="JS/Form_Validation.js"></script>
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
    <?php require_once 'Controller/addBusTicketsController.php'; ?>

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
       <div class="ticadd"style="height:550px;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">
        <h2>ADD TICKETS FOR BUS</h2>

            <br>

                <label style='color:whitesmoke'>Bus Id: </label>
                    <input type="text" name="busId" id="busId" onblur="checkbusId()" onkeyup="checkbusId()">
                    <br>
                    <span class="red">
                        <p id="busIdErr">
                            <?php
                            if ($busIdErr) {
                                echo $busIdErr;
                            }
                            ?>
                        </p>
                    </span>
                    <br>
            <label>From: </label>
            <select name="busFrom">
                <option value="" disabled selected>Select a location</option>
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
        <br><br>

            <label>To: </label>
            <select name="busTo">
                <option value="" disabled selected>Select a location</option>
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
            
<br><br>

     <label style='color:whitesmoke'>Price: </label>
                    <input type="text" name="price" id="price" onblur="checkprice()" onkeyup="checkprice()">
                    <br>
                    <span class="red">
                        <p id="priceErr">
                            <?php
                            if ($priceErr) {
                                echo $priceErr;
                            }
                            ?>
                        </p>
                    </span>
                    <br>
  <!--           <label>Price: </label>
            <input type="text" name="price" /><br />
         -->

         <br><br>
               
                    <label>Date: </label>
                
                <input type="Date" name="date" /> (mm/dd/yyyy)<br />
<br>
            
                    <label>Time: </label>
         
                <input type="time" name="time" /> (mm:ss am/pm)<br />
            
                <br>
            <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            
            <input type="reset" name="reset" value="Reset" class="btn btn-info" /><br />
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br />
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <?php include 'Footer.php'; ?>
    </form>
    
    <br />

</body>

</html>