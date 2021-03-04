 <div  id="offcanvas-add-cart__box" class="offcanvas offcanvas-cart offcanvas-add-cart">
            <?php 
                if (isset($_COOKIE['basket'])) {
                    $arrayBasket = json_decode($_COOKIE['basket'], true);
                    $countProduct = count($arrayBasket['basket']); 
                } else {
                    $countProduct = "0";
                }
            ?>
            <div id="offcanvas_add_cart" class="offcanvas-add-cart__top m-b-40">
                <span class="offcanvas-add-cart__top-text"><i class="icon-shopping-cart"></i> Товаров в корзине:  <?php echo $countProduct?>
                </span>
                <button class=" offcanvas-close">&times;</button>
            </div>
            <!-- Start  товары в корзине  -->
            <ul class="offcanvas-add-cart__menu">
                <?php
                if (isset($_COOKIE['basket'])) {
                    $arrayBasket = json_decode($_COOKIE['basket'], true);
                    for ($i=0; $i < count($arrayBasket["basket"]); $i++) {
                        $sql_prod = "SELECT * FROM product WHERE id=" . $arrayBasket['basket'][$i]['product_id'];
                        $res_prod = $conn->query($sql_prod);
                        $product = mysqli_fetch_assoc($res_prod);
                         // получить фото товара
                        $sqlf = "SELECT path FROM img WHERE 
                        ( id_produckt='" . $product['id'] . "' )
                         ORDER BY id LIMIT 1 ";
                         $resalt_f = $conn->query($sqlf);
                         $foto = mysqli_fetch_assoc($resalt_f);
                    ?>      
                        <!-- Start карта товара -->
                        <li class="offcanvas-add-cart__list pos-relative">
                            <div class="offcanvas-add-cart__img-box pos-relative">
                                <a href="single-1.php?prod_id= <?php echo $product['id'] ?>"
                                 class="offcanvas-add-cart__img-link img-responsive">
                                 <img src="assets/img/product/<?php echo $foto['path'] ?>" alt="" class="add-cart__img">
                               </a>
                            </div>
                            <div class="offcanvas-add-cart__detail">
                                <a href="single-1.php?prod_id= <?php echo $product['id'] ?>" class="offcanvas-add-cart__link">
                                <?php echo $product['title'] ?>
                                </a>
                                <span class="offcanvas-add-cart__price">
                                    <?php echo $product["price"] ?>
                                        <p>  Грн.</p>
                                    </span>
                                

                            </div>
                        
                            <button id="offcanvasDeleteCartBox#<?php echo $product['id'] ?>" 
                            onclick="deleteProductOffcanvasCart(this, <?php echo $product['id'] ?> )"   
                             class="offcanvas-add-cart__item-dismiss pos-absolute">&times;
                            
                            </button>

                        </li> <!-- Start карта товара -->



                    <?php
                    }
                }
                ?>
                
            </ul> <!-- Start товары в корзине -->

            <!-- Start Add Cart Checkout Box-->
            <div class="offcanvas-add-cart__checkout-box-bottom">
                <!-- Start offcanvas Add Cart Checkout Info-->
                <ul class="offcanvas-add-cart__checkout-info">
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Subtotal</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$60.59</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Shipping</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$7.00</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Taxes</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$0.00</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Total</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$67.59</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                </ul> <!-- End offcanvas Add Cart Checkout Info-->

                <div class="offcanvas-add-cart__btn-checkout">
                    <a href="checkout.php" class="btn btn--block btn--box btn--gray btn--large btn--uppercase btn--weight">Оформить заказ</a>
                </div>
            </div> <!-- End Add Cart Checkout Box-->
        </div>