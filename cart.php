
<?php

session_start();

error_reporting(0);

require('config.php');

if ($_SESSION['nomeu']) {


	if (isset($_GET['opc'])) {
		$id = $_GET['id'];
		if ($_GET['opc'] == 'apaga') {
			
			unset($_SESSION['carrinho'][$id]);
			
		} elseif ($_GET['opc'] == 'up') {
			$_SESSION['carrinho'][$id] = $_GET['q'];

			unset($_SESSION['va']);

		} 
	} else {

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
	<title>Carrinho</title>
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

							<li class="sale-noti">
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

								$totalP = 0;

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

									$totalP = ($qnt*$prods["valor"]);

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

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.php">Home</a>
						<ul class="sub-menu">
							<li><a href="index.php">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">Comprar</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.php">Carrinho</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">Sobre</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.php">Contato</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/ba.jpg);">
		<h2 class="l-text2 t-center">
			Carrinho
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<form method="post">
						<table class="table-shopping-cart">
							<tr class="table-head">
								<th class="column-1"></th>
								<th class="column-2">Produto</th>
								<th class="column-3">Preço</th>
								<th class="column-4 p-l-70">Quantidade</th>
								<th class="column-5">Total</th>
							</tr>

							<script>
							function Valor(id){
								var quant = document.getElementById('va'+id).value;
								qua = parseInt(quant);
								location.href = '?opc=up&q='+qua+'&id='+id;
							}
						</script>

							<?php
									$total = 0;
									$totalP = 0;

									foreach ($_SESSION['carrinho'] as $id => $qnt) {

										$sqlq = "SELECT * FROM produtos WHERE id = '".$id."'";

											$queryq = mysqli_query($conexao, $sqlq);
										$prods = mysqli_fetch_assoc($queryq);

										$totalP = ($qnt * $prods["valor"]);

											echo '
										

										<tr class="table-row">
											<td class="column-1">
												<a href="?opc=apaga&id='.$prods["id"].'">
													<div class="cart-img-product b-rad-4 o-f-hidden">
														<img src="admin/dist/img/'.$prods['imagem'].'" alt="IMG-PRODUCT">
													</div>
												</a>
											</td>
											<td class="column-2">'.$prods["produto"].'</td>
											<td class="column-3">R$'.$prods["valor"].'</td>
											<td class="column-4">
											<form method="post">
											<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
												<select name="qu" class="selection-2" onchange="Valor('.$prods['id'].')" id="va'.$prods['id'].'">';


												for ($i=1; $i <= $prods['quantidade'] ; $i++) { 
													$q = $i;
												if ($i == $qnt) {
													echo '<option value="'.$i.'" selected>'.$i.'</option>';
												} else {
													echo '<option value="'.$i.'">'.$i.'</option>';
												}
											}

											echo '
											</select>
											</div>
											</form>
											</td>
											<td class="column-5">R$'.$totalP.'</td>
										</tr>';


										$total += ($prods["valor"]*$qnt);
									}
								?>
						</table>
					</form>
				</div>
			</div>

			<form method="post">
				<div id="finalizar" class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
					<div style="margin-left: 600px;" class="flex-w flex-m w-full-sm">
						<div class="size11 bo4 m-r-10">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Código de cupom">
						</div>

						<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Aplicar cupom
							</button>
						</div>
					</div>	
				</div>

				<!-- Total -->
				<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
					<h5 class="m-text20 p-b-24">
						Total no carrinho
					</h5>

					<!--  -->
					<div class="flex-w flex-sb-m p-b-12">
						<span class="s-text18 w-size19 w-full-sm">
							Subtotal:
						</span>

						<span class="m-text21 w-size20 w-full-sm">
							R$<?php echo $total;?>	
						</span>
					</div>

					<!--  -->
					<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
						<span class="s-text18 w-size19 w-full-sm">
							Shipping:
						</span>

						<div class="w-size20 w-full-sm">
							<p class="s-text8 p-b-23">
								There are no shipping methods available. Please double check your address, or contact us if you need any help.
							</p>
								<span class="s-text19">
									Calcular frete:
								</span>

								<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
									<select class="selection-2" name="tipo">
										<option value="04510">PAC</option>
										<option value="04014">SEDEX</option>
									</select>
								</div>


								<div class="size13 bo4 m-b-12">
									<input required class="sizefull s-text7 p-l-15 p-r-15" type="text" name="cep" placeholder="CEP">
								</div>

								<div class="size14 trans-0-4 m-b-10">
									<!-- Button -->
									<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
										Atualizar total
									</button>
								</div>
						</div>
					</div>

					<!-- Correios -->
					<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
						<span class="s-text18 w-size19 w-full-sm">
							<?php

								if (isset($_POST['cep']) && isset($_POST['tipo'])) {
									
									$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=08082650&sDsSenha=564321&sCepOrigem=59920000&sCepDestino=".$_POST['cep']."&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=".$_POST['tipo']."&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3";

									$xml = simplexml_load_file($url);

									$dados = $xml->cServico;
									$valor = $dados->Valor;
									$prazo = $dados->PrazoEntrega;

									$v = $valor+$total;

									$_SESSION['va'] = $v;	

									echo "Frete: R$".$valor. " Prazo: ".$prazo." dias";

									echo "<script> location.href = '#finalizar'; </script>";

								}
							?>
						</span>
					</div>


					<!--  -->
						<div class="flex-w flex-sb-m p-t-26 p-b-30">
							<span class="m-text22 w-size19 w-full-sm">
								Total:
							</span>
								<span class="m-text22 w-size19 w-full-sm">
								R$<?php echo $_SESSION['va']; ?>
							</span>	
						</div>

						<div class="size15 trans-0-4">
							<!-- Button -->
							<a href="?opc=final" style="text-decoration: none; color: white; cursor: pointer;" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Finalizar conta
							</a>

							<?php

								if ($_GET['opc'] == 'final') {
							
								
										$sql_f = "INSERT INTO pedidos VALUES (DEFAULT, '".$_SESSION['va']."', '".strtoupper($_SESSION['nomeu'])."', '', NOW())";

										$query_f = mysqli_query($conexao, $sql_f);

										if ($query_f) {

											unset($_SESSION['va']);
											unset($_SESSION['carrinho']);

											echo "<script>
												alert('Compra finalizada!!');
												location.href = 'gerarCod.php';
											</script>";
										} else {
											echo "<script>
												alert('Erro!!');
												location.href = 'cart.php';
											</script>";
										}
								}

							?>
						</div>
				</div>
			</div>
		</form>
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
	<script src="js/main.js"></script>

</body>
</html>
