<?php
class ControllerAdmin {
		public static function startAdmin(){
			include_once('viewAdmin/dashboard.php');
		}
		public static function logoutAdmin(){
			ModelAdmin::getAdminLogout();
			header('Location:../');
		}
		public static function error404(){
			include_once('viewAdmin/error404.php');
		}
	
	
	

}//end class
?>