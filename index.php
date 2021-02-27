
<?php 

// подключим базу даных 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
//  подключаем шапку сайта 
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
?>
   
    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">

        <!-- ::::::  Start Слайдер основных категорий  ::::::  -->
        <div class="hero hero-slider hero--1">
            <div class="swiper-wrapper">
                <!-- Start Изображения и детали ктегори -->
                <?php
                    $sql = "SELECT * FROM cat ";
                    $res = $conn-> query($sql);
                    $count = mysqli_num_rows($res);
                    for($i = 0; $i < $count; $i++) {
                    $cat = mysqli_fetch_assoc($res); 
                    ?>
                     <div class="hero-img hero-img--2 swiper-slide" style="background-image: url(assets/img/product/<?php echo $cat['photo']; ?>);">
                        <div class="hero__content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7 col-sm-10 col-12">
                                        
                                        <a href="cat-lv2.php?catid= <?php echo $cat['id']; ?> " class="btn btn--box btn--large btn--blue btn--uppercase btn--weight"><?php echo $cat['title']; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- End Изображения ктегори -->
                <?php
                }
                ?>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination hero__dots"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <!-- Add Arrows -->
                <div class="swiper-button-next hero__nav hero__nav--next"><i class="far fa-chevron-right"></i></div>
                <div class="swiper-button-prev hero__nav hero__nav--prev"><i class="far fa-chevron-left"></i></div>
            </div>
        </div> <!-- ::::::  End Слайдер основных категорий   ::::::  -->

        <!-- ::::::  Start Рекламный банер ::::::  -->
        <div class="banner banner--1">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="banner__box">
                            <a href="#" class="banner__link">
                                <img src="assets/img/banner/banner_1.jpg" alt="" class="banner__img">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="banner__box">
                            <a href="#" class="banner__link">
                                <img src="assets/img/banner/banner_2.jpg" alt="" class="banner__img">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="banner__box">
                            <a href="#" class="banner__link">
                                <img src="assets/img/banner/banner_3.jpg" alt="" class="banner__img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ::::::  End Рекламный банер ::::::  -->

        <!-- ::::::  Start Product Style - Топ категорий  ::::::  -->
        <div class="product product--1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-md-3 col-12">
                        <div class="section-content">
                            <h5 class="section-content__title">Топ продаж за последний месяц</h5>
                            <p class="section-content__desc"></p>
                        </div>
                    </div>
                    <div class="col-xl-10 col-md-9 col-12">
                        <div class="product-category-slider overflow-hidden  margin-reset">
                            <div class="swiper-wrapper">
                                <?php
                                    // получить подкатегорию товара  
                                $sql = "SELECT * FROM cat_lv2 WHERE rating >= 9 ORDER BY id LIMIT 5 ";
                                    $res = $conn-> query($sql);
                                    $count = mysqli_num_rows($res);
                                    for($i = 0; $i < $count; $i++) {
                                    $cat_lv2 = mysqli_fetch_assoc($res);    
                                    ?>
                                         <!-- Start Категория cat_lv2 -->
                                        <div class="product__box product__box--catagory  product__box--border swiper-slide text-center">
                                            <div class="product__img-box">
                                                <a href="cat.php?catlv2id= <?php echo $cat_lv2['id']; ?> " class="product__img--link">
                                                    <img class="product__img" src="assets/img/product/<?php echo $cat_lv2['photo']; ?>" alt="">
                                                </a>
                                                <a href="cat.php?catlv2id= <?php echo $cat_lv2['id']; ?> " class="product__link product__link--weight-regular m-t-30">
                                                    <?php echo $cat_lv2['title']; ?>
                                                </a>
                                            </div>
                                        </div> 
                                        <!-- End Категория cat_lv2 -->
                                    <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ::::::  End Product Style - Топ категорий   ::::::  -->
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <?php
    // подключен  footer
    include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
    ?>
</body>

</html>
