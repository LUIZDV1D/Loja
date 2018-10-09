<?php
   require('config.php');
   session_start();
   if(isset($_SESSION['user'])){

 $sql = "SELECT * FROM users_admin WHERE usuario ='".$_SESSION['user']."'";
 $query = mysqli_query($conexao, $sql);

 while ($dadosUser = mysqli_fetch_assoc($query)) {
   $nome = $dadosUser['nome'];
   $email = $dadosUser['email'];
   $imgUser = $dadosUser['urlImg'];
 }

 if (isset($_GET['sair'])) {
                    session_destroy();
                    unlink($_SESSION['user']);
                    header('location:login.php');
                  }
} else {
  header('location:login.php');
}
        

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="Intervalo();" class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <script type="">
        function Intervalo() {
            setInterval('Atualiza()', 500);
        }
        function Atualiza(){
            $("#setM").load("mens.php");
            $("#msg").load("mens2.php");
        }
      </script>

      <!-- Navbar Right Menu -->
      <div id="setTime" class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span id="setM" class="label label-success">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem <?php

                $sql = "SELECT * FROM notificacoes WHERE status = '0'";
                $query = mysqli_query($conexao, $sql);
                $numN = mysqli_num_rows($query);

                if ($numN > 0) {
                  echo $numN;
                } else {
                  echo "0";
                }

                ?> mensagem(ns)</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul id="msg" class="menu">
                  

              <!--              <li>
                              <a href="#">
                                <div class="pull-left">
                                  <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                </div>
                                <h4>
                                  Reviewers
                                  <small><i class="fa fa-clock-o"></i> 2 days</small>
                                </h4>
                                <p>Why not buy a new awesome theme?</p>
                              </a>
                            </li> -->
                </ul>
              </li>
              <li class="footer"><a href="?opc=tmensagens">Ver todas as mensagens</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php echo '<img src="dist/img/avatar5.png" class="user-image" alt="User Image">'; ?>
              <span class="hidden-xs"><?php echo $nome;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php echo '<img src="dist/img/'.$imgUser.'" class="img-circle" alt="User Image">'; ?>
                <p>
                  <?php echo $nome;?> - Desenvolvedor Web
                  <small>Membro desde 2018</small>
                </p>
              </li> 
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="?opc=consulta">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="?sair" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
         <?php echo '<img src="dist/img/'.$imgUser.'" class="img-circle" alt="User Image">'; ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $nome;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Procurar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <br>
        <li class="treeview">
          <a href="#">
            <i style="text-decoration: none;" class="fa fa-circle-o"></i> <span> Produtos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?opc=cadastrar"><i class="fa fa-plus"></i> Cadastrar</a></li>
            <li><a href="?opc=consulta"><i class="fa fa-search"></i> Consulta</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i style="text-decoration: none;" class="fa fa-circle-o"></i> <span> Categorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?opc=cadastrar_cate"><i class="fa fa-plus"></i> Cadastrar</a></li>
            <li><a href="?opc=consulta_cate"><i class="fa fa-search"></i> Consulta</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i style="text-decoration: none;" class="fa fa-circle-o"></i> <span> Usuários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?opc=usuarios"><i class="fa fa-search  "></i> Usuários</a></li>
          </ul>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        INÍCIO
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active"><?php echo (isset($_GET['opc'])?$_GET['opc']:"Home"); ?></li>
      </ol>
    </section>

      <?php
      if (isset($_GET['opc'])) {
      
        if ($_GET['opc'] == 'consulta') {
          include('consulta.php');
        }else if ($_GET['opc'] == 'cadastrar') {
          include('cadastrar.php');
        }else if ($_GET['opc'] == 'cadastrar_cate') {
          include('cad_cate.php');
        }else if ($_GET['opc'] == 'tmensagens') {
          include('tmensagens.php');
        } elseif ($_GET['opc'] == 'usuarios') {
          include('usuarios.php');
        } elseif ($_GET['opc'] == 'apagaP') {
          require('apagaP.php');
        } elseif ($_GET['opc'] == 'verP') {
          include('verP.php');
        } elseif ($_GET['opc'] == 'editaP') {
          include('editaP.php');
        } elseif ($_GET['opc'] == 'verUs') {
          include('verUs.php');
        }
      } else {
              include('home.php');
        }

      ?>


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
