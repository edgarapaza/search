<?php
include "../model/usuarios.php";

$user = $_POST['usuario'];
$pas = $_POST['Password'];

$rpta = verificar($user, $pas);

if($rpta == 1)
{
	header("Location: ../inicio.php");
}else
{
	header("Location: ../index.html?error=error");
}

?>