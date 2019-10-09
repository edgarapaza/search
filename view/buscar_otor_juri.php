<?php
	require_once '../coreapp/Conection.php';
	include "header.php";

	$conection = new Conection();
	$mysqli    = $conection->Conectar();
?>

	<div class="container">
	  <div class="well">
    	<div class="row">
      		<div class="col-md-12">
				<h2>Otorgante Juridico</h2>
      			<div class="bs-docs-section">
					<form id="busqueda" name="busqueda">
						<div class="col-xs-12 col-md-8"><input class="form-control" name="otor_juri" type="text" id="otor_juri" placeholder="Institucion o Razon Social" value="<?php echo @$otor_juri;?>" required /></div>
						<div class="col-xs-12 col-md-4"><input name="btnbuscar" type="submit" value="Buscar" class="btn btn-info form-control" /></div>
					</form>
				</div>
			</div>
		</div>
	  </div>


		<?php
		if (isset($_REQUEST["btnbuscar"]))
		{
			//inicializo el criterio y recibo cualquier cadena que se desee buscar
			$nexo1     = "%";
			$otor_juri = trim($_REQUEST['otor_juri']);
			$datos1    = explode(" ", $otor_juri);
			$union1    = implode($nexo1, $datos1);

			$sql = "SELECT Cod_inv, Raz_inv FROM involjuridicas1 WHERE Raz_inv LIKE '% $union1 %';";

			$res             = $mysqli->query($sql);
			$numeroRegistros = $res->num_rows;
			echo "Numero de Resultados: ".$numeroRegistros;
		?>

		<div class="row">
			<table class='table table-striped table-hover'>
				<thead>
					<tr>
						<th>Num</th>
						<th>OTORGANTE JURIDICO </th>
						<th>DETALLES edgar</th>
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
						<td><a href="mostrardetallesJuridicos.php?codigo=<?php echo $registro["Cod_inv"];?>">Ver Detalles </a></td>
					</tr>
					<?php
						$i++;
						}
					?>
				</tbody>
			</table>
		<?php } ?>
		</div>
	</div>

<?php include "footer.php"; ?>