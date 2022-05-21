<?php
class modelUser{
	public static function userLogin(){
		//если login уже выполнен
		if (isset($_SESSION['sessionId'])){
			$result = true;
		}else{ //если login не выполнен
			$result = false;
			$_SESSION['error']='неправильно имя пользователя или пароль';
			if (isset($_POST['login'])) {
				if (isset($_POST['email']) && isset($_POST['password']) && $_POST['email']!="" && $_POST['password']!="") {
					$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
					$password = filter_input(INPUT_POST, 'password');
					//запрос на эмайл в таблице user
					$sql = "SELECT * from `users` where users.`email` ='".$email."'";
					$database = new database();
					$item = $database->getOne($sql);

					//если эмайл найден
					if ($item!=null){
						$password = $_POST['password'];
						//проверяем эмайл и пароль на истину
						if ($email == $item['email'] && password_verify($password, $item['password'])){ //создаем переменные сессии
							$_SESSION['sessionId']=session_id();
							$_SESSION['userId']=$item['idUser'];
							$_SESSION['name']=$item['username'];
							
							$_SESSION['role'] = $item['role'];
							$_SESSION['email'] = $item['email'];
							$result = true;
						}
					}
				}
			}
		}
		return $result;
	}//end userlogin func


//logout
	public static function userLogout(){
		session_destroy();
		unset($_SESSION['sessionId']);
		unset($_SESSION['userId']);
		unset($_SESSION['name']);
		unset($_SESSION['role']);
		unset($_SESSION['email']);
	}

//registration
	public static function userRegister(){
		$result = array(false, 'error register user');
		if (isset($_POST['send'])) {
			$errorString='';
			$name = $_POST['username'];
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password = $_POST['password'];
			$adress = $_POST['adress'];
			$tel = $_POST['tel'];
			$fullName = $_POST['fullName'];
			$confirm = $_POST['confirm'];

			if (!$email) {
				$errorString.="Неправильный эмайл<br>";
			}
			if (!$password || !$confirm || mb_strlen($password)<3) {
				$errorString.="Пароль должен быть больше 3 символов<br>";
			}
			if ($password!=$confirm) {
				$errorString.="Пароли не совпадают<br>";
			}
			if ($errorString=='') {

				$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				
				$sql = "INSERT INTO `users` (`idUser`, `role`, `email`, `password`, `username`, `adress`, `tel`, `fullName`) VALUES (NULL, '2', '$email', '$passwordHash','$name', '$adress', '$tel', '$fullName')";
				$database = new database();
				$item = $database ->executeRun($sql);
				//ДОБАВЛЕНИЕ РОЛИ
				if ($item) {
					$result = array(true);
				}else{
					$result = array(false, 'Ваш эмайл уже зарегестрирован');
				}
			}else{
			$result = array(false, $errorString);
			}
	}
	return $result;
	}


	public static function showAccount($id){
		$sql = "SELECT users.*, products.* from users, products WHERE `users`.idUser = ".$id;
		$database = new database();
		$row = $database ->getOne($sql);
		return $row;
	}

	public static function getUsersProducts($id){
		$sql = "SELECT products.*, users.* from products, users where `products`.sellerId = `users`.idUser And `products`.sellerId =".$id." order by `products`.idProduct DESC";
		$database = new database();
		$products = $database->getAll($sql);
		return $products;
	}

	public static function getProductCategory(){
		$sql = "SELECT * from product_categories ORDER BY `product_categories`.idCategory ASC";
		$database = new database();
		$rows = $database->getAll($sql);
		return $rows;
	}

