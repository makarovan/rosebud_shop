<?php
ob_start();
?>

<h2>Заказы</h2>
<div class="table-responsive" >
	<table class="table table-bordered">
		<thead>
			<tr>
				<th  style="width: 50px;">Номер заказа</th>
				<th style="width: 100px;">Покупатель</th>
				<th  style="width: 100px;">Продавец</th>
				<th  style="width: 50px;">Товар</th>
				<th style="width:10%">Действия</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($orders as $order) {
			?>	
					<tr>
						<th style="text-transform: none;" scope="row"><?php echo $order['idOrder']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $order['buyerId']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $order['sellerId']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $order['productId']; ?></th>
						<th>
							<button class="btn btn-warning btn-sm btn-block">
									<a href='editOrder?id=<?php echo $order['idOrder'];?>' style='color: white'>Изменить <span class="glyphicon glyphicon-edit"></span></a>
							</button>		
						</th>
					</tr>
			<?php
				}		
			?>
		</tbody>
	</table>
</div> 

<?php
$content = ob_get_clean();
include 'viewAdmin/templates/layout.php';
?>