<?php
include '../../../configs/db.php';

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_GET["id"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["shipping_method"]) && isset($_POST["delivery_service"]) && isset($_POST["address"]) && isset($_POST["region_state"]) && isset($_POST["zip_postal_code"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["status"]) && isset($_POST["user_id"])) {

  $sql = "UPDATE orders SET first_name = '" . $_POST["first_name"] . "', last_name = '" . $_POST["last_name"] . "', shipping_method = '" . $_POST["shipping_method"] . "', delivery_service = '" . $_POST["delivery_service"] . "', address = '" . $_POST["address"] . "', region_state = '" . $_POST["region_state"] . "', zip_postal_code = '" . $_POST["zip_postal_code"] . "', phone = '" . $_POST["phone"] . "', email = '" . $_POST["email"] . "', status = '" . $_POST["status"] . "', user_id = '" . $_POST["user_id"] . "' WHERE orders.id =" . $_GET['id'];
  if($conn->query($sql)) {
    header("Location: /admin/orders.php");
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
                        <li class="page-breadcrumb__nav"><a href="http://autoprice.local/admin/orders.php">ЗАКАЗЫ</a></li>
                        <li class="page-breadcrumb__nav active">Страница изменения заказа</li>
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
    <div class="col-md-14">
       <div class="content">
        <div class="container-fluid">
          <?php
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);
             if(isset($_GET['id'])) {
            while ($row = mysqli_fetch_assoc($result)) {
              if($_GET['id'] == $row['id']) {
                $orders = $row;
              }
              }  
            }
          ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Изменить заказ</h4>
                   </div>
                     <div class="card-body">
                      
                      <form method="POST">
                        <div class="row">
                        <div class="col-md-12 px-1">
                         <div class="form-group">
                          <label>ID</label>
                           <input type="text" name='id' class="form-control" disabled="" value="<?php echo $orders['id']; ?>">
                            </div>
                             </div>
                              </div> 
                       <div class="row">
                        <div class="col-md-12 px-1">
                         <div class="form-group">
                          <label>ИМЯ</label>
                           <input type="text" name="first_name" class="form-control" placeholder="Enter Product Name" value="<?php echo $orders['first_name']; ?>">
                            </div>
                             </div>
                              </div> 
                               <div class="row">
                                <div class="col-md-12 px-1">
                                 <div class="form-group">
                                  <label>ФАМИЛИЯ</label>
                                   <input type="text" name="last_name" class="form-control" placeholder="Enter Product Description" value="<?php echo $orders['last_name']; ?>">
                                    </div>
                                     </div>
                                      </div>
                                       <div class="row">
                                <div class="col-md-12 px-1">
                                 <div class="form-group">
                                  <label>ОПЛАТА</label>
                                   <input type="text" name="shipping_method" class="form-control" placeholder="Enter Product Description" value="<?php echo $orders['shipping_method']; ?>">
                                    </div>
                                     </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3 px-1">
                                         <div class="form-group">
                                          <label>ДОСТАВКА</label>
                                           <input type="text" name="delivery_service" class="form-control" placeholder="Enter Category" value="<?php echo $orders['delivery_service']; ?>">
                                            </div>
                                             </div>
                                              </div>
                                               <div class="row">
                                                <div class="col-md-12 px-1">
                                                 <div class="form-group">
                                                  <label>АДРЕС</label>
                                                   <input type="text" name="address" class="form-control" placeholder="Enter Product Content" value="<?php echo $orders['address']; ?>">
                                                    </div>
                                                    </div>
                                                     </div>
                                                      <div class="row">
                                                       <div class="col-md-12 px-1">
                                                       <div class="form-group">
                                                        <label>РЕГИОН</label>
                                                        <input type="text" name="region_state" class="form-control" placeholder="Enter Product Content" value="<?php echo $orders['region_state']; ?>">
                                                         </div>
                                                          </div>
                                                          </div>
                                                          <div class="row">
                                                       <div class="col-md-12 px-1">
                                                       <div class="form-group">
                                                        <label>ИНДЕКС</label>
                                                        <input type="text" name="zip_postal_code" class="form-control" placeholder="Enter Product Content" value="<?php echo $orders['zip_postal_code']; ?>">
                                                         </div>
                                                          </div>
                                                          </div>
                                                          <div class="row">
                                                       <div class="col-md-12 px-1">
                                                       <div class="form-group">
                                                        <label>ТЕЛЕФОН</label>
                                                        <input type="text" name="phone" class="form-control" placeholder="Enter Product Content" value="<?php echo $orders['phone']; ?>">
                                                         </div>
                                                          </div>
                                                          </div>
                                                          <div class="row">
                                                       <div class="col-md-12 px-1">
                                                       <div class="form-group">
                                                        <label>ПОЧТА</label>
                                                        <input type="text" name="email" class="form-control" placeholder="Enter Product Content" value="<?php echo $orders['email']; ?>">
                                                         </div>
                                                          </div>
                                                          </div>
                                                          
                                                          <div class="row">
                                                       <div class="col-md-12 px-1">
                                                       <div class="form-group">
                                                        <label>СТАТУС</label>
                                                        <input type="text" name="status" class="form-control" placeholder="Enter Product Content" value="<?php echo $orders['status']; ?>">
                                                         </div>
                                                          </div>
                                                          </div>
                                                           <div class="col-md-12">
                                                 <div class="form-group">
                                                  <label>Пользователь</label>
                                                   <select name="user_id" class="form-control">
                                                   <option value="0">Не выбрано</option>
                                                      <?php
                                                         $sql = "SELECT * FROM user";
                                                         $result = $conn->query($sql);
                                                         while ($row = mysqli_fetch_assoc($result)) {
                                                             echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                         }
                                                      ?>
                                                   </select>
                                                    </div>
                                                    </div>
                                                     </div>
                                            <button type="submit" name='edit_orders' class="btn btn-info btn-fill pull-right">Внести изменение</button>
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