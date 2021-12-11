<!DOCTYPE html>
<html>

<head>
    <title>Update Bus information</title>
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
    <?php require_once 'Controller/updatebusController.php'; ?>

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

         <label>Go back to :</label>
         <a href="Bus_Manager_Home.php">Home</a><br><br>
         <div class="busupt"style="height:450px;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">
             <h2>UPDATE FOR BUS</h2>
            
            <label>Bus ID : </label>
            <input type="text" name="busId" value="<?php echo $busId ?>"><span class="red">
                <?php
                if ($busIdErr) {
                    echo $busIdErr;
                }
                ?></span>
            <input type="submit" name="search" value="Search" class="btn btn-info" />
            <br><br>
            <label>Bus Name: </label>
            <input type="text" name="busName" value="<?php echo $busName ?>"><span class="red">
                <?php
                if ($busNameErr) {
                    echo $busNameErr;
                }
                ?></span>
      <br><br>

 
<label>Bus Location: </label>
<select name="busLocation">
<option value="<?php echo $to ?>"><?php echo $busLocation ?></option>
<option value="Dhaka">Dhaka</option>
<option value="Barishal">Barishal</option>
<option value="Cumilla">Cumilla</option>
<option value="Sylet">Sylet</option>
<option value="Bagura">Bagura</option>
<option value="khulna">khulna</option>
<option value="Chittagong">Chittagong</option>
</select><span class="red">
<?php
if ($busLocationErr) {
echo $busLocationErr;
}
?></span>

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
    </div>
    <br />
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br />
<?php include 'Footer.php'; ?>
</body>

</html>