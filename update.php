<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Inside update.php";

include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Inside POST";
    $name = $_POST['name'];
    $email = $_POST['email'];

    $newData = [
        'name' => $name,
        'email' => $email
    ];

    try {
        $database->getReference('users')->push($newData);
        header('Location: ./trial.php');
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
} else {
    echo "Not a POST request";
}
?>
