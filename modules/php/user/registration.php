
<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	if(isset($_POST["email"]) && isset($_POST["password"])
    	&& $_POST["email"] != "" && $_POST["password"] != "") {
		// запрос для прверки или пользователь с введенным Email зарегистрирован в базе
     	$sql = "SELECT * FROM user WHERE email LIKE '" . $_POST['email'] . "'";
    	$resaltСheck = $conn->query($sql);
    	if ($resaltСheck->num_rows > 0) {
	       // если попытка повторной регистрацыи на сущестующий email
	       header("Location: http://autoprice.local/login.php?error2=" . $_POST["email"]  );    
	     } else {
	     	// md5 добавляем шыфрования пароля 
      		$password = md5($_POST['password']);
      		// создаем переменную с случайной строкой используем функцыю ( Random )
      		$u_code = generateRandomString(20);
      		 $sql = "INSERT INTO user (name, password, email, confirm_mail )
      		 		 VALUES ('" . $_POST['username'] . "', '" . $password . "', '" . $_POST['email'] . "', '" . $u_code . "' )";  
	        // если запрос в базу на добавления нового пользователя прошол удачно то :
	        if($conn->query($sql)) {
	        	// создадим ссилку для верификацыи в которой будет случайная строка 
	          	// ссылку будем высылать пользователю на почту 
	          $link = "<a href = 'http://autoprice.local/modules/php/user/authorization.php?u_code=$u_code>Confirm</a>";
	          	// обращаемся к функцыи mail и передаем 3 параметра 
          		// 1 адрес почти из формы куда отправлять письмо
	          	// 2 Тема письма
	          	// 3 переменную с ссылкой и случайной строкой 
	          	mail($_POST['email'], 'Register Confirm', $link);
	        	header("Location: http://autoprice.local/login.php?confirmation=" . $_POST["email"]  );
	        } else {
	        	// если ошыбка запроса в базу
	        	header("Location: http://autoprice.local/login.php?error3=3"  );
	        }	
	     } 
	}// конец проверки поля для ввода не пустые
		else {
			// если пришла пустая форма 
			header("Location: http://autoprice.local/login.php?error1= введите даные"  );
		}
} // конец проверки  REQUEST_METHOD

    
// функцыя для формирования случайной строки 
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    	

?>