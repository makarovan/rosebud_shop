<?php
	ob_start();
?>


<div class="main-container container" id="accContainer">
	<span id="accSpan">
		<?php
				echo '<h1 style="margin-top: 0;">'.$acc['username'].'</h1>
		<div style="width: 60%; float: left;">
				<div style="padding-left: 1%;">';
					echo '<p>Эмайл: '.$acc['email'].'</p>';
					echo '<p>Телефон: '.$acc['tel'].'</p>';
					echo '<p>Имя: '.$acc['fullName'].'</p>
				</div>';
			?>
		</div>
		<!-- <div style="width: 25%; margin-left: 5%; overflow: hidden;"> -->
		
			
		<div class="col-sm-4" style="width: 35%; margin-left: 5%; overflow: hidden;">
			<h5>Описание продавца:</h5>
			<?php
				echo '<p>'.$acc['userDescription'].'</p>';
			?>
		</div>
	</span>
	<div class="row" style="margin-bottom: 15px;">
		<div id="content" class="col-md-9 col-sm-8  col-xs-12" id="accProducts">
			<div class="digital">
				<div class="row">
					<div class=" col-sm-12">
						<h3 class="modtitle">Товары:</h3>
						<div class="digital-owl">
							<div class=" owl-carousel digital-owl " data-dots="no" data-nav="yes" data-loop="yes" data-items_xs="1" data-items_sm="2" data-items_md="4" data-margin="20">

								<?php
									foreach ($products as $product) {
										echo '
									<div class="product-layout">
											<div class="product-item-container">
												<div class="left-block">
													<div class="product-image-container  second_img ">';
														echo '<a href="detail?id='.$product['idProduct'].'" class="product-img"><img src="img/'.$product['img'].'"></a>
													</div>
												</div>
												<div class="right-block">
													<div class="caption">';

														echo '<h4><a href="detail?id='.$product['idProduct'].'">'.$product['name'].'</a></h4>';
														echo '<h4><a href="user?id='.$product['sellerId'].'">'.$product['username'].'</a></h4>
	
														<div class="price">';
															echo '<span class="price-new">'.$product['price'].'</span>
														</div>
													</div>
												</div>
											</div>
										</div>';
								}//foreach
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>


