<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
 

  <div class="row">
   <div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
     <div class="card-header ">
      <h4 class="card-title">
      КАТЕГОРИИ <a href="options/category/add.php" class="btn btn-primary">ДОБАВИТЬ</a>
       </h4>
       </div>
        <div class="card-body table-full-width table-responsive">
         <table class="table table-hover table-striped">
           <thead>
            <th>ID</th>
            <th>НАЗВАНИЕ</th>
            <th>ДЕЙСТВИЕ</th>
           </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM cat";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                         <td><?php echo $row['id'] ?></td>
                         <td><?php echo $row['title'] ?></td>
                         <td>
                           <div class="btn-group" role="group" aria-label="Basic example"> 
                            <a href="options/category/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">ИЗМЕНИТЬ</a>
                            <a href="options/category/delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">УДАЛИТЬ</a>
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

