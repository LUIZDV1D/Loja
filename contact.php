<?php

	
	require('config.php');

	error_reporting(0);

	session_start();

if ($_SESSION['nomeu']) {
	
	if (isset($_POST['nome']) && isset($_POST['assunto']) && isset($_POST['num']) && isset($_POST['email']) && isset($_POST['msg'])) {
	$nome = $_POST['nome'];
	$assunto = $_POST['assunto'];
	$num = $_POST['num'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];

	$sql = "INSERT INTO contato VALUES (DEFAULT, '$nome','$assunto','$num','$email','$msg', NOW())";
	$query = mysqli_query($conexao, $sql);

	$sql2 = "SELECT LAST_INSERT_ID()";
	$query2 = mysqli_query($conexao, $sql2);
	$idC = mysqli_fetch_row($query2);

	if ($query) {

		$sqlc = "INSERT INTO notificacoes VALUES (DEFAULT, '$idC[0]', 0)";
		$queryC = mysqli_query($conexao, $sqlc);

		echo "<script type='text/javascript'>
				alert('Mensagem enviada!!');
				location.href = 'contact.php';
			 </script>";
	} else {
		echo "<script type='text/javascript'>
				alert('Mensagem não enviada!!');
				location.href = 'contact.php';
			 </script>";
	}

	}

	if (isset($_GET['opc'])) {
		$id = $_GET['id'];
		if ($_GET['opc'] == 'apaga') {
			
			unset($_SESSION['carrinho'][$id]);
			
		} 
	}

} else {
	echo "<script type='text/javascript'>
				location.href = 'login.php';
			 </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact</title>
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

							<li>
								<a href="product.php">Comprar</a>
							</li>

							<li>
								<a href="cart.php">Carrinho</a>
							</li>

							<li>
								<a href="about.php">Sobre</a>
							</li>

							<li class="sale-noti">
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
	</header>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center">
			Contato
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form method="post" class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Mande-nos sua mensagem
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input value="<?php echo strtolower($_SESSION['nomeu']); ?>" required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nome" placeholder="Seu nome">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="assunto" placeholder="Assunto">
						</div>


						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="num" placeholder="Telefone celular">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input value="<?php echo strtolower($_SESSION['emailu']); ?>" required class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email">
						</div>

						<textarea required class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="msg" placeholder="Mensagem"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Mandar
							</button>
						</div>
					</form>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
