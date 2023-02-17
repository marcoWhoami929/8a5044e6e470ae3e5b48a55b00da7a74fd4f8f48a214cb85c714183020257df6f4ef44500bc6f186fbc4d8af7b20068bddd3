<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ventasAgente') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
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
    $search = array("query" => $query, "año" => $año, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasAgente($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th>AGENTE</th>
                        <th>ENERO</th>
                        <th>FEBRERO</th>
                        <th>MARZO</th>
                        <th>ABRIL</th>
                        <th>MAYO</th>
                        <th>JUNIO</th>
                        <th>JULIO</th>
                        <th>AGOSTO</th>
                        <th>SEPTIEMBRE</th>
                        <th>OCTUBRE</th>
                        <th>NOVIEMBRE</th>
                        <th>DICIEMBRE</th>
                        <th>TOTALES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $mes1 = 0;
                    $mes2 = 0;
                    $mes3 = 0;
                    $mes4 = 0;
                    $mes5 = 0;
                    $mes6 = 0;
                    $mes7 = 0;
                    $mes8 = 0;
                    $mes9 = 0;
                    $mes10 = 0;
                    $mes11 = 0;
                    $mes12 = 0;
                    $mesTotales = 0;

                    foreach ($datos as $key => $row) {
                        $mes1 += $row['1'];
                        $mes2 += $row['2'];
                        $mes3 += $row['3'];
                        $mes4 += $row['4'];
                        $mes5 += $row['5'];
                        $mes6 += $row['6'];
                        $mes7 += $row['7'];
                        $mes8 += $row['8'];
                        $mes9 += $row['9'];
                        $mes10 += $row['10'];
                        $mes11 += $row['11'];
                        $mes12 += $row['12'];
                        $mesTotales += $row['Totales'];
                    ?>
                        <tr>
                            <th><?= $row['Agente']; ?></th>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','1','')">$<?= number_format($row['1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','2','')">$<?= number_format($row['2'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','3','')">$<?= number_format($row['3'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','4','')">$<?= number_format($row['4'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','5','')">$<?= number_format($row['5'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','6','')">$<?= number_format($row['6'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','7','')">$<?= number_format($row['7'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','8','')">$<?= number_format($row['8'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','9','')">$<?= number_format($row['9'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','10','')">$<?= number_format($row['10'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','11','')">$<?= number_format($row['11'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('<?= $row['Agente']; ?>','Agentes','','<?= $_REQUEST['anio'] ?>','12','')">$<?= number_format($row['12'], 2) ?></td>
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
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','1','')">$<?= number_format($mes1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','2','')">$<?= number_format($mes2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','3','')">$<?= number_format($mes3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','4','')">$<?= number_format($mes4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','5','')">$<?= number_format($mes5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','6','')">$<?= number_format($mes6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','7','')">$<?= number_format($mes7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','8','')">$<?= number_format($mes8, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','9','')">$<?= number_format($mes9, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','10','')">$<?= number_format($mes10, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','11','')">$<?= number_format($mes11, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Agentes','','<?= $_REQUEST['anio'] ?>','12','')">$<?= number_format($mes12, 2) ?></th>
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
            echo $pagination->paginateVentasAgente($vista);

            ?>
        </div>
    <?php
    }
}
/**
 * OBJETIVOS DE VENTA
 */
if ($action == 'objetivosVentas') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $mes = strip_tags($_REQUEST["mes"]);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);



    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("año" => $año, "mes" => $mes, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getObjetivosVenta($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th style="background:#33FF96"></th>
                        <th style="background:#33FF96"><?php echo strip_tags(strtoupper($_REQUEST["mesElegido"])) ?></th>
                        <th style="background:#33FF96"></th>
                        <th style="background:#33FF96;width:200px"></th>
                        <th style="background:#FF7D33"></th>
                        <th style="background:#FF7D33">ACUMULADOS</th>
                        <th style="background:#FF7D33"></th>

                        <th style="background:#FF7D33"></th>
                    </tr>
                    <tr>
                        <th style="width:200px">Agente</th>
                        <th>Canal</th>
                        <th>Venta</th>
                        <th>Objetivo</th>
                        <th>Por Vender</th>
                        <th style="width:200px">Pronóstico</th>
                        <th>Ventas</th>
                        <th>Objetivos</th>
                        <th>Por Vender</th>
                        <th>Pronóstico</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $mesTotal = 0;
                    $mesTotales = 0;
                    $objetivoTotal = 0;
                    $objetivosTotal = 0;
                    $faltanteTotal = 0;
                    $faltantesTotal = 0;
                    $faltanteTotal = 0;
                    $faltantesTotal = 0;
                    $pronosticoTotal = 0;
                    $pronosticosTotal = 0;

                    foreach ($datos as $key => $row) {
                        $mesTotal += $row[$mes];
                        $mesTotales += $row['Totales'];
                        $objetivoTotal += $row["Objetivo"];
                        $objetivosTotal += $row['Objetivos'];

                        /**
                         * MENSUAL
                         */
                        $venta = $row[$mes];
                        $objetivo = $row["Objetivo"];
                        $porVender = $objetivo - $venta;
                        if ($porVender < 0) {
                            $color = "#FF1818";
                        } else {
                            $color = "#2980B9";
                        }

                        $pronostico = (($venta / ($objetivo / 26 * 26)) * 100);

                        if (is_infinite($pronostico)) {
                            $pronostico = 0;
                            $colorFlag = "#FC0000";
                        } else {
                            if ($pronostico >= 95) {
                                $colorFlag = "#008322";
                            } else if ($pronostico < 95 && $pronostico >= 75) {
                                $colorFlag = "#FAA340";
                            } else if ($pronostico < 75) {
                                $colorFlag = "#FA4040";
                            } else {
                                $colorFlag = "#FC0000";
                            }
                        }
                        /**
                         * ACUMULADO
                         */
                        $ventaAcumulada = $row['Totales'];
                        $objetivos = $row['Objetivos'];
                        $porVenderAcumulado = $objetivos - $ventaAcumulada;
                        if ($porVenderAcumulado < 0) {
                            $colorAcumulado = "#FF1818";
                        } else {
                            $colorAcumulado = "#2980B9";
                        }

                        $pronosticoAcumulado = (($ventaAcumulada / ($objetivos / 26 * 26)) * 100);

                        if (is_infinite($pronosticoAcumulado)) {
                            $pronosticoAcumulado = 0;
                            $colorFlagAcumulado = "#FC0000";
                        } else {
                            if ($pronosticoAcumulado >= 95) {
                                $colorFlagAcumulado = "#008322";
                            } else if ($pronosticoAcumulado < 95 && $pronosticoAcumulado >= 75) {
                                $colorFlagAcumulado = "#FAA340";
                            } else if ($pronosticoAcumulado < 75) {
                                $colorFlagAcumulado = "#FA4040";
                            } else {
                                $colorFlagAcumulado = "#FC0000";
                            }
                        }

                        $faltanteTotal += $porVender;
                        $faltantesTotal += $porVenderAcumulado;
                        /**
                         * TOTALES
                         */
                        $pronosticoTotal = (($mesTotal / ($objetivoTotal / 26 * 26)) * 100);

                        if (is_infinite($pronosticoTotal)) {
                            $pronosticoTotal = 0;
                            $colorFlagTotal = "#FC0000";
                        } else {
                            if ($pronosticoTotal >= 95) {
                                $colorFlagTotal = "#008322";
                            } else if ($pronosticoTotal < 95 && $pronosticoTotal >= 75) {
                                $colorFlagTotal = "#FAA340";
                            } else if ($pronosticoTotal < 75) {
                                $colorFlagTotal = "#FA4040";
                            } else {
                                $colorFlagTotal = "#FC0000";
                            }
                        }

                        /**
                         * TOTALES ACUMULADO
                         */
                        $pronosticosTotal = (($mesTotales / ($objetivosTotal / 26 * 26)) * 100);

                        if (is_infinite($pronosticosTotal)) {
                            $pronosticosTotal = 0;
                            $colorFlagTotalAcumulado = "#FC0000";
                        } else {
                            if ($pronosticosTotal >= 95) {
                                $colorFlagTotalAcumulado = "#008322";
                            } else if ($pronosticosTotal < 95 && $pronosticosTotal >= 75) {
                                $colorFlagTotalAcumulado = "#FAA340";
                            } else if ($pronosticosTotal < 75) {
                                $colorFlagTotalAcumulado = "#FA4040";
                            } else {
                                $colorFlagTotalAcumulado = "#FC0000";
                            }
                        }


                    ?>
                        <tr>
                            <th><?= $row['AgenteVenta']; ?></th>
                            <th><?= $row['canalComercial']; ?></th>
                            <td onclick="redireccionAccionVentasObjetivos('<?= $row['AgenteVenta']; ?>','<?= $row['canalComercial'] ?>','<?= $año ?>','<?= $mes ?>','Agentes')" style="font-weight:bold;text-align:right">$<?= number_format($venta, 3) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($objetivo, 3) ?></td>
                            <td style="font-weight:bold;text-align:right;color:<?= $color ?>">$<?= number_format($porVender, 3) ?></td>
                            <td style="font-weight:bold;text-align:left"><i class="fa fa-flag fa-2x" style="color:<?= $colorFlag ?>"></i><?= number_format($pronostico, 2) ?>%</td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($ventaAcumulada, 3) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($objetivos, 3) ?></td>
                            <td style="font-weight:bold;text-align:right;color:<?= $colorAcumulado ?>">$<?= number_format($porVenderAcumulado, 3) ?></td>
                            <td style=" font-weight:bold;text-align:right"><i class="fa fa-flag fa-2x" style="color:<?= $colorFlagAcumulado ?>"></i><?= number_format($pronosticoAcumulado, 2) ?>%</td>

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
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotal, 3) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($objetivoTotal, 3) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($faltanteTotal, 3) ?></th>
                        <th style="font-weight:bold;text-align:right"><i class="fa fa-flag fa-2x" style="color:<?= $colorFlagTotal ?>"></i><?= number_format($pronosticoTotal, 2) ?>%</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotales, 3) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($objetivosTotal, 3) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($faltantesTotal, 3) ?></th>

                        <th style="font-weight:bold;text-align:right"><i class="fa fa-flag fa-2x" style="color:<?= $colorFlagTotalAcumulado ?>"></i><?= number_format($pronosticosTotal, 2) ?>%</th>
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
            echo $pagination->paginateVentasAgente($vista);

            ?>
        </div>
    <?php
    }
}
/**
 * OBJETIVOS DE VENTA POR CANAL
 */
if ($action == 'objetivosVentasCanal') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $mes = strip_tags($_REQUEST["mes"]);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);



    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("año" => $año, "mes" => $mes, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getObjetivosVentaCanal($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th></th>

                        <th style="background:#33FF96"></th>
                        <th style="background:#33FF96"><?php echo strip_tags(strtoupper($_REQUEST["mesElegido"])) ?></th>
                        <th style="background:#33FF96"></th>
                        <th style="background:#33FF96;width:200px"></th>
                        <th style="background:#FF7D33"></th>
                        <th style="background:#FF7D33">ACUMULADOS</th>
                        <th style="background:#FF7D33"></th>

                        <th style="background:#FF7D33"></th>
                    </tr>
                    <tr>

                        <th>Canal</th>
                        <th>Venta</th>
                        <th>Objetivo</th>
                        <th>Por Vender</th>
                        <th style="width:200px">Pronóstico</th>
                        <th>Ventas</th>
                        <th>Objetivos</th>
                        <th>Por Vender</th>
                        <th>Pronóstico</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $mesTotal = 0;
                    $mesTotales = 0;
                    $objetivoTotal = 0;
                    $objetivosTotal = 0;
                    $faltanteTotal = 0;
                    $faltantesTotal = 0;
                    $faltanteTotal = 0;
                    $faltantesTotal = 0;
                    $pronosticoTotal = 0;
                    $pronosticosTotal = 0;

                    foreach ($datos as $key => $row) {
                        $mesTotal += $row[$mes];
                        $mesTotales += $row['Totales'];
                        $objetivoTotal += $row["Objetivo"];
                        $objetivosTotal += $row['Objetivos'];

                        /**
                         * MENSUAL
                         */
                        $venta = $row[$mes];
                        $objetivo = $row["Objetivo"];
                        $porVender = $objetivo - $venta;
                        if ($porVender < 0) {
                            $color = "#FF1818";
                        } else {
                            $color = "#2980B9";
                        }

                        $pronostico = (($venta / ($objetivo / 26 * 26)) * 100);

                        if (is_infinite($pronostico)) {
                            $pronostico = 0;
                            $colorFlag = "#FC0000";
                        } else {
                            if ($pronostico >= 95) {
                                $colorFlag = "#008322";
                            } else if ($pronostico < 95 && $pronostico >= 75) {
                                $colorFlag = "#FAA340";
                            } else if ($pronostico < 75) {
                                $colorFlag = "#FA4040";
                            } else {
                                $colorFlag = "#FC0000";
                            }
                        }
                        /**
                         * ACUMULADO
                         */
                        $ventaAcumulada = $row['Totales'];
                        $objetivos = $row['Objetivos'];
                        $porVenderAcumulado = $objetivos - $ventaAcumulada;
                        if ($porVenderAcumulado < 0) {
                            $colorAcumulado = "#FF1818";
                        } else {
                            $colorAcumulado = "#2980B9";
                        }

                        $pronosticoAcumulado = (($ventaAcumulada / ($objetivos / 26 * 26)) * 100);

                        if (is_infinite($pronosticoAcumulado)) {
                            $pronosticoAcumulado = 0;
                            $colorFlagAcumulado = "#FC0000";
                        } else {
                            if ($pronosticoAcumulado >= 95) {
                                $colorFlagAcumulado = "#008322";
                            } else if ($pronosticoAcumulado < 95 && $pronosticoAcumulado >= 75) {
                                $colorFlagAcumulado = "#FAA340";
                            } else if ($pronosticoAcumulado < 75) {
                                $colorFlagAcumulado = "#FA4040";
                            } else {
                                $colorFlagAcumulado = "#FC0000";
                            }
                        }

                        $faltanteTotal += $porVender;
                        $faltantesTotal += $porVenderAcumulado;
                        /**
                         * TOTALES
                         */
                        $pronosticoTotal = (($mesTotal / ($objetivoTotal / 26 * 26)) * 100);

                        if (is_infinite($pronosticoTotal)) {
                            $pronosticoTotal = 0;
                            $colorFlagTotal = "#FC0000";
                        } else {
                            if ($pronosticoTotal >= 95) {
                                $colorFlagTotal = "#008322";
                            } else if ($pronosticoTotal < 95 && $pronosticoTotal >= 75) {
                                $colorFlagTotal = "#FAA340";
                            } else if ($pronosticoTotal < 75) {
                                $colorFlagTotal = "#FA4040";
                            } else {
                                $colorFlagTotal = "#FC0000";
                            }
                        }

                        /**
                         * TOTALES ACUMULADO
                         */
                        $pronosticosTotal = (($mesTotales / ($objetivosTotal / 26 * 26)) * 100);

                        if (is_infinite($pronosticosTotal)) {
                            $pronosticosTotal = 0;
                            $colorFlagTotalAcumulado = "#FC0000";
                        } else {
                            if ($pronosticosTotal >= 95) {
                                $colorFlagTotalAcumulado = "#008322";
                            } else if ($pronosticosTotal < 95 && $pronosticosTotal >= 75) {
                                $colorFlagTotalAcumulado = "#FAA340";
                            } else if ($pronosticosTotal < 75) {
                                $colorFlagTotalAcumulado = "#FA4040";
                            } else {
                                $colorFlagTotalAcumulado = "#FC0000";
                            }
                        }


                    ?>
                        <tr>

                            <th><?= $row['canalComercial']; ?></th>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentasObjetivos('','<?= $row['canalComercial'] ?>','<?= $año ?>','<?= $mes ?>','Canal')">$<?= number_format($venta, 3) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($objetivo, 3) ?></td>
                            <td style="font-weight:bold;text-align:right;color:<?= $color ?>">$<?= number_format($porVender, 3) ?></td>
                            <td style="font-weight:bold;text-align:left"><i class="fa fa-flag fa-2x" style="color:<?= $colorFlag ?>"></i><?= number_format($pronostico, 2) ?>%</td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($ventaAcumulada, 3) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($objetivos, 3) ?></td>
                            <td style="font-weight:bold;text-align:right;color:<?= $colorAcumulado ?>">$<?= number_format($porVenderAcumulado, 3) ?></td>
                            <td style=" font-weight:bold;text-align:right"><i class="fa fa-flag fa-2x" style="color:<?= $colorFlagAcumulado ?>"></i><?= number_format($pronosticoAcumulado, 2) ?>%</td>

                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>

                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotal, 3) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($objetivoTotal, 3) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($faltanteTotal, 3) ?></th>
                        <th style="font-weight:bold;text-align:right"><i class="fa fa-flag fa-2x" style="color:<?= $colorFlagTotal ?>"></i><?= number_format($pronosticoTotal, 2) ?>%</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotales, 3) ?></th>

                        <th style="font-weight:bold;text-align:right">$<?= number_format($objetivosTotal, 3) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($faltantesTotal, 3) ?></th>
                        <th style="font-weight:bold;text-align:right"><i class="fa fa-flag fa-2x" style="color:<?= $colorFlagTotalAcumulado ?>"></i><?= number_format($pronosticosTotal, 2) ?>%</th>
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
            echo $pagination->paginateVentasAgente($vista);

            ?>
        </div>
    <?php
    }
}
/**
 * DEFINICION DE OBJETIVOS
 */
