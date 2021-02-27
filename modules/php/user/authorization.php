<?php

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

// если в существует GET запрос с кодом ферефекацыи значить пользователь 
// перешол по ссылке с почтового ящика в таком случае :
if (isset($_GET['u_code'])) {
    // делаем запрос в Базу для сверки кода верефикацыи 
    $sql = " SELECT * FROM user WHERE confirm_mail = '" . $_GET['u_code'] . "'";
    $resalt = $conn->query($sql);
    // если в базе есть пользователь с аналогичным кодом верефикацыи
    if ($resalt->num_rows == 1) {
        // тогда берем ID даного пользователя 
        $user = mysqli_fetch_assoc($resalt);
        // и изменяем его статус на ( верефицырован 1 )
        $sql = " UPDATE user SET confirm_mail = '1' WHERE id=" . $user['id'] ;
        // если запрос удачный 
        if ($conn->query($sql)) {
            header("Location:  http://autoprice.local/login.php?verification_Сompleted=done"   );
            die();  // остановить дальнейше выполнения скрипта
        } 
    } else {
            header("Location:  http://autoprice.local/login.php?verification_error=none"   );
            die();  // остановить дальнейше выполнения скрипта
        }
}// конец проверки на подтверждения email

// проверка ввода полей
    if(isset($_POST["email"]) && isset($_POST["password"]) 
        && $_POST["email"] != "" && $_POST["password"] != "") {
        // md5 добавляем шыфрования пароля 
          $password = md5($_POST['password']);
        // формируем запрос поиска в БД по имейлу и паролю
        $sql = "SELECT * FROM user WHERE email LIKE '" . $_POST["email"] . "' 
                                        AND password LIKE '" .  $password  . "' " ;
        $result = $conn->query($sql);
            if($result->num_rows === 1) {
                $user = mysqli_fetch_assoc($result);
                if ($user['confirm_mail'] == 1) {
                    // создаем  cookie
                    setcookie("user_id", $user['id'], time() + 60*60*30, "/"); 
                    header("Location: /");
                } else {
                    header("Location:  http://autoprice.local/login.php?verification_error=none"   );
                    die();  // остановить дальнейше выполнения скрипта
                }    
            } else {
                // если неверный логин или пароль 
                header("Location: http://autoprice.local/login.php?incorrectLogin=" .  $_POST['email']  );
            }
    } else {
        // если отправлена пустая форма 
        header("Location: http://autoprice.local/login.php?error1= введите даные"  );
    } // конец проверки сущиствования $_POST["email"] && $_POST["password"]


?>

