<?php

class Conection {

	public function Conectar() {
		require_once ("config.php");
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$mysqli->set_charset("utf8");
		if ($mysqli->connect_errno) {
			echo "Error al contenctar a MySQL: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
			exit();
		}

		//echo $mysqli->host_info. " Test eb Conection.php";
		return $mysqli;
	}
}
?>