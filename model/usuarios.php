<?php

function verificar($usuario, $clave) {

	require '../coreapp/Conection.php';
	$conection = new Conection();
	$con       = $conection->Conectar();

	$rpta;
	$sql = "SELECT cod_usu FROM usuarios WHERE log_usu='$usuario' AND psw_usu ='$clave' LIMIT 0,1;";

	$result = $con->query($sql);
	$numero = $result->num_rows;

	if ($numero > 0) {
		$rpta = TRUE;
	} else {
		$rpta = FALSE;
	}

	return $rpta;
}

?>