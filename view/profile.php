<?php
ob_start();
?>

<div class="col-xs-9" id="editUser" >
        <h1 class="box-title">Изменить данные</h4>
        <?php
        	if (isset($result)) {
        		if ($result[0]==true) {
        ?>	
        			<div class="alert alert-success"><i class="fa fa-check-circle"></i>
        				<?php
	        			echo '<strong>'.$result[1].'</strong>';
        				?>
        			</div>
       	<?php
        		}
        		else if ($result[0]==false){
        ?>
	        		<div class="alert alert-warning"><i class="fa fa-warning"></i>
	        			<?php
	        			echo '<strong>'.$result[1].'</strong>';
	        			?>
	        		</div>
        <?php
        		}//result - false
        	}//isset result
        	else{
        ?>


        <form action="editUserResult" method="POST" enctype="multipart/form-data">	
        	<div class="form-group" style="overflow: hidden;">
		        <label class="col-sm-2 control-label" id="editUserLabel">Электронная почта: </label>
		        <div class="col-sm-10" id="editUserInput">
			        <input type="email" name="email" value="<?php echo $_SESSION['email']?>" class="form-control" required>
				</div>
			</div>

			<div class="form-group" style="overflow: hidden;">
		        <label class="col-sm-2 control-label" id="editUserLabel">Username: </label>
		        <div class="col-sm-10" id="editUserInput">
			        <input type="text" name="username" value="<?php echo $_SESSION['name']?>" class="form-control" required>
				</div>
			</div>

		    <div class="form-group" style="overflow: hidden;">					
		        <label class="col-sm-2 control-label" id="editUserLabel">Полное имя: </label>
		        <div class="col-sm-10" id="editUserInput">
		        	<input type="text" name="fullName" value="<?php echo $description['fullName']?>" class="form-control">
		        </div>
		    </div>
		    <div class="form-group" style="overflow: hidden;">					
		        <label class="col-sm-2 control-label" id="editUserLabel">Номер телефона: </label>
		        <div class="col-sm-10" id="editUserInput">
		        	<input type="number" name="tel" value="<?php echo $description['tel']?>" class="form-control" required>
		        </div>
		    </div>
		   	<div class="form-group" style="overflow: hidden;">					
		        <label class="col-sm-2 control-label" id="editUserLabel">Адрес: </label>
		        <div class="col-sm-10" id="editUserInput">
		        	<input type="text" name="adress" value="<?php echo $description['adress']?>" class="form-control">
		        </div>
		    </div>
			<div class="form-group" style="overflow: hidden;">
				<label class="col-sm-2 control-label" id="editUserLabel">Описание продавца: </label>
				<div class="col-sm-10" id="editUserInput">
					<textarea name="userDescription" class="form-control"><?php echo $description['userDescription']?></textarea>
				</div>
			</div>
			
	        <input type="submit" class="btn btn-success" id="editUserButton" value="Сохранить" name="save">
	        <input type="reset" class="btn btn-warning" id="editUserButton" value="Отменить" name="reset">
        </form>



		<?php
		}//end else
		?>
</div>



<?php
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>