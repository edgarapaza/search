<?php
include "../coreapp/Conection.php";
include "header.php";

$conection = new Conection();
$mysqli    = $conection->Conectar();

//Obtener el Numero de Escritura
$codigo_escritura = $_REQUEST['codigo_escritura'];

/*Si es distinto de 0 es que Se realizó con un Proyecto, en caso contrario es de la forma anterior de ingreso*/

$consult2 = "SELECT cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol, cod_usu, cod_sct FROM escrituras WHERE cod_sct = ".$codigo_escritura;

$result2 = $mysqli->query($consult2);
$dato2   = $result2->fetch_array();
$ver     = array("Notario" => $dato2[0], "Escritura" => $dato2[1], "Distrito" => $dato2[2], "Fecha" => $dato2[3], "SubSerie" => $dato2[4], "NBien" => $dato2[5], "NumFolios" => $dato2[6], "Protocolo" => $dato2[7], "Obs" => $dato2[8], "Folio" => $dato2[9], "Usuario" => $dato2[10]);

$sql_notario  = "SELECT Nom_not,Pat_not,Mat_not, Lugar FROM notarios2 WHERE cod_not =".$ver['Notario'];
$sql_subserie = "SELECT des_sub FROM subseries WHERE cod_sub = ".$ver['SubSerie'];
//$sql_personal = "SELECT CONCAT (nom_usu,' ',pat_usu,' ',mat_usu) AS trabajador FROM usuarios WHERE cod_usu = (SELECT cod_usu FROM escrituras WHERE cod_usu = ".$ver['Usuario']." limit 0,1);";

$query_notario = $mysqli->query($sql_notario);
$query_sserie  = $mysqli->query($sql_subserie);
//$query_personal = $mysqli->query($sql_personal);

$exe_notario = $query_notario->fetch_array();
$exe_sserie  = $query_sserie->fetch_array();
//$exe_personal = $query_personal->fetch_array();
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Listado de Personas</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">

        <?php
        echo "<table class='table table-striped'>
          <thead>
            <tr>
              <th>CONCEPTO</th>
              <th>DETALLE</th>

            </tr>
          </thead>
          <tbody>
          <tr>
            <td>Nombre del Notario</td>
            <td>";echo $exe_notario['Nom_not']."   ".$exe_notario['Pat_not']."  ".$exe_notario['Mat_not'];echo "</td>
          </tr>
          <tr>
            <td>Lugar</td>
            <td>";echo $exe_notario['Lugar'];echo "</td>
          </tr>
          <tr>
            <td>Sub Serie</td>
            <td>";echo $exe_sserie['des_sub'];echo "</td>
          </tr>
          <tr>
            <td>Fecha del Documento</td>
            <td>";echo $ver['Fecha'];echo "</td>
          </tr>
          <tr>
            <td>Nombre del Bien</td>
            <td>";echo $ver['NBien'];echo "</td>
          </tr>
          <tr>
            <td>Protocolo</td>
            <td class='warning'><h4>";echo $ver['Protocolo'];echo "</h4></td>
          </tr>
          <tr>
          <tr>
            <td>Numero de la Escritura</td>
            <td>";echo $ver['Escritura'];echo "</td>
          </tr>
          <tr>
            <td>Folio del Documento</td>
            <td>";echo $ver['Folio'];echo "</td>
          </tr>
          <tr>
            <td>Cantidad de Folio</td>
            <td>";echo $ver['NumFolios'];echo "</td>
          </tr>
          <tr>
            <td>Observaciones</td>
            <td>";echo $ver['Obs'];echo "</td>
          </tr>
          <tr>
            <td>Trabajador</td>
            <td>";echo $exe_personal['trabajador'];echo "</td>
          </tr>
          </tbody>
        </table>";

        /*****************************************************************************
        LISTADO DE OTORGANTES NOTARALES Y JURIDICOS
         ******************************************************************************
         *****************************************************************************/
        /*****************************************************************************/
        ?>
        <a href='#' class='btn btn-success'>Encontrado / Nueva Busqueda</a>
        <a href='#' class='btn btn-danger'>No es / Nueva Busqueda</a>
    </div>

    <div class="col-md-4">

        <?php
        include "../controller/checkListado.php";
        $lista = NombresOtorgantes($codigo_escritura);

        echo "<h2>Otorgantes</h2>";
        for ($i = 0; $i <= count($lista)-1; $i++) {
        	echo "<div class='alert alert-dismissable alert-success'>
                      <strong>".$lista[$i]['persona']."</div>";
        }

        echo "<br>Personas Juridicas<br>";
        for ($i = 0; $i <= count($lista)-1; $i++) {
        	echo "<div class='alert alert-dismissable alert-success'>
                      <strong>".$lista[$i]['Raz_inv']."</div>";

        }

        /****************************************************************************
         *****************************************************************************
        LISTADO DE FAVORECIDOS JURIDICOS
         ******************************************************************************
         *****************************************************************************/
        $listaf = NombresFavorecidos($codigo_escritura);

        echo "<h2>Favorecidos</h2>";
        for ($i = 0; $i <= count($listaf)-1; $i++) {
        	echo "<div class='alert alert-dismissable alert-success'>
                      <strong>".$listaf[$i]['persona']."</div>";
        }

        echo "<br>Personas Juridicas<br>";
        for ($i = 0; $i <= count($listaf)-1; $i++) {
        	echo "<div class='alert alert-dismissable alert-success'>
                      <strong>".$listaf[$i]['Raz_inv']."</div>";

        }

        ?>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>