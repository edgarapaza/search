<?php
include "header.php";
include "../model/consultar.php";

$valor = enviar(8389);
//print_r($valor);
?>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Codigo Notario</th>
      <th>Numero Escritura</th>
    </tr>
  </thead>
  <tbody>
    <tr class="danger">
      <td>Codigo del Notario</td>
      <td><?php echo $valor["cod_not"];?></td>
    </tr>
    <tr>
      <td>Numero de Escritura</td>
      <td><?php echo $valor["num_sct"];?></td>
    </tr>
    <tr class="danger">
      <td>Fecha del documento</td>
      <td><?php echo $valor["fec_doc"];?></td>
    </tr>
    <tr>
      <td>Codigo de la sub Serie</td>
      <td><?php echo $valor["cod_sub"];?></td>
    </tr>
    <tr class="danger">
      <td>Fecha del documento</td>
      <td><?php echo $valor["fec_doc"];?></td>
    </tr>
    <tr>
      <td>Nombre del Bien</td>
      <td><?php echo $valor["nom_bie"];?></td>
    </tr>
    <tr class="danger">
      <td>Cantidad de folios</td>
      <td><?php echo $valor["can_fol"];?></td>
    </tr>
    <tr>
      <td>Codigo del Protocolo</td>
      <td><?php echo $valor["cod_pro"];?></td>
    </tr>
    <tr class="danger">
      <td>Observaciones</td>
      <td><?php echo $valor["obs_sct"];?></td>
    </tr>
    <tr>
      <td>Numero de Foliios</td>
      <td><?php echo $valor["num_fol"];?></td>
    </tr>
    <tr class="danger">
      <td>Codigo del Usuario</td>
      <td><?php echo $valor["cod_usu"];?></td>
    </tr>
    <tr>
      <td>Codigo de la Escritura</td>
      <td><?php echo $valor["cod_sct"];?></td>
    </tr>
  </tbody>
</table> 
<?php include"footer.php";?>