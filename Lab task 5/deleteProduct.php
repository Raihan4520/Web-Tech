<?php

require_once 'controller/productInfoController.php';

$product = fetchProduct($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Task 5</title>
</head>

<body>
    <?php include "menu.php" ?>

    <form action="controller/deleteProductController.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>DELETE PRODUCT</legend>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            Name: <?php echo $product['name'] ?><br>
            Buying Price: <?php echo $product['bPrice'] ?><br>
            Selling Price: <?php echo $product['sPrice'] ?><br>
            Displayable: <?php echo $product['display'] ?><br>
            <hr>
            <input type="submit" name="deleteProduct" value="Delete">
        </fieldset>
</body>

</html>