<?php
// Очищаем куки
    setcookie("wishlist", "", 0, "/");
    setcookie("countWish", "", 0, "/");
    header("Location: http://autoprice.local/wishlist.php");
?>