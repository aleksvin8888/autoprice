my test work  "online shops"

источник информацыи
https://avtozvuk.ua/zvuk-i-video/c2207


// index.php  -  главная страница   (  ГОТОВО    )
// cat-lv2.php -  страница для отображения категрий 2-го  уровня   (  ГОТОВО  )
// cat.php  -  страница  для показа товара  одной выбраной категори  (   ГОТОВО   )
// single-1.php  -  страница одного  конкретного  товара   ( на стади доработки )
// about.php  -  страница   о нас  ( не готова )
// cart.php  -  корзина товаров   ( на стади доработки )
// checkout.php  -   страница  оформить  заказ  (  )
// compare.php  -   страница  для сравнения  товаров 
// contact.php  -  страница  контактов  компани 
// empty-cart.php  -  страница  пустая корзина ( идея - переделать в страницу  отследить доставку  товара ) 
// login.php  -  страница  регистрацыя / авторизацыя  ( готово )
// logout.php - страница  выйти  с аккаунта   ( готово  )
// my-account.php - страница  кабинет пользователя
// wishlist.php -  страница  избраных  товаров 
// 404-page.php - страница ошыбки 

=====================================================================================================
/parts  -  папка с подключаемыми  частями сайта 

	filter-product.php - подключаимый фаил с фильтром товаров 
	footer.php -  низ сайта ( подвал )
	header.php  - шапка сайта 
	product-card-grid.php - вывод карточки товаров в виде плитки 
	product-card-list.php - вывод карточки товаров в виде списка

=====================================================================================================
/parts/modal -  папка с модальными окнами для сайта

	modalAddCart.php - модальное окно добавить товар в корзину
	modalQuickView.php - модальное окно для быстрого просмотра товаров
=====================================================================================================
/modules  -  функцыональные  файлы  сайта  
	/telegram  - файлы для  телеграм  бота 
		send-message.php  -  отправка сообщения в телеграм 
	/wishlist - функцыонал  для  страницы  сровнения  товаров 
		add-to-wishlist.php - добавить  товар в список сровнения
		clear-wishlist.php  - очистить   список  сровнения 
		wish-del.php --  ?????????
	/modules/php/ - обработка  запросов с базой даных 

		/modules/php/basket - для корзины
			add_too_basket.php - добавить товар в корзину
			deleteProductBasket.php - удалить товар из корзины 
			showModalAddCart.php -  
			сhangeСount.php  - изменить количество  товаров в корзине 

		/modules/php/user - для пользователей   авторизацыя и регистрацыя
			authorization.php - фаил обработки авторизацыи 
			registration.php - фаил обработки регистрацыи 
			userlogout.php  -  обработка  выхода из аккаунта 

=====================================================================================================
/assets/img/product - изображения  товаров  ( картинки )

=====================================================================================================
/assets/js/castomjs.js  -  js  фаил  функцыи и т.д.

====================================================================================================
/configs - файлы  конфигурацый  сайта 
	configs.php - подключения  бота  телеграм
	db.php  - подключения  базы даных
	settings.php - настройки сайта 

=====================================================================================================
/database_copy_SQL - в папке лежыт копия бази даных для  сайта

====================================================================================================
/admin -  папка с файлами для админ панели   -  ( ПОКА  НЕ  РАБОТАЕТ )  



