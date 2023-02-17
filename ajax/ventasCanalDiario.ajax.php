<?php
error_reporting(0);
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ventasCanal') {
    $semana = strip_tags($_REQUEST['semana']);
    if ($semana == "") {
        $week = date("W");
    } else {
        $week = $semana;
    }
    $arreglo = array();
    for ($i = 1; $i < 7; $i++) {

        $dia = date('d', strtotime(strip_tags($_REQUEST['anio']) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
        array_push($arreglo, $dia);
    }
    $arreglo2 = array();
    for ($i = 1; $i < 7; $i++) {

        $dia2 = date('Y-m-d', strtotime(strip_tags($_REQUEST['anio']) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
        array_push($arreglo2, $dia2);
    }

    include('../clases/detalleVentasDiario.php');
    $database = new detalleVentasDiario();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $canal = strip_tags($_REQUEST['canal']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "año" => $año, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "semana" => $week, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasCanal($tables, $campos, $search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover " id="tableVentasDiario">
                <thead>
                    <tr>
                        <th>CANAL</th>
                        <th>CENTRO DE TRABAJO</th>
                        <?php

                        for ($i = 1; $i < 7; $i++) {
                            echo "<th>" . date('Y-m-d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i)) . "</th>";
                        }
                        ?>

                        <th>TOTAL GENERAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $numDia1 = 0;
                    $numDia2 = 0;
                    $numDia3 = 0;
                    $numDia4 = 0;
                    $numDia5 = 0;
                    $numDia6 = 0;
                    $mesTotales = 0;

                    foreach ($datos as $key => $row) {

                        $numDia1 +=  $row[(int)$arreglo[0]];
                        $numDia2 +=  $row[(int)$arreglo[1]];
                        $numDia3 +=  $row[(int)$arreglo[2]];
                        $numDia4 +=  $row[(int)$arreglo[3]];
                        $numDia5 +=  $row[(int)$arreglo[4]];
                        $numDia6 +=  $row[(int)$arreglo[5]];
                        $mesTotales += $row['Totales'];


                    ?>
                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td><?= $row['centroTrabajo']; ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','<?= $arreglo2[0]; ?>','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[0]], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','<?= $arreglo2[1]; ?>','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[1]], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','<?= $arreglo2[2]; ?>','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[2]], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','<?= $arreglo2[3]; ?>','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[3]], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','<?= $arreglo2[4]; ?>','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[4]], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['canalComercial']; ?>','Canal','<?= $arreglo2[5]; ?>','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[5]], 2) ?></td>
                            <th style="font-weight:bold;text-align:right">$<?= number_format($row['Totales'], 2) ?></th>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','<?= $arreglo2[0]; ?>','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','<?= $arreglo2[1]; ?>','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','<?= $arreglo2[2]; ?>','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','<?= $arreglo2[3]; ?>','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','<?= $arreglo2[4]; ?>','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Canal','<?= $arreglo2[5]; ?>','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotales, 2) ?></th>
                    </tr>
                </tfoot>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasCanal($vista);

            ?>
        </div>
    <?php
    }
}
/**
 * NUEVOS MODULOS DE INTEGRACION
 * 
 * DIARIO DE VENTAS
 */
if ($action == 'ventasDiarioVentas') {



    include('../clases/detalleVentasDiario.php');
    $database = new detalleVentasDiario();
    //Recibir variables enviadas
    $mes = strip_tags($_REQUEST['mes']);
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $canal = strip_tags($_REQUEST['canal']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "año" => $año, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "mes" => $mes, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDiarioVentas($tables, $campos, $search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover " id="tableVentasDiario">
                <thead>
                    <tr>
                        <th>CANAL</th>
                        <th>CENTRO DE TRABAJO</th>
                        <th>LUNES</th>
                        <th>MARTES</th>
                        <th>MIERCOLES</th>
                        <th>JUEVES</th>
                        <th>VIERNES</th>
                        <th>SABADO</th>
                        <th>DOMINGO</th>
                        <th>TOTAL GENERAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $numDia1 = 0;
                    $numDia2 = 0;
                    $numDia3 = 0;
                    $numDia4 = 0;
                    $numDia5 = 0;
                    $numDia6 = 0;
                    $mesTotales = 0;

                    foreach ($datos as $key => $row) {

                        $numDia1 +=  $row["LUNES"];
                        $numDia2 +=  $row["MARTES"];
                        $numDia3 +=  $row["MIERCOLES"];
                        $numDia4 +=  $row["JUEVES"];
                        $numDia5 +=  $row["VIERNES"];
                        $numDia6 +=  $row["SABADO"];
                        $numDia7 +=  $row["DOMINGO"];
                        $mesTotales += $row['Totales'];


                    ?>
                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td><?= $row['centroTrabajo']; ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['centroTrabajo']; ?>','DiarioVentas','LUNES','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row["LUNES"], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['centroTrabajo']; ?>','DiarioVentas','MARTES','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row["MARTES"], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['centroTrabajo']; ?>','DiarioVentas','MIERCOLES','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row["MIERCOLES"], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['centroTrabajo']; ?>','DiarioVentas','JUEVES','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row["JUEVES"], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['centroTrabajo']; ?>','DiarioVentas','VIERNES','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row["VIERNES"], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['centroTrabajo']; ?>','DiarioVentas','SABADO','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row["SABADO"], 2) ?></td>
                            <td onclick="redireccionAccionVentas('<?= $row['centroTrabajo']; ?>','DiarioVentas','DOMINGO','<?= $_REQUEST['anio'] ?>','0','')" style='font-weight:bold;text-align:right'>$ <?= number_format($row["DOMINGO"], 2) ?></td>
                            <th style="font-weight:bold;text-align:right">$<?= number_format($row['Totales'], 2) ?></th>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','DiarioVentas','LUNES','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','DiarioVentas','MARTES','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','DiarioVentas','MIERCOLES','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','DiarioVentas','JUEVES','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','DiarioVentas','VIERNES','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','DiarioVentas','SABADO','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','DiarioVentas','DOMINGO','<?= $_REQUEST['anio'] ?>','0','')">$<?= number_format($numDia7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotales, 2) ?></th>
                    </tr>
                </tfoot>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasCanal($vista);

            ?>
        </div>
<?php
    }
}

?>