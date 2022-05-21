<?php
ob_start();
?>

<div class="col-xs-9" style="float: left; width: 80%;">
        <h1 class="box-title">Добавить товар</h4>
        <?php
        	if (isset($results)) {
        		if ($results==true) {
        ?>	
        			<div class="alert alert-success"><i class="fa fa-check-circle"></i>
        				<?php
	        			echo '<strong>Запись добавлена.</strong> <a href="my_products?id='.$_SESSION['userId'].'">Список товаров</a>';
        				?>
        			</div>
       	<?php
        		}
        		else if ($results==false){
        ?>
	        		<div class="alert alert-warning"><i class="fa fa-warning"></i>
	        			<?php
	        			echo '<strong>Ошибка добавления товара</strong> <a href="my_products?id='.$_SESSION['userId'].'">Список товаров</a>';
	        			?>
	        		</div>
        <?php
        		}//result - false
        	}//isset result
        	else{
        ?>


        <form action="addProductResult" method="POST" enctype="multipart/form-data">	
        	<div class="form-group required" style="overflow: hidden;">					
		        <label class="col-sm-2 control-label" style="float: left; width: 20%;">Название товара: </label>
		        <div class="col-sm-10" style="width: 80%;">
		        	<input type="text" name="name" placeholder="Название" class="form-control" required>
		        </div>
		    </div>
		    <div class="form-group required" style="overflow: hidden;">
		        <label class="col-sm-2 control-label" style="float: left; width: 20%;">Категория: </label>
		        <div class="col-sm-10" style="width: 80%;">
			        <select name="category" id="" class="form-control">
			        	<?php
			        		foreach ($rows as $row) {
			        		    echo '<option value="'.$row['idCategory'].'">'.$row['categoryName'].'</option>';
			        		}
			        	?>
					</select>
				</div>
			</div>
			<div class="form-group required" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Описание товара: </label>
				<div class="col-sm-10" style="width: 80%;">
					<textarea name="description" placeholder='Описание' class="form-control" required></textarea>
				</div>
			</div>
			<div class="form-group required" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Цена: </label>
				<div class="col-sm-10" style="width: 80%;">
					<input type="number" name="price" step="0.01" min="0" placeholder="Цена" class="form-control" required>
				</div>
			</div>
			<div class="form-group required" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Изображение: </label>
				<div class="col-sm-10" style="width: 80%;">
					<input type="file" name="img"  class="form-control" required>
				</div>
			</div>
	        <input type="submit" class="btn btn-success" value="Добавить товар" name="save">
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