<?php 

// подключим базу даных 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
//  подключаем шапку сайта 
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
if ( isset ($_GET['catlv2id']) ) {
    
    // получить названия подкатегри 
    $sql = "SELECT * FROM cat_lv2 WHERE id=" . $_GET['catlv2id'];
    $cat_lv2 = mysqli_fetch_assoc($conn->query($sql));
    // получить названия основной категри 
    $sql_cat = "SELECT * FROM cat WHERE id=" . $cat_lv2['id_cat'];
    $cat = mysqli_fetch_assoc($conn->query($sql_cat));   
}
?>

   <!-- ::::::  Start  Br eadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="/">Главная</a></li>
                        <li class="page-breadcrumb__nav"><a href="cat-lv2.php?catid= <?php echo $cat['id']; ?> "><?php echo $cat['title']; ?></a></li>
                        <li class="page-breadcrumb__nav active"><?php echo $cat_lv2['title']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->
    
    <?php
    // Задаем кол-во отображаемых товаров а странице
    $count = 6;
    // Задаем переменной $p значение которое будет в GET запросе ?p="
    $p = isset ($_GET["p"]) ? (int) $_GET["p"] : 0;
    // Определяем с какого товара будет начинаться следующая страница
    $offset = $p * $count;
    // Выполняем поиск сообщений 
    $i = 0;
    ?>
    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <!-- Start Левое меню фильтер -->
                <div class="col-lg-3">
                  <?php
                  // подключен фильтер товаров
                  include $_SERVER['DOCUMENT_ROOT'] . '/parts/filter-product.php';
                  ?>
                </div> 
                 <!-- End Левое меню фильтер -->

                 <!-- Start Правый блок -->
                <div class="col-lg-9">
                    <!-- ::::::  Start верхний банер ::::::  -->
                    <div class="banner">
                        <div class="row">
                            <div class="col-12">
                                <div class="banner__box">
                                    <a href="#" class="banner__link">
                                        <img src="assets/img/banner/banner_2.jpg"  alt="" class="banner__img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End верхний банер  ::::::  -->

                    <!-- ::::::  Start шапка для сортировки товара   ::::::  -->
                    <div class="sort-box m-tb-30">
                        <!-- Start Sort Left Side -->
                        <div class="sort-box__left">
                            <div class="sort-box__tab">
                                <ul class="sort-box__tab-list nav">
                                    <li>
                                        <a class="sort-nav-link active" data-toggle="tab" href="#sort-grid">
                                            <i class="icon-grid"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sort-nav-link" data-toggle="tab" href="#sort-list">
                                            <i class="icon-list"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <span><?php echo $cat_lv2['title']; ?></span>
                        </div> <!-- Start Sort Left Side -->

                        <div class="sort-box__right">
                            <span>Отсортировать:</span>
                            <div class="sort-box__option">
                                <label class="select-sort__arrow">
                                    <select name="select-sort" class="select-sort">
                                        <option value="1">По рейтингу </option>
                                        <option value="2">По имени А - Я</option>
                                        <option value="3"> По имени Я - А </option>
                                        <option value="4"> Цена возростания </option>
                                        <option value="5">Цена убывания </option>

                                    </select>
                                </label>
                            </div>
                        </div>
                    </div> <!-- ::::::  Start  шапка для сортировки товара  ::::::  -->
                    <?php
                        /////Функция pagePrint(), печатает ссылку на заданую страницу  
                        ///// используеца для роботы  пагинацыи 
                        function pagePrint($page, $title, $show, $active_class = 'page-pagination__link active btn btn--gray') {
                            if($show) {
                                echo '<a class="page-pagination__link btn btn--gray" 
                                href="?do=list&page=' . $page . '&catlv2id= ' . $_GET['catlv2id'] . ' ">' . $title . '</a>';
                            } else {
                                if(!empty($active_class)) $active = 'class="' . $active_class . '"';
                                echo '<span ' . $active . '>' . $title . '</span>';
                            }
                            return false;
                        }
                    ?>
                    <div class="product-tab-area">
                        <div class="tab-content ">
                            <div class="tab-pane show active clearfix" id="sort-grid">
                              <?php
                                  // подключаем карточку товара через пагинацыю тип grid
                                  include $_SERVER['DOCUMENT_ROOT'] . "/parts/product-card-grid.php";
                                ?>
                            </div> 
                            <div class="tab-pane shop-list" id="sort-list">
                                 <?php
                                  // подключаем карточку товара через пагинацыю тип list
                                  include $_SERVER['DOCUMENT_ROOT'] . "/parts/product-card-list.php";
                                ?>
                            </div>
                        </div>    
                    </div>
                     <!-- Пагинацыя  -->
                    <div class="page-pagination">
                        <span><?php echo $cat_lv2['title']; ?></span>
                        <ul class="page-pagination__list">
                            <li  class="page-pagination__item">
                                <?php           
                                 pagePrint($page_prev, $page_setting['prev_text'], $page_setting['prev_show']);
                                ?>
                            </li>
                            <li  class="page-pagination__item">
                                <?php   
                                pagePrint(1, 1, $page_setting['first_show'], $page_setting['class_active']);
                                    if($page_left > 2) echo $page_setting['separator'];
                                    for($i = $page_left; $i <= $page_right; $i++) {
                                    $page_show = 1;
                                    if($page == $i) $page_show = 0;
                                    pagePrint($i, $i, $page_show, $page_setting['class_active']);
                                    }

                                    if($page_right < ($page_count - 1)) echo $page_setting['separator'];

                                    if($page_count != 1) pagePrint($page_count, $page_count, $page_setting['last_show'], $page_setting['class_active']);
                                ?>
                            </li>
                            <li  class="page-pagination__item">
                                <?php 
                                     pagePrint($page_next, $page_setting['next_text'], $page_setting['next_show']);
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>  <!-- End Правый блок -->
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

 <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";

//  <!-- Start Модальное окно добавить в корзину --> 
include $_SERVER['DOCUMENT_ROOT'] . "/parts/modal/modalAddCart.php";

// <!-- Start модальное окно быстрого просмотра товаров -->
include $_SERVER['DOCUMENT_ROOT'] . "/parts/modal/modalQuickView.php";

?>

