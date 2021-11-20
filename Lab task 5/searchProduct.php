<?php

require_once 'controller/productInfoController.php';

if (isset($_POST['name'])) {
    $products = fetchSearchedProduct($_POST['name']);
} else {
    $products = fetchAllProduct();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Task 5</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
    }
</style>

<body>
    <?php include "menu.php"; ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>SEARCH</legend>
            <input type="text" id="name" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="submit" name="searchProduct" value="Search By Name">
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Profit</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $i => $product) : ?>
                        <tr>
                            <td><?php echo $product['name'] ?></td>
                            <td><?php echo $product['sPrice'] - $product['bPrice'] ?></td>
                            <td><a href="editProduct.php?id=<?php echo $product['id'] ?>">Edit</a>
                            </td>
                            <td><a href="deleteProduct.php?id=<?php echo $product['id'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </fieldset>
</body>

</html>