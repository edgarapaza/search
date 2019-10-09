<?php
require_once "header.php";
?>
	<style type="text/css">
		ul{
			padding: 5px 5px;
		}
		li{
			list-style: none;
			padding: 10px 10px;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
				<h1>Sistema Nuevo</h1>
				<ul>
					<li><a href="./lista.php" class="btn btn-primary"/>Buscar por Nombres</a></li>
					<li><a href="./buscar_otor_juri.php" class="btn btn-primary"/>Buscar por Datos Juridicos</a></li>
					<li><a href="./buscar_x_fecha.php" class="btn btn-primary"/>Buscar por Fecha</a></li>
					<li><a href="./nombre_bien.php" class="btn btn-primary" />Buscar por Nombre del Bien</a></li>
				</ul>




				</div>

			</div>
		</div>
	</div>

<?php include "footer.php"; ?>