<?php
class controllerUser{
//login  форма
	public static function loginForm(){
		include_once ('view/registerForm.php');
	}

	//обработка формы login
	public static function loginResult(){
		$resultLogIn = modelUser::userLogin();
		include_once('view/registerForm.php');
	}
	//logout
	public static function logoutAction(){
		modelUser::userLogout();
		include_once('view/registerForm.php');
	}
	//обработка формы register
	public static function registerResult(){
		$resultReg = modelUser::userRegister();
		include_once('view/registerForm.php');
	}

//ЛИЧНЫЙ КАБИНЕТ
	public static function account($id){
		$acc = modelUser::showAccount($id);
		$products = modelUser::getUsersProducts($id);
		include_once('view/my_account.php');
	}

//CHANGE ROLE
	public static function role($id){
		$oldRole = modelUser::changeRole($id);//зачем нужна строка?
		include_once('view/role_change.php');
	}
	public static function roleResult($id){
		$result = modelUser::changeRoleResult($id);
		include_once('view/role_change.php');
	}

//edit user
	public static function editUser($id){
		$description = modelUser::showAccount($id);
		include_once('view/profile.php');
	}
	public static function editUserResult($id){
		$description = modelUser::showAccount($id);
		$result = modelUser::editUserResult($id);
		include_once('view/profile.php');
	}

//change password
	public static function password(){
		include_once('view/changePassword.php');
	}
	public static function changePasswordResult(){
		$result = modelUser::changePassword();
		include_once('view/changePassword.php');
	}

//ADD PRODUCT
	public static function addProductForm(){
		$rows = modelUser::getProductCategory();
		include_once('view/add_product.php');
	}
	public static function addProductResult(){
		$results = modelUser::addProduct();
		include_once('view/add_product.php');
	}

//USER'S PRODUCTS
	public static function usersProductsList($id){
		//$categories = modelUser::getProductCategory();
		$products = modelUser::getUsersProducts($id);
		//$delete = modelUser::deleteProduct($id);
		include_once('view/my_products.php');
	}

//DELETE PRODUCT 
	public static function deleteProductForm($id){
		$categories = modelUser::getProductCategory();
		$product = modelUser::getProductDetail($id);
		//$delete = modelUser::deleteProduct();
		include_once('view/productDeleteForm.php');
	}
	public static function deleteProductResult($id){
		$result = modelUser::deleteProduct($id);
		include_once('view/productDeleteForm.php');
	}

//ORDER FROM USER
	public static function ordersFromUser($id){
		$orders = modelUser::orderDetails($id);
		include_once('view/ordersFromUser.php');
	}
	public static function changeOrder($id){
		$order = modelUser::selectedOrder($id);
		include_once('view/changeOrder.php');
	}
	public static function changeOrderResult($id){
		$result = modelUser::changeOrder($id);
		include_once('view/changeOrder.php');
	}

//MAKE ORDER
	public static function makeNewOrder($id){
		$product = modelUser::orderedProduct($id);
		$available = Model::isProductAvailable($id);
		include_once('view/newOrder.php');
	}
	public static function newOrderResult($id){
		$result = modelUser::newOrder($id);
		include_once('view/newOrder.php');
	}


//MY ORDERS
	public static function ordersByUser($id){
		$orders = modelUser::orders($id);
		include_once('view/ordersByUser.php');
	}
	public static function changeOrderBuyerCont($id){
		$order = modelUser::selectedOrderBuyer($id);
		include_once('view/changeOrderBuyer.php');
	}
	public static function changeOrderResultBuyerCont($id){
		$result = modelUser::changeOrderBuyer($id);
		include_once('view/changeOrderBuyer.php');
	}

//messages
	public static function conversationsWithUser($id){
		$conversations = modelUser::conversations($id);
		include_once('view/messages.php');
	}
	public static function messagesToUser($id){
		$from = modelUser::fromUser($id);
		$messages = modelUser::messages($id);
		include_once('view/messagesToUser.php');
	}


}//end controller