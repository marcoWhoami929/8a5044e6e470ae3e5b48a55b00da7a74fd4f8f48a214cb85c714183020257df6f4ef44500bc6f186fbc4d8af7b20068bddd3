<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ventasYearToDay') {

    include('../clases/detalleVentasAnual.php');
    $database = new detalleVentasAnual();
    //Recibir variables enviadas

    $vista = strip_tags($_REQUEST['vista']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $per_page = intval($_REQUEST['per_page']);
    $fechaInicial = strip_tags($_REQUEST['fechaInicial']);
    $fechaFinal = strip_tags($_REQUEST['fechaFinal']);


    if ($fechaInicial == "" && $fechaFinal == "") {
        $añoInicial = '".$año1."';
        $añoFinal = '".$año2."';
    } else {
        $añoInicial = substr($_REQUEST['fechaInicial'], 0, 4);
        $añoFinal = substr($_REQUEST['fechaFinal'], 0, 4);
    }

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("estatus" => $estatus, "per_page" => $per_page, "offset" => $offset, "fechaInicial" => $fechaInicial, "fechaFinal" => $fechaFinal, "añoInicial" => $añoInicial, "añoFinal" => $añoFinal);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasYearToDay($tables, $campos, $search);

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
                        <th>CANAL</th>
                        <th><?= $añoInicial ?> </th>
                        <th><?= $añoFinal ?></th>
                        <th>CRECIMIENTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $año1 = 0;
                    $año2 = 0;
                    $añoTotales = 0;
                    foreach ($datos as $key => $row) {
                        $año1 += $row[$añoInicial];
                        $año2 += $row[$añoFinal];
                    ?>
                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row[$añoInicial], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row[$añoFinal], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['Crecimiento'], 2) ?>%</td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($año1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($año2, 2) ?></th>
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
            echo $pagination->paginateVentasYearToDay($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'ventasCanalFiltro') {

    include('../clases/detalleVentasAnual.php');
    $database = new detalleVentasAnual();
    //Recibir variables enviadas

    $vista = strip_tags($_REQUEST['vista']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $per_page = intval($_REQUEST['per_page']);
    $fechaInicio1 =  strip_tags($_REQUEST['fechaInicio1']);
    $fechaFinal1 =  strip_tags($_REQUEST['fechaFinal1']);
    $fechaInicio2 =  strip_tags($_REQUEST['fechaInicio2']);
    $fechaFinal2 =  strip_tags($_REQUEST['fechaFinal2']);

    if ($fechaInicio1 != '' and $fechaFinal1 != '' and $fechaInicio2 != '' and $fechaFinal2 != '') {
        $fechaInicio1Split = explode('-', $fechaInicio1);
        $fechaInicio2Split = explode('-', $fechaInicio2);
        $añoInicio = $fechaInicio1Split[0];
        $añoFin = $fechaInicio2Split[0];
    } else {
        $añoInicio = '2021';
        $añoFin = '2022';
    }


    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("estatus" => $estatus, "per_page" => $per_page, "offset" => $offset, "fechaInicio1" => $fechaInicio1, "fechaFinal1" => $fechaFinal1, "fechaInicio2" => $fechaInicio2, "fechaFinal2" => $fechaFinal2);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasCanalFIltro($tables, $campos, $search);

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
                        <th>CANAL</th>
                        <th><?= $añoInicio ?></th>
                        <th><?= $añoFin ?></th>
                        <th>CRECIMIENTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $año1 = 0;
                    $año2 = 0;
                    $añoTotales = 0;
                    foreach ($datos as $key => $row) {
                        $año1 += $row[$añoInicio];
                        $año2 += $row[$añoFin];
                    ?>
                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row[$añoInicio], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row[$añoFin], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['Crecimiento'], 2) ?>%</td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($año1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($año2, 2) ?></th>
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
            echo $pagination->paginateVentasYearToDay($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'ventasYearToWeek') {
    $arreglo = array();
    $arreglo2 = array();
    $arreglo3 = array();
    $arreglo4 = array();
    $week = strip_tags($_REQUEST['semana']);
    $year =  strip_tags($_REQUEST['año1']);
    $year2 =  strip_tags($_REQUEST['año2']);
    for ($day = 1; $day < 7; $day++) {
        $diaElegido = date('Y-m-d', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
        array_push($arreglo, $diaElegido);
        $dia = date('d', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
        $mes = date('m', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
        $año = date('Y', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
        $fecha = $año . "-" . (int)$mes . "-" . (int)$dia;
        array_push($arreglo3, $fecha);
    }

    for ($i = 1; $i < 7; $i++) {
        $diaElegido2 = date('Y-m-d', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
        array_push($arreglo2, $diaElegido2);
        $dia2 = date('d', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
        $mes2 = date('m', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
        $año2 = date('Y', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
        $fecha2 = $año2 . "-" . (int)$mes2 . "-" . (int)$dia2;
        array_push($arreglo4, $fecha2);
    }

    $arregloFecha1 = array();
    $arregloFecha2 = array();
    for ($day = 1; $day < 7; $day++) {
        $fecha1 = date('Y-m-d', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
        array_push($arregloFecha1, $fecha1);
    }
    for ($i = 1; $i < 7; $i++) {
        $fecha2 = date('Y-m-d', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
        array_push($arregloFecha2, $fecha2);
    }

    include('../clases/detalleVentasAnual.php');
    $database = new detalleVentasAnual();
    //Recibir variables enviadas

    $vista = strip_tags($_REQUEST['vista']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $per_page = intval($_REQUEST['per_page']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("estatus" => $estatus, "per_page" => $per_page, "offset" => $offset, "año1" => $year, "año2" => $year2, "week" => $week);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasYearToWeek($tables, $campos, $search);

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

            <h4>YEAR TO WEEK</h4>
            <h5 class='m-b-0'><?php echo $arregloFecha1[0] . "-" . $arregloFecha1[5] . " VS " . $arregloFecha2[0] . "-" . $arregloFecha2[5] ?></h5>
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th>CANAL</th>
                        <?php

                        echo "<th>" . $arregloFecha1[0] . "</th>";
                        echo "<th>" . $arregloFecha2[0] . "</th>";
                        echo "<th>" . $arregloFecha1[1] . "</th>";
                        echo "<th>" . $arregloFecha2[1] . "</th>";
                        echo "<th>" . $arregloFecha1[2] . "</th>";
                        echo "<th>" . $arregloFecha2[2] . "</th>";
                        echo "<th>" . $arregloFecha1[3] . "</th>";
                        echo "<th>" . $arregloFecha2[3] . "</th>";
                        echo "<th>" . $arregloFecha1[4] . "</th>";
                        echo "<th>" . $arregloFecha2[4] . "</th>";
                        echo "<th>" . $arregloFecha1[5] . "</th>";
                        echo "<th>" . $arregloFecha2[5] . "</th>";


                        ?>
                        <th>CRECIMIENTO</th>
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
                    $numDia7 = 0;
                    $numDia8 = 0;
                    $numDia9 = 0;
                    $numDia10 = 0;
                    $numDia11 = 0;
                    $numDia12 = 0;

                    foreach ($datos as $key => $row) {
                        $numDia1 +=  $row[$arreglo3[0]];
                        $numDia2 +=  $row[$arreglo4[0]];
                        $numDia3 +=  $row[$arreglo3[1]];
                        $numDia4 +=  $row[$arreglo4[1]];
                        $numDia5 +=  $row[$arreglo3[2]];
                        $numDia6 +=  $row[$arreglo4[2]];
                        $numDia7 +=  $row[$arreglo3[3]];
                        $numDia8 +=  $row[$arreglo4[3]];
                        $numDia9 +=  $row[$arreglo3[4]];
                        $numDia10 +=  $row[$arreglo4[4]];
                        $numDia11 +=  $row[$arreglo3[5]];
                        $numDia12 +=  $row[$arreglo4[5]];

                    ?>

                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[0]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[0]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[1]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[1]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[2]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[2]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[3]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[3]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[4]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[4]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[5]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[5]], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"> <?= number_format($row["Crecimiento"], 2) ?>%</td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia8, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia9, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia10, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia11, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia12, 2) ?></th>
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
            echo $pagination->paginateVentasYearToDay($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'ventasYearToMonth') {

    include('../clases/detalleVentasAnual.php');
    $database = new detalleVentasAnual();
    //Recibir variables enviadas

    $vista = strip_tags($_REQUEST['vista']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $per_page = intval($_REQUEST['per_page']);
    $año1 = intval($_REQUEST['año1']);
    $año2 = intval($_REQUEST['año2']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("estatus" => $estatus, "per_page" => $per_page, "offset" => $offset, "año1" => $año1, "año2" => $año2);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasYearToMonth($tables, $campos, $search);

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
                        <th>CANAL</th>
                        <?php
                        $meses = ["ENE", "ENE", "FEB", "FEB", "MAR", "MAR", "ABR", "ABR", "MAY", "MAY", "JUN", "JUN", "JUL", "JUL", "AGO", "AGO", "SEP", "SEP", "OCT", "OCT", "NOV", "NOV", "DIC", "DIC"];

                        for ($i = 0; $i < 24; $i++) {
                            echo "<th>" . $meses[$i] . "</th>";
                        }

                        ?>
                        <th>CRECIMIENTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $numMes1 = 0;
                    $numMes2 = 0;
                    $numMes3 = 0;
                    $numMes4 = 0;
                    $numMes5 = 0;
                    $numMes6 = 0;
                    $numMes7 = 0;
                    $numMes8 = 0;
                    $numMes9 = 0;
                    $numMes10 = 0;
                    $numMes11 = 0;
                    $numMes12 = 0;
                    $numMes13 = 0;
                    $numMes14 = 0;
                    $numMes15 = 0;
                    $numMes16 = 0;
                    $numMes17 = 0;
                    $numMes18 = 0;
                    $numMes19 = 0;
                    $numMes20 = 0;
                    $numMes21 = 0;
                    $numMes22 = 0;
                    $numMes23 = 0;
                    $numMes24 = 0;
                    foreach ($datos as $key => $row) {
                        $numMes1 +=  $row["" . $año1 . "-1"];
                        $numMes2 +=  $row["" . $año2 . "-1"];
                        $numMes3 +=  $row["" . $año1 . "-2"];
                        $numMes4 +=  $row["" . $año2 . "-2"];
                        $numMes5 +=  $row["" . $año1 . "-3"];
                        $numMes6 +=  $row["" . $año2 . "-3"];
                        $numMes7 +=  $row["" . $año1 . "-4"];
                        $numMes8 +=  $row["" . $año2 . "-4"];
                        $numMes9 +=  $row["" . $año1 . "-5"];
                        $numMes10 +=  $row["" . $año2 . "-5"];
                        $numMes11 +=  $row["" . $año1 . "-6"];
                        $numMes12 +=  $row["" . $año2 . "-6"];
                        $numMes13 +=  $row["" . $año1 . "-7"];
                        $numMes14 +=  $row["" . $año2 . "-7"];
                        $numMes15 +=  $row["" . $año1 . "-8"];
                        $numMes16 +=  $row["" . $año2 . "-8"];
                        $numMes17 +=  $row["" . $año1 . "-9"];
                        $numMes18 +=  $row["" . $año2 . "-9"];
                        $numMes19 +=  $row["" . $año1 . "-10"];
                        $numMes20 +=  $row["" . $año2 . "-10"];
                        $numMes21 +=  $row["" . $año1 . "-11"];
                        $numMes22 +=  $row["" . $año2 . "-11"];
                        $numMes23 +=  $row["" . $año1 . "-12"];
                        $numMes24 +=  $row["" . $año2 . "-12"];

                    ?>

                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-1"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-1"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-2"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-2"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-3"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-3"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-4"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-4"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-5"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-5"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-6"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-6"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-7"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-7"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-8"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-8"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-9"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-9"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-10"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-10"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-11"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-11"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["" . $año1 . "-12"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["" . $año2 . "-12"], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"> <?= number_format($row["Crecimiento"], 2) ?>%</td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes8, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes9, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes10, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes11, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes12, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes13, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes14, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes15, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes16, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes17, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes18, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes19, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes20, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes21, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes22, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes23, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes24, 2) ?></th>
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
            echo $pagination->paginateVentasYearToDay($vista);

            ?>
        </div>
<?php
    }
}

?>