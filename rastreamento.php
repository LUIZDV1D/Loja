<!DOCTYPE html>
<html>
<head>
	<title>Rastrear produto</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
</head>

<style type="text/css">
	div#link {
	    position: relative;
	    width: 800px;
	    height: 200px;
	    overflow: hidden;
	}
	iframe#lin {
	    position: absolute;            
	    top: -250px;
	    left: -25px;
	    width: 1024px;
	    height: 768px;
	}
</style>

<body>

	<script type="text/javascript">
		function Red() {
			if ("" == document.formu.codi.value) {
				alert("Preenchimento obrigatório.");
				document.formu.codi.focus();
			} else {
				var c = document.getElementById("codi").value;
				location.href = 'https://www.websro.com.br/rastreamento-correios.php?P_COD_UNI='+c;
			}
		}
	</script>

	<div style="margin-top: 40px;" class="container">
		<div class="row">
			<div class="col-md-6">
		    	<form name="formu" method="get" class="form-control">
		    		<div class="form-group">
		    			<span>Digite o código de rastreio:</span>
		    			<input style="width: 300px;" type="text" placeholder="Código" id="codi" name="codi">
		    		</div>
		    		<button style="cursor: pointer;" onclick="Red();" type="button" class="btn btn-primary">Rastrar</button>
		    		<a href="perfil.php?acao=ped" style="color: white; cursor: pointer;" class="btn btn-danger">Voltar</a>
		    	</form>
		    </div>

    	
		</div>
	</div>

</body>
</html>