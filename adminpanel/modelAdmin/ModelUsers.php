<?php
class ModelUsers{
	public static function getUsersActionList(){
	$sql = "SELECT users.*, roles.`roleName` FROM  users,roles WHERE `users`.role = `roles`.idRole  ORDER BY `users`.`idUser` DESC";
	//создать экземпляр класса database
	$database = new database();
	//$rows = массив данных
	$rows = $database->getAll($sql);
	return $rows;
	}

	public static function getUserDetail($id){
		$sql = "SELECT users.* FROM users WHERE `users`.`idUser` = $id";
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}

	public static function editUser($id){
		$result = false;
		if (isset($_POST['save'])) {
			if (isset($_POST['userDescription'])) {
				$description=$_POST['userDescription'];
				$sql = "UPDATE `users` SET  `userDescription` = '$description' WHERE `users`.`idUser` = '$id'";
				$database = new database();
				$item = $database->executeRun($sql);
				$result = true;
			}// isset post name
		}//isset post save
	return $result;
	} //fucn
}
?>