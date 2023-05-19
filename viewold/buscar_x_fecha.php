<?php
	require_once "header.php";
	require_once "../coreapp/Conection.php";

	$conection = new Conection();
	$mysqli    = $conection->Conectar();

	$dia  = $_REQUEST['dia'];
	$mes  = $_REQUEST['mes'];
	$year = $_REQUEST['anio'];

	$mensaje;

	if ($dia != "Elegir" and $mes != "" and $year != "") {
		$fecha = $year."-".$mes."-".$dia;
		$sql   = "SELECT cod_sct, cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol FROM dbarp.escrituras WHERE fec_doc ='$fecha'";

		$result = $mysqli->query($sql);

		$mensaje= "Datos encontrados: ".$result->num_rows;
	}

	if ($dia == 0 and $mes == 0) {
		$fecha = $year."-"."%"."-"."%";
		$sql   = "SELECT cod_sct, cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol FROM dbarp.escrituras WHERE fec_doc LIKE '$fecha'";

		$result = $mysqli->query($sql);
		$mensaje= "Datos encontrados: ".$result->num_rows;
	}

	if ($dia == 0) {
		$fecha = $year."-".$mes."-"."%";
		$sql   = "SELECT cod_sct, cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol FROM dbarp.escrituras WHERE fec_doc LIKE '$fecha'";

		$result = $mysqli->query($sql);
		$mensaje= "\tDatos encontrados: ".$result->num_rows;

	}
