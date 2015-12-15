<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Sistema de Busqueda - Archivo Regional Puno</title>
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style_ico.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/dropdown.js"></script>
  </head>
  <body>

  <!-- Static navbar -->
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="lista.php" ><span class="icon-user"> </span>Buscar por Nombres</a></li>
            <li><a href="buscar_otor_juri.php" ><span class="icon-user-tie"> </span>Buscar Datos Juridicos</a></li>
            <li><a href="buscar_x_fecha.php" ><span class="icon-calendar"> </span>Buscar por Fecha</a></li>
            <li><a href="nombre_bien.php" ><span class="icon-home3"> </span>Buscar por Bien</a></li>
            <li><a href="../viewold/index.php">Sistema Anterior</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li >
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="icon-cog"> </span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Modificar esta escritura</a></li>
                <li class="divider"></li>
                <li><a href="#">Agregar nueva escritura</a></li>
                <li class="divider"></li>
                <li><a href="../inicio.php">Salir</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
