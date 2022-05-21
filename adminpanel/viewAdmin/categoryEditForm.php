<?php
ob_start();
?>

<div class="col-xs-9">
    <h4 class="box-title">Изменить категорию</h4>
    <?php
    if (isset($result)) {
        if ($result==true) {
    ?>
            <div class="alert alert-info">
                <strong>Категория изменена </strong><a href="categoryAction">Список категорий</a>
            </div>
    <?php
        }else if ($result==false) {
    ?>
            <div class="alert alert-warning">
                <strong>Ошибка изменения категории </strong><a href="categoryAction">Список категорий</a>
            </div>
    <?php
        }//result-false
    }//isset result
    else{//add category form
    ?>

    <form action="editcategoryResult?id=<?php echo $rowCategory['idCategory'];?>" method="POST" enctype="multipart/form-data">
        Категория					
        <input type="text" name="categoryName" placeholder="category name" class="form-control" value="<?php echo $rowCategory['categoryName'];?>">
           
            <input type="submit" class="btn btn-success" value="edit category" name="save">
    </form>


<?php
}
?>
</div>

<?php
    $content=ob_get_clean();
    include 'viewAdmin/templates/layout.php';
?>