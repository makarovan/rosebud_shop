<?php
class ModelProducts{
	public static function getNewsActionList(){
		$sql = "SELECT products.*, product_categories.*, users.`username` FROM `products`, product_categories, users WHERE `products`.sellerId = `users`.idUser AND `products`.categoryId=`product_categories`.idCategory ORDER BY `products`.`idProduct` DESC";
		//создать экземпляр класса database
		$database = new database();
		//$rows = массив данных
		$rows = $database->getAll($sql);

		return $rows;
	}



}
?>