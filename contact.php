<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
?>
    
   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Главная</a></li>
                        <li class="page-breadcrumb__nav active">Контакты</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  Start  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d34195.74848296323!2d30.52700813033827!3d50.42965907340187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m0!4m5!1s0x40d4cf1e8427c6bf%3A0x70eab0a5eec761a4!2z0YPQuy4g0JDQvdGC0L7QvdC-0LLQuNGH0LAsIDc5LCDQmtC40LXQsiwgMDIwMDA!3m2!1d50.426206199999996!2d30.5158626!5e0!3m2!1sru!2sua!4v1610909894785!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="contact-info-wrap gray-bg m-t-40">
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-info-dec">
                                <a href="tel://+380 345 678 102">+380 345 678 102</a>
                                <a href="tel://+380 345 678 102">+380 345 678 102</a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-globe-asia"></i>
                            </div>
                            <div class="contact-info-dec">
                                <a href="mailto://urname@email.com">urname@email.com</a>
                                <a href="https://autoprice.com">autoprice.com</a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-dec">
                                <span>Наш Адрес</span>
                                <span>ул. Антоновича, 79, Киев, 02000</span>
                            </div>
                        </div>
                        <div class="contact-social m-t-40">
                            <div class="section-content">
                                <h5 class="section-content__title">Подписывайтесь на нас</h5>
                            </div>
                            <div class="social-link m-t-30">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
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
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form gray-bg m-t-40">
                        <div class="section-content">
                            <h5 class="section-content__title">Связаться с нами</h5>
                        </div>
                        <form class="contact-form-style" id="contact-form" action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-box__single-group">
                                        <input type="text" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="form-box__single-group">
                                        <input type="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-box__single-group">
                                        <input type="text" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box__single-group">
                                        <textarea rows="10" placeholder="Your Messege" required></textarea>
                                    </div>
                                    <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-30" type="submit">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
