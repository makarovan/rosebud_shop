<?php
ob_start();
?>
<?php
	if (isset($resultLogIn) && $resultLogIn ==true) {//получает что результат не равен тру
		echo '<div class="alert alert-success">
					<i class="fa fa-check-circle"></i>               
		 			Вход прошел успешно. Привет,'.$_SESSION['name'].'
		 	  </div>';
	}elseif (isset($resultLogIn) && $resultLogIn==false) {
		echo '<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>Ошибка входа</div>';
	}

	if (isset($resultReg) && $resultReg[0]==true) {
		echo '<div class="alert alert-success">
				<i class="fa fa-check-circle"></i>               
			 	Регистрация прошла успешно. Войдите.
		 	  </div>';
	}elseif(isset($resultReg) && $resultReg[0]==false){
		echo '<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>Error! '.$resultReg[1].'</div>';
	}

?>

<div class="row">
	<div id="content" class="col-sm-12">
		<div class="page-login">
			<div class="account-border">
				<div class="row">
					<div class="col-sm-6 new-customer" style="width: 100%;">
						<!-- login -->
						<form action="loginResult" method="post"  id="loginForm">
							<div class="col-sm-6 customer-login" style="padding:0px;">
								<div class="well">
									<h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Вход</h2>
									<div class="form-group">
										<label class="control-label " for="input-email">Эмайл</label>
										<input type="email" name="email"class="form-control" placeholder="Эмейл" required />
									</div>
									<div class="form-group">
										<label class="control-label " for="input-password">Пароль</label>
										<input type="password" name="password" placeholder="Пароль" class="form-control" required />
									</div>
								</div>
								<div class="bottom-form">
									<a href="#" class="forgot">Забыли пароль?</a>
									<button type="submit" name="login" class="btn btn-default pull-right">Войти</button>
								</div>
							</div>
						</form>

						<!-- registration -->
						<form action="registerResult" method="POST" id="registrationForm">
							<div class="well" style="min-height: auto;">
								<h2><i class="fa fa-file-o" aria-hidden="true"></i> Регистрация</h2>
								<p>Создав аккаунт, вы сможете совершать покупки с удобством, получать информацию о статусе вашего заказа и выставлять товары на продажу.</p>
							</div>
							<div class="col-sm-6 customer-login" style=" margin:0; padding: 0;">
								<div class="well">
									<div class="form-group">
										<label class="control-label " for="input-password">Имя пользователя</label>
										<input type="text" name="username" class="form-control" placeholder="Имя пользователя" required />
									</div>
									<div class="form-group">
										<label class="control-label " for="input-email">Эмайл</label>
										<input type="email" name="email" class="form-control"  placeholder="Э-майл" required/>
									</div>
									<div class="form-group">
										<label class="control-label " for="input-password">Пароль</label>
										<input type="password" name="password" class="form-control" placeholder="Пароль" required/>
									</div>
									<div class="form-group">
										<label class="control-label " for="input-password">Подтвердите пароль</label>
										<input type="password" name="confirm" class="form-control" placeholder="Повторите пароль" required/>
									</div>
									<div class="form-group">
										<label class="control-label " for="input-password">Имя и фамилия</label>
										<input type="text" name="fullName" class="form-control" placeholder="Имя и фамилия" />
									</div>
									<div class="form-group">
										<label class="control-label " for="input-password">Адрес</label>
										<input type="text" name="adress" class="form-control" placeholder="Адрес"/>
									</div>
									<div class="form-group">
										<label class="control-label " for="input-password">Телефон</label>
										<input type="text" name="tel" class="form-control" placeholder="Телефон"/>
									</div>
								</div>
								<div class="bottom-form">
										<button type="submit" name="send" class="btn btn-default pull-right">Регистрация</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$content= ob_get_clean();
include_once 'view/templates/layout.php';