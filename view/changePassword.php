<?php
	ob_start();
?>

<div class="col-xs-9" id="passDiv" >
	<h1>Изменить пароль</h1>
	<?php
		if (isset($result)) {
			if ($result[0]==true) {
				echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i>
						 <strong>'.$result[1].'</strong>
	         		</div>';
			}elseif ($result[0]==false) {
				echo '<div class="alert alert-warning"><i class="fa fa-warning"></i>
						<strong>'.$result[1].'</strong>
		         	</div>';
			}
		}
	?>

	<form method="POST" action="changePassResult">
		<div class="form-group" style="overflow: hidden;">
			<label for="current_password" id="labelPass" class="col-sm-2 control-label" >Старый пароль</label>
			<div class="col-sm-10" id="inputPass">
				<input type="password" class="form-control" name="currentPassword" >
			</div>
		</div>
		<div class="form-group" style="overflow: hidden;">
			<label for="new_password" id="labelPass" class="col-sm-2 control-label">Новый пароль</label>
			<div class="col-sm-10" id="inputPass">
				<input type="password" class="form-control" name="newPassword" >
			</div>
		</div>
		<div class="form-group" style="overflow: hidden;">
			<label for="confirm_password" id="labelPass" class="col-sm-2 control-label" >Подтвердить новый пароль</label>
			<div class="col-sm-10" id="inputPass">
				<input type="password" class="form-control" name="confirmPassword" >
			</div>
		</div>
		<input type="submit" class="btn btn-success" value="Сохранить" name="send">
	    <input type="reset" class="btn btn-warning" value="Отменить" name="reset">
	</form>
</div>

<?php
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>