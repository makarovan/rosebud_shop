<?php
ob_start();
?>

<?php
	//если товар не найден
	if(empty($row)){
		echo '<div class="container" style="min-height:400px;">
				<h2>404 ошибка</h2>
				<p>	Упс, что-то пошло не так. Страница не найдена.</p>
			</div>';
	}else{
?>

<div class="product-container container">
	<ul class="header-main product-v2">
		<li class="home"><a href="index" class="product-img">Главная<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
		<?php
			echo '<li class="home"><a href="category?id='.$row['idCategory'].'" class="product-img">'.$row['categoryName'].'<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
		?>
		<?php
			echo '<li><a href="detail?id='.$row['idProduct'].'" class="product-img">'.$row['name'].'</a></li>';
		?>
	</ul>

	<div class="row productRow">
				<!--Middle Part Start-->
		<div id="content" class="col-md-12 col-sm-12 type-2">
			<div class="product-view row">
				<div class="left-content-product col-lg-12 col-xs-12">
					<div class="row">
						<div style="float: left; margin-right: 20px; width: 45%;">
							<div>
								<?php
									echo '<img src="img/'.$row['img'].'" style="width:400px;">';
								?>
							</div>
						</div>
						<div class="content-product-right col-sm-6 col-xs-12" style="width: 50%;">
							<div class="title-product">
								<?php
								echo '<h1>'.$row['name'].'</h1>';
								?>
							</div>
							
							<div class="product-box-desc">
								<?php
									echo '<p >Категория: <a href ="category?id='.$row['idCategory'].'" title="Перейти к категории">'.$row['categoryName'].'</a></p>';
									echo '<p>Продавец: <a href ="user?id='.$row['sellerId'].'" title="Перейти к продавцу">'.$row['username'].'</a></p>';
								?>
							</div>
							<div class="product-label form-group">
								<div class="stock">
									<span>Доступность: </span>
									<?php
									
										if(isset($available['payed']) || isset($available['booked'])){
											if ($available['booked']==1 && $available['payed']==1){
												echo '<span style="color:red">продано</span>';
											}elseif($available['booked']==1 && $available['payed']==0){
												echo '<span style="color:red">забронировано</span>';
											}elseif($available['booked']==0){
												echo '<span class="instock">продается</span>';
											}else{
												echo'<span style="color:red"> ошибка. Свяжитесь с продавцом или покупателем для уточнения.</span>';
											}
										}else{	
											echo '<span class="instock">продается</span>';
										
										}
									
									?>
								</div>
								<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer" style="margin-top: 20px;">
									<?php
										echo '<span class="price-new" itemprop="price" style="display:block; height:45px;">'.$row['price'].' €</span>';
									?>
								</div>
								<div>
									<h3 id="prodDesc">Описание: </h3>
									<?php
										echo '<p>'.$row['description'].'</p>';
									?>
								</div>
								<div>
									<?php 
										// if(isset($_SESSION['userId']) && $_SESSION['userId']!=$row['sellerId']  && (empty($available['booked'])) || $available['booked']==0){
									// if(isset($_SESSION['userId']) && $_SESSION['userId']!=$row['sellerId'] ){
									// 		echo '<button class="btn btn-warning">';
									// 		echo '<a href="makeOrder?id='.$row['idProduct'].'" style="color: white">Сделать заказ</a>';
									// 		echo '</button>';
									// 	}else if($available['booked']==1 OR !empty($available['booked'])){
									// 		echo '<button class="btn btn-warning" disabled>';
									// 			echo '<a href="#" style="color: white" disabled>Вы не можете забронировать товар</a>';
									// 		echo '</button>';
									// 	}


									if(isset($available['booked']) //есть в списке заказов
										&& isset($_SESSION['userId']) && $_SESSION['userId']!=$row['sellerId']){ //пользователь в сессии и не продавец этого товара
										if ($available['booked']==1 && $available['payed']==1){ //забронировано и оплачено
											echo '<button class="btn btn-warning" disabled>';
											echo '<a href="#" style="color: white" disabled>Вы не можете приобрести товар</a>';
									 		echo '</button>';
										}elseif($available['booked']==1 && $available['payed']==0){ //забронировано, не оплачено
											echo '<button class="btn btn-warning" disabled>';
											echo '<a href="#" style="color: white" disabled>Товар забронирован</a>';
									 		echo '</button>';
										}elseif($available['booked']==0){ //не забронировано
											echo '<button class="btn btn-warning">';
											echo '<a href="makeOrder?id='.$available['idProduct'].'" style="color: white">Сделать заказ</a>';
									 		echo '</button>';
										}
										else{
											echo'<span style="color:red"> ошибка. Свяжитесь с продавцом или покупателем для уточнения.</span>';
										}
									}else if (isset($_SESSION['userId']) && $_SESSION['userId']==$row['sellerId']){ //пользователь продавец товара
										echo '<h2 style="color:red"><strong>Вы продавец</strong></h2>';
										// echo '<button class="btn btn-warning">
										// 	<a href="makeOrder?id=.'$row['idProduct'].'" style="color: white">Сделать заказ</a>
										// </button>';
									}else if (isset($_SESSION['userId'])){ //пользователь в сессии
										echo '<button class="btn btn-warning">
											<a href="makeOrder?id='.$row['idProduct'].'" style="color: white">Сделать заказ</a>
										</button>';
									}else if(!isset($_SESSION['userId'])){
										echo'<span style="color:red"> Войдите для заказа.</span>';
									}
									
									?>
									<!-- <button class="btn btn-warning">
										<a href="makeOrder?id=<?php //echo $row['idProduct']; ?>" style="color: white">Сделать заказ</a>
									</button> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php
}
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>