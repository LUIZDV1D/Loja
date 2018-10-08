<?php

	require('config.php');

	$sqlP = "DELETE FROM usuarios WHERE id = '".$_GET['id']."'";

	$queryP = mysqli_query($conexao, $sqlP);

	if ($queryP) {

	$sqlI = "DELETE FROM informacoes WHERE id_usu = '".$_GET['id']."'";

	$queryI = mysqli_query($conexao, $sqlI);

	$sqlPe = "DELETE FROM pedidos WHERE comprador = '".strtoupper($_GET['nome'])."'";

	$queryPe = mysqli_query($conexao, $sqlPe);

		echo "<script>

			alert('Apagado!!');
			location.href = 'index.php?opc=usuarios';

		</script>";
	}

?>