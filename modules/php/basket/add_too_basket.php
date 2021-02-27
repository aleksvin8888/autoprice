<?php

// подключим базу даных 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';


if (isset($_POST['id_prod']) and $_SERVER["REQUEST_METHOD"]=="POST" ) {
	
	// запрос в базу для получения выбраного продукта 
	$sql_prod = "SELECT * FROM product WHERE id=" . $_POST['id_prod'];
    $res_prod = $conn->query($sql_prod);
    $product = mysqli_fetch_assoc($res_prod);
 	
 	// если сущестует $_COOKIE['basket'] значит товар уже был добавлен в корзину 
 	// будем работать с ней
 	
    if (isset ($_COOKIE['basket']) ) {
    	
	// переобразовуваем COOKIE из json в масив 		 
	$basket = json_decode($_COOKIE['basket'], true);

	$issetProduct = 0;
		// проходим цыклом по масиву $basket
		for ($i=0; $i < count($basket["basket"]); $i++) { 
				// если в масиве обнаружен товар с id который соответствует id из запроса sql 
				// значит нужно увеличеть количество даного товара 
				if ( $basket["basket"][$i]["product_id"] == $product['id'] ) {
					$basket["basket"][$i]['count']++;
					// контрольная переменная 
					$issetProduct = 1;
				}
			}
			// если $issetProduct не ровно " 1 " значит товара с выбраным id 
			// в масиве  корзины нет поетому добавим  таков 
		if ($issetProduct != 1) {
			$basket["basket"][] = [
									"product_id" => $product['id'],
									"count" => 1
								];
	}


	// если $_COOKIE['basket'] не существует то будем  создавать 
    } else {
	$basket = ["basket" => [
							["product_id" => $product['id'],
	 						"count" => 1 ]
 						] 
 					];
	}//конец проверки или создана COOKIE

 	// преобразования  масива $basket  в json формат для комфортного хранения  	
  	$jsonProd = json_encode($basket);
  	// очищаем КУКИ  basket  если была создана рание 
  	setcookie("basket", "", 0, "/");

  	// создаем  КУКИ фаил с именим "basket"  
  	// помещаем в куку  $jsonProd  с даными о выбраном  товаре 
  	// и назначаем срок жызни 1 час
  	//  "/" - кука доступна на всех  страницах сайта 
  	setcookie("basket", $jsonProd, time() + 60*60, "/");

  	// возвращяем json 
  	echo $jsonProd;

    

	

} //конец первой проверка $_POST



?>