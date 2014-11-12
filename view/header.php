<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Busqueda - Archivo Regional Puno</title>
	   <script src="../js/bootstrap.min.js"></script>
    <!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--<link rel="stylesheet" href="../css/style_detalles222222222222.css">-->

     <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <!-- Static navbar -->
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sistema de Busqueda</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio</a></li>
            <li><a href="javascript:history.back(-1)">Anterior</a></li>
            <li><a href="#">Siguiente</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="./lista.php">Buscar por Nombres</a></li>
                <li><a href="./buscar_x_fecha.php">Buscar por Fecha</a></li>
                <li><a href="./nombre_bien.php">Buscar por Nombre del Bien</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Adicionales</li>
                <li><a href="./buscar_otor_juri.php">Buscar por Datos Juridicos</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./buscar_index.php">Principal</a></li>
            <li><a href="../index.html">Cerrar Sesion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>