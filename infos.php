<!DOCTYPE html>
<html>
<head>
	<title>Configurações</title>
</head>

<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.min.css">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<?php

	$sql = "SELECT * FROM informacoes WHERE informacoes.nomeus = '".$_SESSION['nomeu']."'";
	$query = mysqli_query($conexao, $sql);

	$dados = mysqli_fetch_assoc($query);
?>

<body>

<div class="row">
	<div style="margin-left: 350px;" class="col-md-12 p-b-30">
					<form method="post" class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Informações
						</h4>

						<h4>Endereço</h4>
						<br>
						<div class="bo4 of-hidden size15 m-b-20">
							<input readonly class="sizefull s-text7 p-l-22 p-r-22" type="text" name="endereco" placeholder="Endereço" value="<?php echo ($dados['endereco']); ?>">
						</div>

						<h4>Cidade</h4>
						<br>
						<div class="bo4 of-hidden size15 m-b-20">
							<input readonly class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cidade" placeholder="Cidade" value="<?php echo ($dados['cidade']); ?>">
						</div>

						<h4>Estado</h4>
						<br>
						<div class="bo4 of-hidden size15 m-b-20">
							<input readonly  id="senha" required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="estado" placeholder="Estado" value="<?php echo $dados['estado']; ?>">
						</div>

						<h4>País</h4>
						<br>
						<div class="bo4 of-hidden size15 m-b-20">
							<input  id="senha" readonly class="sizefull s-text7 p-l-22 p-r-22" type="text" name="pais" placeholder="País" value="<?php echo $dados['pais']; ?>">
						</div>

						<h4>CEP</h4>
						<br>
						<div class="bo4 of-hidden size15 m-b-20">
							<input  id="senha" readonly class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cep" placeholder="CEP" value="<?php echo $dados['cep']; ?>">
						</div>
					</form>		
	</div>

</div>

</body>
</html>