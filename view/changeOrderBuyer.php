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
						<strong>Заказ изменен. 
							<?php
								echo '<a href="myOrders?id='.$_SESSION['userId'].'"> Мои заказы</a>';
							?>
						</strong>
        			</div>
       	<?php
        		}
        		else if ($result==false){
        ?>
	        		<div class="alert alert-warning"><i class="fa fa-warning"></i>
						<strong>Ошибка изменения заказа. 
							<?php
								echo '<a href="myOrders?id='.$_SESSION['userId'].'"> Мои заказы</a>';
							?>
						</strong>
	        		</div>
        <?php
        		}//result - false
        	}//isset result
        	else{
        ?>


        <form action="changeOrderResultBuyer?id=<?php echo $order['idOrder']; ?>" method="POST" enctype="multipart/form-data">	
        	<div class="form-group required" style="overflow: hidden;">					
		        <label class="col-sm-2 control-label" style="float: left; width: 20%;">Название товара: </label>
		        <div class="col-sm-10" style="width: 80%;">
		        	<input type="text" name="name" value="<?php echo $order['name'];?>" class="form-control" readonly>
		        </div>
		    </div>
			<div class="form-group required" style="overflow: hidden;">					
		        <label class="col-sm-2 control-label" style="float: left; width: 20%;">Продавец: </label>
		        <div class="col-sm-10" style="width: 80%;">
		        	<input type="text" name="username" value="<?php echo $order['username'];?>" class="form-control" readonly>
		        </div>
		    </div>
			<div class="form-group required" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Цена: </label>
				<div class="col-sm-10" style="width: 80%;">
					<input type="number" name="price" value="<?php echo $order['price'];?>" class="form-control" readonly>
				</div>
			</div>
			<div class="form-group required" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Бронь: </label>
				<div class="col-sm-10" style="width: 80%;">
					<select name="booked" class="form-control">
						<?php
							switch ($order['payed']) {
								case '1':
									echo '<option value="1">Вы оплатили товар</option>';
									break;
								case '0':
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
									break;
								default:
									break;
							}
							// if ($order['booked']==1){
							// 	echo '<option value="1">забронировано</option>';
							// 	echo '<option value="0">бронь отменена</option> ';
							// }elseif ($order['booked']==0){
							// 	echo '<option value="0">бронь отменена</option> ';
							// 	echo '<option value="1">забронировано</option>';
							// }
						?>
					</select>
				</div>
			</div>
			<div class="form-group required" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Оплачено: </label>
				<div class="col-sm-10" style="width: 80%;">
					<select name="payed" class="form-control">
						<?php
							switch ($order['gotPayment']) {
								case '1':
									echo '<option value="1">оплата получена продавцом</option>';
									break;
								case '0':
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
									break;
								default:
									break;
							}
						?>

						<!-- if ($order['payed']==1){
								echo '<option value="1">оплачено</option>';
								echo '<option value="0">не оплачено</option> ';
							}elseif ($order['payed']==0){
								echo '<option value="0">не оплачено</option> ';
								echo '<option value="1">оплачено</option>';
							} -->
					</select>
				</div>
			</div>
			<div class="form-group required" style="overflow: hidden;"> 
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Оплата получена: </label>
				<div class="col-sm-10" style="width: 80%;">
					<input type="text" name="gotPayment" value=
						"<?php
							if($order['gotPayment']==0){
								echo 'нет';
							}elseif($order['gotPayment']==1){
								echo 'да';
							}
						?>"
					 class="form-control" readonly>
				</div>
			</div>
			<div class="form-group required" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Отправлено: </label>
				<div class="col-sm-10" style="width: 80%;">
					<input type="text" name="delivered" value=
						"<?php
							if($order['delivered']==0){
								echo 'нет';
							}elseif($order['delivered']==1){
								echo 'да';
							}
						?>"
					 class="form-control" readonly>
				</div>
			</div>
			<div class="form-group required" style="overflow: hidden;">
				<label class="col-sm-2 control-label" style="float: left; width: 20%;">Получено покупателем: </label>
				<div class="col-sm-10" style="width: 80%;">
					<select name="got" class="form-control">
						<?php
						switch ($order['delivered']) {
							case '1':
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
								break;
							case '0':
								echo '<option value="0">продавец не отправил товар</option> ';
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
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>