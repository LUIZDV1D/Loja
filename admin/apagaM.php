<?php 

	require('config.php');
	session_start();

	$sql = "DELETE FROM contato WHERE id = '".$_GET['id']."'";
	$query = mysqli_query($conexao, $sql);

	if ($query) {

		$sqln = "DELETE FROM notificacoes WHERE id_user = '".$_GET['id']."'";
		$queryn = mysqli_query($conexao, $sqln);

		echo '
			<script>
				alert("apagado!");
				location.reload(); = "index.php?opc=tmensagens";
			</script>
		';
	} else {
		echo '
			<script>
					alert("erro!");
					location.href = "index.php?opc=tmensagens";
			</script>
		';
	}	

 ?>