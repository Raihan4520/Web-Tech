<?php

require_once '../model/model.php';

if (isset($_POST['updateProduct'])) {
    $data['name'] = $_POST['name'];
    $data['bPrice'] = $_POST['bPrice'];
    $data['sPrice'] = $_POST['sPrice'];
    if (isset($_POST['display'])) {
        $data['display'] = $_POST['display'];
    } else {
        $data['display'] = 'no';
    }

    if (updateProduct($_POST['id'], $data)) {
        echo 'Successfully updated!!';
        header('Location: ../displayProduct.php?id=' . $_POST["id"]);
    }
} else {
    echo 'You are not allowed to access this page.';
}
?>