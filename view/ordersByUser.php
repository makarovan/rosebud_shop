<?php
	ob_start();
?>


<div class="col-xs-9" style="float: left; width: 80%;">
	<h1 class="text-uppercase">Мои покупки</h1>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="text-transform: none;">#</th>
					<th style="text-transform: none;">Продавец</th>
					<th style="text-transform: none;">Товар</th>
					<th style="text-transform: none;">Бронь</th>
					<th style="text-transform: none;">Оплачено</th>
					<th style="text-transform: none;">Оплата</th>
					<th style="text-transform: none;">Отправлено</th>
					<th style="text-transform: none;">Получено</th>
					<th style="text-transform: none;">Дата изменения</th>
					<th style="text-transform: none;">Изменить</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($orders as $order) {
				?>
				<tr>
					<th scope="row"><?php echo $order['idOrder'];?></th>
					<th style="text-transform: none;">
						<?php
							echo '<a href="user?id='.$order['sellerId'].'">';
								echo $order['username'];?>
							</a>
					</th>
					<th style="text-transform: none;">
						<?php 
							echo '<a href="detail?id='.$order['productId'].'">';
								echo $order['name'];?>
							</a>
					</th>
					<th style="text-transform: none;">
						<?php
							if($order['booked']==1){echo 'да';}
							else {echo 'бронь отменена';}		
						?>
					</th>
					<th style="text-transform: none;">
						<?php 
						if ($order['payed']==1) { echo 'оплачено';}
						else {echo 'не оплачено';}
						?>
					</th>
					<th style="text-transform: none;">
						<?php 
							if ($order['gotPayment']==1) {echo 'оплата получена';}
							else {echo 'оплата не получена';}
						?>
					</th>
					<th style="text-transform: none;">
						<?php 
							if ($order['delivered']==1) {echo 'товар отправлен';}
							else {echo 'товар не отправлен';}
						?>
					</th>
					<th style="text-transform: none;">
						<?php 
							if ($order['got']==1) {echo 'товар получен';}
							else {echo 'товар не получен';}
						?>
					</th>
					<th style="text-transform: none;">
						<?php echo $order['date'];?>
					</th>
					<th>
						<a href="changeOrderBuyer?id=<?php echo $order['idOrder'];?>">
							<button class="btn btn-warning">Изменить</button>
						</a>
					</th>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>


<?php
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>


