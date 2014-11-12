<?php
  require_once '../coreapp/conection.php';
  include "header.php";
?>

<h2 class="sub-header">Listado por Otorgantes o Favorecidos Jurídicos</h2>
<form id="busqueda" name="busqueda">
  <table>
    <thead>
      <tr>
        <td width="269">Otorgante Juridico</td>
        <td width="492"><input name="otor_juri" type="text" id="otor_juri" size="80" placeholder="Institucion o Razon Social" value="<?php echo @$otor_juri;?>" required /></td>
        <td><input name="btnbuscar" type="submit" value="Buscar" class="btn btn-info" /></td>
      </tr>
    </thead>
  </table>
</form>

<?php
if(isset($_REQUEST["btnbuscar"]))
{
    //inicializo el criterio y recibo cualquier cadena que se desee buscar
            $nexo1           = "%";
            $otor_juri      = trim($_REQUEST['otor_juri']);
            $datos1          = explode(" ",$otor_juri);
            $union1          = implode($nexo1, $datos1);

            $sql             = "SELECT Cod_inv, Raz_inv, otros_juri FROM involjuridicas1 WHERE Raz_inv LIKE '% $union1 %';";
            $res             = $mysqli->query($sql);
            $numeroRegistros = $res->num_rows;
            echo "Numero de Resultados: ".$numeroRegistros;
?>


    <table class='table table-striped table-hover'>
    	<thead>
          <tr>
    	  	  <th>Num</th>
            <th>OTORGANTE JURIDICO </th>
    		    <th>DETALLES edgar</th>
          </tr>
      </thead>
      <tbody>
              <?php
              $i =1;
               while($registro=$res->fetch_assoc())
        		      {
              ?>
    	    <tr>
              <td width="3"><?php echo $i?></td>
              <td><?php echo $registro["Raz_inv"]; ?></td>
              <td><a href="buscar_juridicos_detail.php?cod_otor_ju=<?php echo $registro["Cod_inv"]; ?>">Ver Detalles </a></td>
          </tr>
               <?php
                  $i++;
                  }
               ?>
        </tbody>
    </table>
<?php
   }
?>
</body>
</html>