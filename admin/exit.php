<?php
// Чистим куки admin_id
setcookie("admin_id", "", 0);
// Переходим на главную страницу Админ-панели
header("Location: http://autoprice.local/admin/");
?>
