<?php

    require('config.php');

    $SQL = "SELECT * FROM contato, notificacoes WHERE contato.id = notificacoes.id_user AND notificacoes.status = 0";
    $QUERY = mysqli_query($conexao, $SQL);

    date_default_timezone_set('America/Sao_Paulo');
    $horaAt = date('G');

    while ($infos = mysqli_fetch_assoc($QUERY)) {

      $dataD = substr($infos['hora'], 8, 2);
      $dataM = substr($infos['hora'], 5, 2);
      $hora = substr($infos['hora'], 11, 5);

      echo "<li>
      <a href='verM.php?id=".$infos['id']."'>
      <div class='pull-left'>
        <img src='dist/img/icone.png' class='img-circle' alt='User Image'>
      </div>
      <h4>
      ".substr($infos['nome'], 0,12)."
        <small><i class='fa fa-calendar-o'></i> ".$dataD."/".$dataM." - <i class='fa fa-clock-o'> ".$hora."</i> min(s)</small>
      </h4>
      <p>".$infos['mensagem']."</p>
      </a>
      </li>";
    }

?>