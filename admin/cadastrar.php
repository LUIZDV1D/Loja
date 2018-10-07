<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>

<?php

if (isset($_POST['nomep']) && isset($_POST['valoru']) && isset($_POST['quant']) && isset($_POST['descri'])) {
									
									if (isset($_FILES['img'])) {

										$dir = "dist/img/";


										//Imagem 1
										$extensao = substr($_FILES['img']['name'], -4);
										$novo_nome = md5(microtime()).$extensao;

										move_uploaded_file($_FILES['img']['tmp_name'], $dir.$novo_nome);


										//Imagem 2
										$extensao2 = substr($_FILES['img2']['name'], -4);
										$novo_nome2 = md5(microtime()).$extensao2;

										move_uploaded_file($_FILES['img2']['tmp_name'], $dir.$novo_nome2);


										//Imagem 3
										$extensao3 = substr($_FILES['img3']['name'], -4);
										$novo_nome3 = md5(microtime()).$extensao3;

										move_uploaded_file($_FILES['img3']['tmp_name'], $dir.$novo_nome3);

										$sql = "INSERT INTO produtos VALUES (DEFAULT, '".$_POST['nomep']."', '".$novo_nome."', '".$_POST['quant']."', '".$_POST['valoru']."', '".$_POST['cate']."', '".$_POST['descri']."')";

										$query = mysqli_query($conexao, $sql);

										if ($query) {

											$sql_id = "SELECT LAST_INSERT_ID()";
											$query_id = mysqli_query($conexao, $sql_id);
											$vetor = mysqli_fetch_row($query_id);
											$id = $vetor[0];

											//Inserir foto
											$sql_foto = "INSERT INTO imagem VALUES (DEFAULT, '".$id."', '".$novo_nome."', '".$novo_nome2."', '".$novo_nome3."')";

											$query_foto = mysqli_query($conexao, $sql_foto);
											

											//Inserir categoria
											$sql_cat = "INSERT INTO categorias VALUES (DEFAULT, '".$_POST['cate']."', '".$id."')";

											$query_cat = mysqli_query($conexao, $sql_cat);


											//Inserir cor
											$sql_cor = "INSERT INTO cor VALUES (DEFAULT, '".$id."', 'vermelho', 'azul', 'preto', 'verde')";

											$query_cor = mysqli_query($conexao, $sql_cor);


											//Inserir size
											$sql_size = "INSERT INTO size VALUES (DEFAULT, '".$id."', 'P', 'M', 'G', 'GG')";

											$query_size = mysqli_query($conexao, $sql_size);

											echo "<script>alert('Cadastrado!!')</script>";
										} else {
											echo "<script>alert('Erro!!')</script>";
										}
									}
								}

?>

<body>

<br><br>
	<div class="container" style="margin-left: 50px;">
		<div class="row">
			<div class="col-md-6">
				<legend>Cadastrar produto</legend>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nome do produto</label>
						<input placeholder="Nome do produto" class="form-control" type="text" name="nomep">
					</div>
					<div class="form-group">
						<label>Valor por unidade</label>
						<div class="input-group col-md-4">
							<span class="input-group-addon">R$</span>
							<input step="0.10" placeholder="Valor unitário" class="form-control" type="number" name="valoru">
						</div>
					</div>
					<div class="form-group">
						<label>Quantidade</label>
						<div class="input-group col-md-4">
							<input placeholder="Quantidade" class="form-control" type="text" name="quant">
						</div>
					</div>
					<div class="form-group">
						<label>Descrição</label>
						<textarea class="form-control" placeholder="Descrição" style="max-width: 560px; min-width: 560px; max-height: 150px; min-height: 100px;" name="descri"></textarea>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="img">
						<br>
						<input type="file" name="img2">
						<br>
						<input type="file" name="img3">
					</div>
					<div class="form-group">
						<label>Categoria: </label>
						<select name="cate">

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
					<input class="btn btn-success" value="Cadastrar" type="submit" name="submit">
					<br><br>
				</form>
			</div>
		</div>	
	</div>


</body>
</html>