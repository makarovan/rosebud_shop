<?php

class Controller{
	public static function startSite(){
		//последние товары
		$rows = Model::Rosebud_main();
		//список категорий
		$categories = Model::getCategoryList();
		// $categoryOne = Model::getCategoryDetail($id);
		$products = Model::getProductsByCategoryMain();
		include_once ('view/start.php');

	}
	public static function error404(){
		include_once ('view/error404.php');
	}
	public static function mainCategories(){
		$categories = Category::getMainCategories();
		include_once 'view/categories.php';
	}

	//all products
	public static function productsList(){
		$categories = Model::getCategoryList();
		$rows = Model::getProductsList();
		$countProducts = count($rows);
		include_once ('view/productsList.php');
	}

	public static function productsByCategory($id){
		$categories = model::getCategoryList();
	 	$categoryOne = model::getCategoryDetail($id);
	 	$rows = model::getProductsList();
	 	$countProducts = count($rows);
	 	$rows = model::getProductsByCategory($id);
	 	include_once ('view/productsList.php');
	}


	//поиск
	public static function textSearch($text){
		$categories = Model::getCategoryList();
		$rows = Model::getProductsList();
		$countProducts = count($rows);
		$rows = Model::getSearch($text);
		include_once ('view/productsList.php');
	}

	//filter
	public static function filterSearch($text, $categoryId, $minPrice, $maxPrice){
		$categories = Model::getCategoryList();
		$rows = Model::filterResult($text, $categoryId, $minPrice, $maxPrice);
		$countProducts = count($rows);
		include_once ('view/productsList.php');
	}


	//contact page
	public static function contact(){
		include_once('view/contact.php');
	}
	//обработка формы контакт
	public static function contactSend(){
		error_reporting(0); //убирает ошибку с подключением к серверу почты
		$message = ModelContact::getContactMessage();
		include_once('view/contact.php');
	}


	//описание товара
	public static function productDetail($id){
		$row=Model::getProductDetail($id); 
		$available = Model::isProductAvailable($id);
		include_once('view/productDetail.php');
	}


	public static function userDetail($id){
		$row = Model::getUserDetail($id);
		$products = Model::getUsersProducts($id);
		// $reviews = Model::getReviews($id);
		include_once('view/user.php');
	}
}
?>