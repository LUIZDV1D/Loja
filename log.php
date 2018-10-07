<?php

	require('config.php');
	session_start();

	if (isset($_POST['email_lo']) && isset($_POST['senha_lo'])) {

		$sql_lo = "SELECT * FROM usuarios WHERE email = '".strtoupper($_POST['email_lo'])."' AND senha = '".$_POST['senha_lo']."'";

		$query_lo = mysqli_query($conexao, $sql_lo);
		$nome = mysqli_fetch_assoc($query_lo);

		if (mysqli_num_rows($query_lo) > 0) {

			$_SESSION['nomeu'] = strtoupper($nome["nome"]);

			echo "
			<script> 

				alert('Logado!!'); 
				location.href = 'index.php';

			</script>";
		} else {
			echo "
			<script> 

				alert('Usuários e/ou senha incorretos!!'); 
				location.href = 'login.php';

			</script>";
		}

	}

?>