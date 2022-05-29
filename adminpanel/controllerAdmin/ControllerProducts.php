<?php

class ControllerProducts{
	public static function productsList(){
		$rows = ModelProducts::getProductsActionList();
		include_once ('viewAdmin/productsActionList.php');
	}

	public static function editProductsForm($id){
		$rowsCategory=ModelCategory::getCategoryActionList();//список категорий
		$rowProducts = ModelProducts::getProductsDetail($id); //одна новость
		include_once('viewAdmin/productsEditForm.php');
	}

	public static function editProductsResult($id){
		$result = ModelProducts::editProducts($id); //обработка формы edit
		include_once('viewAdmin/productsEditForm.php');
	}


}?>