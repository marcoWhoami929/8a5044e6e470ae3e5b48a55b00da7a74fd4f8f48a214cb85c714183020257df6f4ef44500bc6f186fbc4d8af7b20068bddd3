<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">ANALISIS DE VENTAS</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Ventas Por Agente Anual</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3>Ventas Por Agente Anual</h3>
                                                            <small>*Atajo Para Buscador Clientes: <strong>CTRL + B</strong></small>
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li>
                                                                        <i class="fa fa fa-wrench open-card-option"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-window-maximize full-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-minus minimize-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-refresh reload-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-trash close-card"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-block table-border-style">
                                                            <div class="table-wrapper">
                                                                <div class="table-title">
                                                                    <div class="row">

                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('clienteAnual')" title="Ventas Por Cliente">
                                                                            <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                                                                        </div>


                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('canalAnual')" title="Ventas Por Canal">
                                                                            <i class="fa fa-bookmark fa-3x" aria-hidden="true"></i>
                                                                        </div>

                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('agenteAnual')" title="Ventas Por Agente">
                                                                            <i class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('productoAnual')" title="Ventas Por Producto">
                                                                            <i class="fa fa-archive fa-3x" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('productoLitreadoAnual')" title="Ventas Por Producto Litreado">
                                                                            <i class="fa fa-eyedropper fa-3x" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('marcaAnual')" title="Ventas Por Marca">
                                                                            <i class="fa fa-sitemap fa-3x" aria-hidden="true"></i>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#005794;font-size:22px">

                                                                </div>


                                                                <div class="table-filter filterParams">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">


                                                                            <div style="width: 70%; margin: auto;">

                                                                                <input id="arregloClientes">



                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <a href="dashboard2">
                                                                                    <div class="homeCircle">
                                                                                        <center><i class="fa fa-home fa-2x"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Estatus</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control" id="estatus" onchange="cargarVentasAgenteAnual(1);">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Agente</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control selectorAgentes" name="agente[]" multiple="multiple" id="agente">
                                                                                    <option value="">Todos</option>
                                                                                    <?php

                                                                                    $agente = new ModelAdmon();
                                                                                    $agentes = $agente->mdlObtenerListaAgentes();

                                                                                    foreach ($agentes as $key => $value) {
                                                                                        echo "<option value='" . $value["CNOMBREAGENTE"] . "'>" . $value['CNOMBREAGENTE'] . "</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Centro</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control selectorCentro" name="centro[]" multiple="multiple" id="centroTrabajo">
                                                                                    <option value="">Todos</option>
                                                                                    <?php

                                                                                    $centroTrabajo = new ModelAdmon();
                                                                                    $listaCentros = $centroTrabajo->mdlListarCentrosTrabajo();
                                                                                    foreach ($listaCentros as $key => $value) {
                                                                                        if ($value["CCENTROTRABAJO"] == "") {
                                                                                            $centro = "VACIO";
                                                                                        } else {
                                                                                            $centro = $value["CCENTROTRABAJO"];
                                                                                        }

                                                                                        echo "<option value='" . $centro . "'>" . $value["CCENTROTRABAJO"] . "</option>";
                                                                                    }

                                                                                    ?>
                                                                                </select>

                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Canal</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control selectorCanal" name="canal[]" multiple="multiple" id="canal">
                                                                                    <option value="">Todos</option>
                                                                                    <?php

                                                                                    $canalComercial = new ModelAdmon();
                                                                                    $canales = $canalComercial->mdlListarCanalesComerciales();
                                                                                    foreach ($canales as $key => $value) {
                                                                                        if ($value["CCANALCOMERCIAL"] == "") {
                                                                                            $canal = "VACIO";
                                                                                        } else {
                                                                                            $canal = $value["CCANALCOMERCIAL"];
                                                                                        }

                                                                                        echo "<option value=" . $canal . ">" . $value["CCANALCOMERCIAL"] . "</option>";
                                                                                    }

                                                                                    ?>
                                                                                </select>

                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <button type="button" id="searchClient" class="btn btn-primary" data-toggle="modal" data-target="#modalClientes"> <i class="fa fa-search"></i>Buscar cliente</button>


                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <span>Mostrar</span>
                                                                                <select class="form-control" id="per_page" onchange="cargarVentasAgenteAnual(1);">

                                                                                    <option>15</option>
                                                                                    <option>20</option>
                                                                                    <option>50</option>
                                                                                    <option>100</option>
                                                                                    <option selected="">500</option>
                                                                                    <option>1000</option>
                                                                                    <option>1500</option>
                                                                                    <option>2000</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Campo Orden</span>
                                                                                <select class="form-control" id="campoOrden" onchange="cargarVentasAgenteAnual(1);">
                                                                                    <option value="monto">Total General</option>
                                                                                    <option value="agente">Agente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Orden</span>
                                                                                <select class="form-control" id="orden" onchange="cargarVentasAgenteAnual(1);">
                                                                                    <option value="desc">Desc</option>
                                                                                    <option value="asc">Asc</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <a onclick="generarReporteAnual('ventasAgenteAnual')"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <a onclick="limpiarFiltros('1')"><i class="fa fa-trash fa-3x" aria-hidden="true"></i></a>
                                                                            </div>

                                                                        </div>

                                                                        <div class="col-sm-3 text-right">
                                                                            <div class="show-entries">


                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="ventasAgenteAnualData dataParams">

                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12"></div>
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <input type="text" class="form-control" id="nombreClienteSearch" placeholder="Buscar cliente" onkeyup="loadClients(1)">
                                <input type="hidden" class="form-control" id="clasificacionVenta">
                                <input type="hidden" class="form-control" id="clasificacionVenta2">

                            </div>

                        </div>
                    </div>
                </form>
                <div id="loader2" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
                <div class="outer_div"></div><!-- Datos ajax Final -->
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /*ACCESOS DIRECTOS CLIENTES*/
    shortcut.add("Ctrl+B", function() {
        document.getElementById("searchClient").click();
    });

    /**ELIMINAR ELEMENTOS ARREGLO CLIENTES */
    $('#arregloClientes').tagEditor({
        initialTags: JSON.parse(localStorage.getItem("arrayClientes")),
        delimiter: ', ',
        forceLowercase: false,
        beforeTagDelete: function(field, editor, tags, val) {
            var arrayClientes = localStorage.getItem("arrayClientes");
            removeItemFromArregloBusqueda(arrayClientes, val, "arrayClientes")
        }

    });
</script>