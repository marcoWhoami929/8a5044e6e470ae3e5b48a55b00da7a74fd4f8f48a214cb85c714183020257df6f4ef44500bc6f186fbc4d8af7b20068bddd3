<?php
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'listadoProductosEcommerce') {

    include_once('../clases/dataInventarios.php');
    $database = new dataInventarios();
    //Recibir variables enviadas
    $estatusFacebook = strip_tags($_REQUEST['estatusFacebook']);
    $categoria = strip_tags($_REQUEST['categoria']);
    $clasificacion = strip_tags($_REQUEST['clasificacion']);
    $almacen = strip_tags($_REQUEST['almacen']);
    $almacen2 = strip_tags($_REQUEST['almacen2']);
    $producto = strip_tags($_REQUEST['producto']);
    $marca = strip_tags($_REQUEST['marca']);
    $campoOrden = strip_tags($_REQUEST['campoOrden']);
    $orden = strip_tags($_REQUEST['orden']);
    $utilidad = strip_tags($_REQUEST['utilidad']);
    $utilidadMl = strip_tags($_REQUEST['utilidadMl']);
    $periodo = strip_tags($_REQUEST['periodo']);
    $vista = strip_tags($_REQUEST['vista']);
    $per_page = intval($_REQUEST['per_page']);

    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("periodo" => $periodo, "utilidad" => $utilidad, "utilidadMl" => $utilidadMl, "estatusFacebook" => $estatusFacebook, "categoria" => $categoria, "clasificacion" => $clasificacion, "almacen" => $almacen, "almacen2" => $almacen2, "producto" => $producto, "marca" => $marca, "per_page" => $per_page, "offset" => $offset, "campoOrden" => $campoOrden, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getListaProductosEcommerce($campos, $search);
    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);


    //Recorrer los datos recuperados

    if ($numrows > 0) {
?><div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead id="fixedHead">
                    <tr>
                        <th>#</th>
                        <th>MARCA</th>
                        <th>CODIGO</th>
                        <th>PRODUCTO</th>
                        <th>UNID/MED</th>
                        <th>UNIDADES</th>
                        <th>CLASIF</th>
                        <th style="width:150px">EXISTENCIA</th>
                        <th style="background:#33FF96">PRECIO PUBLICO</th>
                        <th style="background:#33FF96">COSTO</th>
                        <th style="background:#33FF96">UTILIDAD</th>
                        <th style="background:#FF7D33">CARGO CATEGORIA</th>
                        <th style="background:#FF7D33">CARGO ENVIO</th>
                        <th style="background:#FF7D33">VENTA ML</th>
                        <th style="background:#FF7D33">%UTILIDAD ML</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $num = 0;

                    foreach ($datos as $key => $row) {
                        $precio = $row['PRECIO'];
                        $costo = $row['COSTOIVA'];
                        $utilidad = $row['UTILIDAD'];
                        $comision = $row['COMISION'];;
                        $envio = $row['ENVIO'];
                        $ventaMl = $row['VENTAML'];
                        $utilidadMl = $row['UTILIDADML'];

                        if ($row["ESTATUS"] == 'Activo') {
                            $background = "";
                            $color = "";
                            $color2 = "#00BCD4";
                        } else {
                            $background = "#FF3A3A";
                            $color = "#FFFFFF";
                            $color2 = "#FFFFFF";
                        }
                    ?>
                        <tr>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:140px"><?= $row['CIDPRODUCTO'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:140px"><?= $row['MARCA'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:140px"><?= $row['CCODIGOPRODUCTO']; ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:lighter;text-align:left;width:200px"><?= $row['CNOMBREUNIDAD'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px">1</td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px"><?= $row['CLASIFICACION'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:lighter;text-align:left;width:150px"><?= $row['EXISTENCIA'] ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:lighter;text-align:left;width:200px">$ <?= number_format($row['PRECIO'], 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:lighter;text-align:left;width:200px">$ <?= $costo ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">% <?= bcdiv($utilidad, '1', 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">$ <?= number_format($comision, 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">$ <?= number_format($envio, 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">$ <?= number_format($ventaMl, 2) ?></td>
                            <td style="background:<?php echo $background ?>;color:<?php echo $color ?>;font-weight:bold;text-align:left;width:200px;color:<?php echo $color2 ?>">% <?= bcdiv($utilidadMl, '1', 2) ?></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
            echo $pagination->paginateInventarios($vista);

            ?>
        </div>
    <?php
    }
}
?>