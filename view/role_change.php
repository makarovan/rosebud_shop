<?php
	ob_start();
?>


<div class="main-container container" style="margin-top: 0px; float: left; width: 80%;">
	<span style="display: block; margin: auto;margin-top: 20px;">
			<h1 style="margin-top: 0;">Изменить роль</h1>
			<?php
	        	if (isset($result)) {
	        		echo '<div style="width: 60%; float: left;">';
	        		if ($result==true) {
	        ?>	
	        			<div class="alert alert-success"><i class="fa fa-check-circle"></i>
							<strong>Роль изменена успешно</strong>
	        			</div>
	       	<?php
	        		}
	        		else if ($result==false){
	        ?>
		        		<div class="alert alert-warning"><i class="fa fa-warning"></i>
							<strong>Ошибка изменения роли</strong>
		        		</div>
	        <?php
	        		}//result - false
	        		echo '</div>';
	        	}//isset result
	        	else{
	        ?>

		<!-- <div style="float:left;"> -->
			<form action="changeRoleResult" method="POST" enctype="multipart/form-data">
				<div class="form-group required" style="overflow: hidden;">					
			        <label class="col-sm-2 control-label" style="float: left; width: 20%;">Выберите роль:</label>
			        <div class="col-sm-10" style="float:left; width: 80%;">
						<select name="role" class="form-control">
							<option value="2">Покупатель</option>
							<option value="3">Покупатель и продавец</option>
						</select>
					</div>
			    </div>
		    <input type="submit" class="btn btn-success" value="Изменить роль" name="save">
	        <input type="reset" class="btn btn-warning" value="Отмена">
			</form>
		<!-- </div> -->
	</span>
<?php
}
?>
</div>


<?php
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>


