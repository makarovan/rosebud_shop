<?php
ob_start();
?>
<div class="col-xs-9">
    <h4 class="box-title">Добавить категорию</h4>
    <?php
    if (isset($result)) {
   		if ($result==true) {
    ?>
    		<div class="alert alert-info">
    			<strong>Категория добавлена </strong><a href="categoryAction">Список категорий</a>
    		</div>
    <?php
    	}else if ($result==false) {
    ?>
    		<div class="alert alert-warning">
    			<strong>Ошибка добавления категории </strong><a href="categoryAction">Список категорий</a>
    		</div>
    <?php
    	}//result-false
    }//isset result
    else{//add category form
    ?>


    <form action="addcategoryresult" method="POST" enctype="multipart/form-data">						
        <input type="text" name="categoryName" placeholder="категория" class="form-control" required>
        <input type="submit" class="btn btn-success" value="добавить категорию" name="save">
   </form>

<?php
}
?>
</div>

<?php
	$content=ob_get_clean();
	include 'viewAdmin/templates/layout.php';