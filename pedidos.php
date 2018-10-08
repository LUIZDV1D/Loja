<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.min.css">
</head>
<body>

	<div style="margin-left: 100px;" class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
						<table class="table-shopping-cart">
							<tr  class="table-head">
								<th class="column-1">COMPRADOR</th>
								<th class="column-2">DATA/HORA</th>
								<th class="column-3">VALOR</th>
							</tr>

							<?php
															
								$sql_pe = "SELECT * FROM pedidos WHERE comprador = '".strtoupper($_SESSION['nomeu'])."'";

								$query_pe = mysqli_query($conexao, $sql_pe);

								while ($dados = mysqli_fetch_assoc($query_pe)) {

									$dia = substr($dados['data'], 0,2);
								$mes = substr($dados['data'], 5,2);
								$ano = substr($dados['data'], 0,4);

								$hora = substr($dados['data'], 11,19);

								$data = $dia."/".$mes."/".$ano;

									echo '
									<tr class="table-row">
								<td class="column-1"><h3>'.strtolower($dados["comprador"]).'</h3></td>
								<td class="column-2"><h3 style="margin-left: -60px;">'.$data.' - '.$hora.'</h3></td>
								<td class="column-3"><h3 style="margin-left: -16px;">R$'.$dados["preco"].'</td></h3></td>
							</tr>
									';
								}	
							?>
					</table>
				</div>
	</div>

</body>
</html>
