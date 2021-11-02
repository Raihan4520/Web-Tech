<?php

require_once '../model/model.php';

if (isset($_POST['createProduct'])) {
    $data['name'] = $_POST['name'];
    $data['bPrice'] = $_POST['bPrice'];
    $data['sPrice'] = $_POST['sPrice'];
    if (isset($_POST['display'])) {
        $data['display'] = $_POST['display'];
    } else {
        $data['display'] = 'No';
    }

    if (addProduct($data)) {
        header('Location: ../displayProduct.php');
    }
} else {
    echo 'You are not allowed to access this page.';
}
?>