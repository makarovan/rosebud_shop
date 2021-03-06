<?php
ob_start();
$title = 'Все товары';
if (isset($categoryOne)) {
	$title=$categoryOne['categoryName'];
}
if (isset($text)) {
	$title = 'Поиск по запросу: '.$text;
}
?>

<div class="main-container container" style="margin-top: 0;">
	<ul class="header-main ">
		<li class="home"><a href="index">Главная</a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
		<?php
				echo'<li>'.$title.'</li>';		
		?>
	</ul>

	<div class="row">
		<!--Left Part Start -->
		<aside class="col-sm-4 col-md-3 type-2" id="column-left" style="float: left;">
			<div class="module latest-product titleLine">
				<!-- <h3 class="modtitle">Поиск</h3> -->
				<div class="modcontent ">
					<div class="table_layout filter-shopby">
						<!-- - - - - - - - - - - - - - Category filter - - - - - - - - - - - - - - - - -->
						<h3>Расширенный поиск</h3>
						<form method="GET" action="filter">

							<legend>Название:</legend>
							<div id="search0" class="search input-group">
								<input class="autosearch-input form-control" type="text" value="" size="50"
									autocomplete="off" name="text">
							</div>

							<legend>Категории:</legend>
							<select name="categoryId" style="width: 100%;" class="form-control">
								<option value="0">Все категории</option>
								<?php
										foreach ($categories as $category) {
											echo '<option value="'.$category['idCategory'].'">';
											echo $category['categoryName'].'</option>';
										}
									?>

							</select>

								<legend>Цена:</legend>
								<div class="range" style="width:100%; overflow:hidden;">
									<input type="number" name="minPrice" value="10" class="form-control" style="width: 40%; float: left; height: 28px; "> 
									<p style="float: left; width: 20%; padding: 5px 0; text-align:center;"> - </p>
									<input type="number" name="maxPrice" value="100" class="form-control" style="width: 40%; float: left; height: 28px;">
								</div>
							<div style="">
								<button type="submit" class="btn btn-primary btn-md" id="searchButton" style="width:100%;"><i class="fa fa-search"></i> Поиск</button>
							</div>

						</form>
					</div>
					<!--/ .table_layout -->
				</div>
			</div>
		</aside>
		<!--Left Part End -->


					<!--Middle Part Start-->
					<div id="content" class="col-md-9 col-sm-8 type-2" style="width: 60%; margin-top:-10px;">
						<div class="products-category">
							<!--changed listings-->
							<div class="products-list grid" id="gridList">
								<?php
									if (count($rows)>0) {
										foreach ($rows as $row) {
											echo'<div class="product-layout" id="prodList">
												<div class="product-item-container">
													<div class="left-block">
														<div class="product-image-container  second_img " title="Перейти к товару">';
															echo'<a href="detail?id='.$row['idProduct'].'" class="product-img"><img src="img/'.$row['img'].'" alt="" ></a>';
														echo'</div>
													</div>
													<div class="right-block">
														<div class="caption">';
															echo'<h4 title="Перейти к товару"><a href=detail?id='.$row['idProduct'].'>'.$row['name'].'</a></h4>
																<h4 title="Перейти к продавцу"><a href="user?id='.$row['sellerId'].'">'.$row['username'].'</a></h4>		
																<div class="price">';
															echo'<span class="price-new">'.$row['price'].'	&euro;</span>';

														echo'</div>
														</div>
													</div>			
												</div>
											</div>';
										}
									}else{
										echo '<p>В категории нет товаров</p>';
									}
								?>



				</div>
				<!--// End Changed listings-->
			</div>
		</div>
	</div>
	<!--Middle Part End-->
</div>
<?php
$content = ob_get_clean();
include "view/templates/layout.php";
?>