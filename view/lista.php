<?php
	include "../coreapp/Conection.php";
	include "header.php";

	$conection = new Conection();
	$mysqli    = $conection->Conectar();

	$nombre  = $_REQUEST['nombre'];
	$paterno = $_REQUEST['paterno'];
	$materno = $_REQUEST['materno'];

?>

	<div class="container">
	  <div class="well">
    	<div class="row">
      		<div class="col-md-12">
				<div class="bs-docs-section">
				<h2 class="sub-header">Nombres Personas</h2>
					<div class="row">
				          <div class="col-lg-12">
				            <div class="bs-component">
				              <form class="form-horizontal">
				              		<div class="col-xs-12 col-md-3"><input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre;?>"/></div>
				              		<div class="col-xs-12 col-md-3"><input class="form-control" type="text" name="paterno" placeholder="Apellido Paterno" value="<?php echo $paterno;?>"/></div>
				              		<div class="col-xs-12 col-md-3"><input class="form-control" type="text" name="materno" placeholder="Apellido Materno" value="<?php echo $materno;?>"/></div>
									<div class="col-xs-12 col-md-3"><input value="Buscar Nombre" type="submit" name="buscar" class="btn btn-info form-control" /></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
		<hr>
		<div class="row">

			<div class="table-responsive">
			<table class="table table-striped table-hover">
					<tr>
						<th>Numero</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Operaciones</th>
					</tr>
						<?php

						if ($nombre == "" and $paterno == "" and $materno == "") 
						{
							#echo "<script language='javascript' type='text/javascript'> alert('Tiene que escribir algun Nombre u Apellido en los cuadros.  Gracias');</script>";

						} else {
							
							/*
							REALIZA LA BUSQUEDA DE LOS DATOS ANTES FILTRADO
							 */

							if (isset($_REQUEST['buscar'])) {
								$sql_dat = "SELECT Cod_inv, Nom_inv, Pat_inv, Mat_inv FROM involucrados1 WHERE Nom_inv LIKE '%$nombre%' AND Pat_inv LIKE '%$paterno%' AND Mat_inv LIKE '%$materno%';";
								if ($result = $mysqli->query($sql_dat)) 
								{
									echo "Numero de Resultados: ".$result->num_rows;
									$i = 1;
									if ($result->num_rows > 0) {
										while ($fila = $result->fetch_array(MYSQLI_ASSOC)) {
											echo "<tr><th>";
											echo $i;
											echo "</th><th>";
											echo $fila["Nom_inv"];
											echo "</th><th>";
											echo $fila["Pat_inv"];
											echo "</th><th>";
											echo $fila["Mat_inv"];
											echo "</th><th>";
											echo "<a href='mostrardetalles.php?codigo=".$fila["Cod_inv"]."'>Mostrar Informacion</a>";
											echo "</td></tr>";

											$i++;
										}
									}
								} else {
									//echo $mysqli->error();
								}
							}
						}
						?>
			</table>
			</div>
		</div>
	</div>

<?php
include "footer.php";
?>