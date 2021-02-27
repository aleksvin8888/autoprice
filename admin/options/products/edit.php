<?php
include '../../../configs/db.php';

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_GET["id"]) && isset($_POST["title"]) && isset($_POST["brand"]) && isset($_POST["prise"]) && isset($_POST["cat_id"]) && isset($_POST["descriptions"])) {

  $sql = "UPDATE product SET title = '" . $_POST['title'] . "', brand = '" . $_POST['brand'] . "', prise = '" . $_POST['prise'] . "', cat_id = '" . $_POST['cat_id'] . "', descriptions = '" . $_POST['descriptions'] . "' WHERE product.id =" . $_GET['id'];
  if($conn->query($sql)) {
    header("Location: /admin/products.php");
  }
  }
?>
<!DOCTYPE html>
<html>
<head>


 <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="http://autoprice.local/admin/products.php">ТОВАРЫ</a></li>
                        <li class="page-breadcrumb__nav active">Страница изменения товара</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

<link rel="stylesheet" href="/css/bootstrap.min.css" />
    <title>Add</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Autoprice</a>
  </div>
</nav>  
<div class="container">
    <div class="row m-2">
       <div class="content">
        <div class="container-fluid">
          <?php
            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);
             if(isset($_GET['id'])) {
            while ($row = mysqli_fetch_assoc($result)) {
              if($_GET['id'] == $row['id']) {
                $product = $row;
              }
              }  
            }
          ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Изменить товар</h4>
                   </div>
                     <div class="card-body">
                      
                      <form method="POST">
                        <div class="row">
                        <div class="col-md-12 px-1">
                         <div class="form-group">
                          <label>ID</label>
                           <input type="text" name='id' class="form-control" disabled="" value="<?php echo $product['id']; ?>">
                            </div>
                             </div>
                              </div> 
                       <div class="row">
                        <div class="col-md-12 px-1">
                         <div class="form-group">
                          <label>Название</label>
                           <input type="text" name="title" class="form-control" placeholder="Enter Product Name" value="<?php echo $product['title']; ?>">
                            </div>
                             </div>
                              </div> 
                               <div class="row">
                                <div class="col-md-12 px-1">
                                 <div class="form-group">
                                  <label>Марка</label>
                                   <input type="text" name="brand" class="form-control" placeholder="Enter Product Description" value="<?php echo $product['brand']; ?>">
                                    </div>
                                     </div>
                                      </div>
                                       <div class="row">
                                <div class="col-md-12 px-1">
                                 <div class="form-group">
                                  <label>Цена</label>
                                   <input type="text" name="prise" class="form-control" placeholder="Enter Product Description" value="<?php echo $product['prise']; ?>">
                                    </div>
                                     </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3 px-1">
                                         <div class="form-group">
                                          <label>Категория</label>
                                           <input type="text" name="cat_id" class="form-control" placeholder="Enter Category" value="<?php echo $product['cat_id']; ?>">
                                            </div>
                                             </div>
                                              </div>
                                               <div class="row">
                                                <div class="col-md-12 px-1">
                                                 <div class="form-group">
                                                  <label>Описание</label>
                                                   <input type="text" name="descriptions" class="form-control" placeholder="Enter Product Content" value="<?php echo $product['descriptions']; ?>">
                                                    </div>
                                                    </div>
                                                     </div>
                                            <button type="submit" name='edit_product' class="btn btn-info btn-fill pull-right">Внести изменение</button>
                                        <div class="clearfix"></div>
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
          </div>
    </div>
   

  </div><!---/.col-9 -->
</div><!---/.row -->        
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>