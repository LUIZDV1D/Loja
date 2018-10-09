<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>

<?php

$sql_i = "SELECT * FROM produtos WHERE id = '".$_GET['id']."'";
$query_i = mysqli_query($conexao, $sql_i);

$dad = mysqli_fetch_assoc($query_i);

if (isset($_POST['nomep']) && isset($_POST['valoru']) && isset($_POST['quant']) && isset($_POST['descri']) && isset($_POST['cate'])) {
									
									
										$sql = "UPDATE produtos SET produto = '".$_POST['nomep']."', valor = '".$_POST['valoru']."', quantidade = '".$_POST['quant']."', descricao = '".$_POST['descri']."', categoria = '".$_POST['cate']."' WHERE id = '".$_GET['id']."'";
										$query = mysqli_query($conexao, $sql);

										if ($query) {

											$sql = "UPDATE categorias SET categoria = '".$_POST['cate']."' WHERE id_produto = '".$_GET['id']."'";
										$query = mysqli_query($conexao, $sql);

											echo "<script>alert('Atualizado!!');
												location.href = '?opc=consulta';
											</script>";
										} else {
											echo "<script>alert('Erro!!');
												location.href = '?opc=consulta';
											</script>";
										}
								}

?>

<body>

<br><br>
	<div class="container" style="margin-left: 50px;">
		<div class="row">
			<div class="col-md-6">
				<legend>Atualizar produto</legend>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nome do produto</label>
						<input placeholder="Nome do produto" class="form-control" value="<?php echo $dad['produto'];?>" type="text" name="nomep">
					</div>
					<div class="form-group">
						<label>Valor por unidade</label>
						<div class="input-group col-md-4">
							<span class="input-group-addon">R$</span>
							<input step="0.10" placeholder="Valor unitário" value="<?php echo $dad['valor'];?>" class="form-control" type="number" name="valoru">
						</div>
					</div>
					<div class="form-group">
						<label>Quantidade</label>
						<div class="input-group col-md-4">
							<input placeholder="Quantidade" class="form-control" value="<?php echo $dad['quantidade'];?>" type="text" name="quant">
						</div>
					</div>
					<div class="form-group">
						<label>Descrição</label>
						<textarea class="form-control" placeholder="Descrição" style="max-width: 560px; min-width: 560px; max-height: 150px; min-height: 100px;" name="descri"><?php echo $dad['descricao']?></textarea>
					</div>
					<div class="form-group">
					<div class="form-group">
						<label>Categoria</label>
						<div class="input-group col-md-4">
							<input id="cat" placeholder="Categoria" value="<?php echo $dad['categoria']?>" class="form-control" type="text" name="cate">
						</div>
						<br>
						<script type="text/javascript">
							function Mudar() {
								var c = document.getElementById('ca').value;
								var cat = document.getElementById('cat');

								cat.value = c;	
							}	
						</script>

						<label style="position: absolute; margin-top: -45px; margin-left: 200px;">Cadastradas:</label>
						<select onchange="Mudar();" id="ca" style="margin-left: 290px; margin-top: -45px; position: absolute;">

							<?php

								$sql_cate = "SELECT * FROM cad_cat ORDER BY id ASC";
								$query_cate = mysqli_query($conexao, $sql_cate);

								if (mysqli_num_rows($query_cate) > 0) {
									while ($categ = mysqli_fetch_assoc($query_cate)) {
										echo "
											<option>".$categ['nome_cat']."</option>
										";
									}
								} else {
									echo "<option>Sem categoria</option>";
								}		
							?>	
						</select>
					</div>
					<input class="btn btn-success" value="Atualizar" type="submit" name="submit">
					<br><br>
				</form>
			</div>
		</div>	
	</div>


</body>
</html>