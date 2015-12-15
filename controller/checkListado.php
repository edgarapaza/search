<?php

$codigo = $_REQUEST["codigo_escritura"];
$lista  = array();

function NombresOtorgantes($codigo) {
	require_once '../model/Listado.php';
	$listado = new Listado();
	$lista   = $listado->EscriturasOtorgantes($codigo);

	return $lista;
}

function NombresFavorecidos($codigo) {
	require_once '../model/ListadoFav.php';
	$listado = new ListadoFav();
	$listaf  = $listado->EscriturasFavorecidos($codigo);

	return $listaf;
}
?>