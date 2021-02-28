

// обявляем переменную адрес для сайта
var siytURL = "http://autoprice.local/";


// функцыя открыть модальное окно  товар добавлен в корзину 
 function openModalAddCart(a) {
 	// получаем id товара по которому был клик
	var idProd = a.dataset.id;
	// оформляем ajax запрос
 	var ajax = new XMLHttpRequest();
 	ajax.open("GET", siytURL + "modules/php/basket/showModalAddCart.php?id_prod=" + idProd, false);
 	ajax.send();
 	// выбрать модальное окно и вставить внутырь результат ajax
 	var modalAddCart = document.querySelector("#modalAddCart");
 		modalAddCart.innerHTML = ajax.response;
	// активировать модальное окно
	$('#modalAddCart').modal('show');
 }




// функцыя  добавить товар в корзину 
 function addToBasket(a) {
 	// получаем id товара по которому был клик
	var idProd = a.dataset.id;
	// делаем новый запрос
 	var ajax = new XMLHttpRequest();
 	ajax.open("POST", siytURL + "/modules/php/basket/add_too_basket.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send("id_prod=" + idProd);
	// выбираем елемент аякса в которов храница масив id товаров из корзины
 	var response = JSON.parse(ajax.response);
	// создаем переменную для самого масива
	var arrayBasket = response.basket;
	// запускаем счетчик для подсчета количества товаров в корзине 
	var count = arrayBasket.length;
	// выводим количество добвалених товаров в span корзины 
	var btnGobasket = document.querySelector("#go-basket span");
		btnGobasket.innerText = count;
	// выводим количество добвалених товаров в span модального окна корзины	
	var offcanvasAddCart = document.querySelector("#offcanvas_add_cart span p");	
		offcanvasAddCart.innerText = count;
 }

// функцыя удалить товар из корзины
function deleteProductBasket(obj, id) {
	//alert(" Вы увереные что хотите удалить товар с корзины  ");
//создеем новый  елемент ajax 
	var ajax = new XMLHttpRequest();
		ajax.open("POST", siytURL + "/modules/php/basket/deleteProductBasket.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id_prod=" + id );
	// удаляем строку с выбраным продуктом 
	obj.parentNode.parentNode.remove(); 
	// выбираем елемент аякса в которов храница масив id товаров из корзины
 	var response = JSON.parse(ajax.response);
 	// создаем переменную для самого масива
	var arrayBasket = response.basket;
	// запускаем счетчик для подсчета количества товаров в корзине 
	var count = arrayBasket.length;
	// выводим количество добвалених товаров в span корзины 
	var btnGobasket = document.querySelector("#go-basket span");
		btnGobasket.innerText = count;
	// выводим количество добвалених товаров в span модального окна корзины	
	var offcanvasAddCart = document.querySelector("#offcanvas_add_cart span p");	
		offcanvasAddCart.innerText = count;	
}

// функцыя изменить количество товара в  корзине 
function chengCount(obj, id) {
	// количество 1-го товара взятое с input
	var count = obj.value;
	// Id продукта которого нужно изменить количество
	var idProd = id;
	var danye = "idProd=" + id +
				"&count=" + count;

	//создеем новый  елемент ajax 
	var ajax = new XMLHttpRequest();
	ajax.open("POST", siytURL + "/modules/php/basket/сhangeСount.php", false);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send(danye);

	// декодируем результат ajax  с  json в обычный масив 
	var response = JSON.parse(ajax.response);
	// проходим цыклом  по масиву
	for (var i=0; i < response.basket.length; i++)  {
		// выберем ту запись масива которя соответсвует id в $_POST	  
		if ( response.basket[i]['product_id'] == idProd) {
			// получим цену товара
			var price = document.getElementById("price#" + id);
			// выберем елемент для отображения общей стоимости 
			var totalCost = document.getElementById("count#" + id);
			// отобразим общю стоимось товара согласно новом количестве 
			totalCost.innerText = price.innerText * response.basket[i]['count']
		}
	}
}
	




