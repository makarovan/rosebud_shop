<?php
ob_start();
?>

<div class="col-xs-9" style="float: left; width: 80%;">
        <h1 class="box-title">Изменить заказ</h4>
        <?php
        	if (isset($result)) {
        		if ($result==true) {
        ?>	
        			<div class="alert alert-success"><i class="fa fa-check-circle"></i>
						<strong>Заказ изменен.</strong>
						<?php
							echo '<a href="ordersAction">Все заказы</a>';
						?>
        			</div>
       	<?php
        		}
        		else if ($result==false){
        ?>
	        		<div class="alert alert-warning"><i class="fa fa-warning"></i>
						<strong>Ошибка изменения заказа</strong>
						<?php
							echo '<a href="ordersAction">Все заказы</a>';
						?>
	        		</div>
        <?php
        		}//result - false
        	}//isset result
        	else{
        ?>


        <form action="editOrderResult?id=<?php echo $order['idOrder']; ?>" method="POST" enctype="multipart/form-data">	
        	<div class="form-group" style="overflow: hidden;">					
		        <label class="col-sm-2 control-label" style="float: left; width: 20%;">Название товара: </label>
		        <div class="col-sm-10" style="width: 80%;">
		        	<input type="text" name="name" value="<?php echo $order['name'];?>" class="form-control" readonly>
		        </div>
		    </div>
			<div class="form-group" style="overflow: hidden;">					
		        <label class="col-sm-2 control-label" style="float: left; width: 20%;">Покупатель: </label>
		        <div class="col-sm-10" style="width: 80%;">
		        	<input type="text" name="username" value="<?php echo $order['username'];?>" class="form-control" readonly>
		        </div>
		    </div>
			<div class="form-group" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Цена: </label>
				<div class="col-sm-10" style="width: 80%;">
					<input type="number" name="price" value="<?php echo $order['price'];?>" class="form-control" readonly>
				</div>
			</div>
			<div class="form-group" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Бронь: </label>
				<div class="col-sm-10" style="float:left; width: 80%;">
					<select name="booked" class="form-control">
						<?php
                            switch ($order['booked']) {
                                case '1':
                                    echo '<option value="1">забронировано</option>';
                                    echo '<option value="0">бронь отменена</option> ';
                                    break;
                                case '0':
                                    echo '<option value="0">бронь отменена</option> ';
                                    echo '<option value="1">забронировано</option>';
                                    break;
                                default:
                                    break;
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Оплачено: </label>
				<div class="col-sm-10" style="width: 80%;">
					<select name="payed" class="form-control">
						<?php 
							switch ($order['payed']) {
								case '1':
									echo '<option value="1">оплачено</option>';
									echo '<option value="0">не оплачено</option> ';
									break;
								case '0':
									echo '<option value="0">не оплачено</option> ';
									echo '<option value="1">оплачено</option>';
									break;
								default:
									break;
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group" style="overflow: hidden;"> 
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Оплата получена: </label>
				<div class="col-sm-10" style="width: 80%;">
					<select name="gotPayment" class="form-control">
						<?php
							switch ($order['gotPayment']) {
								case '1':
									echo '<option value="1">Оплата получена</option>';
									echo '<option value="0">Оплата не получена</option> ';
									break;
								case '0':
									echo '<option value="0">Оплата не получена</option> ';
									echo '<option value="1">Оплата получена</option>';
									break;
								default:
									break;
							}
							
						?>
					</select>
				</div>
			</div>
			<div class="form-group" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Отправлено: </label>
				<div class="col-sm-10" style="width: 80%;">
					<select name="delivered" class="form-control">
						<?php
							switch ($order['delivered']) {
								case '1':
									echo '<option value="1">товар отправлен</option>';
									echo '<option value="0">товар не отправлен</option> ';
									break;
								case '0':
									echo '<option value="0">товар не отправлен</option> ';
									echo '<option value="1">товар отправлен</option>';
									break;
								
								default:
									break;
							}

						?>
					</select>
				</div>
			</div>
			<div class="form-group" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Получено покупателем: </label>
				<div class="col-sm-10" style="width: 80%;">
					<select name="got" class="form-control">
						<?php 
							switch ($order['got']) {
								case '1':
									echo '<option value="1">получено</option>';
									break;
								case '0':
									echo '<option value="0">не получено</option> ';
									echo '<option value="1">получено</option>';
									break;
								default:
									break;
							}
						?>
					</select>
				</div>
			</div>
	        <input type="submit" class="btn btn-success" value="Изменить статус" name="save">
	        <input type="reset" class="btn btn-warning" value="Отмена">
        </form>



		<?php
		}//end else
		?>
</div>

<?php
	$content = ob_get_clean();
	include "viewAdmin/templates/layout.php";
?>