<?php
session_start();
$msg = '';
$error = '';
if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $error = "<label class='text-danger'>Enter Name</label>";
    } else if (str_word_count($_POST["name"]) < 2) {
        $error = "<label class='text-danger'>For name at least 2 words required</label>";
    } else if (!preg_match("/^[a-zA-Z-. ]*$/", $_POST["name"])) {
        $error = "<label class='text-danger'>For name only letters, period, dash and white space allowed</label>";
    } else if (empty($_POST["email"])) {
        $error = "<label class='text-danger'>Enter Email</label>";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error = "<label class='text-danger'>Enter valid email </label>";
    } else if (empty($_POST["userName"])) {
        $error = "<label class='text-danger'>Enter User name</label>";
    } else if (!preg_match("/^[a-zA-Z0-9-._]*$/", $_POST["userName"])) {
        $error = "<label class='text-danger'>For user name only letters, numbers,  period and dash  allowed</label>";
    } else if (strlen($_POST["userName"]) < 2) {
        $error = "<label class='text-danger'>For user name at least 2 characters needed</label>";
    } else if (empty($_POST["password"])) {
        $error = "<label class='text-danger'>Enter Password</label>";
    } else if (strlen($_POST["password"]) < 8) {
        $error = "<label class='text-danger'>Password must not be less than eight (8) characters</label>";
    } else if (!preg_match('/[@#$%]+/', $_POST["password"])) {
        $error = "<label class='text-danger'>For password use one of the special characters (@, $, %)</label>";
    } else if (empty($_POST["confirmPassword"])) {
        $error = "<label class='text-danger'>Enter Confirm password</label>";
    } else if ($_POST["password"] != $_POST["confirmPassword"]) {
        $error = "<label class='text-danger'>Password and confirm password didn't match</label>";
    } else if (empty($_POST["gender"])) {
        $error = "<label class='text-danger'>Select a Gender</label>";
    } else if (empty($_POST["dateOfBirth"])) {
        $error = "<label class='text-danger'>Enter date of birth</label>";
    } else {
        if (file_exists('Data.json')) {
            $current_data = file_get_contents('Data.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                'name'               =>     $_POST['name'],
                'email'              =>     $_POST['email'],
                'userName'           =>     $_POST['userName'],
                'password'           =>     $_POST['confirmPassword'],
                'gender'             =>     $_POST["gender"],
                'dateOfBirth'        =>     $_POST['dateOfBirth'],

            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if (file_put_contents('Data.json', $final_data)) {
                $msg = "<label class='text-success'>File Appended Successfully</p>";
            }
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['userName'] = $_POST['userName'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['dateOfBirth'] = $_POST['dateOfBirth'];
            header("location:Logged_In_Dashboard.php");
        } else {
            $error = 'JSON File not exits';
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Append Data to JSON File using PHP</title>
</head>

<body>
    <?php include 'Header.php'; ?>

    <form method="post">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>

        <fieldset>
            <legend><b>REGISTRATION</b></legend><br>
            <label>Name : </label>
            <input type="text" name="name" class="form-control" /><br />
            <hr>

            <label>Email : </label>
            <input type="text" name="email" class="form-control" /><br />
            <hr>

            <label>User Name : </label>
            <input type="text" name="userName" class="form-control" /><br />
            <hr>

            <label>Password : </label>
            <input type="Password" name="password" class="form-control" /><br />
            <hr>

            <label>Confirm password : </label>
            <input type="Password" name="confirmPassword" class="form-control" /><br />
            <hr>

            <fieldset>
                <legend>
                    <label>Gender : </label> <br>
                </legend>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label> <br><br>
            </fieldset>
            <hr>

            <fieldset>
                <legend>
                    <label>Date of Birth : </label>
                </legend>
                <input type="Date" name="dateOfBirth" class="form-control" /> (mm/dd/yyyy)<br />
            </fieldset>
            <hr>

            <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            <input type="reset" name="reset" value="Reset" class="btn btn-info" /><br />
        </fieldset>

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