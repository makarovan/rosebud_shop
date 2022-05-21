<?php
class ModelProducts{
	public static function getProductsActionList(){
		$sql = "SELECT products.*, product_categories.*, users.`username` FROM `products`, product_categories, users WHERE `products`.sellerId = `users`.idUser AND `products`.categoryId=`product_categories`.idCategory ORDER BY `products`.`idProduct` DESC";
		//создать экземпляр класса database
		$database = new database();
		//$rows = массив данных
		$rows = $database->getAll($sql);

		return $rows;
	}

	public static function getProductsDetail($id){
		$sql = "SELECT products.*, product_categories.* FROM `products`, `product_categories` WHERE `products`.categoryId = `product_categories`.idCategory AND products.`idProduct` = $id";
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function editProducts($id){
		$result = false;
		if (isset($_POST['save'])) {
			if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['idCategory'])) {
				$name = $_POST['name'];
				$description=$_POST['description'];
				$idCategory=$_POST['idCategory'];
				$sql = "UPDATE `products` SET `categoryId` = '$idCategory', `name` = '$name', `description` = '$description' WHERE `products`.`idProduct` = '$id'";
				$database = new database();
				$item = $database->executeRun($sql);
				$result = true;
			}// isset post name
		}//isset post save
	return $result;
	} //fucn

}
?>