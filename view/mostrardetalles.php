<?php
	include "header.php";
	include "../coreapp/conection.php";
	$codigo = $_GET['codigo'];
	//echo "Recibido: ".$codigo;
?>

	<h2 class="sub-header">Zona Otorgantes</h2>
    	<div class="table-responsive">
            <table class="table table-striped">
				<thead>
					<tr>
						<th>Num</th>
						<th>Sub Serie</th>
						<th>Num Escritura</th>
						<th>Fecha Documento</th>
						<th>Proyecto</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>

			<?php

			if($result_otorgantes = $mysqli->query("SELECT cod_sct FROM escriotor1 WHERE cod_inv  = $codigo;"))
			{
				echo "Numero de Resultados: ".$result_otorgantes->num_rows;
				$i=1;

				if($result_otorgantes->num_rows > 0)
				{
					while($fila = $result_otorgantes->fetch_assoc())
					{
						echo "<tr><td>";
						echo $i;
						$query1 = "SELECT cod_sct,num_sct, fec_doc, proy_id, cod_sub FROM escrituras1 WHERE cod_sct = ".$fila["cod_sct"];

						if($escrituras = $mysqli->query($query1))
						{
							if($escrituras->num_rows > 0)
							{
								$escritura = $escrituras->fetch_assoc();
								echo "</td><td>";
									$query2 = "SELECT des_sub FROM subseries WHERE cod_sub =".$escritura["cod_sub"];
									$exe_query2 = $mysqli->query($query2);
									$subserie1 = $exe_query2->fetch_assoc();
									echo $subserie1["des_sub"];
								echo "</td><td>";
								echo $escritura["num_sct"];
								echo "</td><td>";
								echo $escritura["fec_doc"];
								echo "</td><td>";
								echo $escritura["proy_id"];
							}
						}

						echo "</td><td>";
						echo "<a href='lista_detallada.php?codigo_escritura=".$escritura['cod_sct']."&proyecto=".$escritura['proy_id']."'>Mostrar Informacion</a>";

						echo "</td></tr>";
						$i++;
					}
				}

				else
				{
					echo $mysqli->error();
				}
			}
			//mysqli_close();
	?>

			</tbody>
		</table>
	</div>

	<!--/*****************************************************************************************
	   Area para mostrar los datos del Favorecido
	**********************************************************************************************
	-->
	<h2 class="sub-header">Zona Favorecidos</h2>
    	<div class="table-responsive">
            <table class="table table-striped">
				<thead>
					<tr>
						<th>Num</th>
						<th>Sub Serie</th>
						<th>Num Escritura</th>
						<th>Fecha Documento</th>
						<th>Proyecto</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>

			<?php

			if($result_favorecidos = $mysqli->query("SELECT cod_sct FROM escrifavor1 WHERE cod_inv  = $codigo;"))
			{
				echo "Numero de Resultados: ".$result_favorecidos->num_rows;
				$i=1;

				if($result_favorecidos->num_rows > 0)
				{
					while($filaf = $result_favorecidos->fetch_array())
					{
						echo "<tr><td>";
						echo $i;
						$query_f = "SELECT cod_sct,num_sct, fec_doc, proy_id, cod_sub FROM escrituras1 WHERE cod_sct = ".$filaf["cod_sct"];

						if($escrituras_f = $mysqli->query($query_f))
						{
							if($escrituras_f->num_rows > 0)
							{
								$escritura = $escrituras_f->fetch_array();
								echo "</td><td>";
									$query2 = "SELECT des_sub FROM subseries WHERE cod_sub =".$escritura["cod_sub"];
									$exe_query2 = $mysqli->query($query2);
									$subserie1 = $exe_query2->fetch_assoc();
									echo $subserie1["des_sub"];
								echo "</td><td>";
								echo $escritura["num_sct"];
								echo "</td><td>";
								echo $escritura["fec_doc"];
								echo "</td><td>";
								echo $escritura["proy_id"];
							}
						}

						echo "</td><td>";
						echo "<a href='lista_detallada.php?codigo_escritura=".$escritura['cod_sct']."&proyecto=".$escritura['proy_id']."'>Mostrar Informacion</a>";

						echo "</td></tr>";
						$i++;
					}
				}

				else
				{
					echo $mysqli->error();
				}
			}
			//mysqli_close();
	?>
		</tbody>
	</table>
	</div>
</body>
</html>
