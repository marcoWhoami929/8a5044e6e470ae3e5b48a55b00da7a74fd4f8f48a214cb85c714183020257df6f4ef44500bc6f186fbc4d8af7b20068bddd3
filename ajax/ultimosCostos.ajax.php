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
        case "DEKKERLAB":
            include('../clases/ultimosCostosDekkerlab.php');
            $database = new ultimosCostosDekkerlab();
            break;
    }

    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $marcas = strip_tags($_REQUEST['marcas']);
    $año = strip_tags($_REQUEST['anioCostos']);
    $per_page = intval($_REQUEST['per_page']);
    $campoOrden = strip_tags($_REQUEST['campoOrden']);
    $orden = strip_tags($_REQUEST['orden']);
    $estatus = strip_tags($_REQUEST["estatus"]);
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "marcas" => $marcas, "año" => $año, "estatus" => $estatus, "per_page" => $per_page, "offset" => $offset, "campo" => $campoOrden, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getData($search);

    $documents = $database->getIdDocuments($search);

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

                        if ($año == '2013') {

                            $mes1 = $row['1'];
                            $idDocumento1 = $documents[$key]['1'];
                            $empresas1 = $_REQUEST["empresa"];
                            $mes2 = $row['2'];
                            $idDocumento2 = $documents[$key]['2'];
                            $empresas2 = $_REQUEST["empresa"];
                            $mes3 = $row['3'];
                            $idDocumento3 = $documents[$key]['3'];
                            $empresas3 = $_REQUEST["empresa"];
                            $mes4 = $row['4'];
                            $idDocumento4 = $documents[$key]['4'];
                            $empresas4 = $_REQUEST["empresa"];
                            $mes5 = $row['5'];
                            $idDocumento5 = $documents[$key]['5'];
                            $empresas5 = $_REQUEST["empresa"];
                            $mes6 = $row['6'];
                            $idDocumento6 = $documents[$key]['6'];
                            $empresas6 = $_REQUEST["empresa"];
                            $mes7 = $row['7'];
                            $idDocumento7 = $documents[$key]['7'];
                            $empresas7 = $_REQUEST["empresa"];
                            $mes8 = $row['8'];
                            $idDocumento8 = $documents[$key]['8'];
                            $empresas8 = $_REQUEST["empresa"];
                            $mes9 = $row['9'];
                            $idDocumento9 = $documents[$key]['9'];
                            $empresas9 = $_REQUEST["empresa"];
                            $mes10 = $row['10'];
                            $idDocumento10 = $documents[$key]['10'];
                            $empresas10 = $_REQUEST["empresa"];
                            $mes11 = $row['11'];
                            $idDocumento11 = $documents[$key]['11'];
                            $empresas11 = $_REQUEST["empresa"];
                            $mes12 = $row['12'];
                            $idDocumento12 = $documents[$key]['12'];
                            $empresas12 = $_REQUEST["empresa"];
                        } else if ($año == '2022' || $año == '2023' and $empresa == 'DEKKERLAB') {
                            $añoAnterior = intval($año) - 1;
                            $codigo = $row["CCODIGOPRODUCTO"];
                            if ($row['1'] === '0.0' || $row['1']  === NULL) {


                                if ($año == '2023') {

                                    $ultimoCostoDekkerlabPeriodo1 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $añoAnterior, 12);

                                    if ($ultimoCostoDekkerlabPeriodo1 != false) {

                                        $mes1 = $ultimoCostoDekkerlabPeriodo1["CULTIMOCOSTOH"];
                                        $idDocumento1 = $ultimoCostoDekkerlabPeriodo1["CIDDOCUMENTO"];
                                        $empresas1 = 'DEKKERLAB';
                                    } else {

                                        $ultimoCostoDekkerlab = $database->getUltimoCostoDekkerlab($codigo, $año);
                                        if ($ultimoCostoDekkerlab != false) {
                                            $mes1 = $ultimoCostoDekkerlab["CULTIMOCOSTOH"];
                                            $idDocumento1 = $ultimoCostoDekkerlab["CIDDOCUMENTO"];
                                            $empresas1 = 'DEKKERLAB';
                                        } else {

                                            $ultimoCostoPinturas = $database->getUltimoCostoPinturas($codigo, $año);
                                            $mes1 = $ultimoCostoPinturas["CULTIMOCOSTOH"];
                                            $idDocumento1 = $ultimoCostoPinturas["CIDDOCUMENTO"];
                                            $empresas1 = 'PINTURAS';
                                        }
                                    }
                                } else {

                                    $ultimoCostoDekkerlabPeriodo1 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $añoAnterior, 12);

                                    if ($ultimoCostoDekkerlabPeriodo1 != false) {

                                        $mes1 = $ultimoCostoDekkerlabPeriodo1["CULTIMOCOSTOH"];
                                        $idDocumento1 = $ultimoCostoDekkerlabPeriodo1["CIDDOCUMENTO"];
                                        $empresas1 = 'DEKKERLAB';
                                    } else {
                                        $ultimoCostoPinturas = $database->getUltimoCostoPinturas($codigo, $año);
                                        $mes1 = $ultimoCostoPinturas["CULTIMOCOSTOH"];
                                        $idDocumento1 = $ultimoCostoPinturas["CIDDOCUMENTO"];
                                        $empresas1 = 'PINTURAS';
                                    }
                                }
                            } else {

                                $mes1 = $row['1'];
                                $idDocumento1 = $documents[$key]['1'];
                                $empresas1 = 'DEKKERLAB';
                            }


                            if ($row['2'] === NULL || $row['2'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo2 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 2);

                                if ($ultimoCostoDekkerlabPeriodo2 != false) {
                                    $mes2 = $ultimoCostoDekkerlabPeriodo2["CULTIMOCOSTOH"];
                                    $idDocumento2 = $ultimoCostoDekkerlabPeriodo2["CIDDOCUMENTO"];
                                    $empresas2 = 'DEKKERLAB';
                                } else {
                                    $mes2 = $mes1;
                                    $idDocumento2 = $idDocumento1;
                                    $empresas2 = $empresas1;
                                }
                            } else {
                                $mes2 = $row['2'];
                                $idDocumento2 = $documents[$key]['2'];
                                $empresas2 = 'DEKKERLAB';
                            }

                            if ($row['3'] === NULL || $row['3'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo3 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 3);

                                if ($ultimoCostoDekkerlabPeriodo3 != false) {
                                    $mes3 = $ultimoCostoDekkerlabPeriodo3["CULTIMOCOSTOH"];
                                    $idDocumento3 = $ultimoCostoDekkerlabPeriodo3["CIDDOCUMENTO"];
                                    $empresas3 = 'DEKKERLAB';
                                } else {
                                    $mes3 = $mes2;
                                    $idDocumento3 = $idDocumento2;
                                    $empresas3 = $empresas2;
                                }
                            } else {
                                $mes3 = $row['3'];
                                $idDocumento3 = $documents[$key]['3'];
                                $empresas3 = 'DEKKERLAB';
                            }
                            if ($row['4'] === NULL || $row['4'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo4 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 4);

                                if ($ultimoCostoDekkerlabPeriodo4 != false) {
                                    $mes4 = $ultimoCostoDekkerlabPeriodo4["CULTIMOCOSTOH"];
                                    $idDocumento4 = $ultimoCostoDekkerlabPeriodo4["CIDDOCUMENTO"];
                                    $empresas4 = 'DEKKERLAB';
                                } else {
                                    $mes4 = $mes3;
                                    $idDocumento4 = $idDocumento3;
                                    $empresas4 = $empresas3;
                                }
                            } else {
                                $mes4 = $row['4'];
                                $idDocumento4 = $documents[$key]['4'];
                                $empresas4 = 'DEKKERLAB';
                            }
                            if ($row['5'] === NULL || $row['5'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo5 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 5);

                                if ($ultimoCostoDekkerlabPeriodo5 != false) {
                                    $mes5 = $ultimoCostoDekkerlabPeriodo5["CULTIMOCOSTOH"];
                                    $idDocumento5 = $ultimoCostoDekkerlabPeriodo5["CIDDOCUMENTO"];
                                    $empresas5 = 'DEKKERLAB';
                                } else {
                                    $mes5 = $mes4;
                                    $idDocumento5 = $idDocumento4;
                                    $empresas5 = $empresas4;
                                }
                            } else {
                                $mes5 = $row['5'];
                                $idDocumento5 = $documents[$key]['5'];
                                $empresas5 = 'DEKKERLAB';
                            }
                            if ($row['6'] === NULL || $row['6'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo6 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 6);

                                if ($ultimoCostoDekkerlabPeriodo6 != false) {
                                    $mes6 = $ultimoCostoDekkerlabPeriodo6["CULTIMOCOSTOH"];
                                    $idDocumento6 = $ultimoCostoDekkerlabPeriodo6["CIDDOCUMENTO"];
                                    $empresas6 = 'DEKKERLAB';
                                } else {
                                    $mes6 = $mes5;
                                    $idDocumento6 = $idDocumento5;
                                    $empresas6 = $empresas5;
                                }
                            } else {
                                $mes6 = $row['6'];
                                $idDocumento6 = $documents[$key]['6'];
                                $empresas6 = 'DEKKERLAB';
                            }
                            if ($row['7'] === NULL || $row['7'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo7 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 7);

                                if ($ultimoCostoDekkerlabPeriodo7 != false) {
                                    $mes7 = $ultimoCostoDekkerlabPeriodo7["CULTIMOCOSTOH"];
                                    $idDocumento7 = $ultimoCostoDekkerlabPeriodo7["CIDDOCUMENTO"];
                                    $empresas7 = 'DEKKERLAB';
                                } else {
                                    $mes7 = $mes6;
                                    $idDocumento7 = $idDocumento6;
                                    $empresas7 = $empresas6;
                                }
                            } else {
                                $mes7 = $row['7'];
                                $idDocumento7 = $documents[$key]['7'];
                                $empresas7 = 'DEKKERLAB';
                            }
                            if ($row['8'] === NULL || $row['8'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo8 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 8);

                                if ($ultimoCostoDekkerlabPeriodo8 != false) {
                                    $mes8 = $ultimoCostoDekkerlabPeriodo8["CULTIMOCOSTOH"];
                                    $idDocumento8 = $ultimoCostoDekkerlabPeriodo8["CIDDOCUMENTO"];
                                    $empresas8 = 'DEKKERLAB';
                                } else {
                                    $mes8 = $mes7;
                                    $idDocumento8 = $idDocumento7;
                                    $empresas8 = $empresas7;
                                }
                            } else {
                                $mes8 = $row['8'];
                                $idDocumento8 = $documents[$key]['8'];
                                $empresas8 = 'DEKKERLAB';
                            }
                            if ($row['9'] === NULL || $row['9'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo9 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 9);

                                if ($ultimoCostoDekkerlabPeriodo9 != false) {
                                    $mes9 = $ultimoCostoDekkerlabPeriodo9["CULTIMOCOSTOH"];
                                    $idDocumento9 = $ultimoCostoDekkerlabPeriodo9["CIDDOCUMENTO"];
                                    $empresas9 = 'DEKKERLAB';
                                } else {
                                    $mes9 = $mes8;
                                    $idDocumento9 = $idDocumento8;
                                    $empresas9 = $empresas8;
                                }
                            } else {
                                $mes9 = $row['9'];
                                $idDocumento9 = $documents[$key]['9'];
                                $empresas9 = 'DEKKERLAB';
                            }
                            if ($row['10'] === NULL || $row['10'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo10 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 10);

                                if ($ultimoCostoDekkerlabPeriodo10 != false) {
                                    $mes10 = $ultimoCostoDekkerlabPeriodo10["CULTIMOCOSTOH"];
                                    $idDocumento10 = $ultimoCostoDekkerlabPeriodo10["CIDDOCUMENTO"];
                                    $empresas10 = 'DEKKERLAB';
                                } else {
                                    $mes10 = $mes9;
                                    $idDocumento10 = $idDocumento9;
                                    $empresas10 = $empresas9;
                                }
                            } else {
                                $mes10 = $row['10'];
                                $idDocumento10 = $documents[$key]['10'];
                                $empresas10 = 'DEKKERLAB';
                            }
                            if ($row['11'] === NULL || $row['11'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo11 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 11);

                                if ($ultimoCostoDekkerlabPeriodo11 != false) {
                                    $mes11 = $ultimoCostoDekkerlabPeriodo11["CULTIMOCOSTOH"];
                                    $idDocumento11 = $ultimoCostoDekkerlabPeriodo11["CIDDOCUMENTO"];
                                    $empresas11 = 'DEKKERLAB';
                                } else {
                                    $mes11 = $mes10;
                                    $idDocumento11 = $idDocumento10;
                                    $empresas11 = $empresas10;
                                }
                            } else {
                                $mes11 = $row['11'];
                                $idDocumento11 = $documents[$key]['11'];
                                $empresas11 = 'DEKKERLAB';
                            }
                            if ($row['12'] === NULL || $row['12'] === '0.0') {

                                $ultimoCostoDekkerlabPeriodo12 = $database->getUltimoCostoDekkerlabPeriodo($codigo, $año, 12);

                                if ($ultimoCostoDekkerlabPeriodo12 != false) {
                                    $mes12 = $ultimoCostoDekkerlabPeriodo12["CULTIMOCOSTOH"];
                                    $idDocumento12 = $ultimoCostoDekkerlabPeriodo12["CIDDOCUMENTO"];
                                    $empresas12 = 'DEKKERLAB';
                                } else {
                                    $mes12 = $mes11;
                                    $idDocumento12 = $idDocumento11;
                                    $empresas12 = $empresas11;
                                }
                            } else {
                                $mes12 = $row['12'];
                                $idDocumento12 = $documents[$key]['12'];
                                $empresas12 = 'DEKKERLAB';
                            }
                        } else if ($año <= '2021' and $empresa == 'DEKKERLAB') {


                            $codigo = $row["CCODIGOPRODUCTO"];

                            $ultimoCostoPinturasPeriodo1 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 1);

                            if ($ultimoCostoPinturasPeriodo1 != false) {
                                $mes1 = $ultimoCostoPinturasPeriodo1["CULTIMOCOSTOH"];
                                $idDocumento1 = $ultimoCostoPinturasPeriodo1["CIDDOCUMENTO"];
                                $empresas1 = 'PINTURAS';
                            } else {
                                $ultimoCostoPinturas = $database->getUltimoCostoPinturas($codigo, $año);
                                $mes1 = $ultimoCostoPinturas["CULTIMOCOSTOH"];
                                $idDocumento1 = $ultimoCostoPinturas["CIDDOCUMENTO"];
                                $empresas1 = 'PINTURAS';
                            }

                            $ultimoCostoPinturasPeriodo2 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 2);

                            if ($ultimoCostoPinturasPeriodo2 != false) {
                                $mes2 = $ultimoCostoPinturasPeriodo2["CULTIMOCOSTOH"];
                                $idDocumento2 = $ultimoCostoPinturasPeriodo2["CIDDOCUMENTO"];
                                $empresas2 = 'PINTURAS';
                            } else {
                                $mes2 = $mes1;
                                $idDocumento2 = $idDocumento1;
                                $empresas2 = $empresas1;
                            }

                            $ultimoCostoPinturasPeriodo3 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 3);
                            if ($ultimoCostoPinturasPeriodo3 != false) {
                                $mes3 = $ultimoCostoPinturasPeriodo3["CULTIMOCOSTOH"];
                                $idDocumento3 = $ultimoCostoPinturasPeriodo3["CIDDOCUMENTO"];
                                $empresas3 = 'PINTURAS';
                            } else {
                                $mes3 = $mes2;
                                $idDocumento3 = $idDocumento2;
                                $empresas3 = $empresas2;
                            }

                            $ultimoCostoPinturasPeriodo4 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 4);

                            if ($ultimoCostoPinturasPeriodo4 != false) {
                                $mes4 = $ultimoCostoPinturasPeriodo4["CULTIMOCOSTOH"];
                                $idDocumento4 = $ultimoCostoPinturasPeriodo4["CIDDOCUMENTO"];
                                $empresas4 = 'PINTURAS';
                            } else {
                                $mes4 = $mes3;
                                $idDocumento4 = $idDocumento3;
                                $empresas4 = $empresas3;
                            }

                            $ultimoCostoPinturasPeriodo5 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 5);

                            if ($ultimoCostoPinturasPeriodo5 != false) {
                                $mes5 = $ultimoCostoPinturasPeriodo5["CULTIMOCOSTOH"];
                                $idDocumento5 = $ultimoCostoPinturasPeriodo5["CIDDOCUMENTO"];
                                $empresas5 = 'PINTURAS';
                            } else {
                                $mes5 = $mes4;
                                $idDocumento5 = $idDocumento4;
                                $empresas5 = $empresas4;
                            }

                            $ultimoCostoPinturasPeriodo6 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 6);

                            if ($ultimoCostoPinturasPeriodo6 != false) {
                                $mes6 = $ultimoCostoPinturasPeriodo6["CULTIMOCOSTOH"];
                                $idDocumento6 = $ultimoCostoPinturasPeriodo6["CIDDOCUMENTO"];
                                $empresas6 = 'PINTURAS';
                            } else {
                                $mes6 = $mes5;
                                $idDocumento6 = $idDocumento5;
                                $empresas6 = $empresas5;
                            }

                            $ultimoCostoPinturasPeriodo7 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 7);

                            if ($ultimoCostoPinturasPeriodo7 != false) {
                                $mes7 = $ultimoCostoPinturasPeriodo7["CULTIMOCOSTOH"];
                                $idDocumento7 = $ultimoCostoPinturasPeriodo7["CIDDOCUMENTO"];
                                $empresas7 = 'PINTURAS';
                            } else {
                                $mes7 = $mes6;
                                $idDocumento7 = $idDocumento6;
                                $empresas7 = $empresas6;
                            }

                            $ultimoCostoPinturasPeriodo8 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 8);

                            if ($ultimoCostoPinturasPeriodo8 != false) {
                                $mes8 = $ultimoCostoPinturasPeriodo8["CULTIMOCOSTOH"];
                                $idDocumento8 = $ultimoCostoPinturasPeriodo8["CIDDOCUMENTO"];
                                $empresas8 = 'PINTURAS';
                            } else {
                                $mes8 = $mes7;
                                $idDocumento8 = $idDocumento7;
                                $empresas8 = $empresas7;
                            }

                            $ultimoCostoPinturasPeriodo9 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 9);

                            if ($ultimoCostoPinturasPeriodo9 != false) {
                                $mes9 = $ultimoCostoPinturasPeriodo9["CULTIMOCOSTOH"];
                                $idDocumento9 = $ultimoCostoPinturasPeriodo9["CIDDOCUMENTO"];
                                $empresas9 = 'PINTURAS';
                            } else {
                                $mes9 = $mes8;
                                $idDocumento9 = $idDocumento8;
                                $empresas9 = $empresas8;
                            }

                            $ultimoCostoPinturasPeriodo10 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 10);

                            if ($ultimoCostoPinturasPeriodo10 != false) {
                                $mes10 = $ultimoCostoPinturasPeriodo10["CULTIMOCOSTOH"];
                                $idDocumento10 = $ultimoCostoPinturasPeriodo10["CIDDOCUMENTO"];
                                $empresas10 = 'PINTURAS';
                            } else {
                                $mes10 = $mes9;
                                $idDocumento10 = $idDocumento9;
                                $empresas10 = $empresas9;
                            }

                            $ultimoCostoPinturasPeriodo11 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 11);

                            if ($ultimoCostoPinturasPeriodo11 != false) {
                                $mes11 = $ultimoCostoPinturasPeriodo11["CULTIMOCOSTOH"];
                                $idDocumento11 = $ultimoCostoPinturasPeriodo11["CIDDOCUMENTO"];
                                $empresas11 = 'PINTURAS';
                            } else {
                                $mes11 = $mes10;
                                $idDocumento11 = $idDocumento10;
                                $empresas11 = $empresas10;
                            }
                             if ($año == '2021') {

                                if ($row['12'] === '0.0' || $row['12'] === NULL) {
                                    $codigo = $row["CCODIGOPRODUCTO"];

                                    $ultimoCostoPinturasPeriodo12 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 12);

                                    if ($ultimoCostoPinturasPeriodo12 != false) {
                                        $mes12 = $ultimoCostoPinturasPeriodo12["CULTIMOCOSTOH"];
                                        $idDocumento12 = $ultimoCostoPinturasPeriodo12["CIDDOCUMENTO"];
                                        $empresas12 = 'PINTURAS';
                                    } else {
                                        $mes12 = $mes11;
                                        $idDocumento12 = $idDocumento11;
                                        $empresas12 = $empresas11;
                                    }
                                } else {

                                    $mes12 = $row['12'];
                                    $idDocumento12 = $documents[$key]['12'];
                                    $empresas12 = 'DEKKERLAB';
                                }
                            } else {

                                $ultimoCostoPinturasPeriodo12 = $database->getUltimoCostoPinturasPeriodo($codigo, $año, 12);

                                if ($ultimoCostoPinturasPeriodo12 != false) {
                                    $mes12 = $ultimoCostoPinturasPeriodo12["CULTIMOCOSTOH"];
                                    $idDocumento12 = $ultimoCostoPinturasPeriodo12["CIDDOCUMENTO"];
                                    $empresas12 = 'PINTURAS';
                                } else {
                                    $mes12 = $mes11;
                                    $idDocumento12 = $idDocumento11;
                                    $empresas12 = $empresas11;
                                }
                            }
                        } else {

                            if ($row['1'] === '0.0' || $row['1'] === NULL) {
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
                            if ($row['2'] === '0.0' || $row['2'] === NULL) {
                                $mes2 = $mes1;
                                $idDocumento2 = $idDocumento1;
                                $empresas2 = $_REQUEST["empresa"];
                            } else {
                                $mes2 = $row['2'];
                                $idDocumento2 = $documents[$key]['2'];
                                $empresas2 = $_REQUEST["empresa"];
                            }

                            if ($row['3'] === '0.0' || $row['3'] === NULL) {
                                $mes3 = $mes2;
                                $idDocumento3 = $idDocumento2;
                                $empresas3 = $_REQUEST["empresa"];
                            } else {
                                $mes3 = $row['3'];
                                $idDocumento3 = $documents[$key]['3'];
                                $empresas3 = $_REQUEST["empresa"];
                            }
                            if ($row['4'] === '0.0' || $row['4'] === NULL) {
                                $mes4 = $mes3;
                                $idDocumento4 = $idDocumento3;
                                $empresas4 = $_REQUEST["empresa"];
                            } else {
                                $mes4 = $row['4'];
                                $idDocumento4 = $documents[$key]['4'];
                                $empresas4 = $_REQUEST["empresa"];
                            }
                            if ($row['5'] === '0.0' || $row['5'] === NULL) {
                                $mes5 = $mes4;
                                $idDocumento5 = $idDocumento4;
                                $empresas5 = $_REQUEST["empresa"];
                            } else {
                                $mes5 = $row['5'];
                                $idDocumento5 = $documents[$key]['5'];
                                $empresas5 = $_REQUEST["empresa"];
                            }
                            if ($row['6'] === '0.0' || $row['6'] === NULL) {
                                $mes6 = $mes5;
                                $idDocumento6 = $idDocumento5;
                                $empresas6 = $_REQUEST["empresa"];
                            } else {
                                $mes6 = $row['6'];
                                $idDocumento6 = $documents[$key]['6'];
                                $empresas6 = $_REQUEST["empresa"];
                            }
                            if ($row['7'] === '0.0' || $row['7'] === NULL) {
                                $mes7 = $mes6;
                                $idDocumento7 = $idDocumento6;
                                $empresas7 = $_REQUEST["empresa"];
                            } else {
                                $mes7 = $row['7'];
                                $idDocumento7 = $documents[$key]['7'];
                                $empresas7 = $_REQUEST["empresa"];
                            }
                            if ($row['8'] === '0.0' || $row['8'] === NULL) {
                                $mes8 = $mes7;
                                $idDocumento8 = $idDocumento7;
                                $empresas8 = $_REQUEST["empresa"];
                            } else {
                                $mes8 = $row['8'];
                                $idDocumento8 = $documents[$key]['8'];
                                $empresas8 = $_REQUEST["empresa"];
                            }
                            if ($row['9'] === '0.0' || $row['9'] === NULL) {
                                $mes9 = $mes8;
                                $idDocumento9 = $idDocumento8;
                                $empresas9 = $_REQUEST["empresa"];
                            } else {
                                $mes9 = $row['9'];
                                $idDocumento9 = $documents[$key]['9'];
                                $empresas9 = $_REQUEST["empresa"];
                            }
                            if ($row['10'] === '0.0' || $row['10'] === NULL) {
                                $mes10 = $mes9;
                                $idDocumento10 = $idDocumento9;
                                $empresas10 = $_REQUEST["empresa"];
                            } else {
                                $mes10 = $row['10'];
                                $idDocumento10 = $documents[$key]['10'];
                                $empresas10 = $_REQUEST["empresa"];
                            }
                            if ($row['11'] === '0.0' || $row['11'] === NULL) {
                                $mes11 = $mes10;
                                $idDocumento11 = $idDocumento10;
                                $empresas11 = $_REQUEST["empresa"];
                            } else {
                                $mes11 = $row['11'];
                                $idDocumento11 = $documents[$key]['11'];
                                $empresas11 = $_REQUEST["empresa"];
                            }
                            if ($row['12'] === '0.0' || $row['12'] === NULL) {
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