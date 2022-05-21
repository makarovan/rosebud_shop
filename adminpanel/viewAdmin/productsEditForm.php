<?php
ob_start();
?>
<!-- content -->
	<div class="col-xs-9">
        <h4 class="box-title">Редактировать товар</h4>
        
        <?php
        	if (isset($result)) {
        		if ($result==true) {
        ?>	
		        	<div class="alert alert-success"><i class="fa fa-check-circle"></i>
		        		<strong>Товар изменен.</strong>
		        	</div>
       	<?php
        		}
        		else if ($result==false){
        ?>
	        		<div class="alert alert-warning"><i class="fa fa-warning"></i>
	        			<strong>Ошибка изменения товара</strong> 
	        		</div>
        <?php
        		}//result - false
        	}//isset result
        	else{
        ?>
		 <form action="editProductsResult?id=<?php echo $rowProducts['idProduct'];?>" method="POST" enctype="multipart/form-data">	
			 Title				
	        <input type="text" name="name" placeholder="name" class="form-control" value="<?php echo $rowProducts['name'];?>" required>							
	        Category
	        <select name="idCategory" id="" class="form-control">
	        	<?php
	        		foreach ($rowsCategory as $row) {
	        		    echo '<option value="'.$row['idCategory'].'"';
	        		    if ($row['idCategory']==$rowProducts['categoryId']) echo 'selected';
	        		    echo '>'.$row['categoryName'].'</option>';
	        		}
	        	?>
			</select>
			<p>Picture	
			<img src="../img/<?php echo $rowProducts['img']; ?>" class="thumbnail" width=150px>
			</p>
			Text news<textarea name="description" placeholder='description' class="form-control" required><?php echo $rowProducts['description'];?></textarea>
			
	        <input type="submit" class="btn btn-success" value="Изменить" name="save">
        </form>



<?php
}//end else
?>
</div>
<!-- end content -->
<?php
	$content= ob_get_clean();
	include 'viewAdmin/templates/layout.php';
?>