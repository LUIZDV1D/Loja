<?php

	$sql_f = "INSERT INTO pedidos VALUES (DEFAULT, '".$valor+$total."', '".strtoupper($_SESSION['nomeu'])."', 'NOW()')";

	$query_f = mysqli_query($conexao, $sql_f);

	if ($query_f) {
		echo "<script>
			alert('Compra finalizada!!');
			location.href = 'cart.php';
		</script>";

		unset($_SESSION['carrinho']);
	} else {
		echo "<script>
			alert('Erro!!');
			location.href = 'cart.php';
		</script>";
	}

?>