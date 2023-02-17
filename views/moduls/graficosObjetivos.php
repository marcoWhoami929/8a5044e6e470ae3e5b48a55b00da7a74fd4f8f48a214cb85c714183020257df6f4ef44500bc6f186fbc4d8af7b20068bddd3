<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">
                    <!-- Page-header start -->

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
                                                            <div class="table-filter filterParams">
                                                                <div class="row">

                                                                    <div class="col-lg-12 col-md-12 col-sm-12">


                                                                        <div class="filter-group">
                                                                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                            <label>Año</label>

                                                                            <select class="form-control" id="anio" onchange="cargarObjetivos(1);">

                                                                                <option value="2023" selected="">2023</option>
                                                                                <option value="2024">2024</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="filter-group">
                                                                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                            <label>Mes</label>

                                                                            <select class="form-control" id="mesObjetivo" onchange="cargarObjetivos(1);">


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
                                                                            <div class="form-group">

                                                                                <button class="btn btn-primary" type="button" onClick="dataObjetivosDashboard()">Actualizar</button>
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
                                        <div class="container col-lg-12 col-xl-12 col-md-12" style="margin-bottom:100px">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoObjetivosvsVentas"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoObjetivosvsVentasAcumulado"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoObjetivosvsVentasCanal"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoObjetivosvsVentasAcumuladoCanal"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoObjetivos"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <figure class="highcharts-figure-sped">
                                                        <div id="graficoIndicadorPronostico"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <figure class="highcharts-figure-sped">
                                                        <div id="graficoIndicadorPronosticoAcumulado"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoObjetivosAcumulado"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoObjetivosCanal"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoObjetivosCanalAcumulado"></div>

                                                    </figure>
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
        </div>
    </div>
</div>
</div>
<style>
    #graficoObjetivos {
        width: 100%;
        height: 500px;
    }

    #graficoObjetivosvsVentas {
        width: 100%;
        height: 500px;
    }

    #graficoObjetivosvsVentasAcumulado {
        width: 100%;
        height: 500px;
    }


    #graficoObjetivosvsVentasCanal {
        width: 100%;
        height: 500px;
    }

    #graficoObjetivosvsVentasAcumuladoCanal {
        width: 100%;
        height: 500px;
    }

    #graficoObjetivosAcumulado {
        width: 100%;
        height: 500px;
    }

    #graficoObjetivosCanal {
        width: 100%;
        height: 500px;
    }

    #graficoObjetivosCanalAcumulado {
        width: 100%;
        height: 500px;
    }

    #graficoIndicadorPronostico {
        width: 100%;
        height: 400px;
    }

    #graficoIndicadorPronosticoAcumulado {
        width: 100%;
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    /***GRAFICO OBJETIVOS VS VENTA */
</style>