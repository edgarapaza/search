<?php
include "header.php";
include "../coreapp/conection.php";
?>

<script language="javascript" type="text/javascript">
<!--
function ingreso(){
   var opt1 = document.getElementById("opt1").checked;
   var opt2 = document.getElementById("opt2").checked;
   var opt3 = document.getElementById("opt3").checked;

   if (opt1 == true){
      location.href='./buscar_otor.php';
   }
   if (opt2 == true){
      location.href='./buscar_favor.php';
   }
   if (opt3 == true){
      //location.href='./buscar_sct.php';
   }

}
</script>
</head>

  <a href="../Controler/session_close.php">Salir de Busquedas</a>
  <h3>Menu Busqueda</h3>
  <ul>
    <li><a href="SystemOld/index_old.php">Sistema Antiguo</a></li>
    <li><a href="./buscar_otor.php" />Buscar Otorgante</a></li>
    <li><a href="./buscar_otor_juri.php"/>Buscar Otorgante Juridico</a></li>
    <li><a href="./buscar_favor.php"/>Buscar Favorecido</a></li>
    <li><a href="./buscar_favor_juri.php"/>Buscar Favorecido Juridico</a></li>
    <li><a href="./buscar_x_fecha.php"/>Buscar por Fecha</a></li>
    <li><a href="./lista.php"/>Buscar NUEVO LISTADO</a></li>
    <li><a href="#" />Buscar por Nombre del Bien</a></li>
  </ul>
</body>
</html>