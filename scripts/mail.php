<?php

$user_email = $_POST['user_email'];
$user_comment = $_POST['user_comment'];
$user_organization = $_POST['user_organization'];
$user_erdpo = $_POST['user_erdpo'];
$t_quantity = $_POST['t_quantity'];
$t_price = $_POST['t_price'];

    $to = "test@skresan.com.ua";
    $from = "sunkevu4@gmail.com";
    $tema = "Нове замовлення на сайті Skresan";

    $message = "Ім'я замовника: ".$_POST['user_name']."<br>";
    if($t_quantity > 0){
        $message .= "Замовник вибрав місто: ".$_POST['user_region']."<br>";
        $message .= "Замовник вибрав тип покриття: ".$_POST['coverage_type']."<br>";
    }
    if($user_email){
        $message .= "Електронна адреса: ".$user_email."<br>";
    }
    $message .= "Телефон: ".$_POST['user_phone']."<br>";
    if($user_comment){
        $message .= "Коментар: ".$_POST['user_comment']."<br>";
    }
    if($user_organization){
        $message .= "Назва організації: ".$user_organization."<br>";
    }
    if($user_erdpo){
        $message .= "ЄРДЕПОУ: ".$user_erdpo."<br>";
    }
    $message .= "Доставка: ".$_POST['user_delivery']."<br>";
    if(t_price > 0 and $t_price > 0){
        $message .= "Кількість матеріалу: ".$t_quantity." уп."."<br>";
        $message .= "Вартість матеріалу: ".$t_price." грн"."<br>";
    }

    $headers = 'MIME-Version 1.0' .  "\r\n";
    $headers = "Content-type: text/html; charset=\"utf-8\""."\r\n";
    mail($to, $tema, $message, $headers);

    echo 'Спасибо! Ваше письмо отправлено.';
?>