<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

// Подключаем соединение с шапкой страницы
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
if(isset($_GET["id"])){
	$sqlStat = "UPDATE `orders` SET `status` = 'Отправлен клиенту' WHERE `orders`.`id` =" . $_GET['id'];
    $resStat = $conn->query($sqlStat);
    header("Location: /admin/orders.php");
}