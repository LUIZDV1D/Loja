<?php

	require('config.php');

	$sqlP = "DELETE FROM produtos WHERE id = '".$_GET['id']."'";

	$queryP = mysqli_query($conexao, $sqlP);

	if ($queryP) {

		$sqlC = "DELETE FROM cor WHERE id_produto = '".$_GET['id']."'";
		$queryC = mysqli_query($conexao, $sqlC);



		$sqlS = "DELETE FROM size WHERE id_produto = '".$_GET['id']."'";
		$queryS = mysqli_query($conexao, $sqlS);



		$sqlI = "DELETE FROM imagem WHERE id_produto = '".$_GET['id']."'";
		$queryI = mysqli_query($conexao, $sqlI);



		$sqlCa = "DELETE FROM categorias WHERE id_produto = '".$_GET['id']."'";
		$queryCa = mysqli_query($conexao, $sqlCa);

		echo "<script>

			alert('Apagado!!');
			location.href = 'index.php?opc=consulta';

		</script>";
	}

?>