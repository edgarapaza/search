<?php
require_once 'header.php';
require_once '../coreapp/Conection.php';

$conection = new Conection();
$mysqli    = $conection->Conectar();

if (isset($_REQUEST['btnbuscar'])) {
	$nexo        = "%";
	$nombre_bien = trim($_REQUEST['nombre_bien']);
	$separar     = explode(" ", $nombre_bien);
	$union       = implode($nexo, $separar);

	$sql             = "SELECT cod_sct, cod_sub, fec_doc, nom_bie, proy_id FROM escrituras1 WHERE nom_bie Like '%$union%'";
	$res             = $mysqli->query($sql);
	$data            = $res->fetch_assoc();
	$numeroRegistros = $res->num_rows;
	echo "Numero de Registros: ".$numeroRegistros;
}
?>

<form id="busqueda" name="busqueda" method="post">
  <table>
  	<thead>
      <tr>
        <td>BUSCAR POR BIEN</td>
        <td><input name="nombre_bien" type="text" size="80" value="<?php echo @$nombre_bien;?>" required placeholder="Nombre del bien"/></td>
        <td><input name="btnbuscar" type="submit" value="Buscar" class="btn btn-info"/></td>
        <td></td>
      </tr>
    </thead>
  </table>
</form>

<h2 class="sub-header">Listado por Nombre de Bienes o Predios</h2>
        <div class="table-responsive">
                <table  class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Sub Serie</th>
                            <th>Fecha Documento</th>
                            <th>Nombre Bien</th>
                            <th>Proyecto</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

<?php
$i = 1;
while ($row = $res->fetch_assoc()) {
	?>
						          <tr>
						              <td><?php echo $i?></td>
						              <td><?php
	$query2     = "SELECT des_sub FROM subseries WHERE cod_sub =".$row["cod_sub"];
	$exe_query2 = $mysqli->query($query2);
	$subserie1  = $exe_query2->fetch_assoc();
	echo $subserie1["des_sub"];
	?></td>
						              <td><?php echo $row["fec_doc"];?></td>
						              <td><?php echo $row["nom_bie"];?></td>
						              <td><?php echo $row["proy_id"];?></td>
						              <td><a href="./detalles_nombreBien.php?cod_escritura=<?php echo $row['cod_sct'];?>">Ver Detalles</a></td>
						          </tr>
	<?php
	$i++;
}
?>