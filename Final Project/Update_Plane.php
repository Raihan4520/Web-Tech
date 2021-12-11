<!DOCTYPE html>
<html>

<head>
    <title>Update Plane information</title>
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
    <?php require_once 'Controller/updatePlaneController.php'; ?>

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
         <a href="Plane_Manager_Home.php">Home</a><br><br>
         <div class="Planeupt"style="height:450px;
        text-align: center;
        padding: 30px;
        margin-left: 300px;
        border-radius: 50px;
        border: 5px solid rgb(255, 255, 255, 0.3);
        box-shadow: 2px 2px 15px;
        color: black;
        width: 50%;">
             <h2>UPDATE FOR PLANE</h2>

             <label>Plane ID : </label>
            <input type="text" name="PlaneId" value="<?php echo $PlaneId ?>"><span class="red">
                <?php
                if ($PlaneIdErr) {
                    echo $PlaneIdErr;
                }
                ?></span>
            <input type="submit" name="search" value="Search" class="btn btn-info" />
            <br><br>
        <label>Plane Name: </label>
            <input type="text" name="PlaneName" value="<?php echo $PlaneName ?>"><span class="red">
                <?php
                if ($PlaneNameErr) {
                    echo $PlaneNameErr;
                }
                ?></span>
      <br> <br>

 
<label>Plane Location: </label>
<select name="PlaneLocation" id="PlaneLocation" onblur="validPlaneLocation()" onkeyup="validPlaneLocation()">
<option value="<?php echo $PlaneLocation ?>"><?php echo $PlaneLocation ?></option>
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

            <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            <input type="reset" name="reset" value="Reset" class="btn btn-info" /><br />
        </fieldset>

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