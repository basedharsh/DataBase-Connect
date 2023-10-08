<?php
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $newData = [
        'name' => $name,
        'email' => $email
    ];

    $database->getReference('users')->push($newData);
    header('Location: ./trial.php');
  
}
?>
