<?php
ob_start();
?>

<div class="col-xs-9">
    <h4 class="box-title">Изменить описание пользователя</h4>
    <?php
    if (isset($result)) {
        if ($result==true) {
    ?>
            <div class="alert alert-info">
                <strong>Описание изменено </strong>
            </div>
    <?php
        }else if ($result==false) {
    ?>
            <div class="alert alert-warning">
                <strong>Ошибка изменения описания </strong>
            </div>
    <?php
        }//result-false
    }//isset result
    else{//add category form
    ?>

    <form action="editUserResult?id=<?php echo $user['idUser'];?>" method="POST" enctype="multipart/form-data">
        Описание					
        <input type="text" name="userDescription" placeholder="Описание пользователя" class="form-control" value="<?php echo $user['userDescription'];?>">
        <input type="submit" class="btn btn-success" value="Изменить" name="save">
    </form>


<?php
}
?>
</div>

<?php
    $content=ob_get_clean();
    include 'viewAdmin/templates/layout.php';
?>