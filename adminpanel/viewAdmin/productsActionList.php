<?php
ob_start();
?>

<h2>Товары</h2>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="width: 50px;">#</th>
				<th style="width: 100px;">Название</th>
				<th  style="width: 50px;">Продавец</th>
				<th  style="width: 100px;">Категория</th>
				<th  style="width: 50px;">Цена</th>
				<th  style="width: 50px;">Изменить</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($rows as $row) {
			?>	
					<tr>
						<th style="text-transform: none;" scope="row"><?php echo $row['idProduct']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $row['name']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $row['username']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $row['categoryName']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $row['price']; ?></th>
						<th style="text-transform: none;"> <a href="editProduct?id=<?php echo $row['idProduct']; ?>">изменить</a> </th>
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