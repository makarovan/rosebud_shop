<?php
	ob_start();
?>
<div style="width:80%; float: left;">
	<h1 class="box-title">Мои товары</h4>



<?php
foreach ($products as $product) {
	echo '

		<div class="product-layout" style="width:30%; float:left; margin-bottom:20px;">
			<div class="product-item-container">
				<div class="left-block">
					<div class="product-image-container  second_img " title="Перейти к товару">';
						echo '<a href="detail?id='.$product['idProduct'].'" class="product-img"><img src="img/'.$product['img'].'"></a>
					</div>
				</div>
				<div class="right-block">
					<div class="caption">';
						echo '<h4 style ="text-align:center;" title="Перейти к товару"><a href="detail?id='.$product['idProduct'].'">'.$product['name'].'</a></h4>';
						echo '
						<div class="price">
							<span class="price-new"><p style="text-align: center;">'.$product['price'].'</p></span>
						</div>
					</div>
					<a href ="deleteProduct?id='.$product['idProduct'].'" style="width:30%; margin: 0 auto; display:block;">
						<button class="btn btn-danger">Удалить</button>
					</a>
				</div>

		
	</div>
</div>';
}//foreach
?>
</div>


<?php
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>
