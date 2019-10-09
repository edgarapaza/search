<?php
	require_once '../coreapp/Conection.php';
	include "header.php";

	$conection = new Conection();
	$mysqli    = $conection->Conectar();

	$otor_juri = $_REQUEST['otor_juri'];
?>

	<div class="container">
	  <div class="well">
		<div class="row">
	          <h3>Listado por Otorgantes o Favorecidos Jurídicos</h3>
			    <form id="busqueda" name="busqueda" class="form-group">
			      	<div class="col-md-8">
			      		<input type="text" class="form-control" name="otor_juri" placeholder="Institucion o Razon Social" value="<?php echo @$otor_juri;?>" required />
			      	</div>
			      	<div class="col-md-4">
			      		<button type="submit" name="btnbuscar" class="btn btn-success ">Buscar</button>
			      	</div>
			    </form>
			</div>
	  </div>


		<?php

		if(isset($_REQUEST["btnbuscar"]))
		{
			//inicializo el criterio y recibo cualquier cadena que se desee buscar
			$nexo1     = "%";
			$otor_juri = trim($otor_juri);
			$datos1    = explode(" ", $otor_juri);
			$union1    = implode($nexo1, $datos1);

			$sql = "SELECT Cod_inv, Raz_inv FROM involjuridicas WHERE Raz_inv LIKE '%$union1%';";

			$res = $mysqli->query($sql);

			?>

			<div class="row">
				<div class="col-lg-12">
					<div class="bs-component">
						<table class="table table-responsive table-hover ">
							<thead>
								<tr class="info">
									<th>Num</th>
									<th>OTORGANTE JURIDICO </th>
									<th>DETALLES</th>
								</tr>
							</thead>
							<tbody>

							<?php
								$i = 1;
								while ($registro = $res->fetch_assoc())
								{
							?>
								<tr>
									<td><?php echo $i?></td>
									<td><?php echo $registro["Raz_inv"];?></td>
									<td><a href="mostrardetallesJuridicos.php?codigo=<?php echo $registro["Cod_inv"];?>">Detalles</a></td>
								</tr>
							<?php
								$i++;
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>

						<?php } // Cierra el If ?>

<?php include "footer.php"; ?>