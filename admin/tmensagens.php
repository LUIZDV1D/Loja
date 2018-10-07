<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>
<body>
<br><br>
<h2 style="margin-left: 50px;">Produtos</h2>

<table style="margin-left: 50px;" class="table table-hover">
	<thead>
		<tr>
			<td>#</td>
			<td>Nome</td>
			<td>Número</td>
			<td>Email</td>
			<td>Assunto</td>
			<td>Ações</td>
		</tr>
	</thead>

	<tbody>
		<?php
			$sql = "SELECT * FROM contato";
			$query = mysqli_query($conexao, $sql);

			if (mysqli_num_rows($query) > 0) {
				while ($dados = mysqli_fetch_assoc($query)) {
					echo "<tr>
						<td>".$dados['id']."</td>
						<td>".$dados['nome']."</td>
						<td>".$dados['numero']."</td>
						<td>".$dados['email']."</td>
						<td>".$dados['assunto']."</td>
						<td><a href='?acao=ver'><i class='fa fa-eye'></i></a> | <a href='?acao=apagar'><i class='fa fa-trash'></i></a> | <a href='?acao=editar'><i class='fa fa-edit'></i></a></td>
					</tr>";
				}
			}
		?>
	</tbody>

</table>

</body>
</html>	