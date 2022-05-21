<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num=substr_count($host,'/');
$path  = explode('/', $host)[$num];

if ($path == '' OR $path == 'index.php' OR $path == 'index') {
	$response = Controller::startSite();
}

elseif ($path == 'productsList') {
	$response = Controller::productsList();
}

elseif ($path == 'category') {
	if (isset($_GET['id'])) {
		$response = Controller::productsByCategory($_GET['id']);
	}elseif (isset($_GET['text'])) {
		$response = Controller::textSearch($_GET['text']);
	}elseif (isset($_GET['min']) && isset($_GET['max'])) {
		$response = Controller::priceSearch($_GET['min'], $_GET['max']);
	}else{
		$response = Controller::error404();
	}
	
}

elseif ($path=='search') {
	if (isset($_GET['text'])) {
		$response = Controller::textSearch($_GET['text']);
	}else{
		$response = Controller::error404();
	}
}
elseif ($path=='filter') {
	if (isset($_GET['text']) or isset($_GET['categoryId']) or isset($_GET['minPrice']) or isset($_GET['maxPrice'])) {
		$response = Controller::filterSearch($_GET['text'], $_GET['categoryId'], $_GET['minPrice'], $_GET['maxPrice']);
	}else{
		$response = Controller::error404();
	}
}

//registration
elseif ($path == 'register' || $path == 'login'){	
	$response = controllerUser::loginForm();
}elseif ($path == 'loginResult') {
	$response = controllerUser::loginResult();
}elseif ($path == 'logout') {
	$response = controllerUser::logoutAction();
}elseif ($path == 'registerResult') {
	$response = controllerUser::registerResult();
}

//contact
elseif ($path == 'contact'){
	$response = Controller::contact();
}
elseif ($path == 'contactSend'){
	$response = Controller::contactSend();//обработка сообщений со страницы контакт
}

//страница товара
elseif($path=='detail'){
	if(isset($_GET['id'])){
		$response = Controller::productDetail($_GET['id']);
	// }elseif (isset($_GET['text'])) {
	// 	$response = Controller::textSearch($_GET['text']); 
	}else{
		$response = Controller::error404();
	}
}

//страница пользователя
elseif ($path == 'user') {
	if(isset($_GET['id'])){
		$response = Controller::userDetail($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}

//личный кабинет
elseif ($path == 'my_account') {
	if(isset($_SESSION['userId'])){
		$response = controllerUser::account($_SESSION['userId']);
	}else{
		$response = Controller::error404();
	}
}

//CHANGE ROLE
elseif($path == 'changeRole'){
	if(isset($_SESSION['userId'])){
		$response = controllerUser::role($_SESSION['userId']);
	}else{
		$response = Controller::error404();
	}
}
elseif($path == 'changeRoleResult'){
	if(isset($_SESSION['userId'])){
		$response = controllerUser::roleResult($_SESSION['userId']);
	}else{
		$response = Controller::error404();
	}
}

//edit user
elseif ($path == 'editUser') {
	controllerUser::editUser($_SESSION['userId']);
}
elseif ($path == 'editUserResult') {
	controllerUser::editUserResult($_SESSION['userId']);
}

//change password
elseif ($path == 'changePass') {
	controllerUser::password();
}
elseif ($path == 'changePassResult') {
	controllerUser::changePasswordResult();
}

elseif ($path == 'add_product') {
	if(isset($_SESSION['userId'])){
		$response = controllerUser::addProductForm();
	}else{
		$response = Controller::error404();
	}
}

//добавить товар
elseif ($path == 'addProductResult') {
	if(isset($_SESSION['userId'])){
		$response = controllerUser::addProductResult();
	}else{
		$response = Controller::error404();
	}
}

//товары пользователя
elseif ($path == 'my_products') {
	if(isset($_SESSION['userId'])){
		$response = controllerUser::usersProductsList($_SESSION['userId']);
	}else{
		$response = Controller::error404();
	}
}

//удалить товар
elseif ($path == 'deleteProduct') {
	if(isset($_GET['id'])){
		$response = controllerUser::deleteProductForm($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}
elseif ($path == 'deleteProductResult') {
	if(isset($_GET['id'])){
		$response = controllerUser::deleteProductResult($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}

//заказы у пользователя
elseif ($path == 'orders') {
	if(isset($_SESSION['userId'])){
		$response = controllerUser::ordersFromUser($_SESSION['userId']);
	}else{
		$response = Controller::error404();
	}
}
elseif ($path == 'changeOrder') {
	if(isset($_GET['id'])){
		$response = controllerUser::changeOrder($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}
elseif ($path == 'changeOrderResult') {
	if(isset($_GET['id'])){
		$response = controllerUser::changeOrderResult($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}

//сделать заказ
elseif ($path == 'makeOrder') {
	if (isset($_GET['id'])) {
		$response = controllerUser::makeNewOrder($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}
elseif ($path =='newOrderResult') {
	if (isset($_GET['id'])) {
		$response = controllerUser::newOrderResult($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}

//my orders
elseif ($path == 'myOrders') {
	if(isset($_SESSION['userId'])){
		$response = controllerUser::ordersByUser($_SESSION['userId']);
	}else{
		$response = Controller::error404();
	}
}
elseif ($path == 'changeOrderBuyer') {
	if(isset($_GET['id'])){
		$response = controllerUser::changeOrderBuyerCont($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}
elseif ($path == 'changeOrderResultBuyer') {
	if(isset($_GET['id'])){
		$response = controllerUser::changeOrderResultBuyerCont($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}


//private messages
elseif ($path == 'messages') {
	if(isset($_SESSION['userId'])){
		$response = controllerUser::conversationsWithUser($_SESSION['userId']);
	}else{
		$response = Controller::error404();
	}
}
elseif($path == 'privateMessages'){
	if(isset($_GET['id'])){
		$response = controllerUser::messagesToUser($_GET['id']);
	}else{
		$response = Controller::error404();
	}
}



else{
	$response = Controller::error404();
}

?>