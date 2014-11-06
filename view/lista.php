<?php
include "../coreapp/conection.php";
include "header.php";

?>
<link rel="stylesheet" type="text/css" href="../css/cuerpo.css">
	<section class="datagrid">

		<form method="get" class="form-horizontal">
		<fieldset>
			<legend>Busqueda por Nombre de Personas</legend>
		    
			<input type="text" name="nombre" placeholder="Nombre" />
			<input type="text" name="paterno" placeholder="Apellido Paterno" />
			<input type="text" name="materno" placeholder="Apellido Materno" />
			<button value="Buscar Nombre" type="submit" name="buscar" class="btn btn-info">Buscar</button>
		</fieldset>
		</form>

		

        <div class="table-responsive">
            


			<?php
				@$nombre  = $_GET['nombre'];
				@$paterno = $_GET['paterno'];
				@$materno = $_GET['materno'];


				if($nombre =="" and $paterno =="" and $materno =="")
				{
					echo "<script language='javascript' type='text/javascript'>	alert('Tiene que escribir algun Nombre u Apellido en los cuadros.  Graicas');</script>";
				}
				else
				{
					echo "
					<div class='panel panel-info'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>Info: Nombre Buscado</h3>
					  </div>
					  <div class='panel-body'>";
					    echo "<p>".$nombre." ".$paterno." ".$materno."</p>";
					  echo "</div></div>";
						/*
						lA FUNCION QUE REALIZA ES DE MEDIR EL TIEMPO DE RESPUESTA DE LAS CONSULTAS CON
						MYSQLI UY MOSTRAR EL DATOS EN EL AREA DE TRABAJO
						

						
						function timequery(){
						   static $querytime_begin;
						   list($usec, $sec) = explode(' ',microtime());
						    
						       if(!isset($querytime_begin))
						      {   
						         $querytime_begin= ((float)$usec + (float)$sec);
						      }
						      else
						      {
						         $querytime = (((float)$usec + (float)$sec)) - $querytime_begin;
						         echo sprintf('<br />La consulta tardó %01.5f segundos.- <br />', $querytime);
						      }
						}

						timequery();
								
					/*
					REALIZA LA BUSQUEDA DE LOS DATOS ANTES FILTRADO
					*/
				echo "<table class='table table-striped table-hover'> <tbody>";
				echo "<tr><th>Numero</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Operaciones</th></tr>";
					if(isset($_GET['buscar']))
					{
						if($result = $mysqli->query("SELECT Cod_inv, Nom_inv, Pat_inv, Mat_inv FROM involucrados1 WHERE Nom_inv LIKE '%$nombre%' AND Pat_inv LIKE '%$paterno%' AND Mat_inv LIKE '%$materno%';"))
						{
							echo "Numero de Resultados: ".$result->num_rows;
							$i =1;	
							if($result->num_rows > 0)
							{
								while($fila = $result->fetch_array())
								{
								echo "<tr><th>"; 
										echo $i;
								echo "</th><th>";
										echo $fila["Nom_inv"]; 
								echo "</th><th>"; 
										echo $fila["Pat_inv"]; 
								echo "</th><th>"; 
										echo $fila["Mat_inv"]; 
								echo "</th><th>"; 
										echo "<a href='mostrardetalles.php?codigo=". $fila["Cod_inv"] ."'>Mostrar Informacion</a>";
								echo "</td></tr>";

								$i++;
								}
							}
						}
						else
						{
							echo $mysqli->error();
						}
					}
					mysqli_close();
				}
				?>
			</tbody>
		</table>
	</div>

</body>
</html>
				
<?php
include "footer.php";
?>