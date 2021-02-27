<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/configs/configs.php";
include $_SERVER['DOCUMENT_ROOT'] . "/modules/telegram/send-message.php";

    if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {

        $sql_user = "SELECT * FROM user WHERE name LIKE '" . $_POST["fname"] . "' AND email LIKE '" . $_POST["email"] . "'";
        $user_id = 0;
        $result_user = $conn->query($sql_user);

        if($result_user->num_rows > 0) {
            $user = mysqli_fetch_assoc($result_user);
            $user_id = $user["id"];
        } else {
            $sql = "INSERT INTO user (name, email) VALUES ('" . $_POST["fname"] . "', '" . $_POST["email"] . "')";
            if($conn->query($sql)) {
                echo "User added!";
                // Переменная $user_id = id пользователя
                $user_id = $conn->insert_id;
            } else {
                /* echo "Error: " . $sql . "<br>" . $conn->error; */
            }
        }

        $sql_order = "INSERT INTO `orders` (`user_id`, `first_name`, `last_name`, `shipping_method`, `delivery_service`, `address`, `region_state`, `zip_postal_code`, `phone`, `email`, `product_name`)
         VALUES ('" . $user_id . "', '" . $_POST["fname"] . "', '" . $_POST["lname"] . "', '" . $_POST["smethod"] . "', '" . $_POST["dservice"] . "', '"
          . $_POST["adress"] . "', '" . $_POST["state"] . "', '" . $_POST["pcode"] . "', '" . $_POST["phone"] . "', '" . $_POST["email"] . "', '" . $_COOKIE["basket"] . "');";
        if($conn->query($sql_order)) {
            //header("Location: /");
            // Очищаем куки
            setcookie("basket", "", 0, "/");
            setcookie("countBasket", "", 0, "/");
            // Выводим на экран "Заказ оформлен"
            echo "<h2>Заказ оформлен</h2> <br/>
            <a href='/'> На главную </a>";

            message_to_telegram('Ваш заказ оформлен!');
            
        }
    }
   
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';

?>

   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="/index.php">Главная</a></li>
                        <li class="page-breadcrumb__nav active">Подтверждение заказа</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <!-- Start Client Shipping Address -->
                <div class="col-lg-7">
                    <div class="section-content">
                        <h5 class="section-content__title">Информация для заказа</h5>
                    </div>
                    <form action="#" method="post" class="form-box">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-first-name">Имя</label>
                                    <input type="text" id="form-first-name" name="fname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-last-name">Фамилия</label>
                                    <input type="text" id="form-last-name" name="lname" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-company-name">* Метод доставки</label>
                                    <select id="form-country" name="smethod">
                                        <option value="0" selected>Выберите метод доставки</option>
                                        <option value="Самовывоз">Самовывоз</option>
                                        <option value="Предоплата">Предоплата</option>
                                        <option value="При получении">При получении</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-country">* Служба доставки</label>
                                    <select id="form-country" name="dservice">
                                        <option value="0" selected>Выберите службу доставки</option>
                                        <option value="Новая Почта">Новая Почта</option>
                                        <option value="Укрпочта">Укрпочта</option>
                                        <option value="Интайм">Интайм</option>
                                        <option value="Деливери">Деливери</option>
                                        <option value="Мист Экспресс">Мист Экспресс</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-address-1">Адресс</label>
                                    <input type="text" id="form-address-1" placeholder="House number and street name" name="adress" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-state">* Город</label>
                                    <input type="text" id="form-state" name="state">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode">* Почтовый индекс</label>
                                    <input type="text" id="form-zipcode" name="pcode">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-phone">Телефон</label>
                                    <input type="tel" id="form-phone" name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-email">Электронная почта</label>
                                    <input type="email" id="form-email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="m-tb-20">
                                    <label for="check-account">
                                        <input type="checkbox" name="check-account" class="creat-account"  id="check-account">
                                        <span>Создать новый аккаунт?</span>
                                    </label>
                                    <div class="toogle-form open-create-account">
                                        <div class="form-box__single-group">
                                            <label for="form-email-new-account">Email Address</label>
                                            <input type="email" id="form-email-new-account">
                                        </div>
                                        <div class="form-box__single-group">
                                            <label for="form-password-new-account">Email Address</label>
                                            <input type="password" id="form-password-new-account">
                                        </div>
                                        <div class="from-box__buttons m-t-25">
                                            <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">Зарегистрироваться</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <h6>Additional information</h6>
                                    <label for="form-additional-info">Order notes</label>
                                    <textarea  id="form-additional-info" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div> 
                        </div>
                        <button class="btn btn--block btn--small btn--blue btn--uppercase btn--weight" type="submit">Подтвердить заказ</button>
                    </form> 
                </div> <!-- End Client Shipping Address -->
                
                <!-- Start Order Wrapper -->
                <div class="col-lg-5">
                    <div class="your-order-section">
                        <div class="section-content">
                            <h5 class="section-content__title">Your order</h5>
                        </div>
                        <div class="your-order-box gray-bg m-t-40 m-b-30">
                            <div class="your-order-product-info">
                                <div class="your-order-top d-flex justify-content-between">
                                    <h6 class="your-order-top-left">Product</h6>
                                    <h6 class="your-order-top-right">Total</h6>
                                </div>
                                <ul class="your-order-middle">
                                    <li class="d-flex justify-content-between">
                                        <span class="your-order-middle-left">Product Name X 1</span>
                                        <span class="your-order-middle-right">$329</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <span class="your-order-middle-left">Product Name X 1</span>
                                        <span class="your-order-middle-right">$329</span>
                                    </li>
                                </ul>
                                <div class="your-order-bottom d-flex justify-content-between">
                                    <h6 class="your-order-bottom-left">Shipping</h6>
                                    <span class="your-order-bottom-right">Free shipping</span>
                                </div>
                                <div class="your-order-total d-flex justify-content-between">
                                    <h5 class="your-order-total-left">Total</h5>
                                    <h5 class="your-order-total-right">$329</h5>
                                </div>
    
                                <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel payment-accordion">
                                                <div class="panel-heading" id="method-one">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#method1" aria-expanded="false" class="collapsed">
                                                            Direct bank transfer
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="method1" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel payment-accordion">
                                                <div class="panel-heading" id="method-two">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method2" aria-expanded="false">
                                                            Check payments
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="method2" class="panel-collapse collapse" >
                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel payment-accordion">
                                                <div class="panel-heading" id="method-three">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method3" aria-expanded="false">
                                                            Cash on delivery
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="method3" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div> <!-- End Order Wrapper -->
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
    ?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>
    

  
</body>

</html>
