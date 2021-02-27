<?php
// Данные для подключения к базе данных
$server = "localhost"; // адрес сервера
$username = "root"; // имя пользователя
$password = ""; // пароль
$dbname = "autosound"; // имя базы данных

// Подключение к базе данных chat
$conn = new mysqli($server, $username, $password, $dbname);
// Кодировка базы данных
$conn->set_charset('utf8');

?>