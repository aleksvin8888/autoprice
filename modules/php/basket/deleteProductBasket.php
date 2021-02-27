<?php

//Подключаем файл БД
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';


// проверка  что поступил именно POST запрос 
  if (isset($_POST['id_prod']) and $_SERVER["REQUEST_METHOD"]=="POST") {
  	//проверка или существует КУКИ 
  	 if ( isset($_COOKIE['basket']) ) {
 		$basket = $_COOKIE['basket'];
 		// перекодируем даные масива из json в стандартный масив  
        $basket = json_decode($_COOKIE['basket'], true); 
        // проходим цыклом по масиву 
        for ($i=0; $i < count($basket['basket']); $i++) { 
        	// если в масиве есть id  который соответствует выбраному id 
        	if ($basket['basket'][$i]['product_id'] == $_POST['id_prod']) {
        		// тогда удаляем из масива выбраный  id  товара 
        		unset($basket['basket'][$i]);
        		/// перезаписываем  масив для изменения смищения ( 1,2,3,4) на (0,1,2,3,4)
        		sort($basket['basket']);
        	}
        }
        // преобразования  масива  в json формат 	
	  	$jsonProd = json_encode($basket);
	  	// очищаем КУКИ 
	  	setcookie("basket", "", 0, "/");
	  	// перезаписываем куки заново 
	  	setcookie("basket", $jsonProd, time() + 60*60, "/");
      // возвращаем переменную json с которой дальше работаеи ajax 
        echo $jsonProd;
  	 }
  }

?>