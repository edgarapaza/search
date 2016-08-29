<?php
include "../coreapp/conection.php";
include "header.php";

//Obtener el Numero de Escritura
$codigo_escritura = $_REQUEST['codigo_escritura'];
$proyecto = $_REQUEST['proyecto'];

/*Si es distinto de 0 es que Se realizó con un Proyecto, en caso contrario es de la forma anterior de ingreso*/
if($proyecto > 0){
  /*
    Consultas en general para obtener los datos en base a las tablas relacionadas
  */
  $detalle_con_proyecto = "SELECT cod_not,cod_sub,cod_usu,proy_id,num_sct,fec_doc,nom_bie,can_fol,cod_pro,obs_sct,num_fol,hra_ing FROM escrituras1 WHERE cod_sct = $codigo_escritura;";
  $queryDetalle    = $mysqli->query($detalle_con_proyecto);
  $exeDetalle    = $queryDetalle->fetch_array();

  $proyecto   = "SELECT not_id, num_protocolo, cod_usu FROM proyectos WHERE proy_id = $exeDetalle[3];";
  $notario    = "SELECT concat(nom_not,' ',pat_not,' ',mat_not) AS notario, provincia FROM notarios WHERE cod_not = (SELECT not_id FROM proyectos WHERE proy_id = $exeDetalle[3]);";
  $trabajador = "SELECT concat(nom_usu,' ',pat_usu,' ',mat_usu) AS trabajador FROM usuarios WHERE cod_usu = (SELECT cod_usu FROM escrituras1 WHERE cod_usu = $exeDetalle[2] limit 0,1);";
  $subserie   = "SELECT des_sub FROM subseries WHERE cod_sub = (SELECT cod_sub FROM escrituras WHERE cod_sub = $exeDetalle[1] limit 0,1);";


  $queryProyecto   = $mysqli->query($proyecto);
  $queryNotario    = $mysqli->query($notario);
  $queryTrabajador = $mysqli->query($trabajador);
  $querySubserie   = $mysqli->query($subserie);


  $exeProyecto    = $queryProyecto->fetch_array();
  $exeNotario    = $queryNotario->fetch_array();
  $exeTrabajador = $queryTrabajador->fetch_array();
  $exeSubSerie   = $querySubserie->fetch_array();
  /*  FIN DE LAS CONSULTAS*/

  /* MOSTRAR LOS RESULTADOS DE LAS CONSULTAS

  echo "-------------------------Proyecto con PROYECTO-----------------------------------------------<br/>";
  echo "Notario:".$exeNotario["notario"]."<br>";
  echo "Escritura:".$exeDetalle["num_sct"]."<br>";
  echo "Distrito:".$exeNotario["provincia"]."<br>";
  echo "Fecha:".$exeDetalle["fec_doc"]."<br>";
  echo "Sub Serie:".$exeSubSerie["des_sub"]."<br>";
  echo "NOmbre Bien:".$exeDetalle["nom_bie"]."<br>";
  echo "Protocolo:".$exeDetalle["cod_pro"]."<br>";
  echo "Folio:".$exeDetalle["num_fol"]."<br>";
  echo "Numero Folios:".$exeDetalle["can_fol"]."<br>";
  echo "Observaciones:".$exeDetalle["obs_sct"]."<br>";
  echo "usuario:".$exeTrabajador["trabajador"]."<br>";
  echo "Proyecto:".$exeDetalle["proy_id"]."<br>"; */

  echo "<table class='table table-striped table-hover '>
  <thead>
    <tr>
      <th>CONCEPTO</th>
      <th>DETALLE</th>
      <th><a href='#' class='btn btn-success'>Encontrado / Nueva Busqueda</a></th>
      <th><a href='#' class='btn btn-danger'>No es / Nueva Busqueda</a><br>
      <a href='#'>Datos Erroneos</a>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Nombre del Notario</td>
      <td>";echo $exeNotario["notario"];echo "</td>
    </tr>
    <tr>
      <td>Provincia</td>
      <td>";echo $exeNotario["provincia"]; echo "</td>
    </tr>
    <tr>
      <td>Nombre sub Serie</td>
      <td>";echo $exeSubSerie["des_sub"];echo "</td>

    </tr>
    <tr>
      <td>Fecha</td>
      <td>";echo $exeDetalle["fec_doc"];echo "</td>
    </tr>
    <tr>
      <td>Numero de Escritura</td>
      <td>";echo $exeDetalle["num_sct"];echo "</td>
    </tr>
    <tr>
      <td>Nombre del Bien</td>
      <td>";echo $exeDetalle["nom_bie"];echo "</td>
    </tr>
    <tr>
      <td>Protocolo</td>
      <td class='navbar-default navbar-brand'>";echo $exeProyecto["num_protocolo"];echo "</td>
    </tr>
    <tr>
      <td>Folio</td>
      <td>";echo $exeDetalle["num_fol"];echo "</td>
    </tr>
    <tr>
      <td>Cantidad de Folios</td>
      <td>";echo $exeDetalle["can_fol"];echo "</td>
    </tr>
    <tr>
      <td>Observaciones</td>
      <td>";echo $exeDetalle["obs_sct"];echo "</td>
    </tr>
    <tr>
      <td>Codigo del Proyecto</td>
      <td>";echo $exeDetalle["proy_id"];echo "</td>
    </tr>
    <tr>
      <td>Nombrel Trabajador</td>
      <td>";echo $exeTrabajador["trabajador"];echo "</td>
    </tr>
    </tbody>
  </table>";


  echo "<br>";
  echo "<section id='sectionOtorgantes'>";
      echo "Lista de Otorgantes";
          $sql_codOtorgantes = "SELECT cod_inv FROM escriotor1 WHERE cod_sct = $codigo_escritura;";
          $result_codOtorgantes   = $mysqli->query($sql_codOtorgantes);

          while($lista_Otorgantes = $result_codOtorgantes->fetch_array()){
            //echo "<br>".$lista_Otorgantes[0];
            $sql_persona = "SELECT CONCAT(nom_inv,' ',pat_inv,' ',mat_inv) AS persona, otros FROM involucrados1 WHERE cod_inv = $lista_Otorgantes[0];";
            $result_persona = $mysqli->query($sql_persona);
            $persona        = $result_persona->fetch_array();
            echo "<div class='alert alert-dismissable alert-info'>
          <strong>".$persona[0]."</div>";
          }
    echo "</section>";

    echo "<br><br>";

    echo "<section id='sectionFavorecidos'>";
        echo "Lista de favorecidos";
        $sql_codFavorecidos = "SELECT cod_inv FROM escrifavor1 WHERE cod_sct = $codigo_escritura;";
        $result_codFavorecidos   = $mysqli->query($sql_codFavorecidos);
        while($lista_Favorecidos    = $result_codFavorecidos->fetch_array()){
          //echo "<br>".$lista_Favorecidos[0];
          $sql_persona = "SELECT CONCAT(nom_inv,' ',pat_inv,' ',mat_inv) AS persona, otros FROM involucrados1 WHERE cod_inv = $lista_Favorecidos[0];";
          $result_persona   = $mysqli->query($sql_persona);
          $persona = $result_persona->fetch_array();
          echo "<div class='alert alert-dismissable alert-info'>
          <strong>".$persona[0]."</div>";
        }
    echo "</section>";
}

