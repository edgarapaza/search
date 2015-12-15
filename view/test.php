<?php
include "header.php";
include "../coreapp/conection.php";

echo "Lista de Otorgantes";
$sql_codOtorgantes = "SELECT cod_inv FROM escriotor1 WHERE cod_sct = 320884;";
$result_codOtorgantes   = $mysqli->query($sql_codOtorgantes);
while($lista_Otorgantes    = $result_codOtorgantes->fetch_array()){
	echo "<br>".$lista_Otorgantes[0];
	$sql_persona = "SELECT CONCAT(nom_inv,' ',pat_inv,' ',mat_inv) AS persona, otros FROM involucrados1 WHERE cod_inv = $lista_Otorgantes[0];";
	$result_persona   = $mysqli->query($sql_persona);
	$persona = $result_persona->fetch_array();
	echo $persona[0];
}
echo "<br>";
echo "Lista de favorecidos <br>";
$sql_codFavorecidos = "SELECT cod_inv FROM escrifavor1 WHERE cod_sct = 320884;";
$result_codFavorecidos   = $mysqli->query($sql_codFavorecidos);
while($lista_Favorecidos    = $result_codFavorecidos->fetch_array()){
	echo "<br>".$lista_Favorecidos[0];
	$sql_persona = "SELECT CONCAT(nom_inv,' ',pat_inv,' ',mat_inv) AS persona, otros FROM involucrados1 WHERE cod_inv = $lista_Favorecidos[0];";
	$result_persona   = $mysqli->query($sql_persona);
	$persona = $result_persona->fetch_array();
	echo $persona[0];
}
?>