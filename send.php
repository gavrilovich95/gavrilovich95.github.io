<?php

$fio = $_POST['fio'];
$email = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];

$fio = htmlspecialchars($fio);
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);
$phone = htmlspecialchars($phone);

$fio = urldecode($fio);
$email = urldecode($email);
$message = urldecode($message);
$phone = urldecode($phone);

$fio = trim($fio);
$email = trim($email);
$message = trim($message);
$phone = trim($phone);

if (mail("gavrilovich95@gmail.com", "Заявка с сайта", "ФИО:".$fio. "Сообщение: ".$message. "Телефон:".$phone. "From:".$email.)
 {     echo "сообщение успешно отправлено"; 
} else { 
    echo "при отправке сообщения возникли ошибки";
}

?>
