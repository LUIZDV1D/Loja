<?php

session_start();
error_reporting(0);

if ($_SESSION['nomeu']) {

	if (!isset($_SESSION['carrinho'])) {
		$_SESSION['carrinho'] = array();
	}

	if (isset($_GET['acao'])) {
		if ($_GET['acao'] == 'add') {

			$id = $_GET['id'];

			if (!isset($_SESSION['carrinho'][$id])) {
				$_SESSION['carrinho'][$id] = 1;
			}else{
				$_SESSION['carrinho'][$id] += 1;
			}
		}
	}



	if (isset($_GET['opc'])) {
		$id = $_GET['id'];
		if ($_GET['opc'] == 'apaga') {
			
			unset($_SESSION['carrinho'][$id]);
			
		}
	}
} else {
	echo "
	<script> 
		location.href = 'login.php';
	</script>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Produtos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.min.css"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<?php require('config.php'); ?>

<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<div class="topbar-child2">
					<span class="topbar-email">
						gamesbrdavi@gmail.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li class="sale-noti">
								<a href="product.php">Shop</a>
							</li>

							<li class="sale-noti">
								<a href="product.php">Comprar</a>
							</li>

							<li>
								<a href="cart.php">Carrinho</a>
							</li>

							<li>
								<a href="about.php">Sobre</a>
							</li>

							<li>
								<a href="contact.php">Contato</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<div class="header-wrapicon2">
						<?php

						if ($_SESSION['nomeu']) {
							echo '
								<img src="images/icone_user.jpg" class="header-icon1 js-show-header-dropdown" alt="ICON">';
						} else {
							echo '
								<img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">';
						}
						?>


						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul style="margin-top: -10px;" class="header-cart-wrapitem">
									<li class="header-cart-item">
										<a href="perfil.php">Perfil<i class="fa fa-user-circle-o" style=" font-size: 30px; margin-left: 10px; margin-top: -4px;"></i></a>
									</li>
								<a href="perfil.php?acao=infos">
									<li class="header-cart-item">
										Informações<i class="fa fa-address-card" style=" font-size: 30px; margin-left: 160px;"></i>	
									</li>
								</a>
								<hr>
								<a href="perfil.php?acao=ped">
									<li class="header-cart-item">
										Pedidos<i class="fa fa-list-alt" style=" font-size: 30px; margin-left: 193px;"></i>		
									</li>
								</a>
								<hr>
								<a href="perfil.php?acao=config">
									<li class="header-cart-item">
										Configurações<i class="fa fa-cogs" style=" font-size: 30px; margin-left: 144px;"></i>		
									</li>
								</a>
								<hr>
							</ul>
							<br>

							<?php

								if ($_SESSION['nomeu']) {
									echo '
										<div class="header-cart-buttons">
								<div style="margin-left: 160px;" class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="sair.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Sair <i class="fa fa-sign-out"></i>
									</a>
								</div>
							</div>';
								} else {
									echo '';
								}

							?>
						</div>
					</div>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown">
						<span class="header-icons-noti">
							
							<?php 
							
								echo count($_SESSION['carrinho']);

							?>
							
						</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php

								$total = 0;

								foreach ($_SESSION['carrinho'] as $id => $qnt) {

									$sqlq = "SELECT * FROM produtos WHERE id = '".$id."'";

									$queryq = mysqli_query($conexao, $sqlq);
									$prods = mysqli_fetch_assoc($queryq);

										echo '
									

									<li class="header-cart-item">
										<a href="?opc=apaga&id='.$prods["id"].'">
											<div style="width: 80px; height: 100px;" class="header-cart-item-img">
												<img src="admin/dist/img/'.$prods["imagem"].'" alt="IMG">
											</div>
										</a>
									

										<div class="header-cart-item-txt">
											<a href="#" class="header-cart-item-name">
												'.$prods["produto"].'
											</a>

											<span class="header-cart-item-info">
												'.$qnt.' x '.$prods["valor"].' 
											</span>
										</div>
									</li>';

									$total += ($prods["valor"]*$qnt);
								}
							?>
							</ul>

							<div class="header-cart-total">
								Total: R$<?php echo $total;?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Ver carrinho
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Title Page -->
	<section id="banner" class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/ba.jpg);">
		<h2 class="l-text2 t-center">
			Produtos
		</h2>
		<p class="m-text13 t-center">
			Lançamentos de 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categorias
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="product.php" class="s-text13 active1">
									Todos
								</a>
							</li>
							<?php

								$sql_ca = "SELECT * FROM cad_cat";

								$query_ca = mysqli_query($conexao, $sql_ca);

								if (mysqli_num_rows($query_ca) > 0) {
									while ($cate = mysqli_fetch_assoc($query_ca)) {
										echo '<li class="p-t-4">
										<a href="?cat='.$cate['nome_cat'].'" class="s-text13">
											'.$cate['nome_cat'].'
										</a>';
									}
								} else {
									echo "Sem categorias";
								}
							?>
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filtros
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Preço
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>

							<form method="post">
								<div class="search-product pos-relative bo4 of-hidden">
									<input list="produtos" class="s-text7 size6 p-l-23 p-r-50" type="text" name="procurap" placeholder="Procurar produto...">

									<datalist id="produtos">
										<?php

											$sql_pro = "SELECT * FROM produtos";

											$query_pro = mysqli_query($conexao, $sql_pro);

											if (mysqli_num_rows($query_pro) > 0) {

												while ($pro = mysqli_fetch_assoc($query_pro)) {
													
													$_SESSION['id'] = $pro['id'];

													echo '<option>'.$pro["produto"].'</option>';
												}
											} else {
											}

										?>
									</datalist>

									<button type="submit" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
										<i class="fs-12 fa fa-search" aria-hidden="true"></i>
									</button>
								</div>
							</form>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<form method="get">
						<div class="flex-sb-m flex-w p-b-35">
							<div class="flex-w">
								<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
									<select class="selection-2" name="filtro">
										<option value="-"> - </option>
										<option value="bc">Preço: menor para maior</option>
										<option value="cb">Preço: maior para menor</option>
									</select>
								</div>

								<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
									<select class="selection-2" name="precos">
										<option value="-"> - </option>
										<option value="0-50">R$0.00 - R$50.00</option>
										<option value="50-100">R$50.00 - R$100.00</option>
										<option value="100-150">R$100.00 - R$150.00</option>
										<option value="150-200">R$150.00 - R$200.00</option>
										<option value="200-2000">$200.00+</option>

									</select>
								</div>
							</div>

							<button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 col-md-6">
								Filtrar
							</button>

							<span class="col-md-5 s-text8 p-t-5 p-b-5">
								Mostrados <?php $paginas = isset($_GET['pagina'])?$_GET['pagina']:1; echo $paginas;?>-<?php 
								$sqlTo = "SELECT * FROM produtos";
								$queryTo = mysqli_query($conexao, $sqlTo);
								$totalTo = mysqli_num_rows($queryTo);

								echo $totalTo; ?>
							</span>
						</div>
					</form>

					<!-- Product -->
					<div class="row">
						<?php

							$sqlT = "SELECT * FROM produtos";
								$queryT = mysqli_query($conexao, $sqlT);
								$total = mysqli_num_rows($queryT);

							if (isset($_GET['precos'])) {

								$p = explode("-", $_GET['precos']);

								$sql = "SELECT * FROM produtos WHERE produtos.valor BETWEEN ".$p[0]." AND ".$p[1]." ORDER BY produtos.valor ASC";
							}


							if (isset($_POST["procurap"])) {

								$sql = "SELECT * FROM produtos WHERE produto = '".$_POST["procurap"]."'";

							} else if (isset($_GET['cat'])) {

								$sql = "SELECT * FROM produtos WHERE categoria = '".$_GET['cat']."'";

							} else if (isset($_GET['filtro'])) {

								if ($_GET['filtro'] == 'bc') {
									$sql = "SELECT * FROM produtos ORDER BY produtos.valor ASC";
								}

								if ($_GET['filtro'] == 'cb') {
									$sql = "SELECT * FROM produtos ORDER BY produtos.valor DESC";
								}


								if ($_GET['filtro'] == '-' && $_GET['precos'] == '-') {
									echo "<script> location.href = 'product.php'; </script>";
								}

							} else if (isset($_GET['pagina'])) {
								$sqlT = "SELECT * FROM produtos";
								$queryT = mysqli_query($conexao, $sqlT);
								$total = mysqli_num_rows($queryT);

								$pagina = $_GET['pagina'];
								$registro = 6;

								$numPaginas = ceil($total / $registro);

								$inicio = $pagina - 1;
								$inicio = $inicio * $numPaginas;

								$sql = "SELECT * FROM produtos LIMIT $inicio, $registro";
							} else if(!isset($_GET['pagina'])) {
								$pagina = 1;
								$registro = 6;

								$numPaginas = ceil($total / $registro);

								$inicio = $pagina - 1;
								$inicio = $inicio * $numPaginas;

								$sql = "SELECT * FROM produtos LIMIT $inicio, $registro";
								
							} else {
								$sql = "SELECT * FROM produtos";
							}	

								$query = mysqli_query($conexao, $sql);
		
								if (mysqli_num_rows($query) > 0) {

									while ($dados = mysqli_fetch_assoc($query)) {
										echo '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
											<!-- Block2 -->
											<div class="block2">
												<div style="width: 230px; height: 230px; cursor: pointer;" class="block2-img wrap-pic-w of-hidden pos-relative">
													<img src="admin/dist/img/'.$dados["imagem"].'" alt="IMG-PRODUCT">

													<div class="block2-overlay trans-0-4">
														<a href="" class="block2-btn-addwishlist hov-pointer trans-0-4">
															<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>

															<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
														</a>

														<form method="get">
															<div class="block2-btn-addcart w-size1 trans-0-4">
																<!-- Button -->
																<a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1" href="?acao=add&id='.$dados["id"].'">Add ao carrinho</a>
															</div>
														</form>
													</div>
												</div>

												<div class="block2-txt p-t-20">
													<a href="product-detail.php?idp='.$dados["id"].'" class="block2-name dis-block s-text3 p-b-5">
														'.$dados["produto"].'
													</a>

													<span class="block2-price m-text6 p-r-5">
														R$'.$dados["valor"].'
													</span>
												</div>
											</div>
										</div>';
									}
								} else {
									echo "<h2>Não encontrado!!</h2>";
								}
						?>	
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">	
					<?php

					for ($i=1; $i <= $total; $i++) { 
						echo '
						<a href="?pagina='.$i.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>
					';
					}
					
					?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categorias
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="product.php?cat=masculino" class="s-text7">
							Masculino
						</a>
					</li>

					<li class="p-b-9">
						<a href="product.php?cat=feminino" class="s-text7">
							Feminino
						</a>
					</li>

					<li class="p-b-9">
						<a href="product.php?cat=Acessórios" class="s-text7">
							Acessórios
						</a>
					</li>

					<li class="p-b-9">
						<a href="product.php?cat=Calçados" class="s-text7">
							Calçados
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "Adicionado ao carrinho!", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "Adicionado à lista de desejos!", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
