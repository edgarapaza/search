<?php
//echo $mysqli->host_info . "\n Usuario.php";

function verificar($usuario, $clave){
	include "../coreapp/conection.php";
	$rpta;
	$sql = "SELECT cod_usu, niv_usu FROM usuarios WHERE log_usu='$usuario' AND psw_usu ='$clave' LIMIT 0,1;";

	$result = $mysqli->query($sql);
	$numero = $result->num_rows;
	
	if ($numero > 0){
		$rpta = TRUE;
	}else
	{
		$rpta = FALSE;
	}

	return $rpta;
}

?>