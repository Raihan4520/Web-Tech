<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 Task</title>
    <style type="text/css">
		.red{
			color: red;
		}
	</style>
</head>
<body>
    <?php
        // Define variables and set to empty values
        $name = $email = $dateOfBirth = $gender = $degree1 = $degree2 = $degree3 = $degree4 = $bloodGroup = "";
        $nameErr = $emailErr = $dateOfBirthErr = $genderErr = $degreeErr = $bloodGroupErr = "";

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-. ]*$/",$name)) {
                    $nameErr = "Only letters and white space allowed";
                } else {
                    if (str_word_count($name) < 2){
                        $nameErr = " At least 2 word";
                    }
                }
            }
        

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["dateOfBirth"])) {
                $dateOfBirthErr = "Date of birth is required";
            } else {
                $dateOfBirth = test_input($_POST["dateOfBirth"]);
            }

            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
            } else {
                $gender = test_input($_POST["gender"]);
            }

            if (empty($_POST["degree1"])) {
            } else {
                $degree1 = "SSC";
                $degreeCount = $degreeCount + 1;
            }
        
            if (empty($_POST["degree2"])) {
            } else {
                $degree2 = "HSC";
                $degreeCount = $degreeCount + 1;
            }
        
            if (empty($_POST["degree3"])) {
            } else {
                $degree3 = "BSc";
                $degreeCount = $degreeCount + 1;
            }
        
            if (empty($_POST["degree4"])) {
            } else {
                $degree4 = "MSc";
                $degreeCount = $degreeCount + 1;
            }
        
            if ($degreeCount < 2) {
                $degreeErr = "Select at least 2 boxes.";
                // $degree1 = $degree2 = $degree3 = $degree4 = "";
            }

            if (empty($_POST["bloodGroup"])) {
                $bloodGroupErr = "Blood group is required";
            } else {
                $bloodGroup = test_input($_POST["bloodGroup"]);
            }
        }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="name" value="<?php echo $name;?>"><span class="red">*
	    	<?php 
	    		if($nameErr) {
				    echo $nameErr;
	    		}
	    	?></span> <br><br>
    
    Email: <input type="text" name="email" value="<?php echo $email;?>"><span class="red">*
	    	<?php 
	    		if($emailErr) {
				    echo $emailErr;
	    		}
	    	?></span> <br><br>
    
    Date of birth: <input type="Date" name="dateOfBirth" value="<?php echo $dateOfBirth;?>">
    <span class="red">* 
            <?php 
                if($dateOfBirthErr) {
                    echo $dateOfBirthErr;
                }
            ?></span> <br><br>
    
    Gender: <input type="radio" name="gender" 
            <?php 
                if (isset($gender) && $gender=="Male") {
                    echo "checked";
                }
            ?> 
            value="Male">Male 
    <input type="radio" name="gender" 
            <?php 
                if (isset($gender) && $gender=="Female") {
                    echo "checked";
                }
            ?> 
            value="Female">Female 
    <input type="radio" name="gender" 
            <?php 
                if (isset($gender) && $gender=="Other") {
                    echo "checked";
                }
            ?> 
            value="Other">Other 
    <span class="red">* <?php echo $genderErr;?></span> <br><br>
    
    Degree: <input type="checkbox" name="degree1" 
            <?php 
                if (isset($degree1) && $degree1 == "SSC") {
                    echo "checked";
                }
            ?> 
            value="ssc">SSC 
    <input type="checkbox" name="degree2" 
            <?php 
                if (isset($degree2) && $degree2 == "HSC") {
                    echo "checked";
                }
            ?> 
            value="hsc">HSC 
    <input type="checkbox" name="degree3" 
            <?php 
                if (isset($degree3) && $degree3=="BSc") {
                    echo "checked";
                }
            ?> 
            value="bsc">BSc 
    <input type="checkbox" name="degree4" 
            <?php 
                if (isset($degree4) && $degree4=="MSc") {
                    echo "checked";
                }
            ?> 
            value="msc">MSc 
    <span class="red">* <?php echo $degreeErr;?></span> <br><br>
    
    Blood Group: <select name="bloodGroup">
        <option value="" disabled selected>Select a blood group</option>
        <option 
            <?php 
                if (isset($bloodGroup) && $bloodGroup=="A+") {
                    echo 'selected="selected"';
                }
            ?> 
            value="A+">A+</option>
        <option 
            <?php 
                if (isset($bloodGroup) && $bloodGroup=="A-") {
                    echo 'selected="selected"';
                }
            ?> 
            value="A-">A-</option>
        <option 
            <?php 
                if (isset($bloodGroup) && $bloodGroup=="B+") {
                    echo 'selected="selected"';
                }
            ?> 
            value="B+">B+</option>
        <option 
            <?php 
                if (isset($bloodGroup) && $bloodGroup=="B-") {
                    echo 'selected="selected"';
                }
            ?> 
            value="B-">B-</option>
        <option 
            <?php 
                if (isset($bloodGroup) && $bloodGroup=="O+") {
                    echo 'selected="selected"';
                }
            ?> 
            value="O+">O+</option>
        <option 
            <?php 
                if (isset($bloodGroup) && $bloodGroup=="O-") {
                    echo 'selected="selected"';
                }
            ?> 
            value="O-">O-</option> 
        <option 
            <?php 
                if (isset($bloodGroup) && $bloodGroup=="AB+") {
                    echo 'selected="selected"';
                }
            ?> 
            value="AB+">AB+</option>
        <option 
            <?php 
                if (isset($bloodGroup) && $bloodGroup=="AB-") {
                    echo 'selected="selected"';
                }
            ?> 
            value="AB-">AB-</option>
      </select>
    <span class="red">* <?php echo $bloodGroupErr;?></span> <br><br>

    <input type="submit"> <br><br>
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h1>Your Input:</h1>";
        }
        echo $name."<br>";
        echo $email."<br>";
        echo $dateOfBirth."<br>";
        echo $gender."<br>";
        echo $degree1. " " .$degree2. " " .$degree3. " " .$degree4. "<br>";
        echo $bloodGroup."<br>";
	?>

</body>
</html>