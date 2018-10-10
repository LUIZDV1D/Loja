<!DOCTYPE html>
<html lang="en">
<head>
	<title>Detalhe do produto</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>


<?php 
	session_start();

	error_reporting(0);

	require('config.php'); 

	$sql_p = "SELECT categoria FROM produtos WHERE id = '".$_GET["idp"]."'";

	$query_p = mysqli_query($conexao, $sql_p);
	$cate = mysqli_fetch_assoc($query_p); 

	if ($_SESSION['nomeu']) {

	if (!isset($_SESSION['carrinho'])) {
		$_SESSION['carrinho'] = array();
	}

	if (isset($_GET['acao'])) {
		if ($_GET['acao'] == 'add') {

			$id = $_GET['id'];

			if (!isset($_SESSION['carrinho'][$id])) {
				$_SESSION['carrinho'][$id] = 1;
				echo "
				<script> 
					location.href = 'product.php';
				</script>";
			}else{
				$_SESSION['carrinho'][$id] += 1;
				echo "
				<script> 
					location.href = 'product.php';
				</script>";
			}
		}
	}



	if (isset($_GET['opc'])) {
		$id = $_GET['id'];
		if ($_GET['opc'] == 'apaga') {
			
			unset($_SESSION['carrinho'][$id]);
			echo "
				<script> 
					location.href = 'product.php';
				</script>";
			
		}
	}
} else {
	echo "
	<script> 
		location.href = 'login.php';
	</script>";
}
?>

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

							<li>
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
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
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
											<div class="header-cart-item-img">
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

	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">

		<a href="index.php" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.php?cat=<?php 

				echo $cate['categoria'];

		?>" class="s-text16">
			<?php 

				$sql_p = "SELECT categoria FROM produtos WHERE id = '".$_GET["idp"]."'";

				$query_p = mysqli_query($conexao, $sql_p);

				while ($cate = mysqli_fetch_assoc($query_p)) {
				 	echo $cate['categoria'];
				 } 

			?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="" class="s-text16">
			<?php 

				$sql_pr = "SELECT produto FROM produtos WHERE id = '".$_GET["idp"]."'";

				$query_pr = mysqli_query($conexao, $sql_pr);

				while ($pro = mysqli_fetch_assoc($query_pr)) {
				 	echo $pro['produto'];
				 } 

			?>
		</a>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<?php

						error_reporting(0);

						$sql_fotos = "SELECT * FROM imagem WHERE id_produto = '".$_GET['idp']."'";
						$query_fotos = mysqli_query($conexao, $sql_fotos);

						if (mysqli_num_rows($query_fotos) > 0) {
						
							while ($fotos = mysqli_fetch_assoc($query_fotos)) {
								echo '<div class="slick3">
										<div class="item-slick3" data-thumb="admin/dist/img/'.$fotos["imagem"].'">
											<div class="wrap-pic-w">
												<img src="admin/dist/img/'.$fotos["imagem"].'" alt="IMG-PRODUCT">
											</div>
										</div>

										<div class="item-slick3" data-thumb="admin/dist/img/'.$fotos["imagem2"].'"">
											<div class="wrap-pic-w">
												<img src="admin/dist/img/'.$fotos["imagem2"].'" alt="IMG-PRODUCT">
											</div>
										</div>

										<div class="item-slick3" data-thumb="admin/dist/img/'.$fotos["imagem3"].'">
											<div class="wrap-pic-w">
												<img src="admin/dist/img/'.$fotos["imagem3"].'" alt="IMG-PRODUCT">
											</div>
										</div>
									</div>';
							}
						} else {
							echo "Produto não encontrado.";
						}
					?>
				</div>
			</div>

			<?php
						$sql_produto = "SELECT * FROM produtos, cor WHERE produtos.id = '".$_GET['idp']."' AND cor.id_produto = '".$_GET['idp']."'";

						$sql_size = "SELECT * FROM size WHERE id_produto = '".$_GET['idp']."'";

						$query_produto = mysqli_query($conexao, $sql_produto);
						$query_size = mysqli_query($conexao, $sql_size);

						while ($size = mysqli_fetch_assoc($query_size)) {
							$_SESSION['tam'] = $size['tamanho'];
							$_SESSION['tam2'] = $size['tamanho2'];
							$_SESSION['tam3'] = $size['tamanho3'];
							$_SESSION['tam4'] = $size['tamanho4'];
						}

						if (mysqli_num_rows($query_produto) > 0) {
					
							while ($produto = mysqli_fetch_assoc($query_produto)) {

								echo '<div class="w-size14 p-t-30 respon5">
									<h4 class="product-detail-name m-text16 p-b-13">
										'.$produto["produto"].'
									</h4>

									<span class="m-text17">
										R$'.$produto["valor"].'
									</span>

									<p class="s-text8 p-t-10">
										
									</p>

									<!--  -->
									<div class="p-t-33 p-b-60">
										<div class="flex-m flex-w p-b-10">
											<div class="s-text15 w-size15 t-center">
												Tamanho
											</div>

											<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
												<select class="selection-2" name="tamanho">
													<option>'.$_SESSION['tam'].'</option>
													<option>'.$_SESSION['tam2'].'</option>
													<option>'.$_SESSION['tam3'].'</option>
													<option>'.$_SESSION['tam4'].'</option>
												</select>
											</div>
										</div>

										<div class="flex-m flex-w">
											<div class="s-text15 w-size15 t-center">
												Cor
											</div>

											<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
												<select class="selection-2" name="cor">
													<option>'.$produto["cor"].'</option>
													<option>'.$produto["cor2"].'</option>
													<option>'.$produto["cor3"].'</option>
													<option>'.$produto["cor4"].'</option>
												</select>
											</div>
										</div>

										<div class="flex-r-m flex-w p-t-10">
											<div class="w-size16 flex-m flex-w">';
			?>
												

			<?php									

			echo '<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
													<!-- Button -->
													<a href="?acao=add&id='.$produto["id_produto"].'" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
														Add ao carrinho
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="p-b-45">
										<span class="s-text8 m-r-35">SKU: '.$produto["id_produto"].'</span>
										<span class="s-text8">Categoria: '.$produto["categoria"].'</span>
									</div>

									<!--  -->
									<div class="wrap-dropdown-content bo6 p-t-15 p-b-14">
										<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
											Descrição
											<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
											<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
										</h5>

										<div class="dropdown-content dis-none p-t-15 p-b-23">
											<p class="s-text8">
												'.$produto["descricao"].'
											</p>
										</div>
									</div>
								</div>
							</div>';
							}
						} else {
						}
					?>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Produtos relacionados
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

					<?php

						$sqlcate = "SELECT * FROM categorias WHERE id_produto = '".$_GET["idp"]."'";
						$querycate = mysqli_query($conexao, $sqlcate);
						$categ = mysqli_fetch_assoc($querycate);

						$sqlr = "SELECT * FROM produtos WHERE categoria = '".$categ["categoria"]."'";

						$queryr = mysqli_query($conexao, $sqlr);

							if (mysqli_num_rows($queryr) > 0) {
								
									while ($dados = mysqli_fetch_assoc($queryr)) {
										if ($dados["id"] != $_GET["idp"]) {
										
											echo '<div class="item-slick2 p-l-15 p-r-15">
											<!-- Block2 -->
											<div class="block2">
												<div class="block2-img wrap-pic-w of-hidden pos-relative">
													<img src="admin/dist/img/'.$dados["imagem"].'" alt="IMG-PRODUCT">

													<div class="block2-overlay trans-0-4">
															
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
										</div>
											';
										}
									}
								} else {
									echo "Nenhum produto relacionado!!";
								}

					?>

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
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
