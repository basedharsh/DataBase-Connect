<?php
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $updatedData = [
        'name' => $name,
        'email' => $email
    ];

    try {
        $database->getReference('users/' . $key)->update($updatedData);
        echo 'success';
    } catch (Exception $e) {
        echo 'failed';
    }
}
?>
