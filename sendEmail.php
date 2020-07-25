<?php
$from = "ibrahim.ahmad58@gmail.com";
$to = "ibrahim.ahmadd98@gmail.com";
$subject = "Perhatian! Kendaraan Anda berpindah lokasi";
$message = "Kendaraan Anda telah berpindah lokasi";
$headers = "From:" . $from;
$retval = mail($to, $subject, $message, $headers);

if ($retval == true) {
    echo "Message sent successfully...";
} else {
    echo "Message could not be sent...";
}
