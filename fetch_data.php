<?php
include('dbcon.php');
$references = $database->getReference('users')->getValue();
$data = [];
foreach ($references as $key => $reference) {
    $data[] = [
        'key' => $key,
        'name' => $reference['name'],
        'email' => $reference['email']
    ];
}
echo json_encode($data);
?>
