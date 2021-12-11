<!DOCTYPE html>
<html>

<head>

    <title>Add Plane </title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="JS/Form_Validation.js"></script>

</head>

<body>
    <?php require_once 'Controller/addPlaneController.php'; ?>

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
         <a href="Plane_Manager_Home.php">Home</a><br><br>
         <div class="Plane" style="height:50%;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">
          <h2>ADD  Plane</h2><br>
        
   
      
            <label>Plane Name: </label>
            <input type="text" name="PlaneName" id="PlaneName" onblur="validPlaneName()" onkeyup="validPlaneName()">
            <br>
            <span class="red">
            <p id="PlaneNameErr">
                <?php
                if ($PlaneNameErr) {
                    echo $PlaneNameErr;
                }
                ?>
              </p>  
            </span>
            
             <br><br>
            <label>Plane Location: </label>
            <select name="PlaneLocation" id="PlaneLocation" onblur="validPlaneLocation()" onkeyup="validPlaneLocation()">
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
            <p id="PlaneLocation">
                <?php
                if ($PlaneLocationErr) {
                    echo $PlaneLocationErr;
                }
                ?>
               </p> 
            </span> 
        
            <br>
      

            
                <br><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            <input type="reset" name="reset" value="Reset" class="btn btn-info" />


    </div><br />
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
        <br><br>

        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <?php include 'Footer.php'; ?>
    </form>
    </div>
    <br />
    <!DOCTYPE html>
<html>

<head>

    <title>Add Plane </title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">

</head>

<body>
    <?php require_once 'Controller/addPlaneController.php'; ?>

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
         <a href="Plane_Manager_Home.php">Home</a><br><br>
         <div class="Plane" style="height:50%;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">
          <h2>ADD  Plane</h2><br>
        
   
      
            <label>Plane Name: </label>
            <input type="text" name="PlaneName"><span class="red">
                <?php
                if ($PlaneNameErr) {
                    echo $PlaneNameErr;
                }
                ?></span>
            
             <br><br>
            <label>Plane Location: </label>
            <select name="PlaneLocation">
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
                if ($PlaneLocationErr) {
                    echo $PlaneLocationErr;
                }
                ?></span> 
        
            <br>
      

            
                <br><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            <input type="reset" name="reset" value="Reset" class="btn btn-info" />


    </div><br />
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
        <br><br>

        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <?php include 'Footer.php'; ?>
    </form>
    </div>
    <br />

</body>

</html>