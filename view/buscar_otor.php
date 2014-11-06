<?php
include "header.php";
require_once '../coreapp/conection.php';
include "../model/buscarclass.php";

//echo $mysqli->host_info . "\n buscar.php";

    $busqueda = new Buscar();
    //Consulta de Datos en  la clase buscarclass 
    $nombres = $_REQUEST['nombres'];
    $paterno = $_REQUEST['paterno'];
    $materno = $_REQUEST['materno'];

//inicializo el criterio y recibo cualquier cadena que se desee buscar

    $sql = $busqueda->buscarsql($nombre,$paterno,$materno);    
    $result = $mysqli->query($sql);

    $numeroRegistros = $result->num_rows;

    //$registros nos entrega la cantidad de registros a mostrar.
    $registros = 10;
     
    //$contador como su nombre lo indica el contador.
    $contador = 1;
    /**
    * Se inicia la paginación, si el valor de $pagina es 0 le asigna el valor 1 e $inicio entra con valor 0.
    * si no es la pagina 1 entonces $inicio sera igual al numero de pagina menos 1 multiplicado por la cantidad de registro
    */
    if (!$pagina) 
    {
        $inicio = 0;
        $pagina = 1;
    } 
    else 
    {
        $inicio = ($pagina - 1) * $registros;
    }


    $resultados = $mysqli->query($result);
     
    //Contamos la cantidad de filas entregadas por la consulta, de esta forma sabemos cuantos registros fueron retornados por la consulta.
    $total_registros = $resultados->num_rows;
    //Generamos otra consulta la cual creara en si la paginación, ordenando y creando un límite en las consultas.
    $sql2 = $result." LIMIT $inicio, $registros";
    $resultados = $mysqli->query($sql2);
    //Con ceil redondearemos el resultado total de las paginas 4.53213 = 5
    $total_paginas = ceil($total_registros / $registros);
    // Si tenemos un retorno en la variable $total_registro iniciamos el ciclo para mostrar los datos.
    
?>

<body>
            <div id="datos">
                <form name="otorgantes" method="post" action="">
                    <table width="912">
                        <caption>Buscar por el Otorgante (Vendedor)<input type="button" class="boton" name="regresar" value="Salir" onclick="javascript:location.href='./buscar_index.php'" /></caption>
                        <tr>
                            <th width="190">Nombre o nombres</th>
                            <th colspan="3">Apellido Paterno </th>
                            <th width="198">Apellido Materno</th>
                        </tr>
                        <tr>
                            <td><input name="nombres" type="text" id="nombres" size="30" value="<?php echo $nombres; ?>"/></td>
                            <td colspan="3"><input name="paterno" type="text" id="paterno" size="30" value="<?php echo $paterno; ?>"/></td>
                            <td><input name="materno" type="text" id="materno" size="30" value="<?php echo $materno; ?>"/>
                            <input type="submit" name="Enviar" value="buscar"></td>

                        </tr>
                    </table>
                </form>

                <div id="cuerpo">
                    <table>
                        <caption><?php echo $error_descr; ?></caption>
                        <thead>
                            <tr>
                                <th width="50" scope="col">Num</th>
                                <th width="233" scope="col">Nombres</th>
                                <th width="233" scope="col">Apellido Paterno</th>
                                <th width="233" scope="col">Apellido Materno</th>
                                <th>opciones</th>
                            </tr>
                        </thead>

                        <tbody>
    <?php
        if ($total_registros) {
        while ($registro = $resultados->fetch_assoc())
        {
    ?>
                                <tr onClick="javascript:muestra("<?php echo $registro['Cod_inv']; ?>","<?php echo $registro['Nom_inv'] . " " . $registro['Pat_inv'] . " " . $registro['Mat_inv']; ?>");">
                                    <td width="47"><input type="hidden" name="cod_otor" id="cod_otor" value="<?php echo $registro['Cod_inv']; ?>" /></td>
                                    <td><b><?php echo $registro["Nom_inv"]; ?></b></td>
                                    <td><b><?php echo $registro["Pat_inv"]; ?></b></td>
                                    <td><b><?php echo $registro["Mat_inv"]; ?></b></td>
                                    <td width="182">Ver Datalles</td>
                                </tr>
      
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="5">
        <?php
            $contador++;
                }   
            } 
            else 
            {
                echo "<font color='darkgray'>(sin resultados)</font>";
            }
        mysqli_free_result($resultados);    
        

        if ($total_registros) 
        {
                /**
                * Acá activamos o desactivamos la opción "< Anterior", si estamos en la pagina 1 nos dará como resultado 0 por ende NO
                * activaremos el primer if y pasaremos al else en donde se desactiva la opción anterior. Pero si el resultado es mayor
                * a 0 se activara el href del link para poder retroceder.
                */
                if (($pagina - 1) > 0) {
                   echo "<a href='paginador.php?pagina=".($pagina-1)."'>< Anterior</a>";
                } else {
                    echo "<a href='#'>< Anterior</a>";
                }
                // Generamos el ciclo para mostrar la cantidad de paginas que tenemos.
                    for ($i = 1; $i <= $total_paginas; $i++) 
                    {
                        if ($pagina == $i) {
                        echo "<a href='#'>". $pagina ."</a>";
                        } else {
                            echo "<a href='paginador.php?pagina=$i'>$i</a> ";
                        }   
                    }
                /**
                * Igual que la opción primera de "< Anterior", pero acá para la opción "Siguiente >", si estamos en la ultima pagina no podremos
                * utilizar esta opción.
                */
                    if (($pagina + 1)<=$total_paginas) {
                        echo "<a href='paginador.php?pagina=".($pagina+1)."'>Siguiente ></a>";
                    } else {
                        echo "<a href='#'>Siguiente ></a>";
                    }   
        }
        
        $mysqli->close();
?>

                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </body>
    </html>