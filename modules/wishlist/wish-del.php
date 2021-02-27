<?php
/*
1.добавить кнопку  удаления товара из избранного
2. Пройтись по всему масиву товаров
3. Проверить id товара и удалить товар
*/


//делаем проверку пришли ли данные чз POST методо	
if(isset($_POST) and $_SERVER["REQUEST_METHOD"] =="POST"){
	if(isset($_COOKIE['wishlist'])){
		//перелаем значение куки в переменную
		$wishlist = $_COOKIE['wishlist'];
		//преобразовываем полученные данные в json
		$wishlist = json_decode($_COOKIE['wishlist'],true);
		
		
		//проходимся по массиву товаров 
		for ($i=0; $i < count($wishlist['wishlist']); $i++) { 
			if ($wishlist['wishlist'][$i]['product_id'] == $_POST['id']) {
				unset($wishlist['wishlist'][$i]);
				sort($wishlist['wishlist']);
			}
		}
		// преобразовали массив в json
	$jsonProduct = json_encode($wishlist);
	
	//чистим куки товара в избранном
	setcookie("wishlist", "", 0 ,"/" );

	//добавляем куки товара в избранном
	 setcookie("wishlist", $jsonProduct, time() + 60*60 ,"/" );
	 
	//преобразовали массив количество в json
	 echo json_encode([

	 	"count" =>count($wishlist['wishlist'])
	 ]);
	 //выводим количество товара в корзине
	$countWish = count($wishlist['wishlist']);
	//добавляем куки количества товаров  в корзине
	 setcookie("countWish", $countWish, time() + 60*60 ,"/" );
		
	}

}




 ?>