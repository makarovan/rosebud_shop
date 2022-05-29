<?php

class ControllerOrders{
	public static function ordersList(){
		$orders = ModelOrders::getOrdersActionList();
		include_once ('viewAdmin/ordersActionList.php');
	}

	public static function editOrderForm($id){
		$order = ModelOrders::getOrderDetail($id); 
		include_once('viewAdmin/orderEditForm.php');
	}

	public static function editOrderResult($id){
		$result = ModelOrders::editOrder($id); //обработка формы edit
		include_once('viewAdmin/orderEditForm.php');
	}


}

?>