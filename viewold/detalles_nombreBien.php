<?php
    require "header.php";
    require_once '../coreapp/conection.php';

    $cod_escritura = $_REQUEST['cod_escritura'];


    $sql1_pj = "SELECT cod_sct, cod_inv, cod_inv_ju FROM escriotor1 WHERE cod_sct =".$cod_escritura;
    $result1 = $mysqli->query($sql1_pj);

    $sql2_pj = "SELECT cod_sct, cod_inv, cod_inv_ju FROM escrifavor1 WHERE cod_sct = ".$cod_escritura;
    $result2 = $mysqli->query($sql2_pj);

    /***********************************************************************************************************
    *
    *                      ZONA DE OTORGANTES
     ***********************************************************************************************************/

?>

        <h2 class="sub-header">Zona Otorgantes</h2>
        <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Sub Serie</th>
                            <th>Num Escritura</th>
                            <th>Fecha Documento</th>
                            <th>Proyecto</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>


    <?php
    /**
     * Obtener todos los datos de las esrituras a mostrar
     */

        $i=1;
        while($fila1 =$result1->fetch_assoc())
        {
            $sqlEscritura1 = "SELECT num_sct, fec_doc, cod_sub, proy_id FROM escrituras1 WHERE cod_sct = ".$cod_escritura;
            $query1 = $mysqli->query($sqlEscritura1);
            $row1 = $query1->fetch_assoc();
        ?>
        <tbody>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php
                    $sqlSerie = "SELECT des_sub FROM subseries WHERE cod_sub =".$row1["cod_sub"];
                    $resultSerie = $mysqli->query($sqlSerie);
                    $subserie1 = $resultSerie->fetch_assoc();
                    printf("%s",$subserie1["des_sub"]);
                    ?></td>
                <td><?php printf("%s",$row1["num_sct"]);?></td>
                <td><?php printf("%s",$row1["fec_doc"]);?></td>
                <td><?php printf("%s",$row1["proy_id"]);?></td>
                <td><a href="lista_detallada_juridica.php?codigo_escritura=<?php printf("%s",$cod_escritura);?>&proyecto=<?php printf("%s",$row1["proy_id"]);?>">Mostrar Informacion</a></td>

            </tr>
        </tbody>
        <?php

         $i++;
        }

        /*************************************************************************************************
        *                                           FIN DE LA BUSQUEDA DE OTORGANTES
        *
        *
        *
        *                                   INICIO DE ZONA DE FAVORECIDOS
         *
         *****************************************************************************************************/

        ?>
        </table>
    </div>

        <h2 class="sub-header">Zona Favorecidos</h2>
        <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Sub Serie</th>
                            <th>Num Escritura</th>
                            <th>Fecha Documento</th>
                            <th>Proyecto</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

        <?php
        while($fila2 =$result2->fetch_assoc())
        {
            $i=1;
            $sqlEscritura2 = "SELECT num_sct, fec_doc, cod_sub, proy_id FROM escrituras1 WHERE cod_sct = ".$cod_escritura;
            $query2 = $mysqli->query($sqlEscritura2);
            $row2 = $query2->fetch_assoc();
        ?>
        <tbody>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php
                    $sqlSerie = "SELECT des_sub FROM subseries WHERE cod_sub =".$row2["cod_sub"];
                    $resultSerie = $mysqli->query($sqlSerie);
                    $subserie2 = $resultSerie->fetch_assoc();
                    printf("%s",$subserie2["des_sub"]);
                ?></td>
                <td><?php printf("%s",$row2["num_sct"]);?></td>
                <td><?php printf("%s",$row2["fec_doc"]);?></td>
                <td><?php printf("%s",$row2["proy_id"]);?></td>
                <td><a href="lista_detallada_juridica.php?codigo_escritura=<?php printf("%s",$cod_escritura);?>&proyecto=<?php printf("%s",$row2["proy_id"]);?>">Mostrar Informacion</a></td>
            </tr>
                 <?php printf("%s",$row2["proy_id"]);?>
        </tbody>
        <?php
            $i++;
        }?>
        </table>
    </div>
