<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab task 4</title>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['userName'])) {
        session_destroy();
        header("location:LOGIN.php");
    } else {
        header("location:LOGIN.php");
    }
    ?>
</body>

</html>