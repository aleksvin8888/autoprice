<?php 
//Подключаем файл БД
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
?>
 
   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="/index.php">Главная</a></li>
                        <li class="page-breadcrumb__nav active">Избранное</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content">
                        <h5 class="section-content__title">Список избранных товаров</h5>
                    </div>
                    <!-- Start Wishlist Table -->
                    <div class="table-content table-responsive cart-table-content m-t-30">
                        <table>
                            <thead>
                                <tr>
                                    <th>Фото</th>
                                    <th>НАИМЕНОВАНИЕ ТОВАРА</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Сумма</th>
                                    <th>ADD TO CART</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                // Если существует переменная $_COOKIE["wishlist"]
                                if(isset($_COOKIE["wishlist"])) {
                                    // Помещаем в переменную $wishlist декодированую строку JSON
                                    $wishlist = json_decode($_COOKIE["wishlist"], true);
                                    
                                    // Переменная i = 0; пока переменная i меньше кол-ва товаров в корзине; увеличиваем значение $i++
                                    for($i = 0; $i < count($wishlist["wishlist"]); $i++) {
                                        // Выбираем все поля из таблицы products где id = значению $wishlist["wishlist"]["$i"]
                                        $sql = "SELECT * FROM product WHERE id=" . $wishlist["wishlist"][$i]["product_id"];
                                        // Выполняем sql запрос
                                        $result = $conn->query($sql);
                                        // Преобразовываем полученные данные в массив
                                        $product = mysqli_fetch_assoc($result);
                                                
                            ?>
                                        
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-fluid" src="img_product/<?php echo $product["photo"] ?>" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="#"><?php echo $product["title"] ?></a></td>
                                            <td class="product-price-cart"><span class="amount">$<?php echo $product["prise"] ?></span></td>
                                            <td class="product-quantities">
                                                <div class=" d-inline-block">
                                                    <input type="text"  name="count" oninput="changeCount(this, <?php echo $product['id']; ?>, <?php echo $product['prise']; ?>)" 
                                                        value="<?php echo $wishlist["wishlist"][$i]["count"]; ?>">
                                                </div>
                                            </td>
                                            <td class="<?php echo "price" . $product['id']; ?>">$<?php echo $wishlist["wishlist"][$i]["count"] * $product['prise']; ?></td>
                                            <td class="product-add-cart">
                                                <a href="#modalAddCart" data-toggle="modal" onclick="addToCart(this)" data-id="<?php echo $product["id"] ?>" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">В корзину</a>
                                            </td>
                                        </tr>
                            <?php
                                            
                                    }
                                } 
                                       
                            ?>
 
                            </tbody>
                        </table>
                    </div>  <!-- End Wishlist Table -->
                    <div class="cart-table-button m-t-10">
                        <div class="cart-table-button--left">
                            <a href="/" class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20">Продолжить покупки</a>
                        </div>
                        <div class="cart-table-button--right">
                            
                            <a href="modules/wishlist/clear-wishlist.php" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">Очистить список</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->
    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddCart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-center">Product Successfully Added To Your Shopping Cart</h5>
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
                                        <img class="img-fluid" src="assets/img/product/size-normal/product-home-1-img-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="modal__product-title">SonicFuel Wireless Over-Ear Headphones</span>
                                    <span class="modal__product-price m-tb-15">$31.59</span>
                                    <ul class="modal__product-info ">
                                        <li>Size:<span> S</span></li>
                                        <li>Quantity:<span>3</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 modal__border">
                            <span class="modal__product-cart-item">There are 3 items in your cart.</span>
                            <ul class="modal__product-shipping-info m-tb-15">
                                <li>Total products:<span>$94.78</span></li>
                                <li>Total shipping:<span>$7.00</span></li>
                                <li>Taxes:<span>$0.00</span></li>
                                <li>Total: <span>$101.78 (tax excl.)</span></li>
                            </ul>
                            
                            <div class="modal__product-cart-buttons">
                                <a href="#" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight" data-dismiss="modal">Continue Shopping</a>
                                <a href="checkout.php" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight">Process to checkout</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div> <!-- End Modal Add cart -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>
    

   <?php
    // подключен  footer
    include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
    ?>
</body>

</html>
