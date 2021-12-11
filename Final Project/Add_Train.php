<!DOCTYPE html>
<html>

<head>

    <title>Add Train </title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="JS/Form_Validation.js"></script>

</head>

<body>
    <?php require_once 'Controller/addtrainController.php'; ?>

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
         <a href="Train_Manager_Home.php">Home</a><br><br>
         <div class="train" style="height:50%;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">
          <h2>ADD  TRAIN</h2><br>
        
   
      
            <label>Train Name: </label>
            <input type="text" name="trainName" id="trainName" onblur="validTrainName()" onkeyup="validTrainName()">
            <br>
            <span class="red">
            <p id="trainNameErr">
                <?php
                if ($trainNameErr) {
                    echo $trainNameErr;
                }
                ?>
              </p>  
            </span>
            
             <br><br>
            <label>Train Location: </label>
            <select name="trainLocation" id="trainLocation" onblur="validTrainLocation()" onkeyup="validTrainLocation()">
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
            <p id="trainLocation">
                <?php
                if ($trainLocationErr) {
                    echo $trainLocationErr;
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

    <title>Add Train </title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">

</head>

<body>
    <?php require_once 'Controller/addtrainController.php'; ?>

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
         <a href="Train_Manager_Home.php">Home</a><br><br>
         <div class="train" style="height:50%;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">
          <h2>ADD  TRAIN</h2><br>
        
   
      
            <label>Train Name: </label>
            <input type="text" name="trainName"><span class="red">
                <?php
                if ($trainNameErr) {
                    echo $trainNameErr;
                }
                ?></span>
            
             <br><br>
            <label>Train Location: </label>
            <select name="trainLocation">
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
                if ($trainLocationErr) {
                    echo $trainLocationErr;
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