<?php
	require_once "header.php";
	require_once '../coreapp/Conection.php';

	$conection = new Conection();
	$mysqli    = $conection->Conectar();

	if (isset($_REQUEST['btnbuscar'])) {
		$nexo        = "%";
		$nombre_bien = trim($_REQUEST['nombre_bien']);
		$separar     = explode(" ", $nombre_bien);
		$union       = implode($nexo, $separar);

		$sql    = "SELECT cod_sct, cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol FROM escrituras WHERE nom_bie LIKE '%$union%'";
		$result = $mysqli->query($sql);
	}
?>

	<div class="container">
	  <div class="well">
		<div class="row">
			<h2>Buscar por nombre del Bien</h2>
			<form method="post">
			    <div class="col-xs-12 col-md-8">
			    	<input name="nombre_bien" type="text" size="80" value="<?php echo $nombre_bien;?>" required placeholder="Nombre del bien" class="form-control" />
			    </div>
			    <div class="col-xs-12 col-md-4">
					<input name="btnbuscar" type="submit" value="Buscar" class="btn btn-info"/>
			    </div>
			</form>
		</div>
	  </div>

		<div class="row">
			<div class="col-md-12">

				<table class="table table-striped table-hover">
			      	<tr class="success">
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
						$sql = "SELECT CONCAT(Nom_not, ' ',Pat_not,' ',Mat_not) as notario FROM notarios2 WHERE cod_not =".$fila["cod_not"];
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

<?php require_once "footer.php"; ?>