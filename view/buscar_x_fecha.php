<?php
require_once "header.php";
require_once "../coreapp/conection.php";

$dia=$_REQUEST['dia'];
$mes=$_REQUEST['mes'];
$year=$_REQUEST['year'];

if($dia <> "" and $mes <> "" and $year <> "" ){
    $fecha=$year."-".$mes."-".$dia;
    $sql = "SELECT cod_sct, cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol, proy_id FROM dbarp.escrituras1 WHERE fec_doc ='$fecha'";

    $result=$mysqli->query($sql);

    echo "Datos encontrados All fechas: ".$result->num_rows;;
}

if($dia == "" and $mes == 0){
        $fecha=$year."-"."%"."-"."%";
        $sql = "SELECT cod_sct, cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol, proy_id FROM dbarp.escrituras1 WHERE fec_doc LIKE '$fecha'";

        $result=$mysqli->query($sql);
        echo "Datos encontrados  solo Año: ".$result->num_rows;;
}

if($dia == ""){
        $fecha=$year."-".$mes."-"."%";
        $sql = "SELECT cod_sct, cod_not, num_sct, cod_dst, fec_doc, cod_sub, nom_bie, can_fol, cod_pro, obs_sct, num_fol, proy_id FROM dbarp.escrituras1 WHERE fec_doc LIKE '$fecha'";

      $result=$mysqli->query($sql);
      echo "\tDatos encontrados Mes y año: ".$result->num_rows;;

}
?>

<form id="form1" name="form1" method="post">
  <table>
  	<thead>
      <tr>
        <th width="33">Dia</th>
        <th width="79">Mes</th>
        <th width="38">A&ntilde;o</th>
        <th width="705"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input name="dia" type="text" id="dia" size="2" maxlength="2" /></td>
        <td><select name="mes" id="mes">
          <option value="0">--</option>
          <option value="01">Ene</option>
          <option value="02">Feb</option>
          <option value="03">Mar</option>
          <option value="04">Abr</option>
          <option value="05">May</option>
          <option value="06">Jun</option>
          <option value="07">Jul</option>
          <option value="08">Ago</option>
          <option value="09">Set</option>
          <option value="10">Oct</option>
          <option value="11">Nov</option>
          <option value="12">Dic</option>
        </select></td>
        <td><input name="year" type="text" id="year" size="4" maxlength="4" required /></td>
        <td><input name="buscar" type="submit" id="buscar" value="Buscar" /></td>
      </tr>
    </tbody>
  </table>
</form>


    <table class="table table-striped table-hover">
      <tr>
        <td width="35">Num</td>
        <td width="75">Notario</td>
        <td width="123">Protocolo</td>
        <td width="139">Fecha </td>
        <td width="164">Sub Serie</td>
        <td width="360">Nombre Predio </td>
        <td width="324">Otorgante</td>
        <td width="362">Favorecido</td>
        <td width="65">&nbsp;</td>
      </tr>
      <?php
        $i=1;
        while($fila=$result->fetch_assoc()){
      ?>
      <tr>
          <td><?php echo $i;?></td>
          <td><?php
              $sql  = "SELECT CONCAT(nom_not, ' ',pat_not,' ',mat_not) as notario FROM notarios WHERE cod_not =".$fila["cod_not"];
              $notario= $mysqli->query($sql);
              $not  = $notario->fetch_assoc();
              echo $not["notario"];
          ?></td>
          <td><?php echo $fila["cod_pro"];?></td>
          <td><?php echo $fila["fec_doc"];?></td>
          <td>
          <?php
            $sub  = $fila["cod_sub"];
            $sql  = "SELECT des_sub FROM subseries WHERE cod_sub = '$sub'";
            $subserie = $mysqli->query($sql);
            $rpta  = $subserie->fetch_assoc();
            echo $rpta["des_sub"];
          ?>
          </td>
          <td><?php echo $fila["nom_bie"];?></td>
          <td>
          <?php
            $sql   = "SELECT cod_sct,cod_inv,cod_inv_ju FROM escriotor1 WHERE cod_sct = ".$fila["cod_sct"];;
            $invol = $mysqli->query($sql);
            $row1  = $invol->fetch_assoc();

            $q_oto  = "SELECT a.Cod_inv, CONCAT(a.Nom_inv,' ',a.Pat_inv,' ',a.Mat_inv) as nombre,b.Cod_inv, b.Raz_inv FROM involucrados1 as a, involjuridicas1 as b WHERE a.cod_inv = ".$row1["cod_inv"];

            $query1 = $mysqli->query($q_oto);
            $nombre = $query1->fetch_assoc();
            echo $nombre["nombre"];

            if($row1["cod_inv_ju"] <> 0){
              $sql = "SELECT Cod_inv, Raz_inv FROM involjuridicas1 WHERE Cod_inv =".$row1["cod_inv_ju"];
              $row2  = $mysqli->query($sql);
              $razonsocial   = $row2->fetch_assoc();
              echo $razonsocial["Raz_inv"];
            }
          ?>
          </td>
          <td>
          <?php
            $sql   = "SELECT cod_sct,cod_inv,cod_inv_ju FROM escrifavor1 WHERE cod_sct = ".$fila["cod_sct"];;
            $invol = $mysqli->query($sql);
            $row1  = $invol->fetch_assoc();

            $q_oto  = "SELECT a.Cod_inv, CONCAT(a.Nom_inv,' ',a.Pat_inv,' ',a.Mat_inv) as nombre,b.Cod_inv, b.Raz_inv FROM involucrados1 as a, involjuridicas1 as b WHERE a.cod_inv = ".$row1["cod_inv"];

            $query1 = $mysqli->query($q_oto);
            $nombre = $query1->fetch_assoc();
            echo $nombre["nombre"];

            if($row1["cod_inv_ju"] <> 0){
              $sql = "SELECT Cod_inv, Raz_inv FROM involjuridicas1 WHERE Cod_inv =".$row1["cod_inv_ju"];
              $row2  = $mysqli->query($sql);
              $razonsocial   = $row2->fetch_assoc();
              echo $razonsocial["Raz_inv"];
            }
          ?>
          </td>
      <td><a href="./buscarSct_x_Fecha.php?cod_otor=<?php echo $var1;?>&cod_favor=<?php echo $var3;?>&cod_otor_ju=<?php echo $var2;?>&cod_favor_ju=<?php echo $var4;?>&cod_sct=<?php echo $Escritura;?>">Detalles</a></td>
    </tr>
      <?php
        $i=$i+1;
      }
      ?>
    </table>
  </body>
</html>