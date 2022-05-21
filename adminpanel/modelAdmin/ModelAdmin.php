<?php
class ModelAdmin{

	public static function getAdminLogout(){
		session_destroy();
		unset($_SESSION['sessionId']);
		unset($_SESSION['userId']);
		unset($_SESSION['name']);
		unset($_SESSION['role']);
		unset($_SESSION['email']);
	}
	
}//end class



















