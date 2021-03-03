<?php 

// подключим базу даных 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <title>AutoSound</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/vendor/fontawesome.css">
    <link rel="stylesheet" href="assets/css/vendor/plaza-icon.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <!-- Plugin CSS Files -->
    <link rel="stylesheet" href="assets/css/plugin/swiper.min.css">
    <link rel="stylesheet" href="assets/css/plugin/material-scrolltop.css">
    <link rel="stylesheet" href="assets/css/plugin/price_range_style.css">
    <link rel="stylesheet" href="assets/css/plugin/in-number.css">
    <link rel="stylesheet" href="assets/css/plugin/venobox.min.css">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css"/>
    <link rel="stylesheet" href="assets/css/plugin/plugins.min.css"/>
    <link rel="stylesheet" href="assets/css/main.min.css"> -->

    <!-- Main Style CSS File -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body style="background-color: #57bfe694">
    <!-- ::::::  Раздел начального заголовка  ::::::  -->
    <header >
        <!-- ::::::  Начало верхня часть header  ::::::  -->
        <div class="header header--1">
            <!-- Начальный заголовок Верхняя область -->
            <div class="header__top header__top--style-1">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header__top-content">
                                <div class="header__top-content--left">
                                    <div class="contact_cms">
                                        <span class="cms1">контактный телефонный</span>
                                        <span class="cms2">+38 097 77 77 777</span>
                                    </div>
                                </div>
                                <div class="header__top-content--right">
                                    <!-- меню пользователя -->
                                    <div class="user-info user-set-role">
                                        <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true">
                                            меню
                                         <i class="fal fa-chevron-down"></i>
                                        </a>
                                        <ul class="expand-dropdown-menu dropdown-menu">
                                            <li><a href="contact.php" >Связаться с нами</a></li>
                                            <li><a href="about.php" >О нас</a></li>
                                            <li><a href="#">резерв 1</a></li>
                                            <li><a href="#">резерв 2</a></li>
                                            <li><a href="#">резерв 3</a></li>
                                            <li><a href="#">резерв 4</a></li>
                                        </ul>
                                    </div> <!-- конец меню пользователя -->
                                    <!-- меню валют -->
                                    <div class="user-currency user-set-role">
                                        <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true">USD $<i class="fal fa-chevron-down"></i></a>
                                        <ul class="expand-dropdown-menu dropdown-menu">
                                            <li><a href="#">USD $</a></li>
                                            <li><a href="#">EURO €</a></li>
                                        </ul>
                                    </div>  <!--   конец меню валют -->
                                    <!-- меню  изменить язык сайта-->
                                    <div class="user-info user-set-role">
                                        <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true"> <img src="assets/img/icon/flag/icon_usa.png" alt="">USA <i class="fal fa-chevron-down"></i></a>
                                        <ul class="expand-dropdown-menu dropdown-menu">
                                            <li><a href="#"><img src="assets/img/icon/flag/icon_usa.png" alt="">English</a></li>
                                            <li><a href="#"><img src="assets/img/icon/flag/icon_france.png" alt=""> Français</a></li>
                                        </ul>
                                    </div>  <!-- конец  меню  изменить язык сайта-->

                                    <div class="user-info user-set-role">
                                        <?php
                                    // Если существует переменная $_COOKIE["user_id"] (Пользователь в системе)
                                    if(isset($_COOKIE["user_id"])) {
                                        $sql = "SELECT * FROM user WHERE id =" . $_COOKIE["user_id"];
                                        // выполнить sql запрос в базе данных
                                        $result = $conn->query($sql);
                                        $user = mysqli_fetch_assoc($result);
                                    ?>
                                    <!-- выводми меню пользователя и доступ в кабинет -->
                                            <a href="logout.php" data-toggle="dropdown" aria-haspopup="true"class="user-set-role__button">
                                                 <?php echo $user["name"]; ?> &#187;
                                             <i class="fal fa-chevron-down"></i>
                                            </a>
                                            <ul class="expand-dropdown-menu dropdown-menu">
                                                <li><a href="my-account.php">мой кабинет</a></li>
                                                <li><a href="wishlist.php">мои избраные</a></li>
                                                <li><a href="checkout.php">подтвердить заказ</a></li>
                                                <li><a href="cart.php">корзина</a></li>
                                                <li><a href="modules/php/user/userlogout.php">ВЫЙТИ</a></li>
                                            </ul>
                                      
                                    <?php
                                    // если нет $_COOKIE["user_id"] значит пользователь не  
                                    // авторизирован выведем кнопку для входа 
                                    } else {
                                    ?>
                                        
                                        <li >
                                            <a href="/login.php" 
                                                class="user-set-role__button">
                                                Войти
                                            </a>
                                        </li> 
                                    <?php

                                    }
                                    ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--конец  Начальный заголовок Верхняя область -->

            <!-- Средняя область начального заголовка -->
            <div class="header__middle header__top--style-1 p-tb-30">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- логотип  сайта  -->
                        <div class="col-lg-3">
                            <div class="header__logo">
                                <a href="index.php" class="header__logo-link">
                                    <img src="assets/img/logo/logo1.jpg" alt="" class="header__logo-img">
                                </a>
                            </div>
                        </div>   <!-- конец  логотипа  сайта  -->
                        <div class="col-lg-9">
                            <div class="row align-items-center">
                                <div class="col-lg-10">
                                     <!-- форма   поиска  товаров   -->
                                    <form class="header__search-form" action="#">
                                        <div class="header__search-category">
                                            <select class="bootstrap-select" name="poscats">
                                                <option value="0">Все категории</option>
                                                
                                            </select>
                                        </div>
                                        <div class="header__search-input">
                                            <input type="search" placeholder="введите ваш поисковой запрос">
                                            <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit">Поиск</button>
                                        </div>
                                    </form>  <!-- конец  формы   поиска  товаров   -->
                                </div>
                                <!-- иконки  корзины  и  избраных товаров    -->
                                <div class="col-lg-2">
                                    <div class="header__wishlist-box">
                                        <?php
                                            if(isset($_COOKIE['countWish'])){
                                                $countWish = $_COOKIE['countWish'];
                                            }else{
                                                $countWish =0;
                                            }
                                        ?>
                                        <!-- Поле со списком желаний для начального заголовка-->
                                        <div class="header__wishlist pos-relative">
                                            <a id="go-wishlist" href="wishlist.php" class="header__wishlist-link"><i class="icon-heart"></i>
                                                <span class="wishlist-item-count pos-absolute">
                                                    <?php echo $countWish?>
                                                </span>
                                            </a>
                                        </div> <!-- End Поле со списком желаний для начального заголовка -->
                                         <?php 
                                              if (isset($_COOKIE['basket'])) {
                                                $arrayBasket = json_decode($_COOKIE['basket'], true);
                                                $countProduct = count($arrayBasket['basket']); 
                                              } else {
                                                $countProduct = "0";
                                              }
                                         ?>
                                        <!-- Добавить в корзину -->
                                        <div class="header-add-cart pos-relative m-l-40">
                                            <a id="go-basket"
                                             href="#offcanvas-add-cart__box"
                                             
                                              class="offcanvas-toggle">
                                                <i class="icon-shopping-cart"></i>
                                                <span class="wishlist-item-count pos-absolute">
                                                    <?php echo $countProduct?>
                                                </span>
                                            </a>
                                        </div> <!-- End Добавить корзину-->
                                    </div>
                                </div>    <!-- конец  иконки  корзины  и  избраных товаров    -->
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Средняя область начального заголовка -->

            <!--Область меню начального заголовка -->
            <div class="header-menu">
                <div class="container">
                    <div class="row col-12">
                        <nav>
                            <ul class="header__nav">                              
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="index.php" class="header__nav-link">Главная </a>    
                                </li> <!-- End Single Nav link-->
                                 <!--Start Каталог товаров -->
                                <li class="header__nav-item pos-relative">
                                    <!-- заголовок -->
                                    <a href="#" class="header__nav-link">Каталог товаров<i class="icon-chevron-down"></i></a>

                                    <!-- Выводим список категорий товаров -->
                                    <ul class="dropdown__menu pos-absolute">
                                        <?php
                                            $sql_title = "SELECT * FROM cat ";
                                            $res_title = $conn-> query($sql_title);
                                            $count_title = mysqli_num_rows($res_title);
                                            for($i = 0; $i < $count_title; $i++) {
                                                $cat_title = mysqli_fetch_assoc($res_title);
                                                ?>
                                                <li class="dropdown__list">
                                                    <a href="cat-lv2.php?catid= <?php echo $cat_title['id']; ?> " class="dropdown__link">
                                                        <?php echo $cat_title['title']; ?>
                                                    </a>
                                                    <ul class="dropdown__submenu pos-absolute">
                                                        <?php
                                                        // запрос для получения подкатегори cat_lv2
                                                        $sql_lv2 = "SELECT * FROM cat_lv2
                                                                 WHERE id_cat=" . $cat_title['id']; 
                                                        $res_lv2 = $conn-> query($sql_lv2);
                                                        while ( $cat_lv2 = mysqli_fetch_assoc($res_lv2) ) {
                                                            ?>
                                                            <li class="dropdown__submenu-list">
                                                                 <a href="cat.php?catlv2id= <?php echo $cat_lv2['id']; ?>" class="dropdown__submenu-link">
                                                                 <?php echo $cat_lv2['title']; ?>
                                                                </a>
                                                            </li>
                                                           <?php
                                                       }
                                                        ?>
                                                    </ul>
                                                </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                    <!--End списокa категорий товаров -->
                                </li> <!-- End Каталог товаров-->
                                <li class="header__nav-item pos-relative">
                                     <a href="#" class="header__nav-link">Акцыи</a>
                                </li> 
                                <li class="header__nav-item pos-relative">
                                     <a href="#" class="header__nav-link">Сезонное предложения</a>
                                </li> 
                                
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> <!-- End Область меню начального заголовка -->
        </div> <!-- ::::::  конец верхня часть header  ::::::  -->
        
        <!-- ::::::  Запустить раздел мобильного заголовка ДЛЯ АДАПТИВА  ::::::  -->
        <div class="header__mobile mobile-header--1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="header__mobile-top">
                            <!-- Start Блгок логотипа -->
                            <div class="mobile-header__logo">
                                <a href="index.php" class="mobile-header__logo-link">
                                    <img src="assets/img/logo/logo1.jpg" alt="" class="mobile-header__logo-img">
                                </a>
                            </div>
                            <div class="header__wishlist-box">
                                <!-- Start иконка для избраных товаров -->
                                 <?php
                                    if(isset($_COOKIE['countWish'])){
                                        $countWish = $_COOKIE['countWish'];
                                    }else{
                                        $countWish =0;
                                    }
                                ?>
                                <div class="header__wishlist pos-relative">
                                    <a href="wishlist.php" class="header__wishlist-link">
                                        <i class="icon-heart"></i>
                                        <span class="wishlist-item-count pos-absolute"><?php echo $countWish?></span>
                                    </a>
                                </div> <!-- End иконка для избраных товаров -->

                                <!-- Start иконка корзины-->
                                <?php 
                                    if (isset($_COOKIE['basket'])) {
                                        $arrayBasket = json_decode($_COOKIE['basket'], true);
                                        $countProduct = count($arrayBasket['basket']); 
                                    } else {
                                        $countProduct = "0";
                                    }
                                ?>
                                <div class="header-add-cart pos-relative m-l-20">
                                    <a  href="#offcanvas-add-cart__box"

                                    class="header__wishlist-link offcanvas--open-checkout offcanvas-toggle">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="wishlist-item-count pos-absolute"> 
                                            <?php echo $countProduct?>  
                                        </span>
                                    </a>
                                </div> <!-- End иконка корзины -->

                                <a href="#offcanvas-mobile-menu" class="offcanvas-toggle m-l-20"><i class="icon-menu"></i></a>

                            </div>
                        </div> <!-- End Header Mobile Top area -->

                        <!-- Start Header роздел поиска по сайту -->
                        <div class="header__mobile-middle header__top--style-1 p-tb-10">
                            <form class="header__search-form" action="#">
                                <div class="header__search-category header__search-category--mobile">
                                    <select class="bootstrap-select">
                                       
                                    </select>
                                </div>
                                <div class="header__search-input header__search-input--mobile">
                                    <input type="search" placeholder="Enter your search">
                                    <button class="btn btn--submit btn--blue btn--uppercase btn--weight" type="submit"><i class="fal fa-search"></i></button>
                                </div>
                            </form>
                        </div> <!-- End Header роздел поиска по сайту  -->

                    </div>
                </div>
            </div>
        </div> <!-- :::::: конец раздел мобильного заголовка  ::::::  -->

        <!-- ::::::  Start Mobile-offcanvas Menu Section  ::::::  -->
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <button class="offcanvas__close offcanvas-close">&times;</button>
            <div class="offcanvas-inner">
                <div class="offcanvas-userpanel m-b-30">
                    <ul>
                         <?php
                            // Если существует переменная $_COOKIE["user_id"] (Пользователь в системе)
                            if(isset($_COOKIE["user_id"])) {
                                $sql = "SELECT * FROM user WHERE id =" . $_COOKIE["user_id"];
                                $result = $conn->query($sql);
                                $user = mysqli_fetch_assoc($result);
                        ?>
                        <li class="offcanvas-userpanel__role">
                            <a href="#"><?php echo $user["name"]; ?></a>
                            <ul class="user-sub-menu">
                                <li><a href="my-account.php">мой кабинет</a></li>
                                <li><a href="wishlist.php">мои избраные</a></li>
                                <li><a href="checkout.php">подтвердить заказ</a></li>
                                <li><a href="cart.php">корзина</a></li>
                                <li><a href="modules/php/user/userlogout.php">ВЫЙТИ</a></li>
                            </ul>
                        </li>
                        <?php
                        } else {
                            ?>
                                <li><a href="/login.php">Войти</a></li> 
                            <?php
                            }
                            ?>   
                        
                        <li class="offcanvas-userpanel__role">
                            <a href="#">меню</a>
                            <ul class="user-sub-menu">
                                <li><a href="contact.php" >Связаться с нами</a></li>
                                <li><a href="about.php" >О нас</a></li>
                                <li><a href="#">резерв 1</a></li>
                                <li><a href="#">резерв 2</a></li>
                                <li><a href="#">резерв 3</a></li>
                                <li><a href="#">резерв 4</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-userpanel__role">
                            <a href="#">USD $</a>
                            <ul class="user-sub-menu">
                                <li><a href="#">USD $</a></li>
                                <li><a href="#">EURO €</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-userpanel__role">
                            <a href="#"><img src="assets/img/icon/flag/icon_usa.png" alt="">English </a>
                            <ul class="user-sub-menu">
                                <li><a href="#"><img src="assets/img/icon/flag/icon_usa.png" alt="">English</a></li>
                                <li><a href="#"><img src="assets/img/icon/flag/icon_france.png" alt=""> Français</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-menu m-b-30">
                    <h4>Меню</h4>
                    <ul>
                        <li>
                            <a href="index.php"><span>Главная</span></a>
                        </li>
                        <li>
                            <a href="#"><span>Каталог товаров</span></a>
                            <ul class="sub-menu">
                                <?php
                                    $sql_title = "SELECT * FROM cat ";
                                    $res_title = $conn-> query($sql_title);
                                    $count_title = mysqli_num_rows($res_title);
                                    for($i = 0; $i < $count_title; $i++) {
                                        $cat_title = mysqli_fetch_assoc($res_title);
                                ?>
                                        <li>
                                            <a href="cat-lv2.php?catid= <?php echo $cat_title['id']; ?> ">
                                                <?php echo $cat_title['title']; ?>
                                            </a>
                                            <ul class="sub-menu" >
                                                <?php
                                                // запрос для получения подкатегори cat_lv2
                                                $sql_lv2 = "SELECT * FROM cat_lv2
                                                         WHERE id_cat=" . $cat_title['id']; 
                                                $res_lv2 = $conn-> query($sql_lv2);
                                                while ( $cat_lv2 = mysqli_fetch_assoc($res_lv2) ) {
                                                    ?>
                                                    <li >
                                                         <a  href="cat.php?catlv2id= <?php echo $cat_lv2['id']; ?>" >
                                                         <?php echo $cat_lv2['title']; ?>
                                                        </a>
                                                    </li>
                                                   <?php
                                               }
                                                ?>
                                            </ul>
                                        </li>
                                <?php
                                    }
                                ?>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="#" >Акцыи</a>
                        </li>
                        <li>
                            <a href="#" >Сезонное предложения</a>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-buttons m-b-30">
                    <a href="my-account.php" class="user"><i class="icon-user"></i></a>
                    <a href="wishlist.php"><i class="icon-heart"></i></a>
                    <a href="cart.php"><i class="icon-shopping-cart"></i></a>
                </div>
                <div class="offcanvas-social">
                    <span>Stay With Us</span>
                    <ul>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- ::::::  End Mobile-offcanvas Menu Section  ::::::  -->

         <!-- ::::::  Start Правый модальное окно для корзины  ::::::  -->
         <?php
         include $_SERVER['DOCUMENT_ROOT'] . '/parts/modal/offcanvas-add-cart__box.php';
         ?>
        <!-- :::::: End Правый модальное окно для корзины  :::::: -->

        <div class="offcanvas-overlay"></div>
    </header> <!-- ::::::  End  Header Section  ::::::  -->