<!DOCTYPE html>
<html>
<head>
	<title>Configurações</title>
</head>

<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<?php

	$sql = "SELECT * FROM usuarios WHERE usuarios.nome = '".$_SESSION['nomeu']."'";
	$query = mysqli_query($conexao, $sql);

	$dados = mysqli_fetch_assoc($query);

	$sql2 = "SELECT * FROM informacoes WHERE informacoes.nomeus = '".$_SESSION['nomeu']."'";
	$query2 = mysqli_query($conexao, $sql2);

	$dados2 = mysqli_fetch_assoc($query2);

	if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
		$sql_cad = "UPDATE usuarios SET email = '".strtoupper($_POST["email"])."', senha = '".$_POST["senha"]."', nome = '".strtoupper($_POST["nome"])."' WHERE nome = '".$_SESSION['nomeu']."'";

		$query_cad = mysqli_query($conexao, $sql_cad);

		$sql_inf = "UPDATE informacoes SET nomeus = '".strtoupper($_POST['nome'])."', endereco = '".$_POST["endereco"]."', cidade = '".$_POST["cidade"]."', estado = '".$_POST["estado"]."', pais = '".$_POST['pais']."', cep = '".$_POST['cep']."' WHERE nomeus = '".strtoupper($_SESSION['nomeu'])."'";

		$query_inf = mysqli_query($conexao, $sql_inf);

		if ($query_cad) { 

			$sql_info = "UPDATE informacoes SET nomeus = '".strtoupper($_POST['nome'])."' WHERE nomeus = '".strtoupper($_SESSION['nomeu'])."'";

			$query_info = mysqli_query($conexao, $sql_info);

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
							Atualizar dados de Log In
						</h4>

						<h4>Nome</h4>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nome" placeholder="Seu nome" value="<?php echo strtolower($dados['nome']); ?>">
						</div>

						<h4>Email</h4>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email" value="<?php echo strtolower($dados['email']); ?>">
						</div>

						<h4>Senha</h4>
						<div class="bo4 of-hidden size15 m-b-20">
							<input  id="senha" required class="sizefull s-text7 p-l-22 p-r-22" type="password" name="senha" placeholder="Senha" value="<?php echo $dados['senha']; ?>">
						</div>
						<h1><i id="olho" style="color: green; cursor: pointer; position: absolute; margin-left: 620px; margin-top: -63px;" class="fa fa-eye"></i></h1>

						<script type="text/javascript">
							var senha = $('#senha');
							var olho = $("#olho");

							olho.mousedown(function() {
							  senha.attr("type", "text");
							  olho.css("color", "red");
							});

							olho.mouseup(function() {
							  senha.attr("type", "password");
							  olho.css("color", "green");
							});
							// para evitar o problema de arrastar a imagem e a senha continuar exposta, 
							//citada pelo nosso amigo nos comentários
							$( "#olho" ).mouseout(function() { 
							  $("#senha").attr("type", "password");
							  $("#olho").css("color", "green");
							});
						</script>

						<h4 class="m-text26 p-b-36 p-t-15">
							Atualizar informações
						</h4>

						<h4>Endereço</h4>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="endereco" placeholder="Endereço" value="<?php echo ($dados2['endereco']); ?>">
						</div>

						<h4>Cidade</h4>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cidade" placeholder="Cidade" value="<?php echo ($dados2['cidade']); ?>">
						</div>

						<h4>Estado</h4>
						<div class="bo4 of-hidden size15 m-b-20">
							<input  required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="estado" placeholder="Estado" value="<?php echo $dados2['estado']; ?>">
						</div>

						<h4>País</h4>
						<div class="bo4 of-hidden size15 m-b-20">
							<input  required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="pais" placeholder="País" value="<?php echo $dados2['pais']; ?>">
						</div>

						<h4>CEP</h4>
						<div class="bo4 of-hidden size15 m-b-20">
							<input  required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cep" placeholder="CEP" value="<?php echo $dados2['cep']; ?>">
						</div>
						<div class="w-size25">
							<!-- Button -->
							<button style="margin-left: 430px;" type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Atualizar
							</button>
						</div>
					</form>		
	</div>

</div>

</body>
</html>