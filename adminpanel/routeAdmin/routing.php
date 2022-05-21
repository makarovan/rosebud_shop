<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num=substr_count($host,'/');
$path  = explode('/', $host)[$num];

if ($path == '' OR $path == 'index.php' OR $path == 'index'){
	$response = ControllerAdmin::startAdmin();
}
elseif ($path == 'logout'){
	$response = ControllerAdmin::logoutAdmin();
}

//товары
elseif($path == 'productsAction'){
	$response = ControllerProducts::productsList();
}
elseif ($path == 'editProduct') {
	if (isset($_GET['id'])) {
		$response = ControllerProducts::editProductsForm($_GET['id']);
	}else{
		$response = ControllerAdmin::error404();}
}
elseif ($path == 'editProductsResult') {
	if (isset($_GET['id'])) {
		$response = ControllerProducts::editProductsResult($_GET['id']);
	}else{
		$response = ControllerAdmin::error404();}
}

//категории товаров
//добавить
elseif ($path == 'categoryAction') {
	$response = ControllerCategory::categoryList();
}
elseif ($path == 'addcategory') {
 	$response = ControllerCategory::addCategoryForm();
}
elseif ($path == 'addcategoryresult') {
	$response = ControllerCategory::addCategoryResult();
}

//изменить
elseif($path == 'editcategory'){
	if (isset($_GET['id'])) {
		$response = ControllerCategory::editCategoryForm($_GET['id']);
	}else{
		$response = ControllerAdmin::error404();
	}
}
elseif ($path =='editcategoryResult') {
	if (isset($_GET['id'])) {
		$response = ControllerCategory::editCategoryResult($_GET['id']);
	}else{
		$response = ControllerAdmin::error404();
	}
}

//удалить
elseif ($path == 'deletecategory') {
	if (isset($_GET['id'])) {
		$response = ControllerCategory::deleteCategoryForm($_GET['id']);
	}else{
		$response = ControllerAdmin::error404();
	}
}
elseif ($path == 'deletecategoryResult') {
	if (isset($_GET['id'])) {
		$response = ControllerCategory::deleteCategoryResult($_GET['id']);
	}else{
		$response = ControllerAdmin::error404();
	}
}

//список пользователей
elseif ($path == 'usersAction') {
	$response = ControllerUsers::usersList();
}
elseif($path == 'editUser'){
	if (isset($_GET['id'])) {
		$response = ControllerUsers::editUserForm($_GET['id']);
	}else{
		$response = ControllerAdmin::error404();
	}
}
elseif ($path =='editUserResult') {
	if (isset($_GET['id'])) {
		$response = ControllerUsers::editUserResult($_GET['id']);
	}else{
		$response = ControllerAdmin::error404();
	}
}





else{
	$response = ControllerAdmin::error404();
}

?>