<?php
ob_start();
?>

<div class="col-xs-9">
    <h4 class="box-title">Удалить категорию</h4>
    <?php
    if (isset($result)) {
        if ($result==true) {
    ?>
            <div class="alert alert-info">
                <strong>Категория удалена </strong><a href="categoryAction">Список категорий</a>
            </div>
    <?php
        }else if ($result==false) {
    ?>
            <div class="alert alert-warning">
                <strong>Ошибка удаления категории </strong><a href="categoryAction">Список категорий</a>
            </div>
    <?php
        }//result-false
    }//isset result
    else{//add category form
    ?>

    <form action="deletecategoryResult?id=<?php echo $rowCategory['idCategory'];?>" method="POST" enctype="multipart/form-data">
        Категория					
        <input type="text" name="category" placeholder="category" class="form-control" value="<?php echo $rowCategory['categoryName'];?>" readonly>
           
            <input type="submit" class="btn btn-success" value="delete category" name="save">
    </form>


<?php
}
?>
</div>

<?php
    $content=ob_get_clean();
    include 'viewAdmin/templates/layout.php';
?>