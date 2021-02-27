<?php 
//Подключаем файл БД
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

//делаем проверку пришли ли данные чз POST методом
if(isset($_POST) and $_SERVER["REQUEST_METHOD"] =="POST"){
	//создаем запрос в БД
	$sql =" SELECT * FROM product WHERE id = " .$_POST['id'] ;
	//выполняем запрос
	$result = $conn->query($sql);
	//переводим полученные данные в переменную
	$product = mysqli_fetch_assoc($result);

	//если присутствуют файлы Куки баскет то 
	if(isset($_COOKIE['wishlist'])){
		//переводим значения Куки в перменную
		$wishlist = $_COOKIE['wishlist'];
		//преобразовываем полученные данные в json
		$wishlist = json_decode($_COOKIE['wishlist'],true);

		$issetProduct =0;	
		for ($i=0; $i < count($wishlist['wishlist']); $i++) { 
			//помещаем значение product['id'] в масив basket
			if( $wishlist["wishlist"][$i]["product_id"] == $product['id'] ) {
				$wishlist["wishlist"][$i]["count"]++;
				$issetProduct = 1;
			}
		}	
		if($issetProduct != 1){
			$wishlist["wishlist"][] =
					            [
								"product_id" => $product['id'],
								"count" => 1						
						     	
							    ];
		}

				

	}else{//если корзина пуста
		//помещаем значение product['id'] в масив basket
		$wishlist = ["wishlist" =>
					    [       
							["product_id" => $product['id'],
							"count" => 1
							]	
						]				     	
				  ];
			
	}

	// преобразовали массив в json
	$jsonProduct = json_encode($wishlist);
	
	//чистим куки товара в корзине
	setcookie("wishlist", "", 0 ,"/" );

	//добавляем куки товара в корзине
	 setcookie("wishlist", $jsonProduct, time() + 60*60 ,"/" );
	 //выводим $jsonProduct
	 //echo $jsonProduct;
	 	 	
	//преобразовали массив количество в json
	 echo json_encode([

	 	"count" =>count($wishlist['wishlist'])
	 ]);
	//выводим количество товара в корзине
	$countWish = count($wishlist['wishlist']);
	//добавляем куки количества товаров  в корзине
	 setcookie("countWish", $countWish, time() + 60*60 ,"/" );
}




?>