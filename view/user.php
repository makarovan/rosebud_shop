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

<div class="main-container container" style="margin-top: 0px;">
	<span style="width: 80%; display: block; margin: auto;margin-top: 20px;">
		<div style="width: 60%; float: left;">
			<?php
				echo '<h1 style="margin-top: 0;">'.$row['username'].'</h1>
				<div style="padding-left: 1%;">';
					echo '<p>email: '.$row['email'].'</p>';
					echo '<p>tel: '.$row['tel'].'</p>';
					echo '<p>Full name: '.$row['fullName'].'</p>
				</div>';
			?>
		</div>
		<!-- <div style="width: 25%; margin-left: 5%; overflow: hidden;"> -->
		<div class="col-sm-4" style="width: 35%; margin-left: 5%; overflow: hidden;">
			<h5>Описание продавца:</h5>
			<?php
				echo '<p>'.$row['userDescription'].'</p>';
			?>
		</div>
	</span>
	<div class="row" style="margin-bottom: 15px;">
		<div id="content" class="col-md-9 col-sm-8  col-xs-12" style="margin-left: 50px;">
			<div class="digital">
				<div class="row">
					<div class=" col-sm-12">
						<div class="panel-group" id="accordion" style="margin-top: 25px;">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed" href="#accordion-1" aria-expanded="false">Все доступные товары продавца: <i class="fa fa-caret-down"></i></a></h4> </div>
						<div id="accordion-1"
								class="panel-collapse collapse"
								aria-expanded="false"
								style="height: 0px;">
							<div class="panel-body">
								<div class="products-list grid">
									<div class="row">
									<?php
										foreach ($products as $row) {
											echo'<div class="product-layout" style="max-width:25%; float:left; padding: 30px 15px 0 15px; text-align:center;">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img " title="Перейти к товару">';
																echo'<a href="detail?id='.$row['idProduct'].'" class="product-img"><img src="img/'.$row['img'].'" alt="" style="max-width:200px; max-height:350px;"></a>';
															echo'</div>
														</div>
														<div class="right-block">
															<div class="caption">';
																echo'<h4 title="Перейти к товару"><a href=detail?id='.$row['idProduct'].'">'.$row['name'].'</a></h4>
																	<h4 title="Перейти к продавцу"><a href="user?id='.$row['sellerId'].'">'.$row['username'].'</a></h4>		
																		<div class="price">';
																echo'<span class="price-new">'.$row['price'].'	&euro;</span>';
															echo'</div>
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
	</div>
</div>

<?php
}
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>


