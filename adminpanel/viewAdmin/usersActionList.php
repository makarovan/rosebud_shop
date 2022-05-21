<?php
ob_start();
?>

<h2>Products</h2>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="width: 50px;">#</th>
				<th  style="width: 50px;">Юзернейм</th>
				<th style="width: 100px;">Роль</th>
				<th  style="width: 100px;">эмейл</th>
				<th  style="width: 50px;">Описание</th>
				<th style="width:10%">?</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($users as $user) {
			?>	
					<tr>
						<th style="text-transform: none;" scope="row"><?php echo $user['idUser']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $user['username']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $user['roleName']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $user['email']; ?></th>
						<th style="text-transform: none;" scope="row"><?php echo $user['userDescription']; ?></th>
						<th>
							<button class="btn btn-warning btn-sm btn-block">
								<a href='editUser?id=<?php echo $user['idUser'];?>' style='color: white'>edit <span class="glyphicon glyphicon-edit"></span></a>
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