?>

	<div class="container">
	  <div class="well">
		<div class="row">
			<div class="col-md-12">
				<h3>Listado por Fechas</h3>
				<form method="post">
					<div class="col-md-3">
						<select name="dia" class="form-control">
			        		<option value="0">Dia</option>
			        		<option value="1">1</option>
			        		<option value="2">2</option>
			        		<option value="3">3</option>
			        		<option value="4">4</option>
			        		<option value="5">5</option>
			        		<option value="6">6</option>
			        		<option value="7">7</option>
			        		<option value="8">8</option>
			        		<option value="9">9</option>
			        		<option value="10">10</option>
			        		<option value="11">11</option>
			        		<option value="12">12</option>
			        		<option value="13">13</option>
			        		<option value="14">14</option>
			        		<option value="15">15</option>
			        		<option value="16">16</option>
			        		<option value="17">17</option>
			        		<option value="18">18</option>
			        		<option value="19">19</option>
			        		<option value="20">20</option>
			        		<option value="21">21</option>
			        		<option value="22">22</option>
			        		<option value="23">23</option>
			        		<option value="24">24</option>
			        		<option value="25">25</option>
			        		<option value="26">26</option>
			        		<option value="27">27</option>
			        		<option value="28">28</option>
			        		<option value="29">29</option>
			        		<option value="30">30</option>
			        		<option value="31">31</option>
			        	</select>
					</div>
					<div class="col-md-3">
						<select name="mes" id="mes" class="form-control">
				          <option value="0">Mes</option>
				          <option value="01">Enero</option>
				          <option value="02">Febrero</option>
				          <option value="03">Marzo</option>
				          <option value="04">Abril</option>
				          <option value="05">Mayo</option>
				          <option value="06">Junio</option>
				          <option value="07">Julio</option>
				          <option value="08">Agosto</option>
				          <option value="09">Septiembre</option>
				          <option value="10">Octubre</option>
				          <option value="11">Noviembre</option>
				          <option value="12">Diciembre</option>
				        </select>
					</div>
					<div class="col-md-3">
						<input class="form-control" name="anio" type="text" id="anio" size="4" maxlength="4" placeholder="Año" required>
					</div>
					<div class="col-md-3">
						<input name="buscar" type="submit" id="buscar" value="Buscar" class="btn btn-info" >
					</div>
				</form>
			</div>
		</div>
	  </div>

	   <div class="row">
			<div class="col-md-12">
				<spam class="alert"><?php echo $mensaje; ?></spam>

				   <table class="table table-striped table-hover">
					    <tr>
					        <td width="35">Num</td>
					        <td width="75">Notario</td>
					        <td width="123">Protocolo</td>
					        <td width="139">Fecha </td>
					        <td width="164">Sub Serie</td>
					        <td width="360">Nombre Predio </td>
					        <td width="324">Otorgante</td>
					        <td width="362">Favorecido</td>
					        <td width="65"></td>
					    </tr>

						<?php
							$i = 1;
							while ($fila = $result->fetch_assoc())
							{
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td>
								<?php
								$sql     = "SELECT CONCAT(Nom_not, ' ',Pat_not,' ',Mat_not) as notario FROM notarios2 WHERE cod_not =".$fila["cod_not"];
								$notario = $mysqli->query($sql);
								$not     = $notario->fetch_assoc();
								echo $not["notario"];
								?>
							</td>
							<td><?php echo $fila["cod_pro"];?></td>
							<td><?php echo $fila["fec_doc"];?></td>
							<td>
								<?php
								$sub      = $fila["cod_sub"];
								$sql      = "SELECT des_sub FROM subseries WHERE cod_sub = '$sub'";
								$subserie = $mysqli->query($sql);
								$rpta     = $subserie->fetch_assoc();
								echo $rpta["des_sub"];
								?>
							</td>
							<td><?php echo $fila["nom_bie"];?></td>
							<td>
								<?php
								$sql   = "SELECT cod_sct,cod_inv,flg_per FROM escriotor WHERE cod_sct = ".$fila["cod_sct"];
								$invol = $mysqli->query($sql);
								$row1  = $invol->fetch_assoc();

								$q_oto = "SELECT a.Cod_inv, CONCAT(a.Nom_inv,' ',a.Pat_inv,' ',a.Mat_inv) as nombre,b.Cod_inv, b.Raz_inv FROM involucrados as a, involjuridicas as b WHERE a.cod_inv = ".$row1["cod_inv"];

								$query1 = $mysqli->query($q_oto);
								$nombre = $query1->fetch_assoc();
								echo $nombre["nombre"];

								if ($row1["flg_per"] != 0) {
									$sql         = "SELECT Cod_inv, Raz_inv FROM involjuridicas WHERE Cod_inv =".$row1["cod_inv"];
									$row2        = $mysqli->query($sql);
									$razonsocial = $row2->fetch_assoc();
									echo $razonsocial["Raz_inv"];
								}
								?>
							</td>
							<td>
								<?php
								$sql   = "SELECT cod_sct,cod_inv, flg_per FROM escrifavor WHERE cod_sct = ".$fila["cod_sct"];
								$invol = $mysqli->query($sql);
								$row1  = $invol->fetch_assoc();

								$q_oto = "SELECT a.Cod_inv, CONCAT(a.Nom_inv,' ',a.Pat_inv,' ',a.Mat_inv) as nombre,b.Cod_inv, b.Raz_inv FROM involucrados as a, involjuridicas as b WHERE a.cod_inv = ".$row1["cod_inv"];

								$query1 = $mysqli->query($q_oto);
								$nombre = $query1->fetch_assoc();
								echo $nombre["nombre"];

								if ($row1["flg_per"] != 0) {
									$sql         = "SELECT Cod_inv, Raz_inv FROM involjuridicas WHERE Cod_inv =".$row1["cod_inv"];
									$row2        = $mysqli->query($sql);
									$razonsocial = $row2->fetch_assoc();
									echo $razonsocial["Raz_inv"];
								}
								?>
							</td>
							<td><a href="lista_detallada_juridica.php?codigo_escritura=<?php echo $fila['cod_sct'];?>">Mostrar Informacion</a></td>
						</tr>
							<?php
								$i++;
								}
							?>
		    		</table>
		    </div>
		</div>
	</div>
        <?php include "footer.php"; ?>