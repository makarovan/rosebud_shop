<?php
ob_start();
?>

<div class="col-xs-9" style="float: left;">
        <h1 class="box-title">Сделать заказ</h1>

        <?php
        	if (isset($result)) {
        		if ($result==true) {
        ?>	
        			<div class="alert alert-success"><i class="fa fa-check-circle"></i>
						<strong>Заказ сделан.</strong>
						<?php
							echo '<a href="myOrders?id='.$_SESSION['userId'].'"> Мои заказы</a>';
						?>
        			</div>
       	<?php
        		}
        		else if ($result==false){
        ?>
	        		<div class="alert alert-warning"><i class="fa fa-warning"></i>
						<strong>Ошибка создания заказа</strong>
	        		</div>
        <?php
        		}//result - false
        	}//isset result
        	else{
        		
        ?>


        <form action="newOrderResult?id=<?php echo $product['idProduct']; ?>" method="POST" enctype="multipart/form-data">	
        	<div class="product-view product">
				<div class="left-content-product col-lg-12 col-xs-12">
					<div class="product">
						<div class="title-product">
							<?php
								echo '<h2>'.$product['name'].'</h1>';
							?>
						</div>
						<div style="float: left; margin-right: 20px; width: 30%;">
							<div>
								<?php
									echo '<img src="img/'.$product['img'].'" style="width:400px;">';
								?>
							</div>
						</div>
						<div class="content-product-right col-sm-6 col-xs-12" style="width: 50%;">	
							<div class="product-box-desc">
								<?php
									echo '<p>Категория: <a href ="category?id='.$product['idCategory'].'">'.$product['categoryName'].'</a></p>';
									echo '<p>Продавец: <a href ="user?id='.$product['sellerId'].'">'.$product['username'].'</a></p>';
								?>
							</div>
							<div class="product-label form-group">
								<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
									<?php
										echo '<h1>Цена: </h1><span class="price-new" itemprop="price" style="display:block; height:45px;">'.$product['price'].' €</span>';
									?>
								</div>
								<div>
									<h3>Описание: </h3>
									<?php
										echo '<p>'.$product['description'].'</p>';
									?>

									<input type="text" name="sellerId" value="<?php echo $product['sellerId'];?>" class="form-control" style="visibility:hidden;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button class="btn btn-warning" style="float: right; margin-left: 15px;"><a href="detail?id=<?php echo $product['idProduct'];?>" style="color: white;" >На страницу товара</a></button> 
			<?php
				if(isset($available['booked']) //есть в списке заказов
										&& isset($_SESSION['userId']) && $_SESSION['userId']!=$row['sellerId']){ //пользователь в сессии и не продавец этого товара
										if ($available['booked']==1 && $available['payed']==1){ //забронировано и оплачено
											echo '<span style="color:red">Вы не можете приобрести товар</span>';
										}elseif($available['booked']==1 && $available['payed']==0){ //забронировано, не оплачено
											echo '<span style="color:red">Товар забронирован</span>';
										}elseif($available['booked']==0){ //не забронировано
											echo '<input type="submit" class="btn btn-success" value="Сделать заказ" name="save" style="float: right;">';
										
										}else if (isset($_SESSION['userId']) && $_SESSION['userId']==$available['sellerId']){ //пользователь продавец товара
										echo'<span style="color:red"> Вы продавец.</span>';
										}else{
											echo'<span style="color:red"> ошибка. Свяжитесь с продавцом или покупателем для уточнения.</span>';
										}
									
										// echo '<button class="btn btn-warning">
										// 	<a href="makeOrder?id=.'$row['idProduct'].'" style="color: white">Сделать заказ</a>
										// </button>';
				}else if (isset($_SESSION['userId'])){ //пользователь в сессии
										echo '<input type="submit" class="btn btn-success" value="Сделать заказ" name="save" style="float: right;">';
				}else if(!isset($_SESSION['userId'])){
										echo'<span style="color:red"> Войдите для заказа.</span>';
									}
									
									
			?>
	        <!-- <input type="submit" class="btn btn-success" value="Сделать заказ" name="save" style="float: right;"> -->
        </form>



		<?php
		}//end else
		?>
</div>




<?php
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>