<!-- модель контакт новое -->
<?php
class ModelContact{
	public static function getContactMessage(){
		$errorString="";
		$send = array(false, 'error send');
		if (isset ($_POST['send'])) {
			//add email where to send messages to admin
			$myemail = "you@mail.ru";

			$yourname = $_POST['name'];
			if (trim($yourname)=="") {
				$errorString.="Введите имя<br>";
			}
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			if (!$email) {
				$errorString.="Неправильный эмайл<br>";
			}
			$comment = $_POST['message'];
			if (trim($comment)=="") {
				$errorString.="Напишите свое сообщение";
			}
			$subject = "Сообщение с сайта Rosebud Shop";

			if ($errorString =="") {
				$message = "Привет!<br>

				Через контактную форму пришло сообщение:<br>
				<b>Имя:</b> $yourname <br>
				<b>Эмайл:</b> $email <br>
				<b>Сообщение:</b> $comment <br>";
				//send message to admin
				mail($myemail, $subject, $message);
				$send = array(true, $message);
			}else{
				$send = array(false, $errorString);
			}
		}
		return $send;
	}
}//end class
?> 