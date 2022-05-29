<?php

class ControllerUsers{
	public static function usersList(){
		$users = ModelUsers::getUsersActionList();
		include_once ('viewAdmin/usersActionList.php');
	}

	public static function editUserForm($id){
		$user = ModelUsers::getUserDetail($id); 
		include_once('viewAdmin/userEditForm.php');
	}

	public static function editUserResult($id){
		$result = ModelUsers::editUser($id); //обработка формы edit
		include_once('viewAdmin/userEditForm.php');
	}


}

?>