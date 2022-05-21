<?php
class ControllerCategory{
	//список категорий
	public static function categoryList(){
		$rows = ModelCategory::getCategoryActionList();
		include_once('viewAdmin/categoryActionList.php');
	}

	public static function addCategoryForm(){
		include_once('viewAdmin/categoryAddForm.php');
	}

	//add category result
	public static function addCategoryResult(){
		$result = ModelCategory::addCategory();
		include_once('viewAdmin/categoryAddForm.php');
	}

	//edit category
	public static function editCategoryForm($id){
		$rowCategory = ModelCategory::getCategoryDetail($id); 
		include_once('viewAdmin/categoryEditForm.php');
	}

	public static function editCategoryResult($id){
		$result = ModelCategory::editCategory($id);
		include_once('viewAdmin/categoryEditForm.php');
	}

	//delete
	public static function deleteCategoryForm($id){
		$rowCategory = ModelCategory::getCategoryDetail($id);
		include_once('viewAdmin/categoryDeleteForm.php');
	}

	public static function deleteCategoryResult($id){
		$result = ModelCategory::deleteCategory($id);
		include_once('viewAdmin/categoryDeleteForm.php');
	}
}//end class