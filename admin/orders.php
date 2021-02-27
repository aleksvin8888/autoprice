<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';


include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
 

  <div class="row">
   <div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
     <div class="card-header ">
      <h4 class="card-title">
      ЗАКАЗЫ <a href="options/orders/add.php" class="btn btn-primary">ДОБАВИТЬ</a>
       </h4>
       </div>
        <div class="card-body table-full-width table-responsive">
         <table class="table table-hover table-striped">
           <thead>
            <th>ID</th>
            <th>ПОЛЬЗОВАТЕЛЬ</th>
            <th>ИМЯ</th>
            <th>ФАМИЛИЯ</th>
            <th>ДОСТАВКА</th>
            <th>ПОЧТОВАЯ СЛУЖБА</th>
            <th>АДРЕС</th>
            <th>РЕГИОН</th>
            <th>ИНДЕКС</th>
            <th>ТЕЛЕФОН</th>
            <th>ПОЧТА</th> 
            <th>НАЗВАНИЕ</th> 
            <th>ЦЕНА</th>
            <th>СТАТУС</th> 
            <th>ВРЕМЯ</th> 
            <th>ДЕЙСТВИЕ</th> 
           </thead>
            <tbody>
                <?php 

                $sql = "SELECT * FROM orders";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                         <td><?php echo $row['id'] ?></td>
                         <td><?php echo $row['user_id'] ?></td>
                         <td><?php echo $row['first_name'] ?></td>
                         <td><?php echo $row['last_name'] ?></td>
                         <td><?php echo $row['shipping_method'] ?></td>
                         <td><?php echo $row['delivery_service'] ?></td>
                         <td><?php echo $row['address'] ?></td>
                         <td><?php echo $row['region_state'] ?></td>
                         <td><?php echo $row['zip_postal_code'] ?></td>
                         <td><?php echo $row['phone'] ?></td>
                         <td><?php echo $row['email'] ?></td>
                         <td>
                         <?php
                            $productOrder = json_decode($row['product_name'], true);
                            $total = 0;
                            for($i = 0; $i < count($productOrder['basket']); $i++) {
                                // Выбираем все поля из таблицы product где id = значению $basket["basket"]["$i"]["product_id"]
                                $sql_product = "SELECT * FROM product WHERE id=" . $productOrder["basket"]["$i"]["product_id"];
                                $result_product = $conn->query($sql_product);
                                $product = mysqli_fetch_assoc($result_product);  
                                echo $product['title'] . " - " . $productOrder["basket"]["$i"]["count"] . ' шт <br>';
                                $total = $total + $product["prise"];      
                            }
                         ?>
                         </td>
                         <td><?php echo $total; ?></td>
                         <td><a href="edit_stat.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">+</a><?php echo $row['status']; ?></td>
                         <td><?php echo $row['created_at'] ?></td>
                         <td>
                           <div class="btn-group" role="group" aria-label="Basic example"> 
                            <a href="options/orders/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">ИЗМЕНИТЬ</a>
                            <a href="options/orders/delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">УДАЛИТЬ</a>
                          </div>
                         </td>
                        </tr>
                     <?php
                     }
                     ?>
    
             </tbody>
          </table>
         </div>
       </div>
     </div>
   </div><!-- -->
 
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>       

