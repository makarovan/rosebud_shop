<?php
	ob_start();
?>
<div style="width: 80%; float: left; margin-top: 40px;">
	<h1 class="box-title">Мои товары</h4>


<div class="row">
<?php
foreach ($products as $product) {
 <div style="width: 20%; float: left; margin-right: 30px;height: 350px;">
	echo '<div style="width:25%; float:left; padding: 30px 30px 0 15px; text-align:center;">
		<div class="product-layout">
			<div class="product-item-container">
				<div class="left-block">
					<div class="product-image-container  second_img " title="Перейти к товару">';
						echo '<a href="detail?id='.$product['idProduct'].'" class="product-img"><img src="img/'.$product['img'].'" style="max-width:200px; max-height:250px;"></a>
					</div>
				</div>
				<div class="right-block" style="width:50%; margin: auto;">
					<div class="caption">';
						echo '<h4 style ="text-align:center;" title="Перейти к товару"><a href="detail?id='.$product['idProduct'].'">'.$product['name'].'</a></h4>';
						echo '
						<div class="price">
							<span class="price-new"><p style="text-align: center;">'.$product['price'].'</p></span>
						</div>
					</div>
					
				</div>
			</div>
		</div>';
		echo '<a href ="deleteProduct?id='.$product['idProduct'].'">
				<button class="btn btn-danger" style="width:80px; margin: 0 40px;">Удалить</button>
				</a>
</div>';
// </div>
}//foreach
?>
</div>
</div>

<?php
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>
