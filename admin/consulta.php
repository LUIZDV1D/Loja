<!DOCTYPE html>
<html>
<head>
	<title>Consultar</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>


<?php


	if (isset($_GET['acao'])) {
		
		if ($_GET['acao'] == 'apagar') {
			require('apagaP.php');
		}

	}


?>


<body>
<br><br>
<h2 style="margin-left: 50px;">Produtos</h2>

<table style="margin-left: 5px;" class="table table-hover">
	<thead>
		<tr>
			<td>#</td>
			<td>Produto</td>
			<td>Categoria</td>
			<td>Valor Unid</td>
			<td>Quantidade</td>
			<td>Ações</td>
		</tr>
	</thead>

	<tbody>
		<?php
			$sql = "SELECT * FROM produtos, categorias WHERE categorias.id_produto = produtos.id ORDER BY produtos.valor DESC";
			$query = mysqli_query($conexao, $sql);

			if (mysqli_num_rows($query) > 0) {
				while ($dados = mysqli_fetch_assoc($query)) {
					echo "<tr>
						<td>".$dados['id']."</td>
						<td>".$dados['produto']."</td>
						<td>".$dados['categoria']."</td>
						<td>".$dados['valor']."</td>
						<td>".$dados['quantidade']."</td>
						<td><a href='id=".$dados['id']."'><i class='fa fa-eye'></i></a> | <a href='apagaP.php?id=".$dados['id']."'><i class='fa fa-trash'></i></a> | <a href='&acao=editar&id=".$dados['id']."'><i class='fa fa-edit'></i></a></td>
					</tr>";
				}
			}
		?>
	</tbody>

</table>

</body>
</html>