<?php

	require('config.php');

	$sqlP = "DELETE FROM usuarios WHERE id = '".$_GET['id']."'";

	$queryP = mysqli_query($conexao, $sqlP);

	if ($queryP) {

		echo "<script>

			alert('Apagado!!');
			location.href = 'index.php?opc=usuarios';

		</script>";
	}

?>