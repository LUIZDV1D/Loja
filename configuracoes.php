<!DOCTYPE html>
<html>
<head>
	<title>Configurações</title>
</head>

<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<?php

	$sql = "SELECT * FROM usuarios WHERE nome = '".$_SESSION['nomeu']."'";
	$query = mysqli_query($conexao, $sql);

	$dados = mysqli_fetch_assoc($query);

	if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
		$sql_cad = "UPDATE usuarios SET email = '".strtoupper($_POST["email"])."', senha = '".$_POST["senha"]."', nome = '".$_POST["nome"]."' WHERE nome = '".$_SESSION['nomeu']."'";

		$query_cad = mysqli_query($conexao, $sql_cad);

		if ($query_cad) { 

			unset($_SESSION['nomeu']);

			echo "
			<script> 

				alert('Modificado!!'); 
				location.href = 'login.php';

			</script>";
		} else {
			echo "
			<script> 

				alert('Erro!!'); 
				location.href = 'perfil.php';

			</script>";
		}
	}

?>

<body>

<div class="row">
	<div style="margin-left: 350px;" class="col-md-12 p-b-30">
					<form method="post" class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Atualizar
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nome" placeholder="Seu nome" value="<?php echo strtolower($dados['nome']); ?>">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email" value="<?php echo strtolower($dados['email']); ?>">
						</div>


						<div class="bo4 of-hidden size15 m-b-20">
							<input  id="senha" required class="sizefull s-text7 p-l-22 p-r-22" type="password" name="senha" placeholder="Senha" value="<?php echo $dados['senha']; ?>">
						</div>
						<h1><i id="olho" style="color: blue; cursor: pointer; position: absolute; margin-left: 580px; margin-top: -60px;" class="fa fa-eye"></i></h1>

						<script type="text/javascript">
							var senha = $('#senha');
							var olho = $("#olho");

							olho.mousedown(function() {
							  senha.attr("type", "text");
							  olho.css("color", "red");
							});

							olho.mouseup(function() {
							  senha.attr("type", "password");
							  olho.css("color", "blue");
							});
							// para evitar o problema de arrastar a imagem e a senha continuar exposta, 
							//citada pelo nosso amigo nos comentários
							$( "#olho" ).mouseout(function() { 
							  $("#senha").attr("type", "password");
							  $("#olho").css("color", "blue");
							});
						</script>

						<div class="w-size25">
							<!-- Button -->
							<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Atualizar
							</button>
						</div>
					</form>
				</div>
</div>

</body>
</html>