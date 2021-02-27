<?php
if (isset($_COOKIE['user_id'])) {
	// удаляем КУКИ
	setcookie("user_id", "", 0, "/");
	
	header("location: /");

	} else {
		header("location: /");
	}

?>