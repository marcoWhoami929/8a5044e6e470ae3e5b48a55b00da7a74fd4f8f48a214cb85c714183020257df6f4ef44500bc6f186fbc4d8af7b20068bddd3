<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ventasProductoMonto') {

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
    $producto = strip_tags($_REQUEST['producto']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "producto" => $producto, "año" => $año, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasProductoMonto($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasProducto">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
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
                        <th>TOTAL GENERAL</th>
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
                            <th><?= $row['CCODIGOPRODUCTO']; ?></th>
                            <th><?= $row['CNOMBREPRODUCTO']; ?></th>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','1','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','2','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['2'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','3','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['3'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','4','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['4'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','5','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['5'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','6','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['6'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','7','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['7'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','8','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['8'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','9','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['9'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','10','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['10'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','11','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['11'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','12','<?= $row['CCODIGOPRODUCTO']; ?>')">$<?= number_format($row['12'], 2) ?></td>
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
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','1','')">$<?= number_format($mes1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','2','')">$<?= number_format($mes2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','3','')">$<?= number_format($mes3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','4','')">$<?= number_format($mes4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','5','')">$<?= number_format($mes5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','6','')">$<?= number_format($mes6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','7','')">$<?= number_format($mes7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','8','')">$<?= number_format($mes8, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','9','')">$<?= number_format($mes9, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','10','')">$<?= number_format($mes10, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','11','')">$<?= number_format($mes11, 2) ?></th>
                        <th style="font-weight:bold;text-align:right" onclick="redireccionAccionVentas('','Productos','','<?= $_REQUEST['anio'] ?>','12','')">$<?= number_format($mes12, 2) ?></th>
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
            echo $pagination->paginateVentasProductoMonto($vista);

            ?>
        </div>
    <?php
    }
}

if ($action == 'ventasProductoUnidades') {

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
    $producto = strip_tags($_REQUEST['producto']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "producto" => $producto, "año" => $año, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasProductoUnidades($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasProducto">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
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
                        <th>TOTAL GENERAL</th>
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
                            <th><?= $row['CCODIGOPRODUCTO']; ?></th>
                            <th><?= $row['CNOMBREPRODUCTO']; ?></th>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['2'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['3'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['4'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['5'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['6'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['7'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['8'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['9'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['10'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['11'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['12'], 2) ?></td>
                            <th>#<?= number_format($row['Totales'], 2) ?></th>
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
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes8, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes9, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes10, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes11, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mes12, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mesTotales, 2) ?></th>
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
            echo $pagination->paginateVentasProductoUnidades($vista);

            ?>
        </div>
<?php
    }
}

?>