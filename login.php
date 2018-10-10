<?php

	
	require('config.php');

	error_reporting(0);
	session_start();

	if (isset($_GET['opc'])) {
		$id = $_GET['id'];
		if ($_GET['opc'] == 'apaga') {
			
			unset($_SESSION['carrinho'][$id]);
			
		} 
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login/Cadastro</title>
	<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

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
<!--===============================================================================================-->x
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
								Total: R$<?php echo $total; ?>
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

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">

				<div style="margin-top: 10px;" class="logmod">
				  <div class="logmod__wrapper">
				    <span class="logmod__close">Close</span>
				    <div class="logmod__container">
				      <ul class="logmod__tabs">
				        <li data-tabtar="lgm-2"><a href="#">Login</a></li>
				        <li data-tabtar="lgm-1"><a href="#">Sign Up</a></li>
				      </ul>
				      <div class="logmod__tab-wrapper">
				      <div class="logmod__tab lgm-1">
				        <div class="logmod__heading">
				          <span class="logmod__heading-subtitle">Digite um Email e senha <strong>para criar a conta</strong></span>
				        </div>
				        <div class="logmod__form">
				          <form accept-charset="utf-8" method="post" action="cad.php" class="simform" enctype="multipart/form-data">
				            <div class="sminputs">
				              <div class="input full">
				                <label class="string optional" for="user-name">Email*</label>
				                <input required name="email" class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" size="50" />
				              </div>
				            </div>
				            <div class="sminputs">
				              <div class="input full">
				                <label class="string optional" for="user-name">Nome*</label>
				                <input required name="nome" class="string optional" maxlength="255" id="user-email" placeholder="Nome" type="text" size="50" />
				              </div>
				            </div>
				            <div class="sminputs">
				              <div class="input full">
				                <label class="string optional" for="user-pw">Senha*</label>
				                <input required name="senha" class="string optional" maxlength="255" id="user-pw" placeholder="Senha" type="password" size="50" />
				                						<span class="hide-password">Mostrar</span>
				              </div>
				            </div>
				            <div class="sminputs">
				              <div class="input full">
				                <label class="string optional">Foto* >= 1920x239 pixels</label>
				                <input required name="img" class="string optional" maxlength="255" id="user-pw" placeholder="Imagem" type="file" size="50" />
				              </div>
				            </div>
				            <div class="simform__actions">
				              <button class="sumbit" type="sumbit">Sign Up</button>
				            </div> 
				          </form>
				        </div>
				      </div>
				      <div class="logmod__tab lgm-2">
				        <div class="logmod__heading">
				          <span class="logmod__heading-subtitle">Digite o Email e a senha <strong>para logar</strong></span>
				        </div> 
				        <div class="logmod__form">
				          <form accept-charset="utf-8" method="post" action="log.php" class="simform">
				            <div class="sminputs">
				              <div class="input full">
				                <label class="string optional" for="user-name">Email*</label>
				                <input required name="email_lo" class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" size="50" />
				              </div>
				            </div>
				            <div class="sminputs">
				              <div class="input full">
				                <label class="string optional" for="user-pw">Senha*</label>
				                <input required name="senha_lo" class="string optional" maxlength="255" id="user-pw" placeholder="Senha" type="password" size="50" />
				                						<span class="hide-password">Mostrar</span>
				              </div>
				            </div>
				            <div class="simform__actions">
				              <button class="sumbit" type="sumbit">Log In</button>
				            </div>  
				          </form>
				        </div>
				          </div>
				      </div>
				    </div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>
	</section>

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
	