<?php
error_reporting(0);
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'detalleVentasCliente') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $centroTrabajo = strip_tags($_REQUEST['centroTrabajo']);
    $agente = strip_tags($_REQUEST['agente']);
    $canal = strip_tags($_REQUEST['canal']);
    $cliente = strip_tags($_REQUEST['cliente']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $dia = strip_tags($_REQUEST['dia']);
    $mes = strip_tags($_REQUEST['mes']);
    $semana = strip_tags($_REQUEST['semana']);
    $concepto = strip_tags($_REQUEST['concepto']);
    $per_page = intval($_REQUEST['per_page']);
    $tipo = strip_tags($_REQUEST['tipo']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("tipo" => $tipo, "centroTrabajo" => $centroTrabajo, "agente" => $agente, "canal" => $canal, "cliente" => $cliente, "año" => $año, "dia" => $dia, "mes" => $mes, "semana" => $semana, "concepto" => $concepto, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleCliente($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasCliente">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>CONCEPTO</th>
                        <th>FECHA</th>
                        <th>AGENTE</th>
                        <th>SERIE</th>
                        <th>FOLIO</th>
                        <th>VENTA</th>
                        <th>IVA</th>
                        <th>TOTAL</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {

                        $iva += $row['IVA'];
                        $total += $row['Total'];
                        $desglose += $row['Desglose'];

                    ?>
                        <tr>
                            <th><a onclick="detalleProductosVenta(<?= $row['CIDDOCUMENTO']; ?>,'<?= $row['Empresa']; ?>')"><?= $row['CRAZONSOCIAL']; ?></a></th>
                            <td style="font-weight:bold;text-align:left"><?= $row['CNOMBRECONCEPTO']; ?></td>
                            <td style="text-align:left"><?= substr($row['CFECHA'], 0, 10); ?></td>
                            <td style="text-align:left"><?= $row['Agente']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= $row['CSERIEDOCUMENTO']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= (int)$row['CFOLIO'] ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Desglose'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['IVA'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Total'], 2) ?></td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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
            echo $pagination->paginateDetalleVentasClientes($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'detalleVentasProductos') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $idDocumento = strip_tags($_REQUEST['idDocumento']);
    $empresa = strip_tags($_REQUEST['empresa']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("idDocumento" => $idDocumento, "empresa" => $empresa, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleProducto($tables, $campos, $search);

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
                        <th>#</th>
                        <th>CODIGO</th>
                        <th>PRODUCTO</th>
                        <th>UNIDAD MEDIDA</th>
                        <th>UNIDADES</th>
                        <th>PRECIO</th>
                        <th>VENTA</th>
                        <th>IVA</th>
                        <th>TOTAL</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $precio = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {
                        $precio += $row['CPRECIO'];
                        $iva += $row['CIMPUESTO1'];
                        $total += $row['CTOTAL'];
                        $desglose += $row['Desglose'];

                    ?>
                        <tr>
                            <th><?= number_format($row['CNUMEROMOVIMIENTO'], 0); ?></th>
                            <td><?= $row['CCODIGOPRODUCTO']; ?></td>
                            <td><?= $row['CNOMBREPRODUCTO']; ?></td>
                            <td><?= $row['Unidad']; ?></td>
                            <td><?= number_format($row['CUNIDADESCAPTURADAS'], 2); ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CPRECIO'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Desglose'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CIMPUESTO1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CTOTAL'], 2) ?></td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($precio, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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
            echo $pagination->paginateDetalleVentasProductos($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'detalleVentasClienteProducto') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $centroTrabajo = strip_tags($_REQUEST['centroTrabajo']);
    $agente = strip_tags($_REQUEST['agente']);
    $canal = strip_tags($_REQUEST['canal']);
    $cliente = strip_tags($_REQUEST['cliente']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $dia = strip_tags($_REQUEST['dia']);
    $mes = strip_tags($_REQUEST['mes']);
    $semana = strip_tags($_REQUEST['semana']);
    $concepto = strip_tags($_REQUEST['concepto']);
    $codigo = strip_tags($_REQUEST['codigo']);
    $per_page = intval($_REQUEST['per_page']);
    $tipo = strip_tags($_REQUEST['tipo']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("tipo" => $tipo, "centroTrabajo" => $centroTrabajo, "agente" => $agente, "canal" => $canal, "cliente" => $cliente, "año" => $año, "dia" => $dia, "mes" => $mes, "semana" => $semana, "concepto" => $concepto, "codigo" => $codigo, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleClienteProducto($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasCliente">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>CONCEPTO</th>
                        <th>FECHA</th>
                        <th>AGENTE</th>
                        <th>SERIE</th>
                        <th>FOLIO</th>
                        <th>UNIDADES</th>
                        <th>VENTA</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $total = 0;
                    $totalUnidades = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {

                        $total += $row['Total'];
                        $totalUnidades += $row['TotalUnidades'];

                    ?>
                        <tr>
                            <th style="font-weight:bold;text-align:left"><?= $row['CRAZONSOCIAL']; ?></th>
                            <td style="font-weight:bold;text-align:left"><?= $row['CNOMBRECONCEPTO']; ?></td>
                            <td style="text-align:left"><?= substr($row['CFECHA'], 0, 10); ?></td>
                            <td style="text-align:left"><?= $row['Agente']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= $row['CSERIEDOCUMENTO']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= (int)$row['CFOLIO'] ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= $row['TotalUnidades'] ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Total'], 2) ?></td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($totalUnidades, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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
            echo $pagination->paginateDetalleVentasClientes($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'detalleVentasMarca') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $centroTrabajo = strip_tags($_REQUEST['centroTrabajo']);
    $agente = strip_tags($_REQUEST['agente']);
    $canal = strip_tags($_REQUEST['canal']);
    $cliente = strip_tags($_REQUEST['cliente']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $dia = strip_tags($_REQUEST['dia']);
    $mes = strip_tags($_REQUEST['mes']);
    $semana = strip_tags($_REQUEST['semana']);
    $concepto = strip_tags($_REQUEST['concepto']);
    $codigo = strip_tags($_REQUEST['codigo']);
    $marca = strip_tags($_REQUEST['marca']);
    $per_page = intval($_REQUEST['per_page']);
    $tipo = strip_tags($_REQUEST['tipo']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("tipo" => $tipo, "centroTrabajo" => $centroTrabajo, "agente" => $agente, "canal" => $canal, "cliente" => $cliente, "año" => $año, "dia" => $dia, "mes" => $mes, "semana" => $semana, "concepto" => $concepto, "codigo" => $codigo, "marca" => $marca, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleClienteMarca($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasCliente">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>CONCEPTO</th>
                        <th>FECHA</th>
                        <th>AGENTE</th>
                        <th>SERIE</th>
                        <th>FOLIO</th>
                        <th>VENTA</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $total = 0;
                    $totalUnidades = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {

                        $total += $row['1'];

                    ?>
                        <tr>

                            <th style="font-weight:bold;text-align:left"> <a onclick="detalleProductosVentaMarca(<?= $row['CIDDOCUMENTO']; ?>,'<?= $row['Empresa']; ?>','<?= $marca; ?>')"><?= $row['CRAZONSOCIAL']; ?></a></th>
                            <td style="font-weight:bold;text-align:left"><?= $row['CNOMBRECONCEPTO']; ?></td>
                            <td style="text-align:left"><?= substr($row['CFECHA'], 0, 10); ?></td>
                            <td style="text-align:left"><?= $row['Agente']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= $row['CSERIEDOCUMENTO']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= (int)$row['CFOLIO'] ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['1'], 2) ?></td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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
            echo $pagination->paginateDetalleVentasClientes($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'detalleVentasProductosMarca') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $idDocumento = strip_tags($_REQUEST['idDocumento']);
    $empresa = strip_tags($_REQUEST['empresa']);
    $marca = strip_tags($_REQUEST['marca']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("idDocumento" => $idDocumento, "empresa" => $empresa, "marca" => $marca, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleProductoMarca($tables, $campos, $search);

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
                        <th>#</th>
                        <th>CODIGO</th>
                        <th>PRODUCTO</th>
                        <th>UNIDAD MEDIDA</th>
                        <th>UNIDADES</th>
                        <th>PRECIO</th>
                        <th>VENTA</th>
                        <th>IVA</th>
                        <th>TOTAL</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $precio = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {
                        $precio += $row['CPRECIO'];
                        $iva += $row['CIMPUESTO1'];
                        $total += $row['CTOTAL'];
                        $desglose += $row['Desglose'];

                    ?>
                        <tr>
                            <th><?= number_format($row['CNUMEROMOVIMIENTO'], 0); ?></th>
                            <td><?= $row['CCODIGOPRODUCTO']; ?></td>
                            <td><?= $row['CNOMBREPRODUCTO']; ?></td>
                            <td><?= $row['Unidad']; ?></td>
                            <td><?= number_format($row['CUNIDADESCAPTURADAS'], 2); ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CPRECIO'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Desglose'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CIMPUESTO1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CTOTAL'], 2) ?></td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($precio, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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
            echo $pagination->paginateDetalleVentasProductos($vista);

            ?>
        </div>
    <?php
    }
}
/***
 * ORIGEN DE LA VENTA
 */
if ($action == 'detalleVentasClienteOrigen') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $origen = strip_tags($_REQUEST['origen']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $canal = strip_tags($_REQUEST['canal']);
    $cliente = strip_tags($_REQUEST['cliente']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $mes = strip_tags($_REQUEST['mes']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("origen" => $origen, "agente" => $agente, "canal" => $canal, "centro" => $centro, "cliente" => $cliente, "año" => $año, "mes" => $mes, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleClienteOrigen($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasClienteOrigen">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>CONCEPTO</th>
                        <th>FECHA</th>
                        <th>AGENTE</th>
                        <th>SERIE</th>
                        <th>FOLIO</th>
                        <th>VENTA</th>
                        <th>IVA</th>
                        <th>TOTAL</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {

                        $iva += $row['IVA'];
                        $total += $row['Totals'];
                        $desglose += $row['Total'];

                    ?>
                        <tr>
                            <th><?= $row['NombreCliente']; ?></th>
                            <td style="font-weight:bold;text-align:left"><?= $row['CNOMBRECONCEPTO']; ?></td>
                            <td style="text-align:left"><?= substr($row['CFECHA'], 0, 10); ?></td>
                            <td style="text-align:left"><?= $row['Agente']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= $row['CSERIEDOCUMENTO']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= (int)$row['CFOLIO'] ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Total'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['IVA'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Totals'], 2) ?></td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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
            echo $pagination->paginateDetalleVentasClientes($vista);

            ?>
        </div>
    <?php
    }
}
/***
 * DIARIO DE VENTAS
 */
if ($action == 'detalleVentasDiario') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $nombreDia = strip_tags($_REQUEST['nombreDia']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $canal = strip_tags($_REQUEST['canal']);
    $cliente = strip_tags($_REQUEST['cliente']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $mes = strip_tags($_REQUEST['mes']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $centroDetalle = strip_tags($_REQUEST['centroDetalle']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("centroDetalle" => $centroDetalle, "nombreDia" => $nombreDia, "agente" => $agente, "canal" => $canal, "centro" => $centro, "cliente" => $cliente, "año" => $año, "mes" => $mes, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleDiarioVentas($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasClienteOrigen">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>CONCEPTO</th>
                        <th>FECHA</th>
                        <th>AGENTE</th>
                        <th>SERIE</th>
                        <th>FOLIO</th>
                        <th>VENTA</th>
                        <th>IVA</th>
                        <th>TOTAL</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {

                        $iva += $row['IVA'];
                        $total += $row['Totals'];
                        $desglose += $row['Total'];

                    ?>
                        <tr>
                            <th><?= $row['NombreCliente']; ?></th>
                            <td style="font-weight:bold;text-align:left"><?= $row['CNOMBRECONCEPTO']; ?></td>
                            <td style="text-align:left"><?= substr($row['CFECHA'], 0, 10); ?></td>
                            <td style="text-align:left"><?= $row['Agente']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= $row['CSERIEDOCUMENTO']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= (int)$row['CFOLIO'] ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Total'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['IVA'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Totals'], 2) ?></td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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
            echo $pagination->paginateDetalleVentasClientes($vista);

            ?>
        </div>
    <?php
    }
}
/**
 * DETALLE VENTAS CLIENTE OBJETIVOS
 */
if ($action == 'detalleVentasClienteObjetivos') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas

    $agente = strip_tags($_REQUEST['agente']);
    $canal = strip_tags($_REQUEST['canal']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $mes = strip_tags($_REQUEST['mes']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("agente" => $agente, "canal" => $canal, "año" => $año, "mes" => $mes, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleClienteObjetivos($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasClienteObjetivos">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>CONCEPTO</th>
                        <th>FECHA</th>
                        <th>AGENTE</th>
                        <th>AGENTE</th>
                        <th>SERIE</th>
                        <th>FOLIO</th>
                        <th>VENTA</th>
                        <th>IVA</th>
                        <th>TOTAL</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {

                        $iva += $row['IVA'];
                        $total += $row['Total'];
                        $desglose += $row['Desglose'];

                    ?>
                        <tr>
                            <th><?= $row['NombreCliente']; ?></th>
                            <td style="font-weight:bold;text-align:left"><?= $row['CNOMBRECONCEPTO']; ?></td>
                            <td style="text-align:left"><?= substr($row['CFECHA'], 0, 10); ?></td>
                            <td style="text-align:left"><?= $row['Agente']; ?></td>
                            <td style="text-align:left"><?= $row['AgenteVenta']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= $row['CSERIEDOCUMENTO']; ?></td>
                            <td style="text-align:left;color:#005794;font-weight:bold"><?= (int)$row['CFOLIO'] ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Desglose'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['IVA'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Total'], 2) ?></td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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
            echo $pagination->paginateDetalleVentasClientes($vista);

            ?>
        </div>
<?php
    }
}
?>