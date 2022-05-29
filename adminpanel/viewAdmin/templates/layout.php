<?php
if (!isset($_SESSION['userId'])){
	header('Location: ../');
}
if (isset($_SESSION['userId']) && isset($_SESSION['role']) && $_SESSION['role']!='1'){
	header('Location: ../');
}
?>	

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic page needs
    ============================================ -->
	<title>Adminpanel</title>
    <meta charset="utf-8">
    <meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />

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
    <link rel="stylesheet" href="../public/css/bootstrap/css/bootstrap.min.css">
    <link href="../public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="../public/js/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="../public/js/owl-carousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../public/css/themecss/lib.css" rel="stylesheet">
    <link href="../public/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">

	<!-- Theme CSS
	============================================ -->
	<link href="../public/css/themecss/so_megamenu.css" rel="stylesheet">
	<link href="../public/css/themecss/so-categories.css" rel="stylesheet">
	<link href="../public/css/themecss/so-listing-tabs.css" rel="stylesheet">
	<link href="../public/css/footer2.css" rel="stylesheet">
	<link href="../public/css/header2.css" rel="stylesheet">
	<link id="color_scheme" href="../public/css/index.css" rel="stylesheet">
	<!-- <link href="css/responsive.css" rel="stylesheet"> -->
</head>


<body class="common-home res layout-home2 banners-effect-7">
	<div id="wrapper" class="wrapper-full">
		<div  class="">

			<!-- Header Container  -->
			<header id="header" class=" variantleft type_2" style="width: 100%;">
				<!-- Header Top -->
				<div class="header-top">
					<div class="container">
						<div class="row">
							<div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-6 compact-hidden">
								<div class="tabBlock" id="TabBlock-1">
									<ul class="top-link list-inline">
										<li style="display: block; float: left;" class="register"><span>Привет, админ!</span></li>
										<li style="display: block; float: left;"><a href="logout"><span>Выход</span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //Header Top -->

				<!-- Header center -->
				<div class="header-center left">
					<div class="container">
						<div class="row">
							<!-- Logo -->
							<div class="navbar-logo col-md-3 col-sm-12 col-xs-7">
								<a href="./index"><img src="../img/demo/logo/logo.png" title="Your Store" alt="Your Store"></a>
							</div>
							<!-- //end Logo -->

							<!-- Search -->
							<div id="sosearchpro" class=" col-xs-12 col-sm-8 col-md-5 search-pro">
								<form method="GET" action="../index.html">
									<div id="search0" class="search input-group">
										<input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Поиск" name="search">
										<span class="input-group-btn">
											<button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
										</span>
									</div>
									<input type="hidden" name="route" value="product/search">
								</form>

							</div>
							<!-- //end Search -->

							
								<!--//cart-->
							</div>
						</div>

					</div>
				</div>
				<!-- //Header center -->

				<!-- Header Bottom -->
			</header>

			<aside style="width: 20%; margin-left: 5%;">
				<div class="col-md-6 col-lg-6">
					<ul class="simple-ul">
						<li><a href="usersAction">Пользователи</a></li>
						<li><a href="categoryAction">Категории</a></li>
						<li><a href="productsAction">Товары</a></li>
						<li><a href="ordersAction">Заказы</a></li>
					</ul>
				</div>
			</aside>
			<main style="width: 60%; margin-left: 10%; float: left;">
				<?php if (isset($content)) echo $content; ?>
			</main>
		</div>
	</div>	
</body>
</html>