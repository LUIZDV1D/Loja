<?php 

	session_start();

	require('config.php');

	if (isset($_GET['codig'])) {

		$sql = "DELETE FROM pedidos WHERE cod = '".strtoupper($_GET['codig'])."'";
		$query = mysqli_query($conexao, $sql);

		if ($query) {
			echo "
			<script>
				alert('Pedido cancelado!! Protocolo de cancelamento: ".strtoupper(md5($_GET['codig']))."');
				location.href = 'perfil.php?acao=ped';
			</script>";
		} else {
			echo "
			<script>
				alert('Pedido não cancelado!!');
				location.href = 'delP.php';
			</script>";
		}
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<script type="text/javascript">
 		function Conf() {
 			var co = prompt("Digite o código de rastreamento: ");

 			if (co) {
 				if (co == "") {
 					alert("Preencha o que se pede!");
 					location.reload();
 				} else {
	 				var decisao = confirm("Você tem certeza?");

	 				if (decisao) {
	 					location.href = "?codig="+co;
	 				} else {
	 					location.reload();
	 				}
	 			}
			} else {
 				location.href = 'perfil.php?acao=ped';
 			}
 		}
 	</script>
 </head>
 <body onload="Conf();">
 
 </body>
 </html>