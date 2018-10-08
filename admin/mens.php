<?php
	require('config.php');
    $sql = "SELECT * FROM notificacoes WHERE status = '0'";
    $query = mysqli_query($conexao, $sql);
    $numN = mysqli_num_rows($query);

     echo $numN;
                  