/*************************************************************************************
**************************************************************************************
              ZONA PARA LISTADO DE ESCRITURAS SIN PROYECTO
**************************************************************************************
**************************************************************************************/

else
{
  $consult2 = "SELECT cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol, cod_usu, cod_sct FROM escrituras1 WHERE cod_sct = $codigo_escritura;";
  //echo "-------------------------Proyecto SIN PROYECTO-----------------------------------------------<br/>";

  $result2 = $mysqli->query($consult2);
  $dato2 = $result2->fetch_array();
  $ver=array("Notario"=>$dato2[0],"Escritura"=>$dato2[1],"Distrito"=>$dato2[2],"Fecha"=>$dato2[3],"SubSerie"=>$dato2[4],"NBien"=>$dato2[5],"NumFolios"=>$dato2[6],"Protocolo"=>$dato2[7],"Obs"=>$dato2[8],"Folio"=>$dato2[9],"Usuario"=>$dato2[10]);

  $sql_notario  = "SELECT CONCAT(nom_not,' ',pat_not,' ',mat_not) AS notario, provincia FROM notarios WHERE cod_not =".$ver['Notario'];
  $sql_subserie = "SELECT des_sub FROM subseries WHERE cod_sub = ".$ver['SubSerie'];
  $sql_personal = "SELECT concat(nom_usu,' ',pat_usu,' ',mat_usu) AS trabajador FROM usuarios WHERE cod_usu = (SELECT cod_usu FROM escrituras1 WHERE cod_usu = ".$ver['Usuario']." limit 0,1);";

  $query_notario  = $mysqli->query($sql_notario);
  $query_sserie   = $mysqli->query($sql_subserie);
  $query_personal = $mysqli->query($sql_personal);

  $exe_notario  = $query_notario->fetch_array();
  $exe_sserie   = $query_sserie->fetch_array();
  $exe_personal = $query_personal->fetch_array();

  /*
  echo "Notario:".$ver["Notario"]."<br>";
  echo "Distrito:".$ver['Distrito']."<br>";
  echo "Sub Serie:".$ver['SubSerie']."<br>";
  echo "Fecha:".$ver['Fecha']."<br>";

  echo "Nombre Bien:".$ver['NBien']."<br>";
  echo "Escritura:".$ver['Escritura']."<br>";
  echo "Folio:".$ver['Folio']."<br>";
  echo "Numero Folios:".$ver['NumFolios']."<br>";

  echo "Observaciones:".$ver['Obs']."<br>";
  echo "usuario:".$ver['Usuario']."<br>";*/

  echo "<table class='table table-striped table-hover '>
  <thead>
    <tr>
      <th>CONCEPTO</th>
      <th>DETALLE</th>
      <th><a href='#' class='btn btn-success'>Encontrado / Nueva Busqueda</a></th>
      <th><a href='#' class='btn btn-danger'>No es / Nueva Busqueda</a><br>
      <a href='#'>Datos Erroneos</a>
      </th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <td>Nombre del Notario</td>
    <td>";echo $exe_notario['notario'];echo "</td>
  </tr>
  <tr>
    <td>Lugar</td>
    <td>";echo $exe_notario['provincia'];echo "</td>
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
    <td class='navbar-default navbar-brand'>";echo $ver['Protocolo'];echo "</td>
  </tr>
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

  echo "<section id='sectionOtorgantes'>";
    echo "Lista de Otorgantes";
        $sql_codOtorgantes = "SELECT cod_inv FROM escriotor1 WHERE cod_sct =".$dato2["cod_sct"]."";
        $result_codOtorgantes   = $mysqli->query($sql_codOtorgantes);

        while($lista_Otorgantes = $result_codOtorgantes->fetch_array()){
          //echo "<br>".$lista_Otorgantes[0];
          $sql_persona = "SELECT CONCAT(nom_inv,' ',pat_inv,' ',mat_inv) AS persona, otros FROM involucrados1 WHERE cod_inv = $lista_Otorgantes[0];";
          $result_persona = $mysqli->query($sql_persona);
          $persona        = $result_persona->fetch_array();
          echo "<div class='alert alert-dismissable alert-success'>
          <strong>".$persona[0]."</div>";

        }
    echo "</section>";


    echo "<section id='sectionFavorecidos'>";
        echo "Lista de favorecidos";
        $sql_codFavorecidos = "SELECT cod_inv FROM escrifavor1 WHERE cod_sct =".$dato2["cod_sct"]."";
        $result_codFavorecidos   = $mysqli->query($sql_codFavorecidos);
        while($lista_Favorecidos    = $result_codFavorecidos->fetch_array()){
          //echo "<br>".$lista_Favorecidos[0];
          $sql_persona = "SELECT CONCAT(nom_inv,' ',pat_inv,' ',mat_inv) AS persona, otros FROM involucrados1 WHERE cod_inv = $lista_Favorecidos[0];";
          $result_persona   = $mysqli->query($sql_persona);
          $persona = $result_persona->fetch_array();
          echo "<div class='alert alert-dismissable alert-info'>
          <strong>".$persona[0]."</div>";
        }
    echo "</section>";
}
?>
<?php include "footer.php"; ?>