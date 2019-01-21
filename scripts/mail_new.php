<?php
//recipient
$to = 'test@skresan.com.ua';

//sender
$from = 'order@skresan.com.ua';
$fromName = 'Skresan';

//email subject
$subject = 'Нове замовлення на сайті Skresan'; 

$headers = "From: $fromName"." <".$from.">";
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

$user_email = $_POST['user_email'];
$user_comment = $_POST['user_comment'];
$user_organization = $_POST['user_organization'];
$user_erdpo = $_POST['user_erdpo'];
$t_quantity = $_POST['t_quantity'];
$t_price = $_POST['t_price'];

    $message = "Ім'я замовника: ".$_POST['user_name']."<br>";
    if($t_quantity > 0){
        $message .= "Область: ".$_POST['user_region']."<br>";
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
    if($t_price > 0){
        $message .= "Кількість матеріалу: ".$t_quantity." уп."."<br>";
        $message .= "Вартість матеріалу: ".$t_price." грн"."<br>";
    }
 	
	$content = file_get_contents($file);
    $content .= chunk_split(base64_encode($content));
	$message .=  $content;

	$returnpath = "-f" . $from;

    mail($to, $subject, $message, $headers, $returnpath);

	echo $mail?"<h1>Повідомлення відправлено.</h1>":"<h1>Виникла помилка при відправці повідомлення, спробуйте ще раз!.</h1>";
?>