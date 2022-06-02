<?php
ob_start();
?>

<div class="col-xs-9" id="passDiv" >
        <h1 class="box-title">Удалить товар</h1>
        <?php
        	if (isset($result)) {
        		if ($result==true) {
        ?>	
        			<div class="alert alert-success"><i class="fa fa-check-circle"></i>
						<strong>Товар удален.</strong>
        			</div>
       	<?php
        		}
        		else if ($result==false){
        ?>
	        		<div class="alert alert-warning"><i class="fa fa-warning"></i>
						<strong>Ошибка удаления товара</strong>
	        		</div>
        <?php
        		}//result - false
        	}//isset result
        	else{
        ?>


        <form action="deleteProductResult?id=<?php echo $product['idProduct']; ?>" method="POST" enctype="multipart/form-data">	
        	<div class="form-group" style="overflow: hidden; margin-bottom: 20px;">					
		        <label class="col-sm-2 control-label" id="labelPass">Название товара: </label>
		        <div class="col-sm-10" id="inputPass">
		        	<input type="text" name="name" value="<?php echo $product['name'];?>" class="form-control" readonly>
		        </div>
		    </div>
		    <div class="form-group"  style="overflow: hidden; margin-bottom: 20px;">
		        <label class="col-sm-2 control-label" id="labelPass">Категория: </label>
		        <div class="col-sm-10" id="inputPass">
			        <select name="category" id="" class="form-control" disabled>
			        	<?php
			        		foreach ($categories as $category) {
			        		    echo '<option value="'.$category['idCategory'].'"';
			        		    if ($category['idCategory'] == $product['categoryId']) echo 'selected';
			        		    echo '>'.$category['categoryName'].'</option>';
			        		}
			        	?>
					</select>
				</div>
			</div>
			<div class="form-group"  style="overflow: hidden; margin-bottom: 20px;">
				<label class="col-sm-2 control-label" id="labelPass">Описание товара: </label>
				<div class="col-sm-10" id="inputPass">
					<textarea name="description" value="<?php echo $product['description'];?>" class="form-control" readonly></textarea>
				</div>
			</div>
			<div class="form-group"  style="overflow: hidden; margin-bottom: 20px;">
				<label class="col-sm-2 control-label" id="labelPass">Цена: </label>
				<div class="col-sm-10" id="inputPass">
					<input type="number" name="price" value="<?php echo $product['price'];?>" class="form-control" readonly>
				</div>
			</div>
			<div class="form-group"  style="overflow: hidden; margin-bottom: 20px;">
				<label class="col-sm-2 control-label" id="labelPass">Изображение: </label>
				<div class="col-sm-10" id="inputPass">
					<input type="text" name="oldpicture" placeholder="Old Picture" class="form-control" value="<?php echo $product['img'];?>" readonly>
					<img src="./img/<?php echo $product['img'];?>" style="width: 25%; margin-top: 20px;">
				</div>
			</div>
	        <input type="submit" class="btn btn-success" value="Удалить товар" name="save">
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