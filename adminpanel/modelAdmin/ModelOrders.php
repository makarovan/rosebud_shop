<?php
class ModelOrders{
	public static function getOrdersActionList(){
	$sql = "SELECT orders.* FROM  orders  ORDER BY `orders`.`idOrder` DESC";
	//создать экземпляр класса database
	$database = new database();
	//$rows = массив данных
	$rows = $database->getAll($sql);
	return $rows;
	}

	public static function getOrderDetail($id){
		$sql = "SELECT products.*, users.*, orders.* from products, users, orders where `orders`.idOrder =".$id." AND `orders`.productId = `products`.idProduct AND orders.`buyerId` = `users`.idUser";
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function editOrder($id){
		$result = false;
		if (isset($_POST['save'])) {
			$booked = $_POST['booked'];
			$payed = $_POST['payed'];
			$gotPayment = $_POST['gotPayment'];
			$delivered = $_POST['delivered'];
			$got = $_POST['got'];
			$date = date('Y-m-d');
			$sql ="UPDATE `orders` SET booked = '$booked',payed = '$payed', gotPayment = '$gotPayment', delivered = '$delivered',got = '$got', date = '$date' WHERE `orders`.idOrder = $id";
			$database = new database();
			$item = $database -> executeRun($sql);
			$result = true;
		}//isset post save
	return $result;
	} //fucn
}
?>