<?php

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "add";
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_POST["add_cat"]) && isset($_POST["title"]) && $_POST["title"] != "") {

  $sql = "INSERT INTO cat (title) VALUES ('" . $_POST["title"] . "')";
  if($conn->query($sql)) {
    header("Location: /admin/category.php");
  }

}

?>

<!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="http://autoprice.local/admin/category.php">КАТЕГОРИИ</a></li>
                        <li class="page-breadcrumb__nav active">Страница изменения категорий</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Новая категория</h4>
                   </div>
                     <div class="card-body">
                      <form method="POST">
                       <div class="row">
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Название</label>
                           <input type="text" name="title" class="form-control" placeholder="Enter Product Name">
                            </div>
                             </div>
                              </div> 
                                            <button type="submit" name="add_cat" value ="1" class="btn btn-success btn-fill pull-right">Добавить категорию</button>
                                        <div class="clearfix"></div>
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>     
   
