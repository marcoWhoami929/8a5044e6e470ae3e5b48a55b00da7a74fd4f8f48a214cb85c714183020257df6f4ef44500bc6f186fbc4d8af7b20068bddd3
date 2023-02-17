<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ultimosCostos') {
    $empresa = $_REQUEST["empresa"];

    switch ($empresa) {
        case "PINTURAS":
            include('../clases/ultimosCostosPinturas.php');
            $database = new ultimosCostosPinturas();
            break;
        case "FLEX":
            include('../clases/ultimosCostosFlex.php');
            $database = new ultimosCostosFlex();
            break;
        case "TORRES":
            include('../clases/ultimosCostosTorres.php');
            $database = new ultimosCostosTorres();
            break;
        case "DEKKERLAB":
            include('../clases/ultimosCostosDekkerlab.php');
            $database = new ultimosCostosDekkerlab();
            break;
    }

    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $año = strip_tags($_REQUEST['anioCostos']);
    $per_page = intval($_REQUEST['per_page']);
    $campoOrden = strip_tags($_REQUEST['campoOrden']);
    $orden = strip_tags($_REQUEST['orden']);
    $tables = "dbo.admProductos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "año" => $año, "per_page" => $per_page, "offset" => $offset, "campo" => $campoOrden, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getData($tables, $campos, $search);
    $documents = $database->getIdDocuments($tables, $campos, $search);

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
                        <th>ID</th>
                        <th>CODIGO PRODUCTO</th>
                        <th>PRODUCTO</th>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;

                    foreach ($datos as $key => $row) {
                        $empresas = $_REQUEST["empresa"];
                        if ($año == '2013') {

                            $mes1 = $row['1'];
                            $idDocumento1 = $documents[$key]['1'];
                            $mes2 = $row['2'];
                            $idDocumento2 = $documents[$key]['2'];
                            $mes3 = $row['3'];
                            $idDocumento3 = $documents[$key]['3'];
                            $mes4 = $row['4'];
                            $idDocumento4 = $documents[$key]['4'];
                            $mes5 = $row['5'];
                            $idDocumento5 = $documents[$key]['5'];
                            $mes6 = $row['6'];
                            $idDocumento6 = $documents[$key]['6'];
                            $mes7 = $row['7'];
                            $idDocumento7 = $documents[$key]['7'];
                            $mes8 = $row['8'];
                            $idDocumento8 = $documents[$key]['8'];
                            $mes9 = $row['9'];
                            $idDocumento9 = $documents[$key]['9'];
                            $mes10 = $row['10'];
                            $idDocumento10 = $documents[$key]['10'];
                            $mes11 = $row['11'];
                            $idDocumento11 = $documents[$key]['11'];
                            $mes12 = $row['12'];
                            $idDocumento12 = $documents[$key]['12'];
                        } else if ($año == '2022' || $año == '2023' and $empresa == 'DEKKERLAB' and $row['1'] === '0.0') {

                            if ($row['1'] === '0.0') {
                                $codigo = $row["CCODIGOPRODUCTO"];

                                $ultimoCosto = $database->getUltimoCostoDekkerlab($codigo, $año);

                                if ($ultimoCosto != true) {
                                    $mes1 = 0;
                                    $idDocumento1 = 0;
                                } else {
                                    $mes1 = $ultimoCosto["CULTIMOCOSTOH"];
                                    $idDocumento1 = $ultimoCosto["CIDDOCUMENTO"];
                                }
                                $empresas1 = 'PINTURAS';
                            } else {

                                $mes1 = $row['1'];
                                $idDocumento1 = $documents[$key]['1'];
                                $empresas1 = 'DEKKERLAB';
                            }
                            if ($row['2'] === NULL) {
                                $mes2 = $mes1;
                                $idDocumento2 = $idDocumento1;
                                $empresas2 = $empresas1;
                            } else {
                                $mes2 = $row['2'];
                                $idDocumento2 = $documents[$key]['2'];
                                $empresas2 = 'DEKKERLAB';
                            }

                            if ($row['3'] === NULL) {
                                $mes3 = $mes2;
                                $idDocumento3 = $idDocumento2;
                                $empresas3 = $empresas2;
                            } else {
                                $mes3 = $row['3'];
                                $idDocumento3 = $documents[$key]['3'];
                                $empresas3 = 'DEKKERLAB';
                            }
                            if ($row['4'] === NULL) {
                                $mes4 = $mes3;
                                $idDocumento4 = $idDocumento3;
                                $empresas4 = $empresas3;
                            } else {
                                $mes4 = $row['4'];
                                $idDocumento4 = $documents[$key]['4'];
                                $empresas4 = 'DEKKERLAB';
                            }
                            if ($row['5'] === NULL) {
                                $mes5 = $mes4;
                                $idDocumento5 = $idDocumento4;
                                $empresas5 = $empresas4;
                            } else {
                                $mes5 = $row['5'];
                                $idDocumento5 = $documents[$key]['5'];
                                $empresas5 = 'DEKKERLAB';
                            }
                            if ($row['6'] === NULL) {
                                $mes6 = $mes5;
                                $idDocumento6 = $idDocumento5;
                                $empresas6 = $empresas5;
                            } else {
                                $mes6 = $row['6'];
                                $idDocumento6 = $documents[$key]['6'];
                                $empresas6 = 'DEKKERLAB';
                            }
                            if ($row['7'] === NULL) {
                                $mes7 = $mes6;
                                $idDocumento7 = $idDocumento6;
                                $empresas7 = $empresas6;
                            } else {
                                $mes7 = $row['7'];
                                $idDocumento7 = $documents[$key]['7'];
                                $empresas7 = 'DEKKERLAB';
                            }
                            if ($row['8'] === NULL) {
                                $mes8 = $mes7;
                                $idDocumento8 = $idDocumento7;
                                $empresas8 = $empresas7;
                            } else {
                                $mes8 = $row['8'];
                                $idDocumento8 = $documents[$key]['8'];
                                $empresas8 = 'DEKKERLAB';
                            }
                            if ($row['9'] === NULL) {
                                $mes9 = $mes8;
                                $idDocumento9 = $idDocumento8;
                                $empresas9 = $empresas8;
                            } else {
                                $mes9 = $row['9'];
                                $idDocumento9 = $documents[$key]['9'];
                                $empresas9 = 'DEKKERLAB';
                            }
                            if ($row['10'] === NULL) {
                                $mes10 = $mes9;
                                $idDocumento10 = $idDocumento9;
                                $empresas10 = $empresas9;
                            } else {
                                $mes10 = $row['10'];
                                $idDocumento10 = $documents[$key]['10'];
                                $empresas10 = 'DEKKERLAB';
                            }
                            if ($row['11'] === NULL) {
                                $mes11 = $mes10;
                                $idDocumento11 = $idDocumento10;
                                $empresas11 = $empresas10;
                            } else {
                                $mes11 = $row['11'];
                                $idDocumento11 = $documents[$key]['11'];
                                $empresas11 = 'DEKKERLAB';
                            }
                            if ($row['12'] === NULL) {
                                $mes12 = $mes11;
                                $idDocumento12 = $idDocumento11;
                                $empresas12 = $empresas11;
                            } else {
                                $mes12 = $row['12'];
                                $idDocumento12 = $documents[$key]['12'];
                                $empresas12 = 'DEKKERLAB';
                            }
                        } else {

                            if ($row['1'] === '0.0') {
                                $idProducto = $row[0];
                                $ultimoCosto = $database->getUltimoCosto($idProducto, $año);
                                if ($ultimoCosto != true) {
                                    $mes1 = 0;
                                    $idDocumento1 = 0;
                                } else {
                                    $mes1 = $ultimoCosto["CULTIMOCOSTOH"];
                                    $idDocumento1 = $ultimoCosto["CIDDOCUMENTO"];
                                }
                                $empresas1 = $_REQUEST["empresa"];
                            } else {

                                $mes1 = $row['1'];
                                $idDocumento1 = $documents[$key]['1'];
                                $empresas1 = $_REQUEST["empresa"];
                            }
                            if ($row['2'] === NULL) {
                                $mes2 = $mes1;
                                $idDocumento2 = $idDocumento1;
                                $empresas2 = $_REQUEST["empresa"];
                            } else {
                                $mes2 = $row['2'];
                                $idDocumento2 = $documents[$key]['2'];
                                $empresas2 = $_REQUEST["empresa"];
                            }

                            if ($row['3'] === NULL) {
                                $mes3 = $mes2;
                                $idDocumento3 = $idDocumento2;
                                $empresas3 = $_REQUEST["empresa"];
                            } else {
                                $mes3 = $row['3'];
                                $idDocumento3 = $documents[$key]['3'];
                                $empresas3 = $_REQUEST["empresa"];
                            }
                            if ($row['4'] === NULL) {
                                $mes4 = $mes3;
                                $idDocumento4 = $idDocumento3;
                                $empresas4 = $_REQUEST["empresa"];
                            } else {
                                $mes4 = $row['4'];
                                $idDocumento4 = $documents[$key]['4'];
                                $empresas4 = $_REQUEST["empresa"];
                            }
                            if ($row['5'] === NULL) {
                                $mes5 = $mes4;
                                $idDocumento5 = $idDocumento4;
                                $empresas5 = $_REQUEST["empresa"];
                            } else {
                                $mes5 = $row['5'];
                                $idDocumento5 = $documents[$key]['5'];
                                $empresas5 = $_REQUEST["empresa"];
                            }
                            if ($row['6'] === NULL) {
                                $mes6 = $mes5;
                                $idDocumento6 = $idDocumento5;
                                $empresas6 = $_REQUEST["empresa"];
                            } else {
                                $mes6 = $row['6'];
                                $idDocumento6 = $documents[$key]['6'];
                                $empresas6 = $_REQUEST["empresa"];
                            }
                            if ($row['7'] === NULL) {
                                $mes7 = $mes6;
                                $idDocumento7 = $idDocumento6;
                                $empresas7 = $_REQUEST["empresa"];
                            } else {
                                $mes7 = $row['7'];
                                $idDocumento7 = $documents[$key]['7'];
                                $empresas7 = $_REQUEST["empresa"];
                            }
                            if ($row['8'] === NULL) {
                                $mes8 = $mes7;
                                $idDocumento8 = $idDocumento7;
                                $empresas8 = $_REQUEST["empresa"];
                            } else {
                                $mes8 = $row['8'];
                                $idDocumento8 = $documents[$key]['8'];
                                $empresas8 = $_REQUEST["empresa"];
                            }
                            if ($row['9'] === NULL) {
                                $mes9 = $mes8;
                                $idDocumento9 = $idDocumento8;
                                $empresas9 = $_REQUEST["empresa"];
                            } else {
                                $mes9 = $row['9'];
                                $idDocumento9 = $documents[$key]['9'];
                                $empresas9 = $_REQUEST["empresa"];
                            }
                            if ($row['10'] === NULL) {
                                $mes10 = $mes9;
                                $idDocumento10 = $idDocumento9;
                                $empresas10 = $_REQUEST["empresa"];
                            } else {
                                $mes10 = $row['10'];
                                $idDocumento10 = $documents[$key]['10'];
                                $empresas10 = $_REQUEST["empresa"];
                            }
                            if ($row['11'] === NULL) {
                                $mes11 = $mes10;
                                $idDocumento11 = $idDocumento10;
                                $empresas11 = $_REQUEST["empresa"];
                            } else {
                                $mes11 = $row['11'];
                                $idDocumento11 = $documents[$key]['11'];
                                $empresas11 = $_REQUEST["empresa"];
                            }
                            if ($row['12'] === NULL) {
                                $mes12 = $mes11;
                                $idDocumento12 = $idDocumento11;
                                $empresas12 = $_REQUEST["empresa"];
                            } else {
                                $mes12 = $row['12'];
                                $idDocumento12 = $documents[$key]['12'];
                                $empresas12 = $_REQUEST["empresa"];
                            }
                        }


                    ?>
                        <tr>
                            <th><?= $row['CIDPRODUCTO']; ?></th>
                            <th><?= $row['CCODIGOPRODUCTO']; ?></th>
                            <th><?= $row['CNOMBREPRODUCTO'] ?></th>
                            <td style="font-weight:bold">$<?= number_format($mes1, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento1 . "," . "'" . strtoupper($empresas1) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes2, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento2 . "," . "'" . strtoupper($empresas2) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes3, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento3 . "," . "'" . strtoupper($empresas3) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes4, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento4 . "," . "'" . strtoupper($empresas4) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes5, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento5 . "," . "'" . strtoupper($empresas5) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes6, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento6 . "," . "'" . strtoupper($empresas6) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes7, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento7 . "," . "'" . strtoupper($empresas7) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes8, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento8 . "," . "'" . strtoupper($empresas8) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes9, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento9 . "," . "'" . strtoupper($empresas9) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes10, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento10 . "," . "'" . strtoupper($empresas10) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes11, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento11 . "," . "'" . strtoupper($empresas11) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                            <td style="font-weight:bold">$<?= number_format($mes12, 2) ?><button class="btn" onclick="obtenerDatosCompra(<?php echo $idDocumento12 . "," . "'" . strtoupper($empresas12) . "'" ?>);"><i class="fa fa-plus" style="color:#005794"></i></button></td>
                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateUltimosCostos();

            ?>
        </div>
<?php
    }
}

?>