<?php
// подключим базу даных 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
//  подключаем шапку сайта  
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';

$sql_prod = "SELECT * FROM product WHERE id=" . $_GET["prod_id"];
    // получить даные товара ро id
    $res_prod = $conn->query($sql_prod);
    $product = mysqli_fetch_assoc($res_prod);
    // получить категорию товара 
    $sql_cat = "SELECT * FROM cat WHERE id=" . $product['id_cat'];
    $cat = mysqli_fetch_assoc($conn->query($sql_cat));
    // получить подкатегорию товара 
    $sql_catlv2 = "SELECT * FROM cat_lv2 WHERE id=" . $product['id_cat_lv2'];
    $catlv2 = mysqli_fetch_assoc($conn->query($sql_catlv2));
?>
    
   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="/">Главная</a></li>
                        <li class="page-breadcrumb__nav"><a href="cat-lv2.php?catid= <?php echo $cat['id']; ?> "><?php echo $cat["title"]?></a> <li>  
                        <li class="page-breadcrumb__nav"><a href="cat.php?catlv2id= <?php echo $catlv2['id']; ?>"><?php echo $catlv2["title"] ?></a></li>
                        <li class="page-breadcrumb__nav active"><a href="#" ><?php echo $product["title"] ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <!-- Start Основная информацыя о товаре -->
                <div class="col-12">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery-box m-b-60">
                                    <?php
                                        // получить фото товара
                                        $sqlf = "SELECT path FROM img WHERE 
                                        ( id_produckt='" . $product['id'] . "' )
                                         ORDER BY id LIMIT 1 ";
                                         $resalt_f = $conn->query($sqlf);
                                         $foto = mysqli_fetch_assoc($resalt_f);
                                    ?>
                                    <!-- Основная картинка товара -->
                                    <div class="product-image--large overflow-hidden">
                                        <img class="img-fluid" id="img-zoom" 
                                         src="assets/img/product/<?php echo $foto['path'] ?>"  
                                         data-zoom-image="assets/img/product/<?php echo $foto['path'] ?>" 
                                         alt="">
                                    </div><!-- END Основная картинка товара -->
                                    <!--  Начало слайдер с картинками товара -->
                                    <div class="pos-relative m-t-30">
                                        <div id="gallery-zoom" class="product-image--thumb product-image--thumb-horizontal overflow-hidden swiper-outside-arrow-hover m-lr-30">
                                            <div class="swiper-wrapper">
                                            <?php 
                                                $sqlf_Sl = "SELECT path FROM img 
                                                WHERE id_produckt=" . $product['id'];
                                                $res_f_Sl = $conn->query($sqlf_Sl);
                                                $count_f_Sl = mysqli_num_rows($res_f_Sl);
                                                for($i = 0; $i < $count_f_Sl; $i++) {
                                                    $foto_Sl = mysqli_fetch_assoc($res_f_Sl);
                                                    ?>
                                                    <div class="swiper-slide">
                                                        <a class="zoom-active" data-image="assets/img/product/<?php echo $foto_Sl["path"] ?>" 
                                                        data-zoom-image="assets/img/product/<?php echo $foto_Sl["path"] ?>">
                                                            <img class="img-fluid" 
                                                            src="assets/img/product/<?php echo $foto_Sl["path"] ?>" 
                                                            alt="">
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="swiper-buttons">
                                            <!-- Кнопки слайдера -->
                                            <div class="swiper-button-next gallery__nav gallery__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev gallery__nav gallery__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div><!-- END слайдер с картинками товара -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-details-box">
                                    <h5 class="section-content__title"><?php echo $product["title"] ?></h5>
                                    <?php
                                        $sql_B = "SELECT title FROM brand WHERE id=" . $product['id_brand'];
                                        $brand = mysqli_fetch_assoc($conn->query($sql_B));
                                    ?>
                                    <span class="text-reference">Бренд: <?php echo $brand['title']; ?></span>
                                    <div class="review-box">
                                        <ul class="product__review m-t-10 m-b-15">
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--blank"><i class="icon-star"></i></li>
                                        </ul>
                                        <a href="#product-review" class="link--gray link--icon-left  m-b-5"><i class="fal fa-comment-dots"></i>Отзывы  </a>
                                        <a href="#modalReview" data-toggle="modal" class="link--gray link--icon-left m-b-5"><i class="fal fa-edit"></i> Сравнить</a>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__price-reg"><?php echo $product['price']; ?> грн.</span>
                                    </div>
                                    <div class="product__desc m-t-25 m-b-30">
                                        <p>краткие характеристики  </p>
                                    </div>
                                    <!-- БЛОК ИЗМЕНИТЬ КОЛИЧЕСТВО ТОВАРА И ДОБАВИТ В КОРЗИНУ -->
                                        <div class="product-quantity product-var__item">
                                            <span class="product-var__text">Количество</span>
                                            <div class="product-quantity-box">
                                                <div class="quantity">
                                                    <input type="number" min="1" max="9" step="1" value="1">
                                                </div>
                                                <a href="#"
                                                  data-toggle="modal" data-id="<?php echo $product['id'] ?>"
                                                 onclick="openModalAddCart(this), addToBasket(this)"
                                                  class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20">В корзину
                                                </a>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="product-links ">
                                        <div class="product-social m-tb-30">
                                            <span>Поделиться</span>
                                            <ul class="product-social-link">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <a href="wishlist.php" class="link--gray link--icon-left shop__wishlist-icon m-b-5"><i class="icon-heart"></i>Добавить в список желаний</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div><!-- End  Основная информацыя о товаре -->
                
                <!-- Start Блок с описаниям товара и характеристики  -->
                <div class="col-12">
                    <div class="product product--1 border-around product-details-tab-area">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content--border">
                                    <ul class="tablist tablist--style-black tablist--style-title tablist--style-gap-70 nav">
                                        <li><a class="nav-link active" data-toggle="tab" href="#product-desc">Описания </a></li>
                                        <li><a class="nav-link" data-toggle="tab" href="#product-dis">Характеристики</a></li>
                                        <li><a class="nav-link" data-toggle="tab" href="#product-review">Отзывы</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="product-details-tab-box m-t-50">
                                <div class="tab-content">
                                    <!-- Start Tab - Описания продукта -->
                                    <div class="tab-pane show active" id="product-desc">
                                        <div class="para__content">
                                            <p class="para__text"><?php echo $product['description']; ?></p>

                                            <p class="para__text"></p>

                                            <h6 class="para__title"></h6>
                                            <ul class="para__list">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>    
                                    </div>  <!-- End Tab - Описания продукта -->

                                    <!-- Start Tab - Характеристики  -->
                                    <div class="tab-pane" id="product-dis">
                                        <div class="product-dis__content">
                                            
                                            <div class="table-responsive-md">
                                                <table class="product-dis__list table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="product-dis__title">Weight</td>
                                                            <td class="product-dis__text">400 g</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="product-dis__title">Materials</td>
                                                            <td class="product-dis__text">60% cotton, 40% polyester</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="product-dis__title">Dimensions</td>
                                                            <td class="product-dis__text">10 x 10 x 15 cm</td>
                                                        </tr>
                                                        <tr> 
                                                            <td class="product-dis__title">Other Info</td>
                                                            <td class="product-dis__text">American heirloom jean shorts pug seitan letterpress</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>  <!-- End Tab - Характеристики -->
                                     <!-- Start Tab - Отзывы -->
                                    <div class="tab-pane " id="product-review">
                                        <!-- Start - Review Comment -->
                                        <ul class="comment">
                                            <!-- Start - Review Comment list-->
                                            <li class="comment__list">
                                                <div class="comment__wrapper">
                                                    <div class="comment__img">
                                                        <img src="assets/img/user/image-1.png" alt=""> 
                                                    </div>
                                                    <div class="comment__content">
                                                        <div class="comment__content-top">
                                                            <div class="comment__content-left">
                                                                <h6 class="comment__name">Kaedyn Fraser</h6>
                                                                <ul class="product__review">
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                                                </ul>
                                                            </div>   
                                                            <div class="comment__content-right">
                                                                <a href="#" class="link--gray link--icon-left m-b-5"><i class="fas fa-reply"></i>Reply</a>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="para__content">
                                                            <p class="para__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start - Review Comment Reply-->
                                                <ul class="comment__reply">
                                                    <li class="comment__reply-list">
                                                        <div class="comment__wrapper">
                                                            <div class="comment__img">
                                                                <img src="assets/img/user/image-2.png" alt=""> 
                                                            </div>
                                                            <div class="comment__content">
                                                                <div class="comment__content-top">
                                                                    <div class="comment__content-left">
                                                                        <h6 class="comment__name">Oaklee Odom</h6>
                                                                    </div>   
                                                                    <div class="comment__content-right">
                                                                        <a href="#" class="link--gray link--icon-left m-b-5"><i class="fas fa-reply"></i>Reply</a>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="para__content">
                                                                    <p class="para__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul> <!-- End - Review Comment Reply-->
                                            </li> <!-- End - Review Comment list-->
                                            <!-- Start - Review Comment list-->
                                            <li class="comment__list">
                                                <div class="comment__wrapper">
                                                    <div class="comment__img">
                                                        <img src="assets/img/user/image-3.png" alt=""> 
                                                    </div>
                                                    <div class="comment__content">
                                                        <div class="comment__content-top">
                                                            <div class="comment__content-left">
                                                                <h6 class="comment__name">Jaydin Jones</h6>
                                                                <ul class="product__review">
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                                                </ul>
                                                            </div>   
                                                            <div class="comment__content-right">
                                                                <a href="#" class="link--gray link--icon-left m-b-5"><i class="fas fa-reply"></i>Reply</a>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="para__content">
                                                            <p class="para__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li> <!-- End - Review Comment list-->
                                        </ul>  <!-- End - Review Comment -->

                                        <a href="#modalReview" data-toggle="modal" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-30">Write a review</a>
                                    </div>  <!--  End Tab - Отзывы -->
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>  <!-- End Блок с описаниям товара и характеристики -->

                <!-- ::::::  Start  Рекомендованые товары в выбраной категори   ::::::  -->
                <div class="col-12">
                    <div class="product product--1 swiper-outside-arrow-hover">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content section-content--border d-flex align-items-center justify-content-between">
                                    <h5 class="section-content__title">12 Other Products In The Same Category: </h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="swiper-outside-arrow-fix pos-relative">
                                    <div class="product-default-slider-5grid overflow-hidden  m-t-50">
                                        <div class="swiper-wrapper">
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.php" class="product__img--link">
                                                        <img class="product__img" src="#." alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.php" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.php" class="product__img--link">
                                                        <img class="product__img" src="#" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.php" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.php" class="product__img--link">
                                                        <img class="product__img" src="#" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.php" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.php" class="product__img--link">
                                                        <img class="product__img" src="#" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.php" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.php" class="product__img--link">
                                                        <img class="product__img" src="#" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.php" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.php" class="product__img--link">
                                                        <img class="product__img" src="#" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.php" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.php" class="product__img--link">
                                                        <img class="product__img" src="#" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.php" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.php" class="product__img--link">
                                                        <img class="product__img" src="#" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--new">New</span>
                                                    <a href="wishlist.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.php" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                            <!-- Start Single Default Product -->
                                            <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                <div class="product__img-box">
                                                    <a href="single-1.php" class="product__img--link">
                                                        <img class="product__img" src="#" alt="">
                                                    </a>

                                                    <a href="#modalAddCart" data-toggle="modal" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to cart</a>
                                                    <span class="product__tag product__tag--discount">-12%</span>
                                                    <a href="wishlist.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                </div>
                                                <div class="product__price m-t-10">
                                                    <span class="product__price-del">$11.90</span>
                                                    <span class="product__price-reg">$10.71</span>
                                                </div>
                                                <a href="single-1.php" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                    SonicFuel Wireless Over-Ear Headphones
                                                </a>
                                            </div> <!-- End Single Default Product -->
                                        </div>
                                        <div class="swiper-buttons">
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next default__nav default__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev default__nav default__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> 
                </div><!-- ::::::  End  Рекомендованые товары в выбраной категори   ::::::  -->
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
   
    //  <!-- Start Модальное окно добавить в корзину --> 
    include $_SERVER['DOCUMENT_ROOT'] . "/parts/modal/modalAddCart.php";
 ?>