<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Mid Project</title>
    <script src="JS/Form_Validation.js"></script>
    <script>
        function searchTicketFrom(str) {
            if (str == "") {
                document.getElementById("PlaneFrom").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("displayTicket").innerHTML = this.responseText;
            }
            xhttp.open("POST", "Controller/searchPlaneTicketController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("q=" + str);
        }

        function searchTicketTo(str) {
            if (str == "") {
                document.getElementById("PlaneTo").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("displayTicket").innerHTML = this.responseText;
            }
            xhttp.open("POST", "Controller/searchPlaneTicketController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("s=" + str);
        }
    </script>
</head>

<body>
    <?php
    session_start();
    include 'Header.php';
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <?php require_once 'Controller/addPlaneTicketsController.php'; ?>

    <form method="post">

        <br>
        <label style='color:whitesmoke'>Go back to :</label><a href="Plane_Manager_Home.php">Home</a><br><br>
        <h2>ADD TICKETS FOR Plane</h2>

            <br>

            <label>Plane Id: </label>
            <input type="text" name="PlaneId"><span class="red">
                <?php
                if ($PlaneIdErr) {
                    echo $PlaneIdErr;
                }
                ?></span>
                <br><br>
                <label style='color:whitesmoke'>SEARCH TICKET:</label><br>
        <label style='color:whitesmoke'>From: </label>
        <select name="PlaneFrom" id="PlaneFrom" onchange="searchTicketFrom(this.value)">
            <select name="PlaneFrom" id="PlaneFrom" onblur="validPlaneFrom()" onkeyup="validPlaneFrom()">
                <option value="" disabled selected>Select a location</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Sylet">Sylet</option>
                <option value="Bagura">Bagura</option>
                <option value="khulna">khulna</option>
                <option value="Chittagong">Chittagong</option>
            </select>
            <br>
            <span class="red">
            <p id="PlaneFrom"> 
                <?php
                if ($fromErr) {
                    echo $fromErr;
                }
                ?>
                </p>
            </span>
        <br><br>

        <label style='color:whitesmoke'>To: </label>
        <select name="PlaneTo" id="PlaneTo" onchange="searchTicketTo(this.value)">
            <select name="PlaneTo"  id="PlaneTo" onblur="validPlaneTo()" onkeyup="validPlaneTo()">
                <option value="" disabled selected>Select a location</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Sylet">Sylet</option>
                <option value="Bagura">Bagura</option>
                <option value="khulna">khulna</option>
                <option value="Chittagong">Chittagong</option>
            </select>
            <br>
            <span class="red">
            <p id="PlaneTo">  
                <?php
                if ($toErr) {
                    echo $toErr;
                }
                ?>
                </p>
                </span>
            
<br><br>
            <label>Price: </label>
            <input type="text" name="price" /><br />
        

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