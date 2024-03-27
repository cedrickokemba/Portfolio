<?php
require('manager-db.php');

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $result = getAuthentification($_POST['username'], $_POST['password']);
    if ($result && $result->type == 'Admin') {
        session_start();
        $_SESSION['username'] = $result->username;
        $_SESSION['type'] = $result->type;
        header('location: ../index.php');
        exit();
    } else {
        header('location: home.php');
        exit();
    }
} else {
    header('location: home.php');
    exit();
}
?>