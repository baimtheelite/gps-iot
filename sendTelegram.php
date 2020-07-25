<?php
date_default_timezone_set("Asia/Jakarta");

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
telegram("Posisi kendaraan Anda bergerak,
         untuk lihat lokasi silahkan cek di web gps-iot.000webhostapp.com");
