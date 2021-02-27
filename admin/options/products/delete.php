<?php
include '../../../configs/db.php';

if(isset($_GET['id'])) {
	$sql = "DELETE FROM product WHERE id=" . $_GET['id'];
    if($conn->query($sql)) {
    header("Location: /admin/products.php");
    }
}
?>