<?php 

// подключим базу даных 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';


if (isset($_GET['id_prod'])) {
	
	$sql = "SELECT * FROM product WHERE id=" . $_GET['id_prod'];
	$res = $conn->query($sql);
	$product = mysqli_fetch_assoc($res);

	// получить фото товара
    $sqlf = "SELECT path FROM img WHERE 
    ( id_produckt='" . $product['id'] . "' )
     ORDER BY id LIMIT 1 ";
     $resalt_f = $conn->query($sqlf);
     $foto = mysqli_fetch_assoc($resalt_f);

	?>
	<div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-center">Товар успешно добавлен в корзину</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="modal__product-img">
                                        <img class="img-fluid" src="assets/img/product/<?php echo $foto['path'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="modal__product-title"><?php echo $product['title'] ?></span>
                                    <span class="modal__product-price m-tb-15"><?php echo $product['price'] ?>  грн.</span>
                                    <ul class="modal__product-info ">
                                        <li>Size:<span> S</span></li>
                                        <li>Quantity:<span>3</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 modal__border">
                            <span class="modal__product-cart-item">Товаров в корзине - ....</span>
                            <ul class="modal__product-shipping-info m-tb-15">
                                <li>Всего товаров: <span>$94.78</span></li>
                                <li>Стоимость доставки: <span>$7.00</span></li>
                                <li>Налог: <span>$0.00</span></li>
                                <li>Всего: <span>$101.78 (tax excl.)</span></li>
                            </ul>
                            
                            <div class="modal__product-cart-buttons">
                                <a href="#" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight" data-dismiss="modal">Продолжить покупки</a>
                                <a href="checkout.php" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight">Оформить заказ</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
}

?>