<?php
include 'header.php';
require_once '../coreapp/conection.php';
	
	$nexo            = "%";
	$nombre_bien     = trim($_REQUEST['nombre_bien']);
	$separar         = explode(" ",$nombre_bien);
	$union           = implode($nexo, $separar);
	
	printf("la union es :   %s", $union);

	$sql             = "SELECT cod_sub, fec_doc, nom_bie, proy_id FROM escrituras1 WHERE nom_bie Like '%$union%'";
	$res             = $mysqli->query($sql);
	$numeroRegistros = $res->num_rows;
	echo "Numero de Registros: ".$numeroRegistros;
?>    

<form id="busqueda" name="busqueda" method="post">
  <table>
  	<thead>
    <tr>
      <th>BUSQUEDA POR NOMBRE DEL BIEN</th>
      <th></th>
      <td></td>
    </tr>
    <tr>
      <td>BUSCAR POR BIEN</td>
      <td><input name="nombre_bien" type="text" size="80" value="<?php echo @$nombre_bien;?>" /></td>
      <td><input name="btnbuscar" type="submit" value="Buscar" /></td>
      <td></td>
    </tr>
    </thead>
  </table>
</form>