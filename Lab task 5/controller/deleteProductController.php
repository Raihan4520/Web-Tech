<?php

require_once '../model/model.php';

if (isset($_POST['deleteProduct'])) {
    if (deleteProduct($_POST['id'])) {
        header('Location: ../displayProduct.php');
    }
} else {
    echo 'You are not allowed to access this page.';
}
?>