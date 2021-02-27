<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "products";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
 

  <div class="row">
   <div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
     <div class="card-header ">
      <h4 class="card-title">
      ТОВАРЫ <a href="options/products/add.php" class="btn btn-primary">ДОБАВИТЬ</a>
       </h4>
       </div>
        <div class="card-body table-full-width table-responsive">
         <table class="table table-hover table-striped">
           <thead>
            <th>ID</th>
            <th>ИМЯ</th>
            <th>МАРКА</th>
            <th>ЦЕНА</th>
            <th>КАТЕГОРИЯ</th>
            <th><center>ОПИСАНИЕ</th>
            <th>ФОТО</th>
            <th>ДЕЙСТВИЕ</th>
           </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM product";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                         <td><?php echo $row['id'] ?></td>
                         <td><?php echo $row['title'] ?></td>
                         <td><?php echo $row['brand'] ?></td>
                         <td><?php echo $row['prise'] ?></td>
                         <td><?php echo $row['cat_id'] ?></td>
                         <td><?php echo $row['descriptions'] ?></td>
                         <td><?php echo $row['photo'] ?></td>
                         <td>
                           <div class="btn-group" role="group" aria-label="Basic example"> 
                            <a href="options/products/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">ИЗМЕНИТЬ</a>
                            <a href="options/products/delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">УДАЛИТЬ</a>
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

