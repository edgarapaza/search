<?php

class Listado {

	private $con;

	function __construct() {
		require_once "../coreapp/Conection.php";
		$conection = new Conection();
		$this->con = $conection->Conectar();
	}

	public function EscriturasOtorgantes($codigo) {

		//echo $this->con->host_info." Dentro de Notarios";
		$sql   = "SELECT cod_inv_ju FROM escriotor1 WHERE cod_sct =".$codigo;
		$datos = $this->con->query($sql);
		$fila  = $datos->fetch_assoc();

		if ($fila["cod_inv_ju"] == 0) {
			$dat = self::ListadoOtorgantes($codigo);
		}

		if ($fila["cod_inv_ju"] != 0) {
			$dat = self::ListadoOtorgantesJuridicos($codigo);
		}

		return $dat;
	}

	public function ListadoOtorgantes($codigo) {
		//echo "Natural";
		$lista_nombres = array();

		$sql   = "SELECT cod_inv FROM escriotor1 WHERE cod_sct =  ".$codigo;
		$datos = $this->con->query($sql);

		//echo "Numero de Datos: ".$datos->num_rows."<br>";

		while ($lista = $datos->fetch_assoc()) {
			$lista_nombres[] = self::CambiarNombres($lista["cod_inv"]);
		}

		return $lista_nombres;

	}

	public function ListadoOtorgantesJuridicos($codigo) {
		//echo "Juridicos";
		$lista_nombres = array();
		$sql           = "SELECT cod_inv_ju FROM escriotor1 WHERE cod_sct = ".$codigo;
		$datos         = $this->con->query($sql);

		//echo "Numero de Datos: ".$datos->num_rows."<br>";

		while ($lista = $datos->fetch_assoc()) {
			$lista_nombres[] = self::CambiarNombresJuridicos($lista["cod_inv_ju"]);
		}

		return $lista_nombres;
	}

	public function CambiarNombres($codigo) {

		$sql   = "SELECT CONCAT(nom_inv,' ',pat_inv,' ',mat_inv) AS persona FROM involucrados1 WHERE cod_inv = ".$codigo;
		$datos = $this->con->query($sql);
		$lista = $datos->fetch_assoc();

		return $lista;
	}

	public function CambiarNombresJuridicos($codigo) {

		$sql   = "SELECT Raz_inv FROM involjuridicas1 WHERE Cod_inv = ".$codigo;
		$datos = $this->con->query($sql);
		$lista = $datos->fetch_assoc();

		return $lista;
	}
}
?>