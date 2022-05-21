<?php
class ModelCategory{
	//list category
	public static function getCategoryActionList(){
		$sql = "SELECT * FROM `product_categories` ORDER BY `product_categories`.`idCategory` ASC";
		$database= new database();
		$rows = $database->getAll($sql);
		return $rows;
	}

	public static function addCategory(){
		$result = false;
			if (isset($_POST['save'])) {
				if (isset($_POST['categoryName'])) {
					$category = $_POST['categoryName'];
					$sql = "INSERT INTO `product_categories` (`idCategory`, `categoryName`) values (NULL, '$category')";
					$database = new database();
					$item = $database->executeRun($sql);
						if ($item==true) {
							$result = true;
						}
				} //данные в форме заполнены
			}//нажата кнопка send
		return $result;
	}//end add

	public static function getCategoryDetail($id){
		$sql = "SELECT product_categories.* FROM product_categories WHERE `product_categories`.idCategory='$id'";
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function editCategory($id){
		$result = false;
		if (isset($_POST['save'])) {
			if (isset($_POST['categoryName'])) {
				$category = $_POST['categoryName'];
				$sql = "UPDATE `product_categories` SET `categoryName` = '$category' WHERE `product_categories`.`idCategory` = '$id'";
				$database = new database();
				$item = $database -> executeRun($sql);
				$result = true;
			}//isset post
		}//isset save
		return $result;
	}//func

	public static function deleteCategory($id){
		$result = true;
		if (isset($_POST['save'])) {
			$sql = "DELETE FROM `product_categories` WHERE `product_categories`.`idCategory` = '$id'";
			$database = new database();
			$item = $database->executeRun($sql);
			if ($item==true) {
				$result = true;
			}//item
		}//save
		return $result;
	}//func
}//end class