<?php
    require "header.php";
    require_once '../coreapp/conection.php';

    $cod_juridico = $_REQUEST['cod_otor_ju'];


    $sql1_pj = "SELECT cod_sct, cod_inv, cod_inv_ju FROM escriotor1 WHERE cod_inv_ju =".$cod_juridico;
    $result1 = $mysqli->query($sql1_pj);

    $sql2_pj = "SELECT cod_sct, cod_inv, cod_inv_ju FROM escrifavor1 WHERE cod_inv_ju = ".$cod_juridico;
    $result2 = $mysqli->query($sql2_pj);


    /**
     * Obtener todos los datos de las esrituras a mostrar
     */

        //$i=1;
        while($fila1 =$result1->fetch_assoc())
        {

            printf("Lista de Otorgantes");
            echo "<br>";
            printf ("Codigo de Escritura: %s Codigo Involucrado Juridico (%s)\n", $fila1["cod_sct"], $fila1["cod_inv_ju"]);
            echo "<br>";

        }


        while($fila2 =$result2->fetch_assoc())
        {
            printf("\nLista de Favorecidos \n");
            echo "<br>";
            printf ("Codigo de Escritura: %s Codigo Involucrado Juridico (%s)\n", $fila2["cod_sct"], $fila2["cod_inv_ju"]);
            echo "<br>";

        }

?>