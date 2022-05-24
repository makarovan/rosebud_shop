<!DOCTYPE html>
<html>
<head>
	<!-- Basic page needs
    ============================================ -->
    <title>Rosebud shop</title>
    <meta charset="utf-8">
    <meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow"/>

	<!-- Mobile specific metas
	============================================ -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<!-- Favicon
	============================================ -->
	<link rel="shortcut icon" href="ico/favicon.png">
	
	<!-- Google web fonts
	============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	
    <!-- Libs CSS
    ============================================ -->
    <link rel="stylesheet" href="public/css/bootstrap/css/bootstrap.min.css">
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="public/js/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="public/js/owl-carousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="public/css/themecss/lib.css" rel="stylesheet">
    <link href="public/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">

	<!-- Theme CSS
	============================================ -->
	<link href="public/css/themecss/so_megamenu.css" rel="stylesheet">
	<link href="public/css/themecss/so-categories.css" rel="stylesheet">
	<link href="public/css/themecss/so-listing-tabs.css" rel="stylesheet">
	<link href="public/css/footer2.css" rel="stylesheet">
	<link href="public/css/header2.css" rel="stylesheet">
	<link rel="stylesheet" href="public/css/custom.css" type="text/css" />
	
	<link id="color_scheme" href="public/css/home2.css" rel="stylesheet">
	<!-- <link href="css/responsive.css" rel="stylesheet"> -->

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>

	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="public/js/jquery.js" type="text/javascript"></script>
	<script src="public/js/bootstrap.js" type="text/javascript"></script> 
	
	
</head>

