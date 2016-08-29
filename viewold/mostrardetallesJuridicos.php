<?php
	include "../coreapp/Conection.php";
	include "header.php";

	$conection = new Conection();
	$mysqli    = $conection->Conectar();

	$codigo_involucrado = $_REQUEST['codigo'];
	//echo "Recibido: ".$codigo_involucrado;

	$sql_invol = "SELECT Raz_inv FROM involjuridicas WHERE Cod_inv = ".$codigo_involucrado;
	$nom_invol = $mysqli->query($sql_invol);
	$res_invol = $nom_invol->fetch_assoc();
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Zona Otorgantes</h2>
		            <table class="table table-striped">
						<thead>
							<tr>
								<th>Num</th>
								<th>A favor de</th>
								<th>Sub Serie</th>
								<th>Num Escritura</th>
								<th>Fecha Documento</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$new_sql = "SELECT cod_sct FROM escriotor WHERE flg_per = 1 AND cod_inv  = ".$codigo_involucrado;
							if ($result_otorgantes = $mysqli->query($new_sql)) {
								echo "Numero de Resultados: ".$result_otorgantes->num_rows;
								echo "<br>Otorgado por: ". $res_invol["Raz_inv"];
								$i = 1;

								while ($fila = $result_otorgantes->fetch_assoc()) {
									echo "<tr><td>";
									echo $i."-";

									$query1 = "SELECT cod_sct, num_sct, fec_doc cod_sub FROM escrituras WHERE cod_sct = ".$fila["cod_sct"];

									echo "<td>";
									//Buscar a los Otorgantes de los Favorecidos
									$query_favorecido     = "SELECT cod_inv, flg_per FROM  escrifavor WHERE  cod_sct = ".$fila["cod_sct"];
									$exe_query_favorecido = $mysqli->query($query_favorecido);
									$favorecido_res       = $exe_query_favorecido->fetch_assoc();

									if ($favorecido_res["flg_per"] == 0) {
										//Consultar a Base de Datos sobre el nombre de los involucrados
										$sql    = "SELECT CONCAT(Nom_inv,' ',Pat_inv,' ',Mat_inv) AS nombre FROM involucrados WHERE Cod_inv = ".$favorecido_res["cod_inv"];
										$nom    = $mysqli->query($sql);
										$result = $nom->fetch_assoc();
										echo $result["nombre"];
									}
									if ($favorecido_res["flg_per"] == 1) {
										//Consultar a Base de Datos sobre el nombre de los involucrados Juridicos
										$sqlj    = "SELECT Raz_inv FROM involjuridicas WHERE Cod_inv = ".$favorecido_res["cod_inv"];
										$nomj    = $mysqli->query($sqlj);
										$resultj = $nomj->fetch_assoc();
										echo $resultj["Raz_inv"];
									}
									echo "</td>";

									if ($escrituras = $mysqli->query($query1)) {
										if ($escrituras->num_rows > 0) {
											$escritura = $escrituras->fetch_assoc();
											echo "</td><td>";
											$query2     = "SELECT des_sub FROM subseries WHERE cod_sub =".$escritura["cod_sub"];
											$exe_query2 = $mysqli->query($query2);
											$subserie1  = $exe_query2->fetch_assoc();
											echo $subserie1["des_sub"];
											echo "</td><td>";
											echo $escritura["num_sct"];
											echo "</td><td>";
											echo $escritura["fec_doc"];

										}
									}

									echo "</td><td>";
									echo "<a href='lista_detallada_juridica.php?codigo=".$escritura['cod_sct']."&proyecto=".$escritura['proy_id']."'>Mostrar Informacion</a>";

									echo "</td></tr>";
									$i++;
								}
							} else {
								echo "error";
							}

							?>
						</tbody>
					</table>
			</div>
		</div>


	<!--/*****************************************************************************************
	   Area para mostrar los datos del Favorecido
	**********************************************************************************************
	-->
		<div class="row">
			<div class="col-md-12">
				<h2 class="sub-header">Zona Favorecidos</h2>
			    <table class="table table-striped">
					<thead>
						<tr>
							<th>Num</th>
							<th>Otorgado por</th>
							<th>Sub Serie</th>
							<th>Num Escritura</th>
							<th>Fecha Documento</th>
							<th>Opciones</th>
						</tr>
					</thead>

					<tbody>
						<?php

						if ($result_favorecidos = $mysqli->query("SELECT cod_sct FROM escrifavor WHERE flg_per = 1 AND cod_inv = $codigo_involucrado;"))
						{
							echo "Numero de Resultados: ".$result_favorecidos->num_rows;
							$i = 1;

							if ($result_favorecidos->num_rows > 0) {
								while ($filaf = $result_favorecidos->fetch_assoc()) {
									echo "<tr><td>";
									echo $i;

									echo "<td>";

									$query_f = "SELECT cod_sct,num_sct, fec_doc, cod_sub FROM escrituras WHERE cod_sct = ".$filaf["cod_sct"];

									$query_otorgante     = "SELECT cod_inv, flg_per FROM  escriotor WHERE cod_sct = ".$filaf["cod_sct"];
									$exe_query_otorgante = $mysqli->query($query_otorgante);
									$otorgante_res       = $exe_query_otorgante->fetch_assoc();

									if ($otorgante_res["flg_per"] == 0) {
										//Consultar a Base de Datos sobre el nombre de los involucrados
										$sql1    = "SELECT CONCAT(Nom_inv,' ',Pat_inv,' ',Mat_inv) AS nombre FROM involucrados WHERE Cod_inv = ".$otorgante_res["cod_inv"];
										$nom1    = $mysqli->query($sql1);
										$result1 = $nom1->fetch_assoc();
										echo $result1["nombre"];
									}
									if ($otorgante_res["flg_per"] == 1) {
										//Consultar a Base de Datos sobre el nombre de los involucrados
										$sqlj2    = "SELECT Raz_inv FROM involjuridicas WHERE Cod_inv = ".$otorgante_res["cod_inv"];
										$nomj2    = $mysqli->query($sqlj2);
										$resultj2 = $nomj2->fetch_assoc();
										echo $resultj2["Raz_inv"];
									}
									echo "</td>";
									if ($escrituras_f = $mysqli->query($query_f)) {
										if ($escrituras_f->num_rows > 0) {
											$escritura = $escrituras_f->fetch_array();
											echo "</td><td>";
											$query2     = "SELECT des_sub FROM subseries WHERE cod_sub =".$escritura["cod_sub"];
											$exe_query2 = $mysqli->query($query2);
											$subserie1  = $exe_query2->fetch_assoc();
											echo $subserie1["des_sub"];
											echo "</td><td>";
											echo $escritura["num_sct"];
											echo "</td><td>";
											echo $escritura["fec_doc"];
										}
									}

									echo "</td><td>";
									echo "<a href='lista_detallada_juridica.php?codigo_escritura=".$escritura['cod_sct']."'>Mostrar Informacion</a>";

									echo "</td></tr>";
									$i++;
								}
							} else {
								echo $mysqli->error();
							}
						}
						//mysqli_close();
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php include_once "footer.php"; ?>