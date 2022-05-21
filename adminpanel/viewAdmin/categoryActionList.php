<?php
ob_start();
?>
<h4 class="box-title">Category Action list</h4>
	<button class="btn btn-success btn-sm ">
		<a href='addcategory' style='color: white'>add category</a>
	</button>
	<table class="table">
		<thead>
			<tr class="d-flex">
				<th style="width:30%">id</th>
				<th style="width:60%">Category</th>			
				<th style="width:10%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($rows as $row) {
			?>
			<tr>
				<td><?php echo $row['idCategory'];?></td>
				<td><?php echo $row['categoryName'];?></td>		
				<td>
					<button class="btn btn-warning btn-sm btn-block">
						<a href='editcategory?id=<?php echo $row['idCategory'];?>' style='color: white'>edit <span class="glyphicon glyphicon-edit"></span></a>
					</button>							
					<button class="btn btn-danger btn-sm btn-block">
						<a href='deletecategory?id=<?php echo $row['idCategory'];?>' style='color: white'>delete <span class="glyphicon glyphicon-trash"></span></a>
					</button>
				</td>
			</tr>   
			<?php
				}//end foreach
			?>               
		</tbody>
		<tfoot>
			<tr>
				<td colspan=3></td>
			</tr>
		</tfoot>
	</table>
<?php
	$content = ob_get_clean();
	include 'viewAdmin/templates/layout.php';