<?php

include('includes/dbconfig.php');

date_default_timezone_set("Asia/Jakarta");

//proses  mengambil nilai latitude dan longitude dari URL parameter
$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];
$telegram = $_GET['telegram'];



$data = [
    'id' => str_replace("-", "", date('Y-m-d-H-i-s')),
    'latitude' => $latitude,
    'longitude' => $longitude,
    'created_at' => date('d-m-Y H:i:s')
];

//Proses memasukkan data koordinat dan tanggal dikirim ke database firebase
$postData = $database->getReference('/koordinat')->push($data);

if ($telegram == 'telegram') {
    // Telegram function which you can call
    function telegram($msg)
    {
        // Set your Bot ID and Chat ID.
        $telegrambot = '1228150373:AAE5Rob-a1hmMscHwCDH6V2UOyvwgQ3ktuo';
        $telegramchatid = '604378593';

        $url = 'https://api.telegram.org/bot' . $telegrambot . '/sendMessage';
        $data = array('chat_id' => $telegramchatid, 'text' => $msg);
        $options = array('http' => array('method' => 'POST', 'header' => "Content-Type:application/x-www-form-urlencoded\r\n", 'content' => http_build_query($data),),);
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    // Function call with your own text or variable
    telegram("Posisi kendaraan Anda bergerak,\nLatitude: $latitude \nLongitude: $longitude \nTanggal dikirim: " . date('d-M-Y H:i:s') . " \n https://www.google.com/maps/search/?api=1&query=$latitude,$longitude \nuntuk lihat lokasi silahkan cek di web gps-iot.000webhostapp.com");
} else {
    echo 'no';
}
