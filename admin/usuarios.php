<!DOCTYPE html>
<html>
<head>
	<title>Consultar</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>


<?php


	if (isset($_GET['acao'])) {
		
		if ($_GET['acao'] == 'apagar') {
			require('apagaU.php');
		} 

	}


?>


<body>
<br><br>
<h2 style="margin-left: 50px;">Usuários</h2>

<table style="margin-left: 5px;" class="table table-hover">
	<thead>
		<tr>
			<td>#</td>
			<td>Email</td>
			<td>Nome</td>
			<td>Ações</td>
		</tr>
	</thead>

	<tbody>
		<?php
			$sql = "SELECT * FROM usuarios ORDER BY id DESC";
			$query = mysqli_query($conexao, $sql);

			if (mysqli_num_rows($query) > 0) {
				while ($dados = mysqli_fetch_assoc($query)) {
					echo "<tr>
						<td>".$dados['id']."</td>
						<td>".$dados['email']."</td>
						<td>".$dados['nome']."</td>
						<td><a href='?opc=verUs&id=".$dados['id']."'><i style='color: green;' class='fa fa-eye'></i></a> | <a href='apagaU.php?id=".$dados['id']."&nome=".$dados['nome']."'><i style='color: red;' class='fa fa-trash'></i></a></td>
					</tr>";
				}
			}
		?>
	</tbody>

</table>

</body>
</html>