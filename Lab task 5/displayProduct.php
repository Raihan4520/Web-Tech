<?php

require_once 'controller/productInfoController.php';

$products = fetchAllProduct();

?>
<!DOCTYPE html>
<html>

<head>
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
    <?php include "menu.php" ?>

    <fieldset>
        <legend>DISPLAY</legend>
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