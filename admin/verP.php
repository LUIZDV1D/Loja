<!DOCTYPE html>
<html>
<head>
	<title>Consultar</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>


<?php
	$sql = "SELECT * FROM produtos WHERE id = '".$_GET['id']."'";
	$query = mysqli_query($conexao, $sql);
	$dados = mysqli_fetch_assoc($query);
?>


<body>
<br><br>
<div class="row">
	<div class="col-md-10" style="border: 0.02px solid black; margin-left: 90px;">
		<h3 class="text-center">Produto: <?php echo $dados['produto']; ?></h3>
		<img style="margin-left: 320px; width: 300px;" class="img-responsive thumbnail" src="dist/img/<?php echo $dados['imagem']?>"> 

		<span>Preço: R$<?php echo $dados['valor']; ?></span>
		<br>
		<span>Categoria: <?php echo $dados['categoria']; ?></span>
		<br>
		<span>Descrição: <?php echo $dados['descricao']; ?></span>
		<br><br><br>
	</div>
</div>
</body>
</html>