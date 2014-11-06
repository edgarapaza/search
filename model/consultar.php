<?php
include '../coreapp/conection.php';

error_reporting(E_ALL);

function enviar($codigo){
	include "../coreapp/conection.php";	
	$resultado = $mysqli->query("SELECT cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol, cod_usu, cod_sct FROM escrituras1 WHERE cod_sct = $codigo");
	$fila = $resultado->fetch_assoc();
	return $fila;
}
?>