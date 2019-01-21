<?php

$user_email = $_POST['user_email'];
$user_comment = $_POST['user_comment'];
$user_organization = $_POST['user_organization'];
$user_erdpo = $_POST['user_erdpo'];
$t_quantity = $_POST['t_quantity'];
$t_price = $_POST['t_price'];
$t_width = $_POST['t_width'];
$t_length = $_POST['t_length'];

    $to = "test@skresan.com.ua";
    $tema = "Нове замовлення на сайті Skresan";
    $from = "order@skresan.com.ua";

    $message = "Ім'я замовника: <b>".$_POST['user_name']."</b><br>";
    if($user_email){
        $message .= "Електронна адреса: ".$user_email."<br>";
    }
    $message .= "Телефон: <b>".$_POST['user_phone']."</b><br>";
    if($user_comment){
        $message .= "Коментар: ".$_POST['user_comment']."<br>";
    }
    if($user_organization){
        $message .= "Назва організації: ".$user_organization."<br>";
    }
    if($user_erdpo){
        $message .= "ЄРДЕПОУ: ".$user_erdpo."<br>";
    }
    $message .= "Доставка: ".$_POST['user_delivery']."<br>"."<br>";
    if($t_price > 0){
		$message .= "Деталі замовлення: "."<br>";
		$message .= "Область: ".$_POST['user_region']."<br>";
        $message .= "Замовник вибрав тип покриття: ".$_POST['coverage_type']."<br>";
		$message .= "Довжина ділянки: ".$t_length."<br>"; 
		$message .= "Ширина ділянки: ".$t_width."<br>";
		$message .= "Площа ділянки: ".($t_length * $t_width)."<br>";
        $message .= "Кількість матеріалу: <b>".$t_quantity." уп."."</b><br>";
        $message .= "Вартість матеріалу: <b>".$t_price." грн"."<b><br>";
    }

    $headers = 'MIME-Version 1.0' .  "\r\n";
    $headers = "Content-type: text/html; charset=\"utf-8\""."\r\n";
	$headers .= "From: $fromName"." <".$from.">";
    mail($to, $tema, $message, $headers);
	echo $mail?"<h1>Повідомлення відправлено.</h1>":"<h1>Виникла помилка при відправці повідомлення, спробуйте ще раз!.</h1>";
?>