<body class="common-home res layout-home2 banners-effect-7">
	<div id="wrapper" class="wrapper-full">
		<div  class="">
			<!-- Header Container  -->
			<header id="header" class=" variantleft type_2" style="margin-bottom:20px;">
				<!-- Header Top -->
				<div class="header-top">
					<div class="container">
						<div class="row" >
							<div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-6 compact-hidden" id="headerTop">
								<div class="tabBlock" id="TabBlock-1">
									<?php 
										if (!isset($_SESSION['role'])) {
									?>
									<ul class="top-link list-inline">
										<li class="admin/login"><a href="register" class="top-link-checkout" title="Sign In"><span>Вход</span></a></li>
										<li class="register"><a href="register" title="Register"><span>Регистрация</span></a></li>

									<?php } elseif(isset($_SESSION['role'])) { 
										if($_SESSION['role']=='1'){
											echo '<li style="display: block; float: left;"><a href="adminpanel/" target=_blank><span>Admin panel</span></a></li>';
										}elseif ($_SESSION['role']=='2' || $_SESSION['role']=='3') {
											echo '<li style="display: block; float: left;"><a href="my_account?id='.$_SESSION['userId'].'"><span>Личный кабинет</span></a></li>';
										}
										echo '<li style="display: block; float: left;"><a href="logout"><span>Выход</span></a></li>';
									}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end header -->
				<div class="header-center left" style="padding-bottom: 0;">
					<div class="container">
						<div class="row" style="margin-bottom:20px;">
							<!-- Logo -->
							<div class="navbar-logo col-md-3 col-sm-12 col-xs-7">
								<a href="index"><img src="img/demo/logo/logo.png" title="Your Store" alt="Your Store"></a>
							</div>
							<!-- //end Logo -->
							<!-- Search -->
							<div id="sosearchpro" class=" col-xs-12 col-sm-8 col-md-5 search-pro">
								<form method="GET" action="search">
									<div id="search0" class="search input-group">
										<input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Поиск" name="text">
										<span class="input-group-btn">
											<button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
										</span>
									</div>
									<input type="hidden" name="route" value="product/search">
								</form>
							</div>
							<!-- //end Search -->
						</div>
					</div>
				</div>
				<!-- Header Bottom -->
				<div class="header-bottom">
					<div class="container">
						<div class="row" style="width: 103%; margin-left: 4%;">
							<!-- Main menu -->
							<div class="megamenu-hori header-bottom-right  col-md-9 col-sm-6 col-xs-6 "  style="margin-top:0; margin-left:-1%; padding-right:0;">
								<div class="responsive so-megamenu ">
									<nav class="navbar-default">
										<div class=" container-megamenu  horizontal">
										<div class="navbar-header">
											<button   id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>
											<div class="megamenu-wrapper">
												<span id="remove-megamenu" class="fa fa-times"></span>
												<div class="megamenu-pattern">
													<div class="container">
		
														<ul class='megamenu' data-transition='slide' data-animationtime='250'>
															<li class="">
																<p class="close-menu"></p>
																<a href='index' class='menu1'>
																	<strong>На главную</strong>
																	<span class="label"></span>
																</a>
															</li>
															<li class="">
																<p class="close-menu"></p>
																<a href='productsList' class='clearfix menu1'>
																	<strong>Все товары</strong>
																	<span class="label"></span>
																</a>
															</li>
															
																<?php
																	Controller::mainCategories();
																?>
															
														</ul>
													</div>
												</div>
											</div>
										</div>
									</nav>
								</div>
							</div>  

							<!-- //end Main menu -->
							
						</div>
					</div>
				</div>
			</header>
			<main>
				<div class="main-container container" style="margin-top: 0px;">
					<div class="row" style="margin-bottom: 15px;">
						<div id="content" class="col-md-9 col-sm-8  col-xs-12">
							<?php
								if(isset($content))
								{
									echo $content;
								}
							?>
						</div>
					</div>
				</div>
			</main> 
			<footer class="footer-container type_footer1">
				<!-- Footer Top Container -->
				<section class="footer-top">
					<div class="container content">
						<div>
							<div class=" collapsed-block ">
								<div class="module clearfix">
									<h3 class="modtitle">Свяжитесь с нами</h3>
									<div class="modcontent">
										<ul class="contact-address">
											<li>
												<p>
													<span class="fa fa-map-marker"></span>
													<span>Jõhvi IVKHK:</span> Estonia, Jõhvi, Kutse tänav 13, 41533
												</p>
											</li>
											<li>
												<p>
													<span class="fa fa-envelope-o"></span>
													<span>Эмайл:</span> nadezda.makarova@ivkhk.ee
												</p>
											</li>
											<li>
												<p>
													<span class="fa fa-phone"> </span>
													<span>Телефон:</span> +372 555 42 734
												</p>
											</li>
										</ul>
									</div>
									<!-- Social widgets -->
									<div class="share-icon">
										<ul>
											<li class="facebook">
												<a href="https://www.facebook.com/IVKHK">
													<i class="fa fa-facebook" style="margin-top: 10px;" aria-hidden="true"></i>
												</a>
											</li>
											<li class="instagram">
												<a href="https://www.facebook.com/IVKHK">
													<i class="fa fa-instagram" style="margin-top: 10px;" aria-hidden="true"></i>
												</a>
											</li>
											<li class="youtube">
												<a href="https://www.youtube.com/channel/UC6TPd9ePy3n-vFQRgtbhx-w">
													<i class="fa fa-youtube" style="margin-top: 10px;" aria-hidden="true"></i>
												</a>
											</li>
											<li class="vk">
												<a href="https://vk.com/ivkhk">
													<i class="fa fa-vk" style="margin-top: 10px;" aria-hidden="true"></i>
												</a>
											</li>
										</ul>
									</div>	
									<!-- End Social widgets -->
								</div>
							</div>
							<div id="footerColumn">
								<div class=" box-information">
									<div class="module clearfix">
										<h3 class="modtitle">Заказы</h3>
										<div class="modcontent">
											<ul class="menu">
												<li><a href="ordersByUser">Мои заказы</a></li>
												<li><a href="ordersFromUser">Заказы</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class=" box-extras">
									<div class="module clearfix">
										<h3 class="modtitle">Дополнительно</h3>
										<div class="modcontent">
											<ul class="menu">
												<li><a href="contact">Свяжитесь с нами</a></li>
												<li><a href="my_account">Личный кабинет</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			<!-- /Footer Top Container -->
			</footer>
			<!-- //end Footer Container -->
		</div>
	</div>
						

<!-- Include Libs & Plugins
	============================================ -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="public/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="public/js/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="public/js/themejs/libs.js"></script>
	<script type="text/javascript" src="public/js/unveil/jquery.unveil.js"></script>
	<script type="text/javascript" src="public/js/countdown/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="public/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
	<script type="text/javascript" src="public/js/datetimepicker/moment.js"></script>
	<script type="text/javascript" src="public/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="public/js/jquery-ui/jquery-ui.min.js"></script>
	
	
	<!-- Theme files
	============================================ -->
	
	<script type="text/javascript" src="public/js/themejs/application.js"></script>
	<script type="text/javascript" src="public/js/themejs/homepage.js"></script>
	<script type="text/javascript" src="public/js/themejs/so_megamenu.js"></script>
<!-- 	<script type="text/javascript" src="public/js/themejs/addtocart.js"></script> -->
	<script type="text/javascript" src="public/js/themejs/application.js"></script>
	
</body>
</html>