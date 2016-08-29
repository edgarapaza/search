<?php
	session_start();
	include "../model/usuarios.php";

	$user = $_POST['username'];
	$pas  = $_POST['password'];

	$rpta = verificar($user, $pas);

	if ($rpta == 1) {
		header("Location: ../view/inicio.php");
		$_SESSION['busqueda'] = "busca";
	} else {
		header("Location: ../index.html?error=error");
	}

?>