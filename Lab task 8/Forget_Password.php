<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Mid Project</title>
</head>

<body>


    <?php include 'Header.php'; ?>
    <div class="fog">
        <?php
        $email = $msg = "";
        if (isset($_POST['email'])) {
            $data = file_get_contents("Customer_Data.json");
            $data = json_decode($data, true);
            foreach ($data as $row) {
                if ($row["email"] == $_POST['email']) {
                    $email = "An email has been sent to recover password";
                    $msg = "";
                } else {
                    $msg = "*Invalid email";
                    $email = "";
                }
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <h2>FORGOT PASSWORD</h2>
            <br>
            <label>Enter Email: </label>
            <input type="text" name="email">
            <span class="red"> <?php echo $msg; ?></span><br>
            <span class="green"> <?php echo $email; ?></span><br>

            <input type="submit" name="submit" value="Submit">

        </form>
    </div>
    <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br><br> <br><br> <br><br> <br><br>
    <?php include 'Footer.php'; ?>
</body>

</html>