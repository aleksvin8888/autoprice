<?php

// подключим базу даных 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

 if (isset($_POST['id_prod'])) {
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
  
 	}

?>