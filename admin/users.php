<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "users";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>
 

  <div class="row">
   <div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
     <div class="card-header ">
      <h4 class="card-title">ПОЛЬЗОВАТЕЛИ </h4>
       </div>
        <div class="card-body table-full-width table-responsive">
         <table class="table table-hover table-striped">
           <thead>
            <th>ID</th>
            <th>ИМЯ</th>
            <th>ПОЧТА</th>
            <th>ПАРОЛЬ</th>
            <th>ДЕЙСТВИЕ</th>
           </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                         <td><?php echo $row['id'] ?></td>
                         <td><?php echo $row['name'] ?></td>
                         <td><?php echo $row['email'] ?></td>
                         <td><?php echo $row['password'] ?></td>
                         <td>  
                            <a href="options/deluser.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">УДАЛИТЬ</a>
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

