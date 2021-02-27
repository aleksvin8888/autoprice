<?php

//Подключаем файл БД
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

if (  isset($_POST['idProd']) &&  isset($_POST['count']) and $_SERVER["REQUEST_METHOD"]=="POST" ) {
	if ( isset($_COOKIE['basket']) ) {
	// декодируем COOKIE ['basket'] в обычный масив
	$basket = json_decode($_COOKIE['basket'], true);	
		// проходим цыклом по масиву отбираем нужный товар по id
        for ($i=0; $i < count($basket['basket']); $i++) {
        	// если в масиве есть id  который соответствует выбраному id 
        	if ($basket['basket'][$i]['product_id'] == $_POST['idProd']) {	
        	 // Перезаписываем количество выбраного товара в масиве  
        	 $basket['basket'][$i]['count'] = $_POST['count'];
        	}
        } // конец цыкла
      	// кодируем  масив обратно   в json формат 	
	  	$jsonProd = json_encode($basket);
	  	// очищаем КУКИ 
	  	setcookie("basket", "", 0, "/");
	  	// перезаписываем куки заново  с новыми даными 
	  	setcookie("basket", $jsonProd, time() + 60*60, "/");
	  	// возвращаем переменную json с которой дальше работает ajax 
        echo $jsonProd;

	} // конец проверки на существования $_COOKIE['basket']
} // конец проверки $_POST






?>