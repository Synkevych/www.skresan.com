<?php 
mail("test@skresan.com.ua", "Нове замовлення на сайті СКРЕСАН", $message, 
     "From: webmaster@ example.com \r\n" 
    ."X-Mailer: PHP/" . phpversion()); 
?>