<?php

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_POST["add_orders"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["shipping_method"]) && isset($_POST["delivery_service"]) && isset($_POST["address"]) && isset($_POST["region_state"]) && isset($_POST["zip_postal_code"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["product_name"]) && isset($_POST["status"]) && isset($_POST["user_id"]) && $_POST["first_name"] != "" && $_POST["last_name"] != "" && $_POST["shipping_method"] != "" && $_POST["delivery_service"] != "" && $_POST["address"] != "" && $_POST["region_state"] != "" && $_POST["zip_postal_code"] != "" && $_POST["phone"] != "" && $_POST["email"] != "" && $_POST["product_name"] != "" && $_POST["status"] != "" && $_POST["user_id"] != "") {

  $sql = "INSERT INTO orders (first_name, last_name, shipping_method, delivery_service, address, region_state, zip_postal_code, phone, email, product_name, status, user_id) VALUES ('" . $_POST["first_name"] . "', '" . $_POST["last_name"] . "', '" . $_POST["shipping_method"] . "', '" . $_POST["delivery_service"] . "', '" . $_POST["address"] . "', '" . $_POST["region_state"] . "', '" . $_POST["zip_postal_code"] . "', '" . $_POST["phone"] . "', '" . $_POST["email"] . "', '" . $_POST["product_name"] . "', '" . $_POST["status"] . "', '" . $_POST["user_id"] . "')";
  if($conn->query($sql)) {
    header("Location: /admin/orders.php");
  }

}

?>

 <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="http://autoprice.local/admin/orders.php">ЗАКАЗЫ</a></li>
                        <li class="page-breadcrumb__nav active">Страница добавления заказа</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Добавить заказ</h4>
                   </div>
                     <div class="card-body">
                      <form method="POST">
                       <div class="row">
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>ИМЯ</label>
                           <input type="text" name="first_name" class="form-control" placeholder="Enter Product Name">
                            </div>
                             </div>
                              </div> 
                               <div class="row">
                                <div class="col-md-12">
                                 <div class="form-group">
                                  <label>ФАМИЛИЯ</label>
                                   <textarea type="text" name="last_name" class="form-control" placeholder="Enter Product Description"></textarea>
                                    </div>
                                     </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-12">
                                         <div class="form-group">
                                          <label>ОПЛАТА</label>
                                           <textarea type="text" name="shipping_method" class="form-control" placeholder="Enter Product Content"></textarea>
                                            </div>
                                             </div>
                                              </div>
                                                <div class="row">
                                        <div class="col-md-12">
                                         <div class="form-group">
                                          <label>ДОСТАВКА</label>
                                           <textarea type="text" name="delivery_service" class="form-control" placeholder="Enter Product Content"></textarea>
                                            </div>
                                             </div>
                                              </div>
                                                      <div class="row">
                                                       <div class="col-md-12">
                                                       <div class="form-group">
                                                        <label>АДРЕС</label>
                                                         <textarea name="address" class="form-control" placeholder="Comments"></textarea>
                                                         </div>
                                                          </div>
                                                          </div>
                                                           <div class="row">
                                                       <div class="col-md-12">
                                                       <div class="form-group">
                                                        <label>РЕГИОН</label>
                                                         <textarea name="region_state" class="form-control" placeholder="Comments"></textarea>
                                                         </div>
                                                          </div>
                                                          </div>
                                                          <div class="row">
                                                       <div class="col-md-12">
                                                       <div class="form-group">
                                                        <label>ИНДЕКС/label>
                                                         <textarea name="zip_postal_code" class="form-control" placeholder="Comments"></textarea>
                                                         </div>
                                                          </div>
                                                          </div>
                                                          <div class="row">
                                                       <div class="col-md-12">
                                                       <div class="form-group">
                                                        <label>ТЕЛЕФОН</label>
                                                         <textarea name="phone" class="form-control" placeholder="Comments"></textarea>
                                                         </div>
                                                          </div>
                                                          </div>
                                                          <div class="row">
                                                       <div class="col-md-12">
                                                       <div class="form-group">
                                                        <label>ПОЧТА</label>
                                                         <textarea name="email" class="form-control" placeholder="Comments"></textarea>
                                                         </div>
                                                          </div>
                                                          </div>
                                                          <div class="row">
                                                       <div class="col-md-12">
                                                       <div class="form-group">
                                                        <label>НАЗВАНИЕ</label>
                                                         <textarea name="product_name" class="form-control" placeholder="Comments"></textarea>
                                                         </div>
                                                          </div>
                                                          </div>
                                                          <div class="row">
                                                       <div class="col-md-12">
                                                       <div class="form-group">
                                                        <label>СТАТУС</label>
                                                         <textarea name="status" class="form-control" placeholder="Comments"></textarea>
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
                                            <button type="submit" name="add_orders" value ="1" class="btn btn-success btn-fill pull-right">Добавить новый заказ</button>
                                        <div class="clearfix"></div>
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>     
   
