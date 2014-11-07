<?php
    require "header.php";
    require_once '../coreapp/conection.php';

    $cod_otor_ju = $_REQUEST['cod_otor_ju'];
    echo "Codigo".$cod_otor_ju;

    $query = "SELECT cod_sct FROM escriotor1 WHERE cod_inv_ju =".$cod_otor_ju;
    $result1 = $mysqli->query($query1);
    $num = $result->num_rows;


    $query1 = "SELECT cod_sct FROM escrifavor1 WHERE cod_inv_ju = ".$cod_otor_ju;
    $result1 = $mysqli->query($query1);
    $num3 = $result1->num_rows;

?>

<h3>Zona Otorgantes</h3>
<?php echo "\nNumero de Escrituras como Otorgante: ".$num."\n";?>
<h3>Zona Favorecidos</h3>
<?php echo "\nNumero de Escrituras como Favorecidos: ".$num3."\n";?>

  </body>
</html>