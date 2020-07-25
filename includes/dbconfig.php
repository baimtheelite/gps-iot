<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = (__DIR__ . '/gps-iot-8a30e-firebase-adminsdk-54pnj-0cfbe90973.json');

$firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://gps-iot-8a30e.firebaseio.com/');

$database = $firebase->createDatabase();

$reference = $database->getReference('/koordinat');
