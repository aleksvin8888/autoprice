<?php 

// подключим базу даных 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
//  подключаем шапку сайта 
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';

if (isset($_GET['catid']) ) {
    $sql = "SELECT * FROM cat WHERE id=" . $_GET['catid'];
    $cat = mysqli_fetch_assoc($conn->query($sql));
    ?>
    <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="/">Главная</a></li>
                        <li class="page-breadcrumb__nav active"><?php echo $cat['title']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> 
    <!-- ::::::  End  Breadcrumb Section  ::::::  -->
<?php
}
?>

   <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
               
                <!-- Start Слайдер подкатнгорий-->
                <div class="col-12">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-gallery-box m-b-60 swiper-outside-arrow-hover">
                                    <div class="product-image--single-slide overflow-hidden pos-relative">
                                        <div class="swiper-wrapper">
                                            <?php
                                                $sql = "SELECT * FROM cat_lv2 WHERE id_cat=" . $_GET['catid'];
                                                $res = $conn-> query($sql);
                                                $count = mysqli_num_rows($res);
                                                for($i = 0; $i < $count; $i++) {
                                                $cat_lv2 = mysqli_fetch_assoc($res);
                                                // отображаем все  подкатегори  товаров 
                                                    ?>
                                                    <div class="swiper-slide">
                                                        <div class="img-responsive">
                                                            <img src="assets/img/product/<?php echo $cat_lv2['photo']; ?>" alt="">
                                                             <a href="cat.php?catlv2id= <?php echo $cat_lv2['id']; ?>" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                                <?php echo $cat_lv2['title']; ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <!-- Кнопки навигацыи слайдера -->
                                        <div class="swiper-buttons">
                                             <div class="swiper-button-next gallery__nav gallery__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev gallery__nav gallery__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Описания основной категори товаров (id_cat) -->
                                <div class="product-details-box">
                                    <h5 class="section-content__title">Рекомендацыи по выбору</h5>

                                    <div class="product__desc m-t-25 m-b-30">
                                        <p><?php echo $cat['description']; ?></p>
                                    </div>
                                   
                                    <div class="product-links ">
                                        <div class="product-social m-tb-30">
                                            <ul class="product-social-link">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div><!-- End Слайдер подкатнгорий -->

                <div class="col-12">
                    <!-- ::::::  Start   ТОП товаров из даной категори  ::::::  -->
                    <div class="product product--1 swiper-outside-arrow-hover">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content section-content--border d-flex align-items-center justify-content-between">
                                    <h5 class="section-content__title"> Лучые товары по мнению нашых покупателей в категри - <?php echo $cat['title']; ?> </h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="swiper-outside-arrow-fix pos-relative">
                                    <div class="product-default-slider-5grid overflow-hidden  m-t-50">
                                        <div class="swiper-wrapper">
                                            <?php
                                                $sql = "SELECT * FROM product 
                                                        WHERE  ( id_cat =  '" . $_GET['catid'] . "' AND rating >= 5 ) 
                                                        ORDER BY id LIMIT 12 ";
                                                $res = $conn-> query($sql);
                                                $count = mysqli_num_rows($res);
                                                for ( $i = 0; $i < $count; $i++) {
                                                    $product = mysqli_fetch_assoc($res);
                                                   
                                                    // получить фото товара
                                                    $sqlf = "SELECT path FROM img WHERE 
                                                    ( id_produckt='" . $product['id'] . "' )
                                                     ORDER BY id LIMIT 1 ";
                                                     $resalt = $conn->query($sqlf);
                                                     $foto = mysqli_fetch_assoc($resalt);

                                                    ?>
                                                     <!-- Start Слайдер с продуктом -->
                                                        <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                            <div class="product__img-box">
                                                               <!-- Фото товара -->
                                                                <a href="#" class="product__img--link">
                                                                    <img class="product__img" src="assets/img/product/<?php echo $foto['path'] ?>" alt="">
                                                                </a>
                                                                <!-- купить товар -->
                                                                <a href="#"  data-toggle="modal" data-id="<?php echo $product['id'] ?>"
                                                                 onclick="openModalAddCart(this), addToBasket(this)"class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Купить</a>
                                                               <!-- добавить в избраное -->
                                                                <a href="#" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                            </div>
                                                            <div class="product__price m-t-10">
                                                                <!-- Цена товара -->
                                                                <span class="product__price-reg"><?php echo $product['price']; ?>  грн.</span>
                                                            </div>
                                                            <!-- Названия товара -->
                                                            <a href="#" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                                <?php echo $product['title']; ?>
                                                            </a>
                                                        </div>
                                             <!-- End Слайдер с продуктом  -->
                                             <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="swiper-buttons">
                                            <!-- Кнопки навигацыи-->
                                            <div class="swiper-button-next default__nav default__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev default__nav default__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End   ТОП товаров из даной категори ::::::  -->
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->



<!-- material-scrolltop button -->
<button class="material-scrolltop" type="button"></button>

<?php
 include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";

//  Start Модальное окно добавить в корзину -->
include $_SERVER['DOCUMENT_ROOT'] . "/parts/modal/modalAddCart.php";

?>
