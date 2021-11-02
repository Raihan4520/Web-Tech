<?php

require_once 'db_connect.php';

function addProduct($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into products (Name, BPrice, SPrice, Display) VALUES (:name, :bPrice, :sPrice, :display)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':name' => $data['name'],
            ':bPrice' => $data['bPrice'],
            ':sPrice' => $data['sPrice'],
            ':display' => $data['display'],
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function showAllProduct()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `products` WHERE display = "Yes"';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showProduct($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `products` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function deleteProduct($id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `products` WHERE `id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function updateProduct($id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE products set name = ?, bPrice = ?, sPrice = ?, display = ? where id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['bPrice'], $data['sPrice'], $data['display'], $id
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function searchProduct($name)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `products` WHERE name LIKE '%$name%'";

    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
?>