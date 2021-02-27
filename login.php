<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';




?>

<!-- ::::::  Start  Breadcrumb Section  ::::::  -->
<div class="page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="page-breadcrumb__menu">
                    <li class="page-breadcrumb__nav"><a href="#">Главная</a></li>
                    <li class="page-breadcrumb__nav active">Войти </li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

<!-- ::::::  Start  основной контент страницы   ::::::  -->
<main id="main-container" class="main-container">
    <div class="container">
        <div class="row">
           <div class="col-12">
                <div class="login-register-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                                <div class="login-register-wrapper">
                                    <!-- заголовки для форм   -->
                                    <div class="login-register-tab-list nav">
                                        <a class="active" 
                                         data-toggle="tab" href="#lg1">
                                            <h4>АВТОРИЗАЦИЯ</h4>
                                        </a>
                                        <a  data-toggle="tab" href="#lg2">
                                            <h4>РЕГИСТРАЦИЯ</h4>
                                        </a>
                                    </div>
                                    <!-- END заголовки для форм   -->
                                    <div class="tab-content">
                                        <div id="lg1" class="tab-pane active">
                                            <?php
                                                if (isset($_GET['incorrectLogin'])) {
                                                    ?><p>ОШЫБКА неверный <?php echo $_GET['incorrectLogin']; ?> или пароль ..... </P> 
                                                <?php   
                                                } elseif (isset($_GET['error1'])) {
                                                    ?><p> ОШЫБКА поля не должны остваваца пустыми</p><?php
                                                } elseif (isset($_GET['error2'])) {
                                                        ?><p>ОШЫБКА пользователь с email <?php echo $_GET['error2']; ?> уже зарегистрирован </p><?php
                                                } elseif (isset($_GET['confirmation'])) {
                                                        ?><p>Регистраця удачна на ваш email <?php echo $_GET['confirmation']; ?> высланы инструкцыи для подтверждения регистрацыи  </p><?php
                                                } elseif (isset($_GET['error3'])) {
                                                        ?><p>ОШЫБКА связи с базой даных </p><?php
                                                } elseif (isset($_GET['verification_Сompleted'])) {
                                                    ?><p>email удачно подвержден  </p><?php
                                                } elseif (isset($_GET['verification_error'])) {
                                                    ?><p>ОШЫБКА подтверждения email / или вы уже подтвердили email  </p>
                                                    <a href="#" >отправить повторно</a><?php
                                                }
                                            ?>
                                            <div class="login-form-container">
                                                <div class="login-register-form">
                                                    <!-- Форма для авторизацыи   -->
                                                    <form action="modules/php/user/authorization.php" method="POST">
                                                        <div class="form-box__single-group">
                                                            <input type="text" name="email" placeholder="email">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <input type="password" name="password" placeholder="password">
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-wrap m-tb-20">
                                                            <label for="account-remember">
                                                                <input type="checkbox" name="remember" id="account-remember">
                                                                <span>ЗАПОМНИТЬ</span>
                                                            </label>
                                                            <a class="link--gray" href="">ЗАБЫЛИ ПАРОЛЬ?</a>
                                                        </div>
                                                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">ВОЙТИ</button>
                                                    </form>
                                                     <!-- END Форма для авторизацыи   -->
                                                </div>
                                            </div>
                                        </div>
                                        <div id="lg2" class="tab-pane">
                                            <div class="login-form-container">
                                                <div class="login-register-form">
                                                     <!-- Форма для регистрацыи   -->
                                                    <form action="modules/php/user/registration.php" method="POST">
                                                        <div class="form-box__single-group">
                                                            <input type="text" name="username" placeholder="username">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <input type="email" name="email" placeholder="email">
                                                        </div>
                                                        <div class="form-box__single-group m-b-20">
                                                            <input type="password" name="password" placeholder="password">
                                                        </div>
                                                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">ПОДТВЕРДИТЬ</button>
                                                    </form>
                                                     <!-- END Форма для регистрацыи  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</main> <!-- ::::::  End  Main Container Section  ::::::  -->

<?php
// подключен  footer
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>
<!-- material-scrolltop button -->
<button class="material-scrolltop" type="button"></button>






</body>

</html>
