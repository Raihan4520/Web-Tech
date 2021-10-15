<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab task 4</title>
    <style>
        .error {
            color: red;
        }

        .correct {
            color: green;
        }
    </style>
</head>

<body>
    <?php include 'Header.php'; ?>

    <?php
    $email = $msg = "";
    if (isset($_POST['email'])) {
        $data = file_get_contents("data.json");
        $data = json_decode($data, true);
        foreach ($data as $row) {
            if ($row["email"] == $_POST['email']) {
                $email = "An email has been sent to recover password";
            } else {
                $msg = "Invalid email";
            }
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend><b>FORGOT PASSWORD</b></legend>
            <label>Enter Email: </label>
            <input type="text" name="email">
            <span class="error"> <?php echo $msg; ?></span><br>
            <span class="correct"> <?php echo $email; ?></span><br>
            <hr>

            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>

    <?php include 'Footer.php'; ?>
</body>

</html>