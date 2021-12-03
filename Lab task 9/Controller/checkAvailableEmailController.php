<?php
require_once '../Model/db_connect.php';

$q = $_REQUEST["q"];

$conn = db_conn();
$selectQuery = "SELECT * FROM `customer` where c_email = ?";
try {
    $stmt = $conn->prepare($selectQuery);
    $stmt->execute([$q]);
} catch (PDOException $e) {
    echo $e->getMessage();
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$conn = null;

echo $row['c_email'] !== $q ? "" : "<span style='color:red'>Email already taken</span>";
