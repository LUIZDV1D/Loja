<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>
<body>

<br><br>
  <div class="container" style="margin-left: 50px;">
    <div class="row">
      <div class="col-md-6">
        <legend>Cadastrar categoria</legend>
        <form method="post">
          <div class="form-group">
            <label>Categorias</label>
            <input type="text" placeholder="Nome da categoria" class="form-control" name="cat">
          <br><br>
          <button class="btn btn-success btn-block">Cadastrar</button>
        </form>
        <?php 

          if (isset($_POST['cat'])) {

            $sql = "INSERT INTO cad_cat VALUES (DEFAULT, '".$_POST['cat']."')";
            $query = mysqli_query($conexao, $sql);

            if ($query) {
              echo "<script>alert('Cadastrada!!')</script>";
            } else {
              echo "<script>alert('Erro!!')</script>";
            }
          }
        ?>
      </div>
    </div>  
  </div>


</body>
</html>