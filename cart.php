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
                        <li class="page-breadcrumb__nav"><a href="/">Главная</a></li>
                        <li class="page-breadcrumb__nav active">Корзина товаров</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  основной контент  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content">
                        <h5 class="section-content__title">Ваша корзина товаров</h5>
                    </div>
                    <!-- Start список товаров в корзине  -->
                    <div class="table-content table-responsive cart-table-content m-t-30">
                        <table>
                            <thead class="gray-bg" >
                                <tr>
                                    <th>Фото</th>
                                    <th>НАИМЕНОВАНИЕ ТОВАРА</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Сумма</th>
                                    <th>Опции</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                // Если существует переменная $_COOKIE["basket"]
                                if(isset($_COOKIE["basket"])) {
                                    // Декодируем  переменную $_COOKIE["basket"] в масив
                                    $basket = json_decode($_COOKIE["basket"], true);
                                    
                                    // перебрать цыклом масив корзины 
                                    for($i = 0; $i < count($basket["basket"]); $i++) {
                                        // получить товар согласно id в масиве
                                        $res_prod = $conn->query("SELECT * FROM product
                                                 WHERE id=" . $basket["basket"][$i]["product_id"]);
                                        $product = mysqli_fetch_assoc($res_prod);            
                                    ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <?php
                                                    // получить фото товара
                                                    $sqlf = "SELECT path FROM img WHERE 
                                                    ( id_produckt='" . $product['id'] . "' )
                                                     ORDER BY id LIMIT 1 ";
                                                     $resalt_f = $conn->query($sqlf);
                                                     $foto = mysqli_fetch_assoc($resalt_f);
                                                ?>
                                                <a href="single-1.php?prod_id= <?php echo $product['id'] ?>"><img class="img-fluid" 
                                                    src="assets/img/product/<?php echo $foto['path'] ?>" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">
                                                    <?php echo $product["title"] ?>
                                                </a>
                                            </td>
                                            <td class="product-price-cart">
                                                <span id="price#<?php echo $product["id"] ?>" 
                                                    class="amount">
                                                    <?php echo $product["price"] ?>
                                                </span>
                                               <p>  Грн.</p>
                                            </td>

                                            <td class="product-quantities">
                                                <div class="quantity d-inline-block">
                                                    <input  name ="count"  id ="chengCount" 
                                                    type ="number" min="1" step ="1" 
                                                    value ="<?php echo $basket["basket"][$i]["count"]; ?>"
                                                    onchange = "chengCount(this, <?php echo $product['id'] ?> )">
                                                </div>
                                            </td>

                                            <td id="count#<?php echo  $product['id']; ?>" 
                                                class=" product-subtotal ">
                                                <?php echo $basket["basket"][$i]["count"] * $product['price']; ?>
                                            </td>

                                            <td class="product-remove">
                                                <a onclick="deleteProductBasket(this, <?php echo $product['id']; ?>)"><i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php        
                                    }
                                }        
                            ?>
                                 
                            </tbody>
                        </table>
                    </div>  <!-- End список товаров в корзине  -->
                     <!-- Start функцыональные кнопки корзины -->
                    <div class="cart-table-button m-t-10">
                        <div class="cart-table-button--left">
                            <a href="/" class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20">Продолжить покупки</a>
                        </div>
                        <div class="cart-table-button--right">
                            <a href="#" class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20 m-r-20">зарезервирована кнопка </a>
                            <a href="modules/cart/clear-cart.php" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">
                            Очистить корзину
                            </a>
                        </div>
                    </div>  <!-- End функцыональные кнопки корзины -->
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar__widget gray-bg m-t-40">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">место для подключения службы доставки </h5>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar__widget gray-bg m-t-40">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">ПРОМОКОД</h5>
                        </div>
                        <span>Введите свой код для получения скидки </span>
                        <form action="#" method="post" class="form-box">
                            <div class="form-box__single-group">
                                <label for="form-coupon">*Code</label>
                                <input type="text" id="form-coupon">
                            </div>
                            <div class="from-box__buttons m-t-25">
                                <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">Применить купон</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar__widget gray-bg m-t-40">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">Стоимость заказа</h5>
                        </div>
                        <h6 class="total-cost">
                            товаров  на суму 
                            <span>00</span>
                            <p>  Грн.</p>
                        </h6>
                        <div class="total-shipping">
                            <span>стоимость доставки</span>
                            <ul class="shipping-cost m-t-10">
                                <li>
                                    <label for="ship-standard">
                                        <input type="radio" class="shipping-select" name="shipping-cost" value="Standard" id="ship-standard" checked>
                                        <span>в отделени</span>
                                    </label>
                                    <span class="ship-price">00</span>
                                </li>
                                <li>
                                    <label for="ship-express">
                                        <input type="radio" class="shipping-select" name="shipping-cost" value="Express" id="ship-express">
                                        <span>курером</span>
                                    </label>
                                    <span class="ship-price">00</span>
                                </li>
                            </ul>
                        </div>
                        <h4 class="grand-total m-tb-25">
                            К оплате
                             <span>00</span>
                         </h4>
                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" 
                            type="submit">
                        Оформить заказ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  основной контент  ::::::  -->

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
    ?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>
    

  
</body>

</html>
