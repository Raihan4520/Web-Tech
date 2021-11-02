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

    <form action="controller/createProductController.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>ADD PRODUCT</legend>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="bPrice">Buying Price:</label><br>
            <input type="text" id="bPrice" name="bPrice"><br>
            <label for="sPrice">Selling Price:</label><br>
            <input type="text" id="sPrice" name="sPrice"><br>
            <hr>
            <input type="checkbox" id="display" name="display" value="Yes">
            <label for="display">Display</label><br>
            <hr>
            <input type="submit" name="createProduct" value="Save">
        </fieldset>
</body>

</html>