if ($action == 'definicionObjetivos') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $canal = strip_tags($_REQUEST['canal']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("canal" => $canal, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getListadoObjetivosAgente($search);


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
            <table class="table table-responsive table-striped table-hover ">
                <thead>

                    <tr>
                        <th>Canal</th>
                        <th>Agente</th>
                        <th>Enero</th>
                        <th>Febrero</th>
                        <th>Marzo</th>
                        <th>Abril</th>
                        <th>Mayo</th>
                        <th>Junio</th>
                        <th>Julio</th>
                        <th>Agosto</th>
                        <th>Septiembre</th>
                        <th>Octubre</th>
                        <th>Noviembre</th>
                        <th>Diciembre</th>
                        <th>Totales</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $mes1 = 0;
                    $mes2 = 0;
                    $mes3 = 0;
                    $mes4 = 0;
                    $mes5 = 0;
                    $mes6 = 0;
                    $mes7 = 0;
                    $mes8 = 0;
                    $mes9 = 0;
                    $mes10 = 0;
                    $mes11 = 0;
                    $mes12 = 0;

                    foreach ($datos as $key => $row) {

                        $mes1 += $row["COBJETIVO1"];
                        $mes2 += $row["COBJETIVO2"];
                        $mes3 += $row["COBJETIVO3"];
                        $mes4 += $row["COBJETIVO4"];
                        $mes5 += $row["COBJETIVO5"];
                        $mes6 += $row["COBJETIVO6"];
                        $mes7 += $row["COBJETIVO7"];
                        $mes8 += $row["COBJETIVO8"];
                        $mes9 += $row["COBJETIVO9"];
                        $mes10 += $row["COBJETIVO10"];
                        $mes11 += $row["COBJETIVO11"];
                        $mes12 += $row["COBJETIVO12"];


                    ?>
                        <tr>

                            <th style="font-weight:bold;text-align:right;"><?= $row['CCANALORIGEN']; ?></th>
                            <th class="btnDetalleAgenteObjetivos idAgente" idAgente="<?= $row["CID"] ?>" onclick="obtenerDatosAgenteObjetivos(<?= $row['CID']; ?>)"><?= $row['CNOMBREAGENTE']; ?></th>
                            <td><input type="text" class="form-control objetivo1" style="width:120px" value="<?= number_format($row["COBJETIVO1"], 2) ?>" onchange="updateObjetivoAgente(this,1)"></td>
                            <td><input type="text" class="form-control objetivo2" style="width:120px" value="<?= number_format($row["COBJETIVO2"], 2) ?>" onchange="updateObjetivoAgente(this,2)"></td>
                            <td><input type="text" class="form-control objetivo3" style="width:120px" value="<?= number_format($row["COBJETIVO3"], 2) ?>" onchange="updateObjetivoAgente(this,3)"></td>
                            <td><input type="text" class="form-control objetivo4" style="width:120px" value="<?= number_format($row["COBJETIVO4"], 2) ?>" onchange="updateObjetivoAgente(this,4)"></td>
                            <td><input type="text" class="form-control objetivo5" style="width:120px" value="<?= number_format($row["COBJETIVO5"], 2) ?>" onchange="updateObjetivoAgente(this,5)"></td>
                            <td><input type="text" class="form-control objetivo6" style="width:120px" value="<?= number_format($row["COBJETIVO6"], 2) ?>" onchange="updateObjetivoAgente(this,6)"></td>
                            <td><input type="text" class="form-control objetivo7" style="width:120px" value="<?= number_format($row["COBJETIVO7"], 2) ?>" onchange="updateObjetivoAgente(this,7)"></td>
                            <td><input type="text" class="form-control objetivo8" style="width:120px" value="<?= number_format($row["COBJETIVO8"], 2) ?>" onchange="updateObjetivoAgente(this,8)"></td>
                            <td><input type="text" class="form-control objetivo9" style="width:120px" value="<?= number_format($row["COBJETIVO9"], 2) ?>" onchange="updateObjetivoAgente(this,9)"></td>
                            <td><input type="text" class="form-control objetivo10" style="width:120px" value="<?= number_format($row["COBJETIVO10"], 2) ?>" onchange="updateObjetivoAgente(this,10,)"></td>
                            <td><input type="text" class="form-control objetivo11" style="width:120px" value="<?= number_format($row["COBJETIVO11"], 2) ?>" onchange="updateObjetivoAgente(this,11)"></td>
                            <td><input type="text" class="form-control objetivo12" style="width:120px" value="<?= number_format($row["COBJETIVO12"], 2) ?>" onchange="updateObjetivoAgente(this,12)"></td>

                            <th style="font-weight:bold;text-align:right;">$<?= number_format($row["Totales"], 2) ?></th>
                            <th> <button type="button" class="btn btn-danger" onclick="eliminarAgenteObjetivos(<?= $row['CID']; ?>)"><i class="fa fa-trash"></i></button></th>

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
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes8, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes9, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes10, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes11, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$ <?= number_format($mes12, 2) ?></th>
                        <th style="font-weight:bold;text-align:right"></th>
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
            echo $pagination->paginateVentasAgente($vista);

            ?>
        </div>
<?php
    }
}
?>