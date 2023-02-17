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
                                        <h5 class="m-b-10">Objetivos</h5>
                                        <p class="m-b-0">Definición de Objetivos Por Agente</p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Definición de Objetivos</a>
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
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#005794;font-size:22px">

                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>




                                                                <div class="table-filter">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">


                                                                            <div class="filter-group">
                                                                                <label>Canal Comercial</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control" id="canal" onchange="cargarDefinicionObjetivos(1);">
                                                                                    <option value="">Todos</option>
                                                                                    <option value="CEDIS">Cedis</option>
                                                                                    <option value="FLOTILLAS">Flotillas</option>
                                                                                    <option value="E-COMMERCE">E-Commerce</option>
                                                                                    <option value="TIENDAS">Tiendas</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Mostrar</label>
                                                                                <select class="form-control" id="per_page" onchange="cargarDefinicionObjetivos(1);">

                                                                                    <option selected="">15</option>
                                                                                    <option>20</option>
                                                                                    <option>50</option>
                                                                                    <option>100</option>
                                                                                    <option>500</option>
                                                                                    <option>1000</option>
                                                                                    <option>1500</option>
                                                                                    <option>2000</option>
                                                                                </select>

                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroAgente"><i class="fa fa-plus"></i> Nuevo</button>
                                                                            </div>

                                                                        </div>



                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="objetivosData">

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
<!-- Modal Edicion-->
<div class="modal fade" id="edicionAgente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header backgroundModal">
                <h5 class="modal-title">Actualización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formActualizarAgente" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="idAgente" placeholder="">
                        <label>Nombre Agente</label>
                        <input type="text" class="form-control" id="nombreAgente" placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Canal Comercial</label>
                        <select name="canalComercial" id="canalComercial" class="form-control">
                            <option value="CEDIS">Cedis</option>
                            <option value="FLOTILLAS">Flotillas</option>
                            <option value="E-COMMERCE">E-commerce</option>
                            <option value="TIENDAS">Tiendas</option>
                        </select>
                        <div class="msg"></div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- Modal Registro-->
<div class="modal fade" id="registroAgente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header backgroundModal">
                <h5 class="modal-title">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formRegistroAgente" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombreAgente">Nombre Agente</label>
                        <input type="text" class="form-control" id="nombreAgenteRegistro" placeholder="" style="text-transform:uppercase;" required>
                    </div>

                    <div class="form-group">
                        <label for="nombreCanalComercial">Canal Comercial</label>

                        <select name="canalComercialRegistro" id="canalComercialRegistro" class="form-control">
                            <option value="CEDIS">Cedis</option>
                            <option value="FLOTILLAS">Flotillas</option>
                            <option value="E-COMMERCE">E-commerce</option>
                            <option value="TIENDAS">Tiendas</option>
                        </select>
                        <div class="msg"></div>
                    </div>
                    <div class="form-group">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>