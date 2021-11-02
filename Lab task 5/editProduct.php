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

    <form action="controller/updateProductController.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>EDIT PRODUCT</legend>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <label for="name">Name</label><br>
            <input value="<?php echo $product['name'] ?>" type="text" id="name" name="name"><br>
            <label for="bPrice">Buying Price</label><br>
            <input value="<?php echo $product['bPrice'] ?>" type="text" id="bPrice" name="bPrice"><br>
            <label for="sPrice">Selling Price</label><br>
            <input value="<?php echo $product['sPrice'] ?>" type="text" id="sPrice" name="sPrice"><br>
            <hr>
            <input type="checkbox" id="display" name="display" value="Yes" checked>
            <label for="display">Display</label><br>
            <hr>
            <input type="submit" name="updateProduct" value="Save">
        </fieldset>
    </form>
</body>

</html>