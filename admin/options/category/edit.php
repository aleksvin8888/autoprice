<?php
include '../../../configs/db.php';

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_GET["id"]) && isset($_POST["title"])) {

  $sql = "UPDATE cat SET title = '" . $_POST['title'] . "' WHERE cat.id =" . $_GET['id'];
  if($conn->query($sql)) {
    header("Location: /admin/category.php");
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
                        <li class="page-breadcrumb__nav"><a href="http://autoprice.local/admin/category.php">КАТЕГОРИИ</a></li>
                        <li class="page-breadcrumb__nav active">Страница изменения категорий</li>
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
            $sql = "SELECT * FROM cat";
            $result = $conn->query($sql);
             if(isset($_GET['id'])) {
            while ($row = mysqli_fetch_assoc($result)) {
              if($_GET['id'] == $row['id']) {
                $cat = $row;
              }
              }  
            }
          ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Изменить категорию</h4>
                   </div>
                     <div class="card-body">
                      
                      <form method="POST">
                        <div class="row">
                        <div class="col-md-12 px-1">
                         <div class="form-group">
                          <label>ID</label>
                           <input type="text" name='id' class="form-control" disabled="" value="<?php echo $cat['id']; ?>">
                            </div>
                             </div>
                              </div> 
                       <div class="row">
                        <div class="col-md-12 px-1">
                         <div class="form-group">
                          <label>Название</label>
                           <input type="text" name="title" class="form-control" placeholder="Enter Product Name" value="<?php echo $cat['title']; ?>">
                            </div>
                             </div>
                              </div>                             
                                       <button type="submit" name='edit_cat' class="btn btn-info btn-fill pull-right">Внести изменение</button>
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