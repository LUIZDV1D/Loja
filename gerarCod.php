<?php 

	require('config.php'); 
	session_start();
	
?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.min.css">
	<title>Código de rastreio</title>

	<script type="text/javascript">
		function Sair() {
			alert("Essa página será apagada em 10 segundos!!");
			setInterval(function(){ 
				location.href = 'perfil.php?acao=ped'; 
			}, 10000);
		}
	</script>

</head>
<body onload="Sair();">
	<br>
	<div class="container">
		<?php

			$nome = "produto";

			$crip = strtoupper(base64_encode($nome));

			$cod = substr($crip, 0, 2);
			$cod2 = substr($crip, 2, 2);
			$cod3 = substr($crip, 1, 2); 

			$radndom = array();

			$radndom[0] = $cod;
			$radndom[1] = $cod2;
			$radndom[2] = $cod3;

			$rand = rand(0, 2);

			if (isset($rand)) {

				if ($rand == 0) {

					$numr = rand(000000000,999999999);

					$codigo = $radndom[0].$numr."BR";

					echo "Seu código de rastreamento é: ".$codigo;

					$sql = "UPDATE pedidos SET cod = '".$codigo."' WHERE comprador = '".$_SESSION['nomeu']."'";
					$query = mysqli_query($conexao, $sql);

				} elseif ($rand == 1) {

					$numr = rand(000000000,999999999);

					$codigo = $radndom[2].$numr."BR";

					echo "Seu código de rastreamento é: ".$codigo;

					$sql = "UPDATE pedidos SET cod = '".$codigo."' WHERE comprador = '".$_SESSION['nomeu']."'";
					$query = mysqli_query($conexao, $sql);

				} elseif ($rand == 2) {

					$numr = rand(000000000,999999999);

					$codigo = $radndom[2].$numr."BR";

					echo "Seu código de rastreamento é: ".$codigo;

					$sql = "UPDATE pedidos SET cod = '".$codigo."' WHERE comprador = '".$_SESSION['nomeu']."'";
					$query = mysqli_query($conexao, $sql);

				}
			} else {
				echo "Gerando código";
				echo "<script> location.reload(); </script>";
			}


		?>
		<a href="index.php" title="voltar" class="btn btn-success">Voltar</a>
	</div>

</body>
</html>