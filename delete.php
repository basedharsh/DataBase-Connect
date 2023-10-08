<?php
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $key = $_GET['key'];
    $database->getReference('users/' . $key)->remove();
    header('Location: ./trial.php');
}
?>
