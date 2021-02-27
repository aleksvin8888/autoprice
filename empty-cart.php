<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
?>
    
   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Emptycart Page</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content">
                        <h5 class="section-content__title">Your cart item</h5>
                    </div>
                    <div class="empty-cart m-t-40 text-center">
                        <div class="empty-cart-icon title--normal "><i class="fal fa-shopping-cart"></i></div>
                        <h3 class="title title--normal title--thin m-tb-30">There are no more items in your cart</h3>
                        <a href="#" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">CONTINUE SHOPPING</a>
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
