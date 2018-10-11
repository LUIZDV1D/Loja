<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

	<tbody id="tab">

		<?php
			
			$sql_ti = "SELECT * FROM contato";
			$query_ti = mysqli_query($conexao, $sql_ti);

			if (mysqli_num_rows($query_ti) > 0) {
				while ($dados_ti = mysqli_fetch_assoc($query_ti)) {
					echo "<tr>
						<td>".$dados_ti['id']."</td>
						<td>".$dados_ti['nome']."</td>
						<td>".$dados_ti['numero']."</td>
						<td>".$dados_ti['email']."</td>
						<td>".$dados_ti['assunto']."</td>
						<td><a href='apagaM.php?id=".$dados_ti['id']."'><i style='color: red;' class='fa fa-trash'></i></a></td>
					</tr>";
				}
			}
		?>
		
	</tbody>

</table>

</body>
</html>	