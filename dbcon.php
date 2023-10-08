<?php
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
$factory = (new Factory())-> withProjectId('database-a818f')
->withServiceAccount('c:/xampp/htdocs/Harsh/MultipleDb/database-a818f-firebase-adminsdk-xjo10-8d9bf0776b.json')
->withDatabaseUri('https://database-a818f-default-rtdb.firebaseio.com/');


$database = $factory->createDatabase();
?>
