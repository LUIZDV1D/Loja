	<!DOCTYPE html>
	<html>
	<head>
		<title>Consultar</title>
		<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	</head>


	<?php
		$sql = "SELECT * FROM usuarios WHERE id = '".$_GET['id']."'";
		$query = mysqli_query($conexao, $sql);
		$inf = mysqli_fetch_assoc($query);
	?>


	<body>
	<br><br>
	<div class="row">
		<div class="col-md-10" style="border: 0.02px solid black; margin-left: 90px;">
			<h3 class="text-center">Usuário: <?php echo $inf['nome']; ?></h3>
			<img style="margin-left: 320px; width: 300px;" class="img-responsive thumbnail" src="../images/fotos_perfil/<?php echo $inf['urlImg']?>"> 

			<span>Email: <?php echo strtolower($inf['email']); ?></span>
			<br>
			<span>Senha: <?php echo strtolower($inf['senha']); ?></span>
			<br><br>
		</div>
	</div>
	</body>
	</html>