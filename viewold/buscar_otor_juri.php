<?php
require_once '../coreapp/Conection.php';
include "header.php";

$conection = new Conection();
$mysqli    = $conection->Conectar();

$otor_juri = $_REQUEST['otor_juri'];
?>
<div class="bs-docs-section">
        <div class="page-header">
          <div class="row">
            <div class="col-lg-4">
              <h2 id="buttons">Listado por Otorgantes o Favorecidos Jurídicos</h2>
            </div>
          </div>
        </div>

<div class="row">
	<div class="col-lg-8">
		<div class="well bs-component">
		    <form id="busqueda" name="busqueda" class="form-horizontal">
		      <div class="form-group">
		          <label for="inputNombre" class="col-lg-2 control-label">Razon social</label>
		          <div class="col-lg-7">
		            <input type="text" class="form-control" name="otor_juri" placeholder="Institucion o Razon Social" value="<?php echo @$otor_juri;?>" required />
		            <button type="submit" name="btnbuscar" class="btn btn-primary">Submit</button>
		          </div>
		        </div>
		      </form>
		</div>

<?php
if (isset($_REQUEST["btnbuscar"])) {
	//inicializo el criterio y recibo cualquier cadena que se desee buscar
	$nexo1     = "%";
	$otor_juri = trim($otor_juri);
	$datos1    = explode(" ", $otor_juri);
	$union1    = implode($nexo1, $datos1);

	$sql = "SELECT Cod_inv, Raz_inv FROM involjuridicas WHERE Raz_inv LIKE '%$union1%';";

	$res = $mysqli->query($sql);

	?>
	<div class="bs-docs-section">
														<div class="row">
															<div class="col-lg-10">
																<div class="bs-component">
																	<table class="table table-striped table-hover ">
																		<thead>
																			<tr>
																				<th>Num</th>
																				<th>OTORGANTE JURIDICO </th>
																				<th>DETALLES</th>
																			</tr>
																		</thead>
																		<tbody>

	<?php
	$i = 1;
	while ($registro = $res->fetch_assoc()) {
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

	<?php
}
?>
</body>
</html>