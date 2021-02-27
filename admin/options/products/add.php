<?php

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "add";
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_POST["add_product"]) && isset($_POST["title"]) && isset($_POST["brand"]) && isset($_POST["prise"]) && isset($_POST["cat_id"]) && isset($_POST["descriptions"]) && $_POST["title"] != "" && $_POST["brand"] != "" && $_POST["prise"] != "" && $_POST["cat_id"] != "" && $_POST["descriptions"] != "") {

  $sql = "INSERT INTO product (title, brand, prise, cat_id, descriptions) VALUES ('" . $_POST["title"] . "', '" . $_POST["brand"] . "', '" . $_POST["prise"] . "', '" . $_POST["cat_id"] . "', '" . $_POST["descriptions"] . "')";
  if($conn->query($sql)) {
    header("Location: /admin/products.php");
  }

}

?>

 <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="http://autoprice.local/admin/products.php">ТОВАРЫ</a></li>
                        <li class="page-breadcrumb__nav active">Страница добавления товара</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Добавить товар</h4>
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
                               <div class="row">
                                <div class="col-md-12">
                                 <div class="form-group">
                                  <label>Марка</label>
                                   <textarea type="text" name="brand" class="form-control" placeholder="Enter Product Description"></textarea>
                                    </div>
                                     </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-12">
                                         <div class="form-group">
                                          <label>Цена</label>
                                           <textarea type="text" name="prise" class="form-control" placeholder="Enter Product Content"></textarea>
                                            </div>
                                             </div>
                                              </div>
                                               <div class="row">
                                                <div class="col-md-12">
                                                 <div class="form-group">
                                                  <label>Категория</label>
                                                   <select name="cat_id" class="form-control">
                                                   <option value="0">Не выбрано</option>
                                                      <?php
                                                         $sql = "SELECT * FROM cat";
                                                         $result = $conn->query($sql);
                                                         while ($row = mysqli_fetch_assoc($result)) {
                                                             echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                                                         }
                                                      ?>
                                                   </select>
                                                    </div>
                                                    </div>
                                                     </div>
                                                      <div class="row">
                                                       <div class="col-md-12">
                                                       <div class="form-group">
                                                        <label>Описание</label>
                                                         <textarea name="descriptions" class="form-control" placeholder="Comments"></textarea>
                                                         </div>
                                                          </div>
                                                          </div>
                                            <button type="submit" name="add_product" value ="1" class="btn btn-success btn-fill pull-right">Добавить новый товар</button>
                                        <div class="clearfix"></div>
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>     
   
