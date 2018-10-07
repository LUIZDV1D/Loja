<!DOCTYPE html>
<html>
<head>
	<title>teste</title>
</head>
<body>

	<form method="post" enctype="multipart/form-data">
		<input type="file" name="img">
		<button>Enviar</button>
	</form>

	<?php

$imagem = $_FILES['img']['name'];

// Captura o tamanho da imagem e guarda nas variáveis
list($largura, $altura) = getimagesize($imagem);

// Faz a Validação da imagem
if($largura >= 1920 && $altura >= 239)
{
    echo 'Imagem com tamanho correto.';
}
else
{
    echo "Imagem com tamanho incorreto. (Tamanho da Imagem: $largura x $altura px.)";
}
?>

</body>
</html>