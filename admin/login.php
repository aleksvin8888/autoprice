<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

// проверка ввода полей
    if(isset($_POST["username"]) && isset($_POST["pass"]) && $_POST["username"] != "" && $_POST["pass"] != "") {
        // формируем запрос поиска в БД по имейлу и паролю
        $sql = "SELECT * FROM admins WHERE name LIKE '" . $_POST["username"] . "' AND password LIKE '" . $_POST["pass"] . "'";
        // выполняем запрос
        $result = mysqli_query($conn, $sql);
        // получаем количество совпадений по юзерам в БД
        $users_number = mysqli_num_rows($result);
        // если количество найденных юзеров равно 1, то авторизуем
        if($users_number == 1) {
            $user = mysqli_fetch_assoc($result); // создаем ассоциацию с юзером
            setcookie("admin_id", time() + 3600*24); // куки для хранения на сутки ID залогиненного юзера
            header("Location: http://autoprice.local/admin");
        } 


        // else {
        //    echo "<h2>Ошибка</h2>";
       // }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
</head>
<body style="background-image: url(/admin/assets/img/full-screen-image-3.jpg); background-size: cover; ">
    <!-- Создаем форму для авторизации -->
    <div id="main-block">
        <h2 class="author-header">Authorization</h2>            
            <form action="login.php" method="POST" class="content">

                <!-- Поле для ввода имени -->
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Login" name="username" required/>
                <!-- Поле для ввода пароля -->
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pass" required/>
                <!-- Кнопка для отправки введенных данных -->
                <button type="submit" class="inputbtn">Log In</button>
                  
            </form>
    </div>
</body>
</html>
               

    

