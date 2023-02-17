<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">

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

                                                                </div>

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:white;font-size:22px">

                                                                </div>


                                                                <div class="table-filter">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="filter-group">
                                                                                <a href="objetivos">
                                                                                    <div class="homeCircle">
                                                                                        <center><i class="fa fa-home fa-2x"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <label>Mostrar</label>
                                                                                <select class="form-control" id="per_page" onchange="cargarDetalleVentasClienteObjetivos(1);">

                                                                                    <option>15</option>
                                                                                    <option>20</option>
                                                                                    <option>50</option>
                                                                                    <option>100</option>
                                                                                    <option>500</option>
                                                                                    <option>1000</option>
                                                                                    <option>1500</option>
                                                                                    <option>2000</option>
                                                                                    <option selected="">5000</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Campo Orden</span>
                                                                                <select class="form-control" id="campoOrden" onchange="cargarDetalleVentasClienteObjetivos(1);">
                                                                                    <option value="CNOMBRECONCEPTO">Concepto</option>
                                                                                    <option value="NombreCliente">Cliente</option>
                                                                                    <option value="CFECHA">Fecha</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Orden</span>
                                                                                <select class="form-control" id="orden" onchange="cargarDetalleVentasClienteObjetivos(1);">
                                                                                    <option value="asc">Asc</option>
                                                                                    <option value="desc">Desc</option>


                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <a onclick="generarReporteVentasClienteObjetivos('ventasClienteObjetivos')"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-3 text-right">
                                                                            <div class="show-entries">


                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="container">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12 col-sm-12 col-md-12">
                                                                        <div class="px-0 pt-0 pb-0 mt-0 mb-3">
                                                                            <form id="form">
                                                                                <ul id="progressbar">


                                                                                    <li class="active" id="step1">
                                                                                        <strong>Ventas Clientes</strong>
                                                                                    </li>


                                                                                </ul>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar"></div>
                                                                                </div> <br>
                                                                                <fieldset id="detailSales">
                                                                                    <div class="ventasDetalleClientes">

                                                                                    </div>
                                                                                    <input type="button" id="next-step" name="next-step" class="next-step btn btn-primary" value="" />
                                                                                </fieldset>

                                                                            </form>
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
                        <div id="styleSelector"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    h2 {
        color: #005794;
    }

    #form {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #form fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .finish {
        text-align: center
    }

    #form fieldset:not(:first-of-type) {
        display: none
    }



    .text {
        color: #005794;
        font-weight: normal
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #005794
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #step0 {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: #005794;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar #step1:before {
        content: "1"
    }

    #progressbar #step2:before {
        content: "2"
    }

    #progressbar #step3:before {
        content: "3"
    }

    #progressbar #step4:before {
        content: "4"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #005794
    }

    .progress {
        height: 10px
    }

    .progress-bar {
        background-color: #005794
    }
</style>