	public static function addProduct(){
		$resultProduct = false;
		$target_dir = "./img/";
		if (isset($_POST['save'])) {
			
			if (isset($_POST['name']) && isset($_POST['category']) && isset($_POST['description']) && isset($_POST['price'])) {
				$name = $_POST['name'];
				$text = $_POST['description'];
				$idCategory = $_POST['category'];
				$price = $_POST['price'];
				$sellerId = $_SESSION['userId'];
				$image = $_FILES['img']['name'];

				//если файл неправильного формата
				$imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  				$resultProduct = false;
				}else{
					//если все норм
					if ($image!=""){
						//код для смены имени файла
						$temp = explode(".", $_FILES["img"]["name"]);
						$newfilename = round(microtime(true)) . '.' . end($temp); //под каким именем
						$uploadfile ="./img/". $newfilename; //куда сохраняется в папку
						copy($_FILES['img']['tmp_name'], $uploadfile);
					}
					$sql = "INSERT INTO `products` (`idProduct`, `name`, `categoryId`,`description`, `img`, `price`,`sellerId`) VALUES (NULL, '$name', '$idCategory', '$text', '$newfilename', '$price', '$sellerId')";
					$database = new database();
					$item = $database ->executeRun($sql);
					if ($item == true) {
						$resultProduct = true;
					}
				}
			}
		}//if save
		return $resultProduct;
	}//end add


	public static function getProductDetail($id){
		$sql = "SELECT * from products where `products`.idProduct =".$id;
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function deleteProduct($id){
		$resultDelete = false;
		if (isset($_POST['save'])) {
			$oldpicture = $_POST['oldpicture'];
			unlink ("./img/$oldpicture");

			$sql = "DELETE from products where `products`.idProduct = ".$id;
			$database = new database();
			$item = $database -> executeRun($sql);
			if ($item == true){
				$resultDelete = true;
			}//item
		}//save
		return $resultDelete;
	}

	public static function orderDetails($id){
		$sql = "SELECT products.*, users.*, orders.* from products, users, orders where `orders`.sellerId =".$id." AND `orders`.productId = `products`.idProduct AND orders.`buyerId` = `users`.idUser order by `orders`.date DESC";
		$database = new database();
		$rows = $database->getAll($sql);
		return $rows;
	}

	public static function selectedOrder($id){
		$sql = "SELECT products.*, users.*, orders.* from products, users, orders where `orders`.idOrder =".$id." AND `orders`.productId = `products`.idProduct AND orders.`buyerId` = `users`.idUser";
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function changeOrder($id){
		$result = false;
		if (isset($_POST['save'])) {
			if (isset($_POST['booked']) && isset($_POST['gotPayment']) && isset($_POST['delivered'])) {
				$booked = $_POST['booked'];
				$gotPayment = $_POST['gotPayment'];
				$delivered = $_POST['delivered'];
				$date = date('Y-m-d');

				$sql ="UPDATE `orders` SET booked = '$booked', gotPayment = '$gotPayment', delivered = '$delivered', date = '$date' WHERE `orders`.idOrder = $id";
				$database = new database();
				$item = $database -> executeRun($sql);
				$result = true;
			}//if booked
		}//save
		return $result;
	}

	public static function orderedProduct($id){
		$sql="SELECT * from products, users, product_categories where `products`.sellerId=`users`.idUser AND products.`categoryId`=product_categories.`idCategory` AND `products`.idProduct =".$id;
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function newOrder($id){
		$result = false;
		if (isset($_POST['save'])) {
			if (isset($_POST['sellerId'])) {
				$booked = 1;
				$product = $id;
				$seller = $_POST['sellerId'];
				$buyer = $_SESSION['userId'];
				$date = date('Y-m-d'); //работает current timestamp из mysql, так без него не работает
				$sql="SELECT * from orders WHERE `orders`.productId = $id";
				$database = new database();
				$item = $database -> getOne($sql);
				if(empty($item)){
					$sql = "INSERT INTO orders (`idOrder`,`productId`,`sellerId`,`buyerId`, `booked`) VALUES (NULL, $product, $seller, $buyer, $booked)";
					$database = new database();
					$item = $database -> executeRun($sql);
					$result = true;
				}else{
					$sql = "SELECT `orders`.idOrder FROM orders WHERE `orders`.productId = $id";
					$database = new database();
					$idOrder = $database -> getOne($sql);
					$order = $idOrder["idOrder"];
					$sql = "UPDATE orders  
					SET `idOrder` = $order, 
					`productId` = $product, 
					`sellerId` = $seller, 
					`buyerId` = $buyer, 
					`booked` = $booked
					WHERE productId = 1";
					$database = new database();
					$item = $database -> executeRun($sql);
					$result = true;
				}
			}//if sellerid
		}//save
		return $result;
	}

	public static function orders($id){
		$sql = "SELECT products.*, users.*, orders.* from products, users, orders where  `orders`.productId = `products`.idProduct AND orders.`sellerId` = `users`.idUser  AND `orders`.buyerId =".$id." order by `orders`.date DESC";
		$database = new database();
		$rows = $database->getAll($sql);
		return $rows;
	}

	public static function selectedOrderBuyer($id){
		$sql = "SELECT products.*, users.*, orders.* from products, users, orders where `orders`.idOrder =".$id." AND `orders`.productId = `products`.idProduct AND orders.`sellerId` = `users`.idUser";
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function changeOrderBuyer($id){
		$result = false;
		if (isset($_POST['save'])) {
			if (isset($_POST['booked']) && $_POST['booked']==1 && isset($_POST['payed']) && isset($_POST['got'])) {
				$booked = $_POST['booked'];
				$got = $_POST['got'];
				$payed = $_POST['payed'];
				$date = date('Y-m-d');
				$sql = "UPDATE `orders` SET booked = '$booked', got = '$got', payed = '$payed', date = '$date' WHERE `orders`.idOrder = $id";
				$database = new database();
				$item = $database -> executeRun($sql);
				$result = true;
			}
		}//save
		return $result;
	}


	public static function conversations($id){
		$sql="SELECT  `users`.username, `users`.idUser from users, messages where `messages`.fromUserId = `users`.idUser and `messages`.toUserId =".$id." group by `users`.username";
		$database = new database();
		$rows = $database->getAll($sql);
		return $rows;
	}

	public static function fromUser($id){
		$idUser = $_SESSION['userId'];
		$sql = "SELECT `users`.username from users, messages where `messages`.fromUserId = `users`.idUser and `messages`.toUserId = $idUser and `messages`.fromUserId = $id group by `users`.username";
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function messages ($id){
		$idUser = $_SESSION['userId'];
		$sql = "SELECT `users`.username, `users`.idUser, `messages`.messageText, `messages`.date from users, messages where `messages`.fromUserId = `users`.idUser and `messages`.toUserId = $idUser and `messages`.fromUserId = $id order by `messages`.date";
		
		//найти все сообщения где отсылатель или получатель = 3
		// и получатель или отправщик = 4

//almost works
// 		SELECT `users`.username, `messages`.messageText, `messages`.date 
// from users, messages 
// where `messages`.fromUserId = `users`.idUser 
// and `messages`.toUserId = $idUser or `messages`.`toUserId`= $id
// and `messages`.fromUserId = $id   or `messages`.`fromUserId`=$idUser

// group by messages.date
// order by `messages`.date
// 		SELECT messages.* FROM messages
// inner join users on users.idUser = messages.fromUserId
// WHERE (fromUserId = 4 AND toUserId = 2) 
// OR (fromUserId = 3 AND toUserId = 4) 
// ORDER BY date asc;

		$sql = "SELECT `messages`.fromUserId, `messages`.messageText, `messages`.`date`
		from messages 
		where (`messages`.fromUserId = $idUser and `messages`.toUserId = $id) 
		or (`messages`.fromUserId = $id and `messages`.toUserId = $idUser) 
		order by `messages`.`date`";
		$database = new database();
		$rows = $database->getAll($sql);return $rows;
	}

	public static function changeRole($id){
		//$idUser = $_SESSION['userId'];
		$sql = "SELECT users.role from users where `users`.idUser = $id";
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function changeRoleResult($id){
		$result = false;
		if (isset($_POST['save'])) {
			if (isset($_POST['role'])) {
				$role = $_POST['role'];
				$sql = "UPDATE `users` SET role = '$role'  WHERE `users`.idUser = $id";
				$database = new database();
				$item = $database -> executeRun($sql);
				$_SESSION['role'] = $role; //обновляем роль в сессии, чтоб не наджо было перезаходить
				$result = true;
			}//if role
		}//save
		return $result;
	}

	public static function editUserResult($id){
		$result = array(false, "Не введены обязательные данные.");
		if (isset($_POST['save'])) {
				$email = $_POST['email'];
				$adress = $_POST['adress'];
				$tel = $_POST['tel'];
				$fullName = $_POST['fullName'];
				$username = $_POST['username'];
				$userDescription = $_POST['userDescription'];
				$sql = "UPDATE `users` SET email = '$email', adress = '$adress', tel ='$tel', fullName ='$fullName', username = '$username', userDescription = '$userDescription' WHERE `users`.idUser =". $id;
				$database = new database();
				$item = $database -> executeRun($sql);
				$result = array(true, "Данные изменены.");
			}else{
				$result = array(false, "Ошибка изменения данных.");
		}//save
		return $result;
	}

	public static function changePassword(){
		$result = array(false, "Введите правильный пароль");
		if (isset($_POST['send'])) {
			//читаем данные из формы
			$currentPassword=$_POST['currentPassword'];
			$newPassword=$_POST['newPassword'];
			$confirmPassword=$_POST['confirmPassword'];
			if ($newPassword == $confirmPassword && $newPassword!="") {
				//выбор хеш пароля из базы по почте
				$sql = "SELECT * FROM `users` WHERE `email` = '".$_SESSION['email']."'";
				$database = new database();
				$item = $database->getOne($sql);
				//проверка правильности ввода текущего пароля
				if (password_verify($currentPassword, $item['password'])) {
					$passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);//кодируем новый пароль
					$sql = "UPDATE `users` SET `password` = '$passwordHash' WHERE `users`.`idUser`=".$_SESSION['userId'];
					$database = new database();
					$item = $database->executeRun($sql);//записали новый пароль в базу данных
					$result = array(true, "Пароль успешно изменен");
				}
			}else{
				$result = array(false, "Пароли не совпадают");
			}
		}
		return $result;
	}//change password

}//end model