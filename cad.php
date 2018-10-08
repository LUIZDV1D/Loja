<?php

	require('config.php');

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {

		if (isset($_FILES['img'])) {
		
			$dir = "images/fotos_perfil/";
			$extensao = substr($_FILES['img']['name'], -4);
			$novo_nome = md5(microtime()).$extensao;

			move_uploaded_file($_FILES['img']['tmp_name'], $dir.$novo_nome);
			
				$sql_cad = "INSERT INTO usuarios VALUES (DEFAULT, '".strtoupper($_POST['email'])."', '".$_POST["senha"]."', '".strtoupper($_POST["nome"])."', '".$novo_nome."')";

				$query_cad = mysqli_query($conexao, $sql_cad);

				if ($query_cad) { 

					$sql_id = "SELECT LAST_INSERT_ID()";
					$query_id = mysqli_query($conexao, $sql_id);
					$id = mysqli_fetch_row($query_id);

					$sql_info = "INSERT INTO informacoes VALUES (DEFAULT,'".strtoupper($_POST['nome'])."', '".$id[0]."', '', '', '', '', '00000000')";
					$query_info = mysqli_query($conexao, $sql_info);

					echo "
					<script> 

						alert('Cadastrado!!'); 
						location.href = 'login.php';

					</script>";
				} else {
					echo "
					<script> 

						alert('Cadastro não efetuado!!'); 
						location.href = 'login.php';

					</script>";
				}
		}
	}
?>