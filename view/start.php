<?php
	ob_start();
	$title = "Rosebud";
?>


			<div class="digital" style="padding: 10px;">
				<div class="row">
					<div class=" col-sm-12">
						<h3 class="modtitle">Последние товары</h3> 
						<div class="digital-owl">
							<div class=" owl-carousel digital-owl " data-dots="no" data-nav="yes" data-loop="yes" data-items_xs="1" data-items_sm="2" data-items_md="4" data-margin="20">
								<?php
									foreach ($rows as $row){
								?>
										<div class="product-layout">
											<div class="product-item-container" >
												<div class="left-block">
													<div class="product-image-container  second_img "  title="Перейти к товару" style="">
														<?php
														echo '<a href="detail?id='.$row['idProduct'].'" class="product-img"><img src="img/'.$row['img'].'" ></a>';
														?> 
														<span class="new">New</span>
														
													</div>
												</div>
												<div class="right-block">
													<div class="caption">
														<?php
														echo '<h4 title="Перейти к товару"><a href="detail?id='.$row['idProduct'].'">'.$row['name'].'</a></h4>';
														echo '<h4 title="Перейти к продавцу"><a href="user?id='.$row['sellerId'].'">'.$row['username'].'</a></h4>';
														?>	
														<div class="price">
															<span class="price-new"><?php print ($row['price'])?> &euro;</span>
														</div>
													</div>
												</div>
											</div>
										</div>
								<?php
									}//foreach row
								?>
							</div>
						
						</div>
					</div>
				</div>
			</div>

			<?php
				foreach ($categories as $category){
			?>
			<div class="digital">
				<div class="row">
					<div class=" col-sm-12">
						
						<h3 class="modtitle" style="margin-top: 50px;"><?php print ($category['categoryName']);?></h3>
						
						<div class="digital-owl">
							<div class=" owl-carousel digital-owl " data-dots="no" data-nav="yes" data-loop="yes" data-items_xs="1" data-items_sm="2" data-items_md="4" data-margin="20">
								<?php

									foreach ($products as $product){
										if ($category['idCategory'] == $product['categoryId']) {
											//счет записей
											$count = 0;
											$count = $count+1;

								?> 
										
										<div class="product-layout">
											<div class="product-item-container">
												<div class="left-block">
													<div class="product-image-container second_img " title="Перейти к товару">
														<?php
														echo '<a href="detail?id='.$product['idProduct'].'" class="product-img"><img src="img/'.$product['img'].'"></a>';
														?>
													</div>
												</div>
												<div class="right-block">
													<div class="caption">
														<?php
														echo '<h4><a href="detail?id='.$product['idProduct'].'">'.$product['name'].'</a></h4>';
														echo '<h4><a href="user?id='.$product['sellerId'].'">'.$product['username'].'</a></h4>';
														?>		
														<div class="price">
															<span class="price-new"><?php print ($product['price'])?> &euro;</span>
														</div>
													</div>
												</div>
											</div>
										</div>
							<?php
								//если выведено 10 записей, то break
								if($count == 9){
									break;
								}//if count
							}//if category
							}//foreach product
							?>
							</div>
						
						</div>
						
					</div>
				</div>
			</div>
<?php
}//foreach category
?>
<?php

	$content = ob_get_clean();
	include "view/templates/layout.php";
?>