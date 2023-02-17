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
                                        <h5 class="m-b-10">OBJETIVOS 2023</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Objetivos de Venta Canal</a>
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

                                                        <div class="card-block table-border-style">
                                                            <div class="table-wrapper">
                                                                <div class="table-title" style="margin-top:-80px">
                                                                    <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#005794;font-size:22px">

                                                                    </div>

                                                                </div>
                                                                <div class="table-filter filterParams">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                                                            <div class="filter-group">
                                                                                <a href="dashboard2">
                                                                                    <div class="homeCircle">
                                                                                        <center><i class="fa fa-home fa-2x"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Año</label>

                                                                                <select class="form-control" id="anio" onchange="cargarObjetivosCanal(1);">

                                                                                    <option value="2023" selected="">2023</option>
                                                                                    <option value="2024">2024</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Mes</label>

                                                                                <select class="form-control" id="mesObjetivo" onchange="cargarObjetivosCanal(1);">


                                                                                    <option value="1">Enero</option>
                                                                                    <option value="2">Febrero</option>
                                                                                    <option value="3">Marzo</option>
                                                                                    <option value="4">Abril</option>
                                                                                    <option value="5">Mayo</option>
                                                                                    <option value="6">Junio</option>
                                                                                    <option value="7">Julio</option>
                                                                                    <option value="8">Agosto</option>
                                                                                    <option value="9">Septiembre</option>
                                                                                    <option value="10">Octubre</option>
                                                                                    <option value="11">Noviembre</option>
                                                                                    <option value="12">Diciembre</option>


                                                                                </select>
                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <span>Mostrar</span>
                                                                                <select class="form-control" id="per_page" onchange="cargarObjetivosCanal(1);">

                                                                                    <option>15</option>
                                                                                    <option>20</option>
                                                                                    <option>50</option>
                                                                                    <option selected="">100</option>
                                                                                    <option>500</option>
                                                                                    <option>1000</option>
                                                                                    <option>1500</option>
                                                                                    <option>2000</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Campo Orden</span>
                                                                                <select class="form-control" id="campoOrden" onchange="cargarObjetivosCanal(1);">
                                                                                    <option value="canalComercial">Canal Comercial</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Orden</span>
                                                                                <select class="form-control" id="orden" onchange="cargarObjetivosCanal(1);">
                                                                                    <option value="asc">Asc</option>
                                                                                    <option value="desc">Desc</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn nestable-info" onclick="cargarObjetivosCanal(1)"> <i class="fa fa-refresh"></i>Actualizar</button>
                                                                            </div>
                                                                            <!--
                                                                            <div class="filter-group">
                                                                                <a onclick="generarReporteObjetivos('objetivosVentas')"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>
                                                                            </div>
-->
                                                                        </div>

                                                                        <div class="col-sm-3 text-right">
                                                                            <div class="show-entries">


                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="objetivosCanalData dataParams">

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