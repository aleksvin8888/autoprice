<?php

///Начальный конфиг
$page_setting = [
    'limit' => 9, // кол-во записей на странице
    'show'  => 5, // 5 до текущей и после
    'prev_show' => 0, // не показывать кнопку "предыдущая"
    'next_show' => 0, // не показывать кнопку "следующая"
    'first_show' => 0, // не показывать ссылку на первую страницу
    'last_show' => 0, // не показывать ссылку на последнюю страницу
    'prev_text' => '<i class="icon-chevron-left">Previous</i>',
    'next_text' => '<i class="icon-chevron-right">Next</i>',
    'class_active' => 'page-pagination__link active btn btn--gray',
    'separator' => ' ... ',
];

// Поверка, есть ли GET запрос
if (isset($_GET['page'])) {
    // Если да то переменной $page присваиваем его
    $page = (int) $_GET['page'];
} else { // Иначе
    // Присваиваем $pageno один
    $page = 1;
}

////выборки данных из базы
$start = ($page-1)*$page_setting['limit'];
$sql_prod = "SELECT * FROM product WHERE id_cat_lv2= '" . $_GET['catlv2id'] . "' LIMIT {$start},{$page_setting['limit']}";
$res_prod = $conn->query($sql_prod);
$count_prod = mysqli_num_rows($res_prod);
// проверка  или в базе  есть товар Выбраной категори 
if ($count_prod === 0 ) {
    ?>
        <div class="product__box product__box--default product__box--border-hover text-center float-left float-3">
            <p>
                Товар в выбраной категори временно недоступен 
                подпишытесь на россылку новостей о нашей компани 
                Ваше мнения очень важно для нас.
            </p>
        </div>
    <?php
} else {
    while ( $product = mysqli_fetch_assoc($res_prod) ) { 
    // подключаем карточку товара  тип  ПЛИТКА
       
        // получить фото товара
        $sqlf = "SELECT path FROM img WHERE 
        ( id_produckt='" . $product['id'] . "' )
         ORDER BY id LIMIT 1 ";
         $resalt_f = $conn->query($sqlf);
         $foto = mysqli_fetch_assoc($resalt_f);

    ?>
        <div class="product__box product__box--default product__box--border-hover text-center float-left float-3">
            <span class="text-reference">Код товара - <?php echo $product['id'] ?></span>
            <div class="product__img-box">
                <a href="single-1.php?prod_id= <?php echo $product['id'] ?>" class="product__img--link">
                    <img class="product__img" src="assets/img/product/<?php echo $foto['path'] ?>" alt="">
                </a>


                <a  href="#"  data-toggle="modal" data-id="<?php echo $product['id'] ?>"
                    onclick="openModalAddCart(this), addToBasket(this)" 
                    class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Купить</a>


                <a href="wishlist.php?prod_id= <?php echo $product['id'] ?>" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                

            </div>
            <div class="product__price m-t-10">
                
                <span class="product__price-reg"><?php echo $product['price'] ?>  грн.</span>
            </div>
            <a href="single-1.php?prod_id= <?php echo $product['id'] ?>" class="product__link product__link--underline product__link--weight-light m-t-15">
                <?php echo $product['title'] ?>
            </a>
            <div >
                <p>Краткие характеристики </p>
                <ul class="shop__list-link">
                    <?php   
                        $type = mysqli_fetch_assoc($conn->query("SELECT title FROM type 
                                WHERE id=" . $product['id_type']));
                        $standard_size = mysqli_fetch_assoc($conn->query("SELECT title FROM standard_size 
                                WHERE id=" . $product['id_standart_size']));   
                        $manufacturer = mysqli_fetch_assoc($conn->query("SELECT title FROM manufacturer
                                WHERE id=" . $product['id_manufacturer']));
                    ?>
                    <li >
                        <span class="text-reference">Тип - <?php echo $type['title'] ?></span>
                    </li>
                    <li>
                        <span class="text-reference">Типорозмер - <?php echo $standard_size['title'] ?></span>
                    </li>
                    <li>
                        <span class="text-reference">Производитель - <?php echo $manufacturer['title'] ?></span>
                    </li>
                  
                </ul>
            </div>
        </div> 
        <?php
    }
}

//// Подсчет кол-ва страниц и проверка основных условий
$res = $conn->query("SELECT count(*) AS count FROM product WHERE id_cat_lv2= '" . $_GET['catlv2id'] . "' ");
$row = mysqli_fetch_assoc($res);
$page_count = ceil($row['count'] / $page_setting['limit']); // кол-во страниц
$page_left = $page - $page_setting['show']; // находим левую границу
$page_right = $page + $page_setting['show']; // находим правую границу
$page_prev = $page - 1; // узнаем номер предыдушей страницы
$page_next = $page + 1; // узнаем номер следующей страницы
if($page_left < 2) $page_left = 2; // левая граница не может быть меньше 2, так как 2 - первое целое число после 1
if($page_right > ($page_count - 1)) $page_right = $page_count - 1; // правая граница не может ровняться или быть больше, чем всего страниц
if($page > 1) $page_setting['prev_show'] = 1; // если текущая страница не первая, значит существует предыдущая
if($page != 1) $page_setting['first_show'] = 1; // показываем ссылку на первую страницу, если мы не на ней
if($page < $page_count) $page_setting['next_show'] = 1; // если текущая страница не последняя, значит существуюет следующая
if($page != $page_count) $page_setting['last_show'] = 1;
?>


