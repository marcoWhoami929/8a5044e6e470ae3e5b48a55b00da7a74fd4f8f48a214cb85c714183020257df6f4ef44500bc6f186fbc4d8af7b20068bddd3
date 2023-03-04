const formatNumber = (num) => {
  const n = String(num),
    p = n.indexOf(".");
  return n.replace(/\d(?=(?:\d{3})+(?:\.|$))/g, (m, i) =>
    p < 0 || i < p ? `${m},` : m
  );
};
$(function () {
  $(".modal").on("shown.bs.modal", function () {
    $(this).find("input:first").focus();
  });

  /**obtener semana actual */
  currentdate = new Date();
  var oneJan = new Date(currentdate.getFullYear(), 0, 1);
  var numberOfDays = Math.floor((currentdate - oneJan) / (24 * 60 * 60 * 1000));

  /****Obtener dia actual */
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear();

  if (dd < 10) {
    dd = "0" + dd;
  }

  if (mm < 10) {
    mm = "0" + mm;
  }

  today = yyyy + "-" + mm + "-" + dd;
  /****Obtener dia actual */

  resultWeek = moment().format("W");

  /****VALIDAR ARREGLOS PRODUCTOS Y CLIENTES */
  if (localStorage.arrayProductos === undefined) {
    localStorage.setItem("arrayProductos", "[]");
  }
  if (localStorage.arrayProductosCostos === undefined) {
    localStorage.setItem("arrayProductosCostos", "[]");
  }
  if (localStorage.arrayClientes === undefined) {
    localStorage.setItem("arrayClientes", "[]");
  }
  mesCurrent = currentdate.getMonth() + 1;
  url = window.location.pathname;
  ruta = url.split("/");
  if (ruta[1] == "") {
    $("#numSemana").html(resultWeek);
    $("#week").val(resultWeek);
    $("#semanaDashboard").val(resultWeek);
    var arregloAcciones = JSON.parse(localStorage.accionesTablero);
    dataDashboard();
    setDiasSemana();
    if (arregloAcciones["ventasDay"] == 1) {
    }
    if (arregloAcciones["ventasYearToDay"] == 1) {
      cargarVentasYearToDay(1);
      graficoVentasYearToDay();
    }
    if (arregloAcciones["ventasYearToWeek"] == 1) {
      cargarVentasYearToWeek(1);
      graficoVentasYearToWeek();
    }
    if (arregloAcciones["ventasYearToMonth"] == 1) {
      cargarVentasYearToMonth(1);
      graficoVentasYearToMonth();
    }

    agregarEvento("Visualizo El Tablero Principal", 4);
  } else {
    switch (ruta[1]) {
      case "login":
        $('input[type="checkbox"]').on("change", function () {
          $('input[name="' + this.name + '"]')
            .not(this)
            .prop("checked", false);
        });
        break;
      case "":
        $('input[type="checkbox"]').on("change", function () {
          $('input[name="' + this.name + '"]')
            .not(this)
            .prop("checked", false);
        });
        break;
      case "conceptosPinturas":
        cargarConceptosPinturas(1);
        $(".selectorCentroTrabajo").select2();
        $(".selectorCanalComercial").select2();
        break;
      case "conceptosFlex":
        cargarConceptosFlex(1);
        $(".selectorCentroTrabajo").select2();
        $(".selectorCanalComercial").select2();
        break;
      case "ultimosCostos":
        cargarUltimosCostos(1);
        loadProductosVenta(1);

        break;
      case "ventasClienteDiario":
        cargarVentasClienteDiario(1, "");
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Cliente Diario", 4);
        $("#semana").val(resultWeek);

        break;
      case "detalleVentas":
        cargarDetalleVentasCliente(1, "");
        agregarEvento("Visualizo Detalle De Ventas", 4);
        if (
          localStorage.fechaDetalle === undefined ||
          localStorage.fechaDetalle === ""
        ) {
          $("#fecha").val(today);
        } else {
          $("#fecha").val(localStorage.fechaDetalle);
        }
        break;
      case "detalleVentasProductos":
        cargarDetalleVentasClienteProducto(1, "");
        agregarEvento("Visualizo Detalle De Ventas", 4);
        if (
          localStorage.fechaDetalle === undefined ||
          localStorage.fechaDetalle === ""
        ) {
          $("#fecha").val(today);
        } else {
          $("#fecha").val(localStorage.fechaDetalle);
        }
        break;
      case "detalleVentasMarca":
        if (
          localStorage.marcaDetalle === undefined ||
          localStorage.marcaDetalle === ""
        ) {
          $("#nameMarca").html("Detalle de ventas todas las Marcas");
        } else {
          $("#nameMarca").html(
            "Detalle de ventas de la Marca " + localStorage.marcaDetalle
          );
        }
        cargarDetalleVentasClienteProducto(1, "/");
        agregarEvento("Visualizo Detalle De Ventas", 4);
        if (
          localStorage.fechaDetalle === undefined ||
          localStorage.fechaDetalle === ""
        ) {
          $("#fecha").val(today);
        } else {
          $("#fecha").val(localStorage.fechaDetalle);
        }
        break;
      case "ventasCanalDiario":
        cargarVentasCanalDiario(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Canal Diario", 4);
        $("#semana").val(resultWeek);

        break;
      case "ventasAgenteDiario":
        cargarVentasAgenteDiario(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Agente Diario", 4);
        $("#semana").val(resultWeek);

        break;
      case "ventasProductoDiario":
        cargarVentasProductoMontoDiario(1, "", "");
        cargarVentasProductoUnidadesDiario(1, "", "");
        loadClients(1);
        loadProductosVenta(1);
        agregarEvento("Visualizo Ventas Por Producto Diario", 4);
        $("#semana").val(resultWeek);

        break;
      case "ventasLitreadoDiario":
        cargarVentasLitreadoMontoDiario(1, "", "");
        cargarVentasLitreadoUnidadesDiario(1, "", "");
        loadClients(1);
        loadProductosVenta(1);
        agregarEvento("Visualizo Ventas Por Litreado Diario", 4);
        $("#semana").val(resultWeek);

        break;
      case "ventasMarcaDiario":
        cargarVentasMarcaDiario(1, "");
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Marca Diario", 4);
        $("#semana").val(resultWeek);

        break;
      case "ventasClienteMensual":
        cargarVentasCliente(1, "");
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Cliente Mensual", 4);
        break;
      case "ventasCanalMensual":
        cargarVentasCanal(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Canal Mensual", 4);
        break;
      case "ventasAgenteMensual":
        cargarVentasAgente(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Agente Mensual", 4);
        break;
      case "ventasProductoMensual":
        cargarVentasProductoMonto(1, "", "");
        cargarVentasProductoUnidades(1, "", "");
        loadProductosVenta(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Producto Mensual", 4);
        break;
      case "ventasLitreadoMensual":
        cargarVentasLitreadoMonto(1, "", "");
        cargarVentasLitreadoUnidades(1, "", "");
        loadProductosVenta(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Litreado Mensual", 4);
        break;
      case "ventasMarcaMensual":
        cargarVentasMarcaMensual(1, "");
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Marca Mensual", 4);
        break;
      case "ventasClienteAnual":
        cargarVentasClienteAnual(1, "");
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Cliente Anual", 4);
        break;
      case "ventasCanalAnual":
        cargarVentasCanalAnual(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Canal Anual", 4);
        break;
      case "ventasAgenteAnual":
        cargarVentasAgenteAnual(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Agente Anual", 4);
        break;
      case "ventasProductoAnual":
        cargarVentasProductoMontoAnual(1, "", "");
        cargarVentasProductoUnidadesAnual(1, "", "");
        loadProductosVenta(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Producto Anual", 4);
        break;
      case "ventasLitreadoAnual":
        cargarVentasLitreadoMontoAnual(1, "", "");
        cargarVentasLitreadoUnidadesAnual(1, "", "");
        loadClients(1);
        loadProductosVenta(1);
        agregarEvento("Visualizo Ventas Por Litreado Anual", 4);
        break;
      case "ventasMarcaAnual":
        cargarVentasMarcaAnual(1, "");
        loadClients(1);
        agregarEvento("Visualizo Ventas Por Marca Anual", 4);
        break;
      case "dashboard":
        $("#numSemana").html(resultWeek);
        $("#week").val(resultWeek);
        $("#semanaDashboard").val(resultWeek);
        var arregloAcciones = JSON.parse(localStorage.accionesTablero);
        dataDashboard();
        setDiasSemana();
        if (arregloAcciones["ventasDay"] == 1) {
        }
        if (arregloAcciones["ventasYearToDay"] == 1) {
          cargarVentasYearToDay(1);
          graficoVentasYearToDay();
        }
        if (arregloAcciones["ventasYearToWeek"] == 1) {
          cargarVentasYearToWeek(1);
          graficoVentasYearToWeek();
        }
        if (arregloAcciones["ventasYearToMonth"] == 1) {
          cargarVentasYearToMonth(1);
          graficoVentasYearToMonth();
        }

        agregarEvento("Visualizo El Tablero Principal", 4);

        break;
      case "detalleDocumentos":
        $("#mesDetalle").val(mesCurrent);
        accionBusqueda();
        cargarDetalleDocumentos(1);
        cargarVentasCliente(1, "");
        loadClients(1);
        agregarEvento("Visualizo Detalle Documentos", 4);
        break;
      case "usuarios":
        cargarUsuarios();
        agregarEvento("Visualizo La Lista de Usuarios Actual", 4);
        break;
      case "miPerfil":
        let userId = $("#userId").val();
        miPerfil(userId);
        break;
      case "bitacora":
        cargarBitacora(1);
        break;
      case "utilidad":
        $("#mesDetalle").val(mesCurrent);
        cargarMargenesUtilidad(1);
        loadClients(1);

        if (localStorage.mes === undefined) {
          localStorage.setItem("mes", mesCurrent);
          localStorage.setItem("año", 2023);
        } else {
        }
        break;
      case "ventasCanalFiltro":
        cargarVentasCanalFiltro(1);
        break;
      case "indicadores":
        cargarIndicadoresUtilidad(1);
        break;
      case "inventarioActual":
        cargarInventarioActual();
        setEjercicios();
        setEjercicios2();
        break;
      case "impresionDocumentos":
        listarDocumentosNoImpresos(1);
        break;
      case "ventasOrigenVentaMensual":
        cargarVentasOrigenVenta(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Origen de Ventas Mensual", 4);
        break;
      case "detalleVentasOrigen":
        cargarDetalleVentasClienteOrigen(1);
        agregarEvento("Visualizo Detalle De Ventas Origen", 4);

        break;
      case "diarioVentas":
        cargarDiarioVentas(1);
        loadClients(1);
        agregarEvento("Visualizo Ventas Diario de Ventas", 4);

        break;
      case "objetivos":
        $("#mesObjetivo").val(mesCurrent);
        cargarObjetivos(1);

        agregarEvento("Visualizo Objetivos de Venta", 4);
        break;
      case "graficosObjetivos":
        $("#mesObjetivo").val(mesCurrent);
        dataObjetivosDashboard();
        break;
      case "objetivosCanal":
        $("#mesObjetivo").val(mesCurrent);
        cargarObjetivosCanal(1);

        agregarEvento("Visualizo Objetivos de Venta Por Canal", 4);
        break;
      case "definirObjetivos":
        cargarDefinicionObjetivos();
        break;
      case "detalleVentasObjetivos":
        cargarDetalleVentasClienteObjetivos(1);
        agregarEvento("Visualizo Detalle De Ventas Objetivos", 4);

        break;
    }
  }

  $(".selectorAgentes").select2();
  var agenteVenta = JSON.parse(localStorage.getItem("arrayAgentes"));
  $(".selectorAgentes").val(agenteVenta).trigger("change");
  $(".selectorAgentes").on("select2:select", function (e) {
    var agente = e.params.data.id;
    agregarDatosBusqueda(agente, "arrayAgentes");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorAgentes").on("select2:unselect", function (e) {
    var agente = e.params.data.id;
    var arreglo = localStorage.getItem("arrayAgentes");
    removeItemFromArregloBusqueda(arreglo, agente, "arrayAgentes");
  });
  $(".selectorCentro").select2();
  var centroTrabajo = JSON.parse(localStorage.getItem("arrayCentro"));
  $(".selectorCentro").val(centroTrabajo).trigger("change");
  $(".selectorCentro").on("select2:select", function (e) {
    var centro = e.params.data.id;
    agregarDatosBusqueda(centro, "arrayCentro");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorCentro").on("select2:unselect", function (e) {
    var centro = e.params.data.id;
    var arreglo = localStorage.getItem("arrayCentro");
    removeItemFromArregloBusqueda(arreglo, centro, "arrayCentro");
  });
  $(".selectorCanal").select2();
  var canalComercial = JSON.parse(localStorage.getItem("arrayCanal"));
  $(".selectorCanal").val(canalComercial).trigger("change");
  $(".selectorCanal").on("select2:select", function (e) {
    var canal = e.params.data.id;
    agregarDatosBusqueda(canal, "arrayCanal");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorCanal").on("select2:unselect", function (e) {
    var canal = e.params.data.id;
    var arreglo = localStorage.getItem("arrayCanal");
    removeItemFromArregloBusqueda(arreglo, canal, "arrayCanal");
  });
  $(".selectorMarca").select2();
  var marcas = JSON.parse(localStorage.getItem("arrayMarca"));
  $(".selectorMarca").val(marcas).trigger("change");
  $(".selectorMarca").on("select2:select", function (e) {
    var marca = e.params.data.id;
    agregarDatosBusqueda(marca, "arrayMarca");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorMarca").on("select2:unselect", function (e) {
    var marca = e.params.data.id;
    var arreglo = localStorage.getItem("arrayMarca");
    removeItemFromArregloBusqueda(arreglo, marca, "arrayMarca");
  });
  $(".selectorCanalUtilidad").select2();
  var canalComercial = JSON.parse(localStorage.getItem("arrayCanalUtilidad"));
  $(".selectorCanalUtilidad").val(canalComercial).trigger("change");
  $(".selectorCanalUtilidad").on("select2:select", function (e) {
    var canal = e.params.data.id;
    agregarDatosBusqueda(canal, "arrayCanalUtilidad");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorCanalUtilidad").on("select2:unselect", function (e) {
    var canal = e.params.data.id;
    var arreglo = localStorage.getItem("arrayCanalUtilidad");
    removeItemFromArregloBusqueda(arreglo, canal, "arrayCanalUtilidad");
  });
});

function cargarConceptosPinturas(page) {
  var query = $("#name").val();
  var centroTrabajo = $("#centroTrabajo").val();
  var canalComercial = $("#canalComercial").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "conceptoPinturas",
    page: page,
    query: query,
    CCENTROTRABAJO: centroTrabajo,
    CCANALCOMERCIAL: canalComercial,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/conceptos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".datos_ajax").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarConceptosFlex(page) {
  var query = $("#name").val();
  var centroTrabajo = $("#centroTrabajo").val();
  var canalComercial = $("#canalComercial").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "conceptoFlex",
    page: page,
    query: query,
    CCENTROTRABAJO: centroTrabajo,
    CCANALCOMERCIAL: canalComercial,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/conceptos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".datos_ajax").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarUltimosCostos(page) {
  var arregloProductos = JSON.parse(
    localStorage.getItem("arrayProductosCostos")
  );
  var año = $("#anio").val();
  var empresa = $("#empresa").val();
  var per_page = $("#per_page").val();
  var campoOrden = $("#campoOrden").val();
  var orden = $("#orden").val();
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var productos = "";
  } else {
    if (arregloProductos == "[]") {
      var productos = "";
    } else {
      var productos = arregloProductos.toString();
    }
  }

  var parametros = {
    action: "ultimosCostos",
    page: page,
    query: productos,
    anioCostos: año,
    empresa: empresa,
    per_page: per_page,
    campoOrden: campoOrden,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/ultimosCostos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".datos_ajax").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function descargarReporteCostos() {
  var arregloProductos = JSON.parse(
    localStorage.getItem("arrayProductosCostos")
  );
  var año = $("#anio").val();
  var empresa = $("#empresa").val();
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var productos = "";
  } else {
    if (arregloProductos == "[]") {
      var productos = "";
    } else {
      var productos = arregloProductos.toString();
    }
  }
  location.href =
    "views/moduls/reporteador.php?reporteUltimosCostos=" +
    empresa +
    "&query=" +
    productos +
    "&año=" +
    año;
}
function obtenerDatosCompra(idDocumento, empresa) {
  if (idDocumento != 0) {
    var datos = new FormData();
    datos.append("empresa", empresa);
    datos.append("idDocumento", idDocumento);
    $("#modalverdatosdocumento").modal();
    $.ajax({
      url: "ajax/admonFunctions.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        var response = respuesta;

        var listaCabeceras = ["Fecha", "Serie", "Folio", "Proveedor"];

        body = document.getElementById("tablaDetalleCompra");

        thead = document.createElement("thead");

        theadTr = document.createElement("tr");

        for (var h = 0; h < listaCabeceras.length; h++) {
          var celdaThead = document.createElement("th");
          var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
          celdaThead.appendChild(textoCeldaThead);
          theadTr.appendChild(celdaThead);
        }

        thead.appendChild(theadTr);

        tblBody = document.createElement("tbody");

        var arregloNombres = [
          "CFECHA",
          "CSERIEDOCUMENTO",
          "CFOLIO",
          "CRAZONSOCIAL",
        ];

        // Crea las celdas

        for (var i = 0; i < 1; i++) {
          // Crea las hileras de la tabla
          var hilera = document.createElement("tr");
          $("#conceptoCompra").html(response["CNOMBRECONCEPTO"]);
          for (var j = 0; j < arregloNombres.length; j++) {
            var celda = document.createElement("td");
            if (arregloNombres[j] == "CFOLIO") {
              var valor = parseInt(response[arregloNombres[j]], 10);
            } else {
              var valor = response[arregloNombres[j]];
            }
            var textoCelda = document.createTextNode(valor);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);
          }

          // agrega la hilera al final de la tabla (al final del elemento tblbody)
          tblBody.appendChild(hilera);
        }

        // appends <table> into <body>
        body.appendChild(tblBody);
        body.appendChild(thead);
      },
    });
  } else {
    alert("Sin Compra Registrada");
  }
}
$(".btnCerrarDetalleCompra").click(function () {
  var nodos = document.getElementById("tablaDetalleCompra");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});
/*************INICIA TABLAS VENTAS DIARIAS*/
function cargarVentasClienteDiario(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasClienteDiario");
  var vista = "cargarVentasClienteDiario";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCliente",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasClienteDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasClienteData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasCanalDiario(page) {
  var vista = "cargarVentasCanalDiario";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCanal",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanalDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasCanalData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasAgenteDiario(page) {
  var vista = "cargarVentasAgenteDiario";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasAgente",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasAgenteDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasAgenteData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoMontoDiario(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasProductoMontoDiario");
  var vista = "cargarVentasProductoMontoDiario";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }

  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoMonto",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProductoDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoMontoData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoUnidadesDiario(
  page,
  nombreCliente,
  codigoProducto
) {
  $("#clasificacionVenta2").val("cargarVentasProductoUnidadesDiario");
  var vista = "cargarVentasProductoUnidadesDiario";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoUnidades",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProductoDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoUnidadesData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasLitreadoMontoDiario(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasLitreadoMontoDiario");
  var vista = "cargarVentasLitreadoMontoDiario";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoMonto",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreadoDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoMontoData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasLitreadoUnidadesDiario(
  page,
  nombreCliente,
  codigoProducto
) {
  $("#clasificacionVenta2").val("cargarVentasLitreadoUnidadesDiario");
  var vista = "cargarVentasLitreadoUnidadesDiario";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoUnidades",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreadoDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoUnidadesData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasMarcaDiario(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasMarcaDiario");
  var vista = "cargarVentasMarcaDiario";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasMarca",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
    marca: marca,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasMarcaDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasMarcaDiario").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function formatoFecha(fecha, formato) {
  const map = {
    dd: fecha.getDate(),
    mm: fecha.getMonth() + 1,
    yy: fecha.getFullYear().toString().slice(-2),
    yyyy: fecha.getFullYear(),
  };
  return formato.replace(/dd|mm|yy|yyy/gi, (matched) => map[matched]);
}
function cargarDetalleVentasCliente(page, centro) {
  var vista = "cargarDetalleVentasCliente";
  var centroElegido = $("#centroTrabajo").val();
  if (centroElegido == "") {
    var centroTrabajo = localStorage.getItem("centroDetalle");
  } else {
    var centroTrabajo = $("#centroTrabajo").val();
  }

  if (centroTrabajo == "") {
    var agente = localStorage.getItem("agenteDetalle");
  } else {
    var agente = "";
  }
  if (centroTrabajo == "" && agente == "") {
    var canal = localStorage.getItem("canalDetalle");
  } else {
    var canal = "";
  }
  if (centroTrabajo == "" && agente == "" && canal == "") {
    if (localStorage.getItem("clienteDetalle") == "") {
      var cliente = JSON.stringify(
        JSON.parse(localStorage.getItem("arrayClientes"))
      );
      if (cliente == "[]") {
        clientes = "";
      } else {
        clientes = cliente;
      }
      var tipo = "clientes";
    } else {
      var clientes = localStorage.getItem("clienteDetalle");
      var tipo = "cliente";
    }
  } else {
    if (localStorage.getItem("clienteDetalle") == "") {
      var cliente = JSON.stringify(
        JSON.parse(localStorage.getItem("arrayClientes"))
      );
      if (cliente == "[]") {
        clientes = "";
      } else {
        clientes = cliente;
      }
      var tipo = "clientes";
    } else {
      var clientes = "";
      var tipo = "cliente";
    }
  }
  var anio = localStorage.añoDetalle;
  if (localStorage.fechaDetalle == "") {
    var dia = "";
  } else {
    var dia = localStorage.fechaDetalle;
  }
  if (localStorage.mesDetalle == "0") {
    var mes = "";
  } else {
    var mes = localStorage.mesDetalle;
  }

  var semana = localStorage.semanaDetalle;
  var concepto = localStorage.conceptoDetalle;
  var per_page = $("#per_page").val();
  var parametros = {
    action: "detalleVentasCliente",
    page: page,
    centroTrabajo: centroTrabajo,
    agente: agente,
    canal: canal,
    cliente: clientes,
    anio: anio,
    dia: dia,
    tipo: tipo,
    mes: mes,
    semana: semana,
    concepto: concepto,
    vista: vista,
    per_page: per_page,
  };

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/detalleVentas.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDetalleClientes").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
  var centroTrabajo = localStorage.getItem("centroDetalle");
  $("#centroTrabajo option[value='" + centroTrabajo + "']").attr(
    "selected",
    true
  );
}
function cargarDetalleVentasClienteProducto(page, tipo) {
  var vista = "cargarDetalleVentasClienteProducto";
  var centroElegido = $("#centroTrabajo").val();
  if (centroElegido == "") {
    var centroTrabajo = localStorage.getItem("centroDetalle");
  } else {
    var centroTrabajo = $("#centroTrabajo").val();
  }

  if (centroTrabajo == "") {
    var agente = localStorage.getItem("agenteDetalle");
  } else {
    var agente = "";
  }
  if (centroTrabajo == "" && agente == "") {
    var canal = localStorage.getItem("canalDetalle");
  } else {
    var canal = "";
  }
  if (centroTrabajo == "" && agente == "" && canal == "") {
    if (localStorage.getItem("clienteDetalle") == "") {
      var cliente = JSON.stringify(
        JSON.parse(localStorage.getItem("arrayClientes"))
      );
      if (cliente == "[]") {
        clientes = "";
      } else {
        clientes = cliente;
      }
      var tipo = "clientes";
    } else {
      var clientes = localStorage.getItem("clienteDetalle");
      var tipo = "cliente";
    }
  } else {
    if (localStorage.getItem("clienteDetalle") == "") {
      var cliente = JSON.stringify(
        JSON.parse(localStorage.getItem("arrayClientes"))
      );
      if (cliente == "[]") {
        clientes = "";
      } else {
        clientes = cliente;
      }
      var tipo = "clientes";
    } else {
      var clientes = "";
      var tipo = "cliente";
    }
  }
  var anio = localStorage.añoDetalle;
  if (localStorage.fechaDetalle == "") {
    var dia = "";
  } else {
    var dia = localStorage.fechaDetalle;
  }
  if (localStorage.mesDetalle == "0") {
    var mes = "";
  } else {
    var mes = localStorage.mesDetalle;
  }
  var codigo = localStorage.codigoDetalle;
  if (tipo == "") {
    var marca = "";
    var accion = "detalleVentasClienteProducto";
  } else {
    var marca = localStorage.marcaDetalle;
    var accion = "detalleVentasMarca";
  }

  var semana = localStorage.semanaDetalle;
  var concepto = localStorage.conceptoDetalle;
  var per_page = $("#per_page").val();
  var parametros = {
    action: accion,
    page: page,
    centroTrabajo: centroTrabajo,
    agente: agente,
    canal: canal,
    cliente: clientes,
    anio: anio,
    dia: dia,
    tipo: tipo,
    mes: mes,
    semana: semana,
    concepto: concepto,
    codigo: codigo,
    marca: marca,
    vista: vista,
    per_page: per_page,
  };

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/detalleVentas.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDetalleClientesProducto").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarDetalleVentasProducto(page, idDocumento, empresa) {
  var vista = "cargarDetalleVentasProducto";

  var per_page = $("#per_page").val();
  var parametros = {
    action: "detalleVentasProductos",
    page: page,
    idDocumento: idDocumento,
    empresa: empresa,
    vista: vista,
    per_page: per_page,
  };

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/detalleVentas.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDetalleProductos").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarDetalleVentasProductoMarca(page, idDocumento, empresa, marca) {
  var vista = "cargarDetalleVentasProductoMarca";

  var per_page = $("#per_page").val();
  var parametros = {
    action: "detalleVentasProductosMarca",
    page: page,
    idDocumento: idDocumento,
    empresa: empresa,
    marca: marca,
    vista: vista,
    per_page: per_page,
  };

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/detalleVentas.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDetalleProductos").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/*************INICIA TABLAS VENTAS MENSUALES*/
function cargarVentasCliente(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasCliente");
  var vista = "cargarVentasCliente";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCliente",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCliente.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasClienteData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasCanal(page) {
  var vista = "cargarVentasCanal";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCanal",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasCanalData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasAgente(page) {
  var vista = "cargarVentasAgente";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasAgente",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasAgente.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasAgenteData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoMonto(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasProductoMonto");
  var vista = "cargarVentasProductoMonto";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoMonto",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProducto.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoMontoData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoUnidades(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta2").val("cargarVentasProductoUnidades");
  var vista = "cargarVentasProductoUnidades";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoUnidades",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProducto.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoUnidadesData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasLitreadoMonto(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasLitreadoMonto");
  var vista = "cargarVentasLitreadoMonto";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoMonto",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreado.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoMontoData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasLitreadoUnidades(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta2").val("cargarVentasLitreadoUnidades");
  var vista = "cargarVentasLitreadoUnidades";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoUnidades",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreado.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoUnidadesData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasMarcaMensual(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasMarcaMensual");
  var vista = "cargarVentasMarcaMensual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasMarca",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
    marca: marca,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasMarcaMensual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasMarcaMensual").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/*************INICIA TABLAS VENTAS ANUALES*/
function cargarVentasClienteAnual(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasClienteAnual");
  var vista = "cargarVentasClienteAnual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCliente",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasClienteAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasClienteAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasCanalAnual(page) {
  var vista = "cargarVentasCanalAnual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCanal",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanalAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasCanalAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasAgenteAnual(page) {
  var vista = "cargarVentasAgenteAnual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasAgente",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasAgenteAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasAgenteAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoMontoAnual(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasProductoMontoAnual");
  var vista = "cargarVentasProductoMontoAnual";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoMonto",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProductoAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoMontoAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoUnidadesAnual(
  page,
  nombreCliente,
  codigoProducto
) {
  $("#clasificacionVenta2").val("cargarVentasProductoUnidadesAnual");
  var vista = "cargarVentasProductoUnidadesAnual";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoUnidades",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProductoAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoUnidadesAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasLitreadoMontoAnual(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasLitreadoMontoAnual");
  var vista = "cargarVentasLitreadoMontoAnual";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoMonto",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreadoAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoMontoAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasLitreadoUnidadesAnual(
  page,
  nombreCliente,
  codigoProducto
) {
  $("#clasificacionVenta2").val("cargarVentasLitreadoUnidadesAnual");
  var vista = "cargarVentasLitreadoUnidadesAnual";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoUnidades",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreadoAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoUnidadesAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasMarcaAnual(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasMarcaAnual");
  var vista = "cargarVentasMarcaAnual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }

  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasMarca",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
    marca: marca,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasMarcaAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasMarcaAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/****BUSCADOR DE CLIENTE */
function loadClients(page) {
  var cliente = $("#nombreClienteSearch").val();
  var vista = $("#clasificacionVenta").val();
  var vista2 = $("#clasificacionVenta2").val();

  var per_page = "10";
  var parametros = {
    action: "busquedaClientes",
    page: page,
    nombreClienteSearch: cliente,
    vista: vista,
    vista2: vista2,
    per_page: per_page,
  };
  $("#loader2").fadeIn("slow");
  $.ajax({
    url: "ajax/listaBusqueda.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader2").html(
        '<img src="views/images/ajax-loader.gif"> Cargando...'
      );
    },
    success: function (data) {
      $(".outer_div").html(data).fadeIn("slow");
      $("#loader2").html("");
    },
  });
}

/****BUSCADOR DE PRODUCTOS */
function loadProductosVenta(page) {
  var producto = $("#nombreProductoSearch").val();
  var vista = $("#clasificacionVenta").val();
  var vista2 = $("#clasificacionVenta2").val();
  var per_page = "10";
  var parametros = {
    action: "busquedaProductosVenta",
    page: page,
    producto: producto,
    vista: vista,
    vista2: vista2,
    per_page: per_page,
  };
  $("#loader2").fadeIn("slow");
  $.ajax({
    url: "ajax/listaBusqueda.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader2").html(
        '<img src="views/images/ajax-loader.gif"> Cargando...'
      );
    },
    success: function (data) {
      $(".outer_div2").html(data).fadeIn("slow");
      $("#loader2").html("");
    },
  });
}
/*************DETALLE DOCUMENTOS VENTAS*/
function cargarDetalleDocumentos(page) {
  $("#clasificacionVenta").val("cargarDetalleDocumentos");
  var vista = "cargarDetalleDocumentos";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }

  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }

  var estatus = $("#estatus").val();
  var año = $("#anio").val();

  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var mes = $("#mesDetalle").val();
  var abonado = $("#abonado").val();
  var tipo = $("#tipoBusqueda").val();
  var fechaInicio = $("#fechaInicio").val();
  var fechaFin = $("#fechaFin").val();

  var parametros = {
    action: "documentosDetalle",
    page: page,
    query: query,
    año: año,
    canal: canal,
    centro: centro,
    agente: agente,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
    mes: mes,
    abonado: abonado,
    tipo: tipo,
    fechaInicio: fechaInicio,
    fechaFin: fechaFin,
  };

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/documentosDetalle.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDocumentosDetalle").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/*******MARGENES DE UTILIDAD POR PRODUCTO Y CLIENTE ************************/
function cargarMargenesUtilidad(page) {
  $("#clasificacionVenta").val("cargarMargenesUtilidad");
  var vista = "cargarMargenesUtilidad";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanalUtilidad"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanalUtilidad", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }

  var estatus = $("#estatus").val();
  var año = $("#anio").val();
  localStorage.setItem("año", año);
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var mes = $("#mesDetalle").val();
  localStorage.setItem("mes", mes);
  var parametros = {
    action: "margenesUtilidad",
    page: page,
    query: query,
    año: localStorage.año,
    canal: canal,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
    mes: localStorage.mes,
  };

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/margenesUtilidad.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".margenesUtilidad").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/*******MARGENES DE UTILIDAD POR PRODUCTO Y CLIENTE ************************/
/****BUSCADOR DE CLIENTE */
function reedirigir(accion) {
  switch (accion) {
    case "clienteDiario":
      window.location.href = "ventasClienteDiario";
      break;
    case "canalDiario":
      window.location.href = "ventasCanalDiario";
      break;
    case "agenteDiario":
      window.location.href = "ventasAgenteDiario";
      break;
    case "productoDiario":
      window.location.href = "ventasProductoDiario";
      break;
    case "productoLitreadoDiario":
      window.location.href = "ventasLitreadoDiario";
      break;
    case "marcaDiario":
      window.location.href = "ventasMarcaDiario";
      break;
    case "clienteMensual":
      window.location.href = "ventasClienteMensual";
      break;
    case "canalMensual":
      window.location.href = "ventasCanalMensual";
      break;
    case "agenteMensual":
      window.location.href = "ventasAgenteMensual";
      break;
    case "productoMensual":
      window.location.href = "ventasProductoMensual";
      break;
    case "productoLitreadoMensual":
      window.location.href = "ventasLitreadoMensual";
      break;
    case "marcaMensual":
      window.location.href = "ventasMarcaMensual";
      break;
    case "clienteAnual":
      window.location.href = "ventasClienteAnual";
      break;
    case "canalAnual":
      window.location.href = "ventasCanalAnual";
      break;
    case "agenteAnual":
      window.location.href = "ventasAgenteAnual";
      break;
    case "productoAnual":
      window.location.href = "ventasProductoAnual";
      break;
    case "productoLitreadoAnual":
      window.location.href = "ventasLitreadoAnual";
      break;
    case "marcaAnual":
      window.location.href = "ventasMarcaAnual";
      break;
  }
}
function returnDashboard() {
  location.href = "dashboard";
}
function redireccionAcion(accion) {
  var año = $("#añoDashboard").val();
  var semana = $("#semanaDashboard").val();
  var dia = $("#diaDashboard").val();
  switch (accion) {
    case "SAN MANUEL":
      localStorage.setItem("centroDetalle", "1 TIENDA SAN MANUEL");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");

      break;
    case "REFORMA":
      localStorage.setItem("centroDetalle", "3 TIENDA REFORMA");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "CAPU":
      localStorage.setItem("centroDetalle", "7 TIENDA CAPU");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "SANTIAGO":
      localStorage.setItem("centroDetalle", "6 TIENDA SANTIAGO");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "LAS TORRES":
      localStorage.setItem("centroDetalle", "9 TIENDA TORRES");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "ACATEPEC":
      localStorage.setItem("centroDetalle", "10 TIENDA ACATEPEC");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "FLOTILLAS":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "FLOTILLAS");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "MAYOREO":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "CEDIS");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "RUTAS":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "RUTAS");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "ECOMMERCE":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "E-COMMERCE");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "CARGO":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "cargo");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "CREDITO":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "credito");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "DEVOLUCION":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "devolucion");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "FACTURAS":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "facturas");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "PRUEBA":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", dia);
      localStorage.setItem("mesDetalle", "");
      localStorage.setItem("semanaDetalle", semana);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "documentosPrueba");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
  }
}
function redireccionAccionVentas(
  nombre,
  tipo,
  fecha,
  año,
  mes,
  codigoProducto
) {
  switch (tipo) {
    case "Agentes":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", nombre);
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", fecha);
      localStorage.setItem("mesDetalle", mes);
      localStorage.setItem("semanaDetalle", "");
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "Canal":
      localStorage.setItem("canalDetalle", nombre);
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", fecha);
      localStorage.setItem("mesDetalle", mes);
      localStorage.setItem("semanaDetalle", "");
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "Clientes":
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("clienteDetalle", nombre);
      localStorage.setItem("fechaDetalle", fecha);
      localStorage.setItem("mesDetalle", mes);
      localStorage.setItem("semanaDetalle", "");
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "Productos":
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", fecha);
      localStorage.setItem("mesDetalle", mes);
      localStorage.setItem("semanaDetalle", "");
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", codigoProducto);
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentasProductos", "_blank");
      break;
    case "Origen":
      localStorage.setItem("origenVentaDetalle", nombre);
      localStorage.setItem("mesDetalle", mes);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("tipoVista", "origenVenta");
      window.open("detalleVentasOrigen", "_blank");
      break;
    case "DiarioVentas":
      localStorage.setItem("centroDetalle", nombre);
      localStorage.setItem("mesDetalle", mes);
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("nombreDiaDetalle", fecha);
      localStorage.setItem("tipoVista", "diarioVentas");
      window.open("detalleVentasOrigen", "_blank");
      break;
  }
}
function redireccionAccionVentasObjetivos(agente, canal, año, mes, tipo) {
  switch (tipo) {
    case "Agentes":
      localStorage.setItem("agenteDetalleObjetivos", agente);
      localStorage.setItem("canalDetalleObjetivos", canal);
      localStorage.setItem("mesDetalleObjetivos", mes);
      localStorage.setItem("añoDetalleObjetivos", año);
      window.open("detalleVentasObjetivos", "_blank");
      break;
    case "Canal":
      localStorage.setItem("agenteDetalleObjetivos", agente);
      localStorage.setItem("canalDetalleObjetivos", canal);
      localStorage.setItem("mesDetalleObjetivos", mes);
      localStorage.setItem("añoDetalleObjetivos", año);
      window.open("detalleVentasObjetivos", "_blank");
      break;
  }
}
function redireccionAccionVentasMarca(
  nombre,
  tipo,
  fecha,
  año,
  mes,
  codigoProducto,
  marca
) {
  switch (tipo) {
    case "Marca":
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", fecha);
      localStorage.setItem("mesDetalle", mes);
      localStorage.setItem("semanaDetalle", "");
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", codigoProducto);
      localStorage.setItem("marcaDetalle", marca);
      window.open("detalleVentasMarca", "_blank");
      break;
  }
}
function detalleProductosVenta(idDocumento, empresa) {
  $(".next-step").click();
  var centro = localStorage.getItem("centroDetalle");
  cargarDetalleVentasProducto(1, idDocumento, empresa);
  document
    .getElementById("previous-step")
    .setAttribute("onclick", "cargarDetalleVentasCliente(1, '" + centro + "')");
}
function detalleProductosVentaMarca(idDocumento, empresa, marca) {
  $(".next-step").click();
  var centro = localStorage.getItem("centroDetalle");
  cargarDetalleVentasProductoMarca(1, idDocumento, empresa, marca);
  document
    .getElementById("previous-step")
    .setAttribute(
      "onclick",
      "cargarDetalleVentasClienteProducto(1, '" + centro + "')"
    );
}
function removeItemFromArregloBusqueda(array, item, nombreArreglo) {
  var arreglo = JSON.parse(array);

  for (var i in arreglo) {
    if (arreglo[i] == item) {
      arreglo.splice(i, 1);
      localStorage.setItem("" + nombreArreglo + "", JSON.stringify(arreglo));

      break;
    }
  }
  switch (ruta[1]) {
    case "ventasClienteDiario":
      cargarVentasClienteDiario(1, "");
      break;
    case "ventasCanalDiario":
      cargarVentasCanalDiario(1);
      break;
    case "ventasAgenteDiario":
      cargarVentasAgenteDiario(1);
      break;
    case "ventasProductoDiario":
      cargarVentasProductoMontoDiario(1, "", "");
      cargarVentasProductoUnidadesDiario(1, "", "");
      break;
    case "ventasLitreadoDiario":
      cargarVentasLitreadoMontoDiario(1, "", "");
      cargarVentasLitreadoUnidadesDiario(1, "", "");
      break;
    case "ventasMarcaDiario":
      cargarVentasMarcaDiario(1, "");
      break;
    case "ventasClienteMensual":
      cargarVentasCliente(1, "");
      break;
    case "ventasCanalMensual":
      cargarVentasCanal(1);
      break;
    case "ventasAgenteMensual":
      cargarVentasAgente(1);
      break;
    case "ventasProductoMensual":
      cargarVentasProductoMonto(1, "", "");
      cargarVentasProductoUnidades(1, "", "");
      break;
    case "ventasLitreadoMensual":
      cargarVentasLitreadoMonto(1, "", "");
      cargarVentasLitreadoUnidades(1, "", "");
      break;
    case "ventasMarcaMensual":
      cargarVentasMarcaMensual(1, "");
      break;
    case "ventasClienteAnual":
      cargarVentasClienteAnual(1, "");
      break;
    case "ventasCanalAnual":
      cargarVentasCanalAnual(1);
      break;
    case "ventasAgenteAnual":
      cargarVentasAgenteAnual(1);
      break;
    case "ventasProductoAnual":
      cargarVentasProductoMontoAnual(1, "", "");
      cargarVentasProductoUnidadesAnual(1, "", "");
      break;
    case "ventasLitreadoAnual":
      cargarVentasLitreadoMontoAnual(1, "", "");
      cargarVentasLitreadoUnidadesAnual(1, "", "");
      break;
    case "ventasMarcaAnual":
      cargarVentasMarcaAnual(1, "");
      break;
    case "detalleDocumentos":
      cargarDetalleDocumentos(1);
      break;
    case "utilidad":
      cargarMargenesUtilidad(1);
      break;
    case "ultimosCostos":
      cargarUltimosCostos(1);
      break;
    case "ventasOrigenVentaMensual":
      cargarVentasOrigenVenta(1);
      break;
    case "diarioVentas":
      cargarDiarioVentas(1);
      break;
  }
}
function validateItemArray(array, item, nombreArreglo) {
  if (array.indexOf(item) === -1) {
    array.push(item);

    localStorage.setItem("" + nombreArreglo + "", JSON.stringify(array));
    var nombreCampo = "#" + nombreArreglo;
    switch (nombreArreglo) {
      case "arrayClientes":
        $("#arregloClientes").tagEditor("destroy");
        $("#arregloClientes").tagEditor({
          initialTags: JSON.parse(localStorage.getItem("arrayClientes")),
          delimiter: ", ",
          forceLowercase: false,
          beforeTagDelete: function (field, editor, tags, val) {
            var arrayClientes = localStorage.getItem("arrayClientes");
            removeItemFromArregloBusqueda(arrayClientes, val, "arrayClientes");
          },
        });
        break;
      case "arrayProductos":
        $("#arregloProductos").tagEditor("destroy");
        $("#arregloProductos").tagEditor({
          initialTags: JSON.parse(localStorage.getItem("arrayProductos")),
          delimiter: ", ",
          forceLowercase: false,
          beforeTagDelete: function (field, editor, tags, val) {
            var arrayProductos = localStorage.getItem("arrayProductos");
            removeItemFromArregloBusqueda(
              arrayProductos,
              val,
              "arrayProductos"
            );
          },
        });
        break;
      case "arrayProductosCostos":
        $("#arregloProductosCostos").tagEditor("destroy");
        $("#arregloProductosCostos").tagEditor({
          initialTags: JSON.parse(localStorage.getItem("arrayProductosCostos")),
          delimiter: ", ",
          forceLowercase: false,
          beforeTagDelete: function (field, editor, tags, val) {
            var arrayProductosCostos = localStorage.getItem(
              "arrayProductosCostos"
            );
            removeItemFromArregloBusqueda(
              arrayProductosCostos,
              val,
              "arrayProductosCostos"
            );
          },
        });
        break;
    }

    switch (ruta[1]) {
      case "ventasClienteDiario":
        cargarVentasClienteDiario(1, "");
        break;
      case "ventasCanalDiario":
        cargarVentasCanalDiario(1);
        break;
      case "ventasAgenteDiario":
        cargarVentasAgenteDiario(1);
        break;
      case "ventasProductoDiario":
        cargarVentasProductoMontoDiario(1, "", "");
        cargarVentasProductoUnidadesDiario(1, "", "");
        break;
      case "ventasLitreadoDiario":
        cargarVentasLitreadoMontoDiario(1, "", "");
        cargarVentasLitreadoUnidadesDiario(1, "", "");
        break;
      case "ventasMarcaDiario":
        cargarVentasMarcaDiario(1, "");
        break;
      case "ventasClienteMensual":
        cargarVentasCliente(1, "");
        break;
      case "ventasCanalMensual":
        cargarVentasCanal(1);
        break;
      case "ventasAgenteMensual":
        cargarVentasAgente(1);
        break;
      case "ventasProductoMensual":
        cargarVentasProductoMonto(1, "", "");
        cargarVentasProductoUnidades(1, "", "");
        break;
      case "ventasLitreadoMensual":
        cargarVentasLitreadoMonto(1, "", "");
        cargarVentasLitreadoUnidades(1, "", "");
        break;
      case "ventasMarcaMensual":
        cargarVentasMarcaMensual(1, "");
        break;
      case "ventasClienteAnual":
        cargarVentasClienteAnual(1, "");
        break;
      case "ventasCanalAnual":
        cargarVentasCanalAnual(1);
        break;
      case "ventasAgenteAnual":
        cargarVentasAgenteAnual(1);
        break;
      case "ventasProductoAnual":
        cargarVentasProductoMontoAnual(1, "", "");
        cargarVentasProductoUnidadesAnual(1, "", "");
        break;
      case "ventasLitreadoAnual":
        cargarVentasLitreadoMontoAnual(1, "", "");
        cargarVentasLitreadoUnidadesAnual(1, "", "");
        break;
      case "ventasMarcaAnual":
        cargarVentasMarcaAnual(1, "");
        break;
      case "detalleDocumentos":
        cargarDetalleDocumentos(1);
        break;
      case "utilidad":
        cargarMargenesUtilidad(1);
        break;
      case "ultimosCostos":
        cargarUltimosCostos(1);
        break;
      case "ventasOrigenVentaMensual":
        cargarVentasOrigenVenta(1);
        break;
      case "diarioVentas":
        cargarDiarioVentas(1);
        break;
    }
  } else if (array.indexOf(item) > -1) {
    localStorage.setItem("" + nombreArreglo + "", JSON.stringify(array));
  }
}

function agregarDatosBusqueda(datoBusqueda, nombreArreglo) {
  var array = localStorage.getItem("" + nombreArreglo + "");

  if (array == undefined || array == "") {
    var nombreArray = [];
    localStorage.setItem("" + nombreArreglo + "", "[]");
    validateItemArray(nombreArray, datoBusqueda, "" + nombreArreglo + "");
  } else {
    var nombreArray = JSON.parse(localStorage.getItem("" + nombreArreglo + ""));
    validateItemArray(nombreArray, datoBusqueda, "" + nombreArreglo + "");
  }
}

var numeros = "0123456789";
function validarTipo(cadena) {
  for (i = 0; i < cadena.length; i++) {
    if (numeros.indexOf(cadena.charAt(i), 0) != -1) {
      return 1;
    }
  }
  return 0;
}
function cargarVentasYearToDay(page) {
  var vista = "cargarVentasYearToDay";
  var fechaInicial = $("#fechaInicioDay").val();
  var fechaFinal = $("#fechaFinalDay").val();
  if (fechaFinal == "" && fechaFinal == "") {
  } else {
    $(".datesYearToDay").html(
      "2022-01-01-" + fechaInicial + " VS " + "2023-01-01-" + fechaFinal
    );
  }

  var estatus = 0;
  var per_page = 10;
  var parametros = {
    action: "ventasYearToDay",
    page: page,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    fechaInicial: fechaInicial,
    fechaFinal: fechaFinal,
  };
  $("#loaderYearToDay").fadeIn("slow");
  $.ajax({
    url: "ajax/ventasYearToDay.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderYearToDay").html("Buscando Porfavor Espere ........");
    },
    success: function (data) {
      $("#loaderYearToDay").html("");
      $(".ventasYearToDay").html(data).fadeIn("slow");
    },
  });
}
function cargarVentasYearToWeek(page) {
  var vista = "cargarVentasYearToWeek";
  var año1 = $("#año1").val();
  var año2 = $("#año2").val();
  var week = $("#week").val();
  var estatus = 0;
  var per_page = 10;
  var parametros = {
    action: "ventasYearToWeek",
    page: page,
    estatus: estatus,
    vista: vista,
    año1: año1,
    año2: año2,
    semana: week,
    per_page: per_page,
  };
  $(".loaderYearToWeek").fadeIn("slow");
  $.ajax({
    url: "ajax/ventasYearToDay.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderYearToWeek").html("Buscando Porfavor Espere ........");
    },
    success: function (data) {
      $("#loaderYearToWeek").html("");
      $(".ventasYearToWeek").html(data).fadeIn("slow");
    },
  });
}
function cargarVentasYearToMonth(page) {
  var vista = "cargarVentasYearToMonth";
  var año1 = $("#año1").val();
  var año2 = $("#año2").val();
  var estatus = 0;
  var per_page = 10;
  $(".textYearToMonth").html(año1 + " VS " + año2);
  var parametros = {
    action: "ventasYearToMonth",
    page: page,
    estatus: estatus,
    vista: vista,
    año1: año1,
    año2: año2,
    per_page: per_page,
  };
  $("#loaderYearToMonth").fadeIn("slow");

  $.ajax({
    url: "ajax/ventasYearToDay.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderYearToMonth").html("Buscando Porfavor Espere ........");
    },
    success: function (data) {
      $("#loaderYearToMonth").html("");
      $(".ventasYearToMonth").html(data).fadeIn("slow");
    },
  });
}
function generarReporteDiario(vista) {
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  agregarEvento("Descargo El Reporte " + vista + "", 3);
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();

  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  var cliente = query.replace("&", "%26");
  location.href =
    "views/moduls/reporteador.php?reporteVentasDiarias=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&semana=" +
    semana +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&productos=" +
    producto +
    "&clientes=" +
    cliente +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&marca=" +
    marca +
    "&vista=" +
    vista;
}
function generarReporteMensual(vista) {
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));
  agregarEvento("Descargo El Reporte " + vista + "", 3);
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  var cliente = query.replace("&", "%26");
  location.href =
    "views/moduls/reporteador.php?reporteVentasMensuales=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&productos=" +
    producto +
    "&clientes=" +
    cliente +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&marca=" +
    marca +
    "&vista=" +
    vista;
}
function generarReporteAnual(vista) {
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  agregarEvento("Descargo El Reporte " + vista + "", 3);
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  var cliente = query.replace("&", "%26");
  location.href =
    "views/moduls/reporteador.php?reporteVentasAnuales=" +
    "&estatus=" +
    estatus +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&productos=" +
    producto +
    "&clientes=" +
    cliente +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&marca=" +
    marca +
    "&vista=" +
    vista;
}
function generarReporteDetalleDocumentos(vista) {
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  agregarEvento("Descargo El Reporte " + vista + "", 3);
  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }

  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  var estatus = $("#estatus").val();
  var año = $("#anio").val();
  var per_page = $("#per_page").val();
  var page = 1;
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var mes = $("#mesDetalle").val();
  var abonado = $("#abonado").val();
  var tipo = $("#tipoBusqueda").val();
  var fechaInicio = $("#fechaInicio").val();
  var fechaFin = $("#fechaFin").val();
  var cliente = query.replace("&", "%26");
  location.href =
    "views/moduls/reporteador.php?reporteVentasDetalle=" +
    "&estatus=" +
    estatus +
    "&año=" +
    año +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&mes=" +
    mes +
    "&abonado=" +
    abonado +
    "&tipo=" +
    tipo +
    "&fechaInicio=" +
    fechaInicio +
    "&fechaFin=" +
    fechaFin +
    "&clientes=" +
    cliente +
    "&vista=" +
    vista;
}
function generarReporteMargenesUtilidad(vista) {
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanalUtilidad"));
  agregarEvento("Descargo El Reporte Margenes De Utilidad", 3);

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanalUtilidad", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var cliente = query.replace("&", "%26");
  location.href =
    "views/moduls/reporteador.php?reporteMargenesUtilidad=" +
    "&estatus=" +
    estatus +
    "&año=" +
    localStorage.año +
    "&canal=" +
    canal +
    "&per_page=" +
    per_page +
    "&page=" +
    1 +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&mes=" +
    localStorage.mes +
    "&clientes=" +
    cliente +
    "&vista=" +
    vista;
}
function cargarBitacora(page) {
  var query = $("#nombre").val();
  var accion = $("#accion").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "bitacora",
    page: page,
    query: query,
    accion: accion,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/conceptos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".bitacora").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function agregarEvento(accion, idAccion) {
  var formData = new FormData();
  formData.append("accionBitacora", accion);
  formData.append("idAccion", idAccion);
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
  })
    .done(function (res) {
      var response = res.replace(/['"]+/g, "");
      if (response == "ok") {
      }
    })
    .fail(function (res) {});
}
function limpiarFiltros(tipo) {
  switch (tipo) {
    case "1":
      localStorage.setItem("arrayClientes", "[]");

      var tags = $("#arregloClientes").tagEditor("getTags")[0].tags;
      for (i = 0; i < tags.length; i++) {
        $("#arregloClientes").tagEditor("removeTag", tags[i]);
      }
      break;
    case "2":
      localStorage.setItem("arrayClientes", "[]");

      var tags = $("#arregloClientes").tagEditor("getTags")[0].tags;
      for (i = 0; i < tags.length; i++) {
        $("#arregloClientes").tagEditor("removeTag", tags[i]);
      }
      localStorage.setItem("arrayProductos", "[]");
      var tags = $("#arregloProductos").tagEditor("getTags")[0].tags;
      for (i = 0; i < tags.length; i++) {
        $("#arregloProductos").tagEditor("removeTag", tags[i]);
      }
      break;
    case "3":
      localStorage.setItem("arrayProductosCostos", "[]");
      var tags = $("#arregloProductosCostos").tagEditor("getTags")[0].tags;
      for (i = 0; i < tags.length; i++) {
        $("#arregloProductosCostos").tagEditor("removeTag", tags[i]);
      }

      break;
  }
  switch (ruta[1]) {
    case "ventasClienteDiario":
      cargarVentasClienteDiario(1, "");
      break;
    case "ventasCanalDiario":
      cargarVentasCanalDiario(1);
      break;
    case "ventasAgenteDiario":
      cargarVentasAgenteDiario(1);
      break;
    case "ventasProductoDiario":
      cargarVentasProductoMontoDiario(1, "", "");
      cargarVentasProductoUnidadesDiario(1, "", "");
      break;
    case "ventasLitreadoDiario":
      cargarVentasLitreadoMontoDiario(1, "", "");
      cargarVentasLitreadoUnidadesDiario(1, "", "");
      break;
    case "ventasMarcaDiario":
      cargarVentasMarcaDiario(1, "");
      break;
    case "ventasClienteMensual":
      cargarVentasCliente(1, "");
      break;
    case "ventasCanalMensual":
      cargarVentasCanal(1);
      break;
    case "ventasAgenteMensual":
      cargarVentasAgente(1);
      break;
    case "ventasProductoMensual":
      cargarVentasProductoMonto(1, "", "");
      cargarVentasProductoUnidades(1, "", "");
      break;
    case "ventasLitreadoMensual":
      cargarVentasLitreadoMonto(1, "", "");
      cargarVentasLitreadoUnidades(1, "", "");
      break;
    case "ventasMarcaMensual":
      cargarVentasMarcaMensual(1, "");
      break;
    case "ventasClienteAnual":
      cargarVentasClienteAnual(1, "");
      break;
    case "ventasCanalAnual":
      cargarVentasCanalAnual(1);
      break;
    case "ventasAgenteAnual":
      cargarVentasAgenteAnual(1);
      break;
    case "ventasProductoAnual":
      cargarVentasProductoMontoAnual(1, "", "");
      cargarVentasProductoUnidadesAnual(1, "", "");
      break;
    case "ventasLitreadoAnual":
      cargarVentasLitreadoMontoAnual(1, "", "");
      cargarVentasLitreadoUnidadesAnual(1, "", "");
      break;
    case "ventasMarcaAnual":
      cargarVentasMarcaAnual(1, "");
      break;
    case "detalleDocumentos":
      cargarDetalleDocumentos(1);
      break;
    case "utilidad":
      cargarMargenesUtilidad(1);
      break;
    case "ultimosCostos":
      cargarUltimosCostos(1);
      break;
    case "ventasOrigenVentaMensual":
      cargarVentasOrigenVenta(1);
      break;
    case "diarioVentas":
      cargarDiarioVentas(1);
      break;
  }
}
function setDiasSemana() {
  var año = $("#añoDashboard").val();
  var semana = $("#semanaDashboard").val();
  $("#numSemana").html(semana);
  $("#numberWeek").html("SEMANA " + semana);
  var parametros = {
    anio: año,
    semana: semana,
    action: "diasSemana",
  };
  $.ajax({
    url: "ajax/weekDays.ajax.php",
    data: parametros,
    success: function (data) {
      $("#diaDashboard").empty();
      var datos = JSON.parse(data);
      var select = document.getElementById("diaDashboard");
      var option = document.createElement("option");
      option.innerHTML = "Toda la semana";
      option.value = "";
      select.appendChild(option);
      for (var i = 0; i < datos.length; i++) {
        var option = document.createElement("option");
        option.innerHTML = datos[i];
        option.value = datos[i];
        select.appendChild(option);
      }
      $("#periodWeek").html("PERIODO " + datos[0] + " - " + datos[5]);
    },
  });
}
function dataDashboard() {
  var año = $("#añoDashboard").val();
  var semana = $("#semanaDashboard").val();
  var dia = $("#diaDashboard").val();
  if (dia === null) {
    dia = "";
  } else {
    dia = dia;
  }

  $("#numSemana").html(semana);
  $("#numberWeek").html("SEMANA " + semana);
  loadIndicadoresDashboard(año, semana, dia);
  loadIndicadoresDashboardConcepto(año, semana, dia);
  grafico1VentasDiarias(año, semana, dia);
  grafico2VentasDiarias(año, semana, dia);
}
function dataObjetivosDashboard() {
  var año = $("#anio").val();
  var mes = $("#mesObjetivo").val();
  var mesValue = document.getElementById("mesObjetivo");
  var mesElegido = mesValue.options[mesValue.selectedIndex].text;
  graficoObjetivosvsVenta(año, mes, mesElegido);
  graficoObjetivosvsVentaAcumulado(año, mes);
  graficoObjetivosvsVentaCanal(año, mes, mesElegido);
  graficoObjetivosvsVentaAcumuladoCanal(año, mes);
  graficoObjetivosVenta(año, mes, mesElegido);
  graficoIndicadorPronostico(año, mes, mesElegido);
  graficoIndicadorPronosticoAcumulado(año, mes);
  graficoObjetivosVentaAcumulado(año, mes, mesElegido);
  graficoObjetivosCanal(año, mes, mesElegido);
  graficoObjetivosCanalAcumulado(año, mes);
}
function accionBusqueda() {
  var valor = document.getElementById("tipoBusqueda").value;
  if (valor == 1) {
    $(".busquedaMensual").show();
    $(".busquedaRango").hide();
  } else {
    $(".busquedaMensual").hide();
    $(".busquedaRango").show();
  }
}
function cargarVentasCanalFiltro(page) {
  var vista = "cargarVentasCanalFiltro";
  var fechaInicio1 = $("#fechaInicio1").val();
  var fechaFinal1 = $("#fechaFinal1").val();
  var fechaInicio2 = $("#fechaInicio2").val();
  var fechaFinal2 = $("#fechaFinal2").val();
  var estatus = 0;
  var per_page = 10;
  var parametros = {
    action: "ventasCanalFiltro",
    page: page,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    fechaInicio1: fechaInicio1,
    fechaFinal1: fechaFinal1,
    fechaInicio2: fechaInicio2,
    fechaFinal2: fechaFinal2,
  };

  $.ajax({
    url: "ajax/ventasYearToDay.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").fadeIn("slow");
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $("#loader").html("");
      $(".ventasCanalFiltroData").html(data).fadeIn("slow");
    },
  });
}
/***NUEVOS MODULOS INTEGRACION */
/***
 * INDICADORES
 */
function cargarIndicadoresUtilidad(page) {
  var vista = "cargarIndicadoresUtilidad";
  var query = "";
  var agente = "";
  var centro = "";
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "indicadoresUtilidad",
    page: page,
    query: query,
    anio: anio,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loaderView1").fadeIn("slow");
  $("#loaderView1").html("Cargando Porfavor Espere ........");
  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderView1").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadoresUtilidad").html(data).fadeIn("slow");
      $("#loaderView1").html("");
    },
  });
}
function redireccionAccionVentasIndicadores(
  nombre,
  tipo,
  fecha,
  año,
  mes,
  centro
) {
  switch (tipo) {
    case "Canal":
      localStorage.setItem("canalDetalle", nombre);
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("centroDetalle", centro);
      localStorage.setItem("clienteDetalle", "");
      localStorage.setItem("fechaDetalle", fecha);
      localStorage.setItem("mesDetalle", mes);
      localStorage.setItem("semanaDetalle", "");
      localStorage.setItem("añoDetalle", año);
      localStorage.setItem("conceptoDetalle", "");
      localStorage.setItem("codigoDetalle", "");
      localStorage.setItem("marcaDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
  }
}
/***
 * INDICADORES TRASPASOS
 */
function cargarIndicadoresInventarios(page) {
  var vista = "cargarIndicadoresInventarios";
  var query = "";
  var agente = "";
  var centro = "";
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anioIndicadores").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "indicadoresInventarios",
    page: page,
    query: query,
    anio: anio,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loaderView2").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");
  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderView2").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadores").html(data).fadeIn("slow");
      $("#loaderView2").html("");
    },
  });
}

function detalleIndicadores(centro, año, mes, centroDesglose) {
  var datos = new FormData();
  datos.append("accion", "detalleIndicadores");
  datos.append("centro", centro);
  datos.append("año", año);
  datos.append("mes", mes);
  datos.append("centroDesglose", centroDesglose);
  $("#modalEntradasSalidasCanal").modal();
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var response = respuesta;
      var listaCabeceras = ["CENTRO", "ENTRADAS", "SALIDAS", "TOTAL"];
      body = document.getElementById("tablaDetalleIndicadores");
      thead = document.createElement("thead");
      theadTr = document.createElement("tr");
      for (var h = 0; h < listaCabeceras.length; h++) {
        var celdaThead = document.createElement("th");
        var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
        celdaThead.appendChild(textoCeldaThead);
        theadTr.appendChild(celdaThead);
      }
      thead.appendChild(theadTr);
      tblBody = document.createElement("tbody");
      var arregloNombres = ["CANAL", "ENTRADAS", "SALIDAS", "TOTAL"];
      // Crea las celdas
      for (var i = 0; i < 1; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");
        for (var j = 0; j < arregloNombres.length; j++) {
          var celda = document.createElement("td");
          if (arregloNombres[j] == "CANAL") {
            if (centroDesglose == "") {
              var valor = response[arregloNombres[j]];
            } else {
              var valor = centroDesglose;
            }
          } else if (arregloNombres[j] == "TOTAL") {
            var valor2 = parseFloat(response[arregloNombres[j]]);
            valor = "$" + formatNumber(parseFloat(valor2.toFixed(2)));
          } else if (arregloNombres[j] == "ENTRADAS") {
            celda.setAttribute(
              "onclick",
              "detalleEntradasSalidas('" +
                centro +
                "','" +
                año +
                "','" +
                mes +
                "','ENTRADAS','" +
                centroDesglose +
                "')"
            );
            celda.setAttribute("class", "btnDetalleEntradasSalidas");
            var valor2 = parseFloat(response[arregloNombres[j]]);
            valor = "$" + formatNumber(parseFloat(valor2.toFixed(2)));
          } else if (arregloNombres[j] == "SALIDAS") {
            celda.setAttribute(
              "onclick",
              "detalleEntradasSalidas('" +
                centro +
                "','" +
                año +
                "','" +
                mes +
                "','SALIDAS','" +
                centroDesglose +
                "')"
            );
            celda.setAttribute("class", "btnDetalleEntradasSalidas");
            var valor2 = parseFloat(response[arregloNombres[j]]);
            valor = "$" + formatNumber(parseFloat(valor2.toFixed(2)));
          }
          var textoCelda = document.createTextNode(valor);
          celda.appendChild(textoCelda);
          hilera.appendChild(celda);
        }
        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
      }
      // appends <table> into <body>
      body.appendChild(tblBody);
      body.appendChild(thead);
    },
  });
}
$(".btnCerrarDetalleIndicadores").click(function () {
  var nodos = document.getElementById("tablaDetalleIndicadores");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});

function detalleEntradasSalidas(centro, año, mes, tipo, centroDesglose) {
  $("#textModal").html("DETALLE " + tipo + "");
  var datos = new FormData();
  datos.append("accion", "detalleEntradasSalidas");
  datos.append("centro", centro);
  datos.append("año", año);
  datos.append("mes", mes);
  datos.append("tipo", tipo);
  datos.append("centroDesglose", centroDesglose);
  $("#modalDetalleEntradasSalidas").modal();
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var response = respuesta;
      var listaCabeceras = [
        "SERIE",
        "FOLIO",
        "FECHA",
        "ALM ORIGEN",
        "ALM DESTINO",
        "REFERENCIA",
        "TOTAL",
      ];
      body = document.getElementById("tablaDetalleEntradasSalidas");
      thead = document.createElement("thead");
      theadTr = document.createElement("tr");
      for (var h = 0; h < listaCabeceras.length; h++) {
        var celdaThead = document.createElement("th");
        var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
        celdaThead.appendChild(textoCeldaThead);
        theadTr.appendChild(celdaThead);
      }
      thead.appendChild(theadTr);
      tblBody = document.createElement("tbody");
      var arregloNombres = [
        "CSERIEDOCUMENTO",
        "CFOLIO",
        "CFECHA",
        "ALMORIGEN",
        "ALMDESTINO",
        "CREFERENCIA",
        "TOTAL",
      ];
      // Crea las celdas
      var acumulado = 0;
      for (var i = 0; i < response.length; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");
        for (var j = 0; j < arregloNombres.length; j++) {
          var celda = document.createElement("td");
          if (arregloNombres[j] == "CFOLIO") {
            celda.setAttribute(
              "onclick",
              "detalleProductosDocumento('" + response[i]["CIDDOCUMENTO"] + "')"
            );
            celda.setAttribute("class", "btnDetalleEntradasSalidas");
            var valor = parseInt(response[i][arregloNombres[j]]);
          } else if (arregloNombres[j] == "TOTAL") {
            if (response[i][arregloNombres[j]] === null) {
              var monto = 0;
            } else {
              var monto = response[i][arregloNombres[j]];
            }
            var valor2 = parseFloat(monto);
            valor = "$" + formatNumber(parseFloat(Math.abs(valor2).toFixed(2)));
            acumulado = acumulado + parseFloat(Math.abs(valor2).toFixed(2));
          } else {
            var valor = response[i][arregloNombres[j]];
          }
          var textoCelda = document.createTextNode(valor);
          celda.appendChild(textoCelda);
          hilera.appendChild(celda);
        }
        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
      }
      var hilera = document.createElement("tr");
      hilera.style.background = "#005794";
      hilera.style.color = "#ffffff";
      for (var j = 0; j < arregloNombres.length; j++) {
        var celda = document.createElement("td");
        celda.style.color = "#ffffff";
        celda.style.fontWeight = "900";
        if (arregloNombres[j] == "TOTAL") {
          valor = "$" + formatNumber(parseFloat(acumulado.toFixed(2)));
        } else {
          valor = "";
        }
        var textoCelda = document.createTextNode(valor);
        celda.appendChild(textoCelda);
        hilera.appendChild(celda);
      }
      tblBody.appendChild(hilera);
      // appends <table> into <body>
      body.appendChild(tblBody);
      body.appendChild(thead);
    },
  });
}
$(".btnCerrarEntradasSalidas").click(function () {
  var nodos = document.getElementById("tablaDetalleEntradasSalidas");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});

function detalleProductosDocumento(idDocumento) {
  $("#textModal").html("DETALLE DOCUMENTO");
  var datos = new FormData();
  datos.append("accion", "detalleDocumento");
  datos.append("idDocumentoDetalle", idDocumento);
  $("#modalDetalleDocumentoIndicadores").modal();
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var response = respuesta;
      var listaCabeceras = [
        "N° MOVIMIENTO",
        "CÓDIGO",
        "NOMBRE",
        "UNIDADES",
        "UNIDAD",
        "U COSTO",
        "COSTO ESP",
        "COSTO CAP",
        "TOTAL",
      ];
      body = document.getElementById("tablaDetalleDocumentoIndicadores");
      thead = document.createElement("thead");
      theadTr = document.createElement("tr");
      for (var h = 0; h < listaCabeceras.length; h++) {
        var celdaThead = document.createElement("th");
        var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
        celdaThead.appendChild(textoCeldaThead);
        theadTr.appendChild(celdaThead);
      }
      thead.appendChild(theadTr);
      tblBody = document.createElement("tbody");
      var arregloNombres = [
        "CNUMEROMOVIMIENTO",
        "CCODIGOPRODUCTO",
        "CNOMBREPRODUCTO",
        "CUNIDADESCAPTURADAS",
        "CNOMBREUNIDAD",
        "COST",
        "CCOSTOCAPTURADO",
        "CCOSTOESPECIFICO",
        "CTOTAL",
      ];
      // Crea las celdas
      var acumulado = 0;
      for (var i = 0; i < response.length; i++) {
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");
        for (var j = 0; j < arregloNombres.length; j++) {
          var celda = document.createElement("td");
          if (arregloNombres[j] == "CIDPRODUCTO") {
            var valor = parseInt(response[i][arregloNombres[j]]);
          } else if (arregloNombres[j] == "CTOTAL" || arregloNombres[j] == "COST" || arregloNombres[j] == "CCOSTOCAPTURADO" || arregloNombres[j] == "CCOSTOESPECIFICO") {
            if (response[i][arregloNombres[j]] === null) {
              var monto = 0;
            } else {

              var monto = response[i][arregloNombres[j]];
              if(arregloNombres[j] == "CTOTAL"){
               var monto2  = response[i][arregloNombres[j]];
              } else {
               var monto2  = 0;
              }
              
            }
            var valor2 = parseFloat(monto);
            var valor = "$" + formatNumber(parseFloat(Math.abs(valor2).toFixed(2)));
            
            acumulado = acumulado + parseFloat(Math.abs(parseFloat(monto2)).toFixed(2));
            
            
          } else {
            var valor = response[i][arregloNombres[j]];
          }
          var textoCelda = document.createTextNode(valor);
          celda.appendChild(textoCelda);
          hilera.appendChild(celda);
        }
        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
      }
      var hilera = document.createElement("tr");
      hilera.style.background = "#005794";
      hilera.style.color = "#ffffff";
      for (var j = 0; j < arregloNombres.length; j++) {
        var celda = document.createElement("td");
        celda.style.color = "#ffffff";
        celda.style.fontWeight = "900";
        if (arregloNombres[j] == "CTOTAL") {
          valor = "$" + formatNumber(parseFloat(acumulado.toFixed(2)));
        } else {
          valor = "";
        }
        var textoCelda = document.createTextNode(valor);
        celda.appendChild(textoCelda);
        hilera.appendChild(celda);
      }
      tblBody.appendChild(hilera);
      // appends <table> into <body>
      body.appendChild(tblBody);
      body.appendChild(thead);
    },
  });
}
$(".btnCerrarDetalleDocumentoIndicadores").click(function () {
  var nodos = document.getElementById("tablaDetalleDocumentoIndicadores");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});
/***
 * INDICADORES TRASPASOS DETALLADO
 */
function cargarIndicadoresDetalladoInventarios(page) {
  var vista = "cargarIndicadoresDetalladoInventarios";
  var query = "";
  var agente = "";
  var centro = "";
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anioIndicadoresDetallado").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "indicadoresDetalladoInventarios",
    page: page,
    query: query,
    anio: anio,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loaderView3").fadeIn("slow");
  $("#loaderView3").html("Cargando Porfavor Espere ........");
  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderView3").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadoresDetallado").html(data).fadeIn("slow");
      $("#loaderView3").html("");
    },
  });
}

/***
 * REPORTEADORES INDICADORES
 */
function generarReporteIndicadores(vista) {
  agregarEvento("Descargo El Reporte " + vista + "", 3);
  var estatus = $("#estatus").val();
  if (vista == "indicadoresUtilidad") {
    var anio = $("#anio").val();
  } else {
    var anio = $("#anioIndicadores").val();
  }

  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  location.href =
    "views/moduls/reporteador.php?reporteIndicadoresMensual=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&vista=" +
    vista;
}
function generarReporteDetalladoIndicadores(vista) {
  agregarEvento("Descargo El Reporte " + vista + "", 3);
  var estatus = $("#estatus").val();
  var anio = $("#anioIndicadoresDetallado").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  location.href =
    "views/moduls/reporteador.php?reporteDetalladoIndicadoresMensual=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&vista=" +
    vista;
}
/***NUEVOS MODULOS INTEGRACION */
/***
 * INVENTARIO ACTUAL IMPORTES
 */
function cargarInventarioActual() {
  var vista = "cargarInventarioActual";
  var empresa = $("#empresa").val();
  var ejercicio = $("#ejercicio").val();
  if (ejercicio === null) {
    ejercicio = 3;
  } else {
    ejercicio = ejercicio;
  }
  var parametros = {
    action: "inventarioActual",
    vista: vista,
    empresa: empresa,
    ejercicio: ejercicio,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");
  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadoresData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/***
 * INVENTARIO ACTUAL UNIDADES
 */
function cargarInventarioActualUnidades() {
  var vista = "cargarInventarioActualUnidades";
  var empresa = $("#empresa2").val();
  var ejercicio = $("#ejercicio2").val();
  if (ejercicio === null) {
    ejercicio = 3;
  } else {
    ejercicio = ejercicio;
  }
  var parametros = {
    action: "inventarioActualUnidades",
    vista: vista,
    empresa: empresa,
    ejercicio: ejercicio,
  };
  $("#loaderView").fadeIn("slow");
  $("#loaderView").html("Cargando Porfavor Espere ........");
  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loaderView").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".indicadores").html(data).fadeIn("slow");
      $("#loaderView").html("");
    },
  });
}
function setEjercicios() {
  var empresa = $("#empresa").val();
  var parametros = {
    empresa: empresa,
    action: "ejercicios",
  };
  $.ajax({
    url: "ajax/weekDays.ajax.php",
    data: parametros,
    success: function (data) {
      $("#ejercicio").empty();
      $("#ejercicio2").empty();
      var datos = JSON.parse(data);
      var select = document.getElementById("ejercicio");
      var option = document.createElement("option");
      for (var i = 1; i <= Object.keys(datos).length; i++) {
        var option = document.createElement("option");
        option.innerHTML = datos[i];
        option.value = i;
        select.appendChild(option);
        if (datos[i] == 2023) {
          option.setAttribute("selected", "");
        }
      }
    },
  });
}

function setEjercicios2() {
  var empresa = $("#empresa2").val();
  var parametros = {
    empresa: empresa,
    action: "ejercicios",
  };
  $.ajax({
    url: "ajax/weekDays.ajax.php",
    data: parametros,
    success: function (data) {
      $("#ejercicio2").empty();
      var datos = JSON.parse(data);
      var select = document.getElementById("ejercicio2");
      var option = document.createElement("option");
      for (var i = 1; i <= Object.keys(datos).length; i++) {
        var option = document.createElement("option");
        option.innerHTML = datos[i];
        option.value = i;
        select.appendChild(option);
        if (datos[i] == 2023) {
          option.setAttribute("selected", "");
        }
      }
    },
  });
}

/***
 * REPORTEADOR INVENTARIO ACTUAL
 */
function generarReporteInventarioActual(indicador) {
  if (indicador === "1") {
    vista = "importe";
    var empresa = $("#empresa").val();
    var ejercicio = $("#ejercicio").val();
    var ejercicioValue = document.getElementById("ejercicio");
    var año = ejercicioValue.options[ejercicioValue.selectedIndex].text;
  } else {
    vista = "unidades";
    var empresa = $("#empresa2").val();
    var ejercicio = $("#ejercicio2").val();
    var ejercicioValue = document.getElementById("ejercicio2");
    var año = ejercicioValue.options[ejercicioValue.selectedIndex].text;
  }
  if (ejercicio === null) {
    ejercicio = 3;
  } else {
    ejercicio = ejercicio;
  }

  location.href =
    "views/moduls/reporteador.php?reporteInventarioActual=" +
    "&empresa=" +
    empresa +
    "&ejercicio=" +
    ejercicio +
    "&año=" +
    año +
    "&vista=" +
    vista;
}
/***NUEVOS MODULOS INTEGRACION */
/***
 * IMPRESION DE DOCUMENTOS
 */
function listarDocumentosNoImpresos(page) {
  var per_page = 500;
  var vista = "cargarListaRequisiciones";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var idDocumentoDe = $("#idDocumentoDe").val();
  var idConcepto = $("#idConcepto").val();
  var estatus = $("#estatus").val();
  var parametros = {
    action: "listadoDocumentosNoImpresos",
    page: page,
    per_page: per_page,
    idDocumentoDe: idDocumentoDe,
    idConcepto: idConcepto,
    estatus: estatus,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/documentos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function impresionDocumentos() {
  var idDocumentoDe = $("#idDocumentoDe").val();
  var idConcepto = $("#idConcepto").val();
  var estatus = $("#estatus").val();
  var datos = new FormData();
  datos.append("accion", "impresionDocumentos");
  datos.append("idDocumentoDe", idDocumentoDe);
  datos.append("idConcepto", idConcepto);
  datos.append("estatus", estatus);
  $.ajax({
    url: "ajax/inventariosFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res) {
      var response = res.replace(/['"]+/g, "");
      if (response == "ok") {
        listarDocumentosNoImpresos(1);
        Swal.fire({
          icon: "success",
          title: "¡Documentos Impresos Correctamente!",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    },
  });
}

/***NUEVOS MODULOS INTEGRACION */
/***
 * ORIGEN DE LA VENTA
 */
function cargarVentasOrigenVenta(page) {
  var vista = "cargarVentasOrigenVenta";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasOrigen",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasCanalData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarDetalleVentasClienteOrigen(page) {
  var vista = "cargarDetalleVentasClienteOrigen";
  var tipoVista = localStorage.tipoVista;
  var anio = localStorage.añoDetalle;
  if (tipoVista == "origenVenta") {
    var origenVenta = localStorage.getItem("origenVentaDetalle");
    if (origenVenta != "") {
      var origen = localStorage.getItem("origenVentaDetalle");
    } else {
      var origen = "";
    }

    if (localStorage.mesDetalle == "0") {
      var mes = "";
    } else {
      var mes = localStorage.mesDetalle;
    }
  } else {
    var nombreDia = localStorage.nombreDiaDetalle;
    var centroDetalle = localStorage.centroDetalle;
    var mesDiario = localStorage.getItem("mesDiarioVentas");
    if (mesDiario != "") {
      var mes = localStorage.getItem("mesDiarioVentas");
    } else {
      var mes = "";
    }
  }

  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var clientes = "";
  } else {
    if (arreglo == "[]") {
      var clientes = "";
    } else {
      var clientes = JSON.stringify(arreglo);
    }
  }

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }

  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();

  if (tipoVista == "origenVenta") {
    var parametros = {
      action: "detalleVentasClienteOrigen",
      page: page,
      origen: origen,
      centro: centro,
      agente: agente,
      canal: canal,
      cliente: clientes,
      anio: anio,
      mes: mes,
      vista: vista,
      campo: campo,
      orden: orden,
      per_page: per_page,
    };
  } else {
    var parametros = {
      action: "detalleVentasDiario",
      page: page,
      nombreDia: nombreDia,
      centro: centro,
      centroDetalle: centroDetalle,
      agente: agente,
      canal: canal,
      cliente: clientes,
      anio: anio,
      mes: mes,
      vista: vista,
      campo: campo,
      orden: orden,
      per_page: per_page,
    };
  }

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/detalleVentas.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDetalleClientes").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function generarReporteOrigenVentaMensual(vista) {
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */

  agregarEvento("Descargo El Reporte " + vista + "", 3);

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  var cliente = query.replace("&", "%26");
  location.href =
    "views/moduls/reporteador.php?reporteVentasOrigenVentaMensuales=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&clientes=" +
    cliente +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&vista=" +
    vista;
}
function generarReporteVentasClienteOrigen(vista) {
  var tipoVista = localStorage.tipoVista;

  if (tipoVista == "origenVenta") {
    var origenVenta = localStorage.getItem("origenVentaDetalle");
    if (origenVenta != "") {
      var origen = localStorage.getItem("origenVentaDetalle");
    } else {
      var origen = "";
    }

    if (localStorage.mesDetalle == "0") {
      var mes = "";
    } else {
      var mes = localStorage.mesDetalle;
    }
  } else {
    var nombreDia = localStorage.nombreDiaDetalle;
    var centroDetalle = localStorage.centroDetalle;
    var mesDiario = localStorage.getItem("mesDiarioVentas");
    if (mesDiario != "") {
      var mes = localStorage.getItem("mesDiarioVentas");
    } else {
      var mes = "";
    }
  }

  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }

  var anio = localStorage.añoDetalle;

  agregarEvento("Descargo El Reporte " + vista + "", 3);

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  var cliente = query.replace("&", "%26");

  if (tipoVista == "origenVenta") {
    location.href =
      "views/moduls/reporteador.php?reporteVentasClienteOrigen=" +
      "&origen=" +
      origen +
      "&año=" +
      anio +
      "&mes=" +
      mes +
      "&agente=" +
      agente +
      "&canal=" +
      canal +
      "&centro=" +
      centro +
      "&per_page=" +
      per_page +
      "&page=" +
      page +
      "&clientes=" +
      cliente +
      "&campo=" +
      campo +
      "&orden=" +
      orden +
      "&vista=" +
      vista;
  } else {
    location.href =
      "views/moduls/reporteador.php?reporteVentasClienteDiario=" +
      "&nombreDia=" +
      nombreDia +
      "&año=" +
      anio +
      "&mes=" +
      mes +
      "&agente=" +
      agente +
      "&canal=" +
      canal +
      "&centro=" +
      centro +
      "&centroDetalle=" +
      centroDetalle +
      "&per_page=" +
      per_page +
      "&page=" +
      page +
      "&clientes=" +
      cliente +
      "&campo=" +
      campo +
      "&orden=" +
      orden +
      "&vista=" +
      vista;
  }
}
/***
 * NUEVOS MODULOS INTEGRACION
 *
 * DIARIO DE VENTAS
 *
 */
function cargarDiarioVentas(page) {
  var vista = "cargarDiarioVentas";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var mes = $("#mes").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  localStorage.setItem("mesDiarioVentas", mes);
  var parametros = {
    action: "ventasDiarioVentas",
    page: page,
    query: query,
    anio: anio,
    mes: mes,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanalDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasCanalData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/**
 * DIARIO VENTAS
 */
function generarReporteDiarioVentas(vista) {
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayCanal", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */

  agregarEvento("Descargo El Reporte " + vista + "", 3);

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var mes = $("#mes").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;
  var cliente = query.replace("&", "%26");
  location.href =
    "views/moduls/reporteador.php?reporteVentasDiarioVentas=" +
    "&estatus=" +
    estatus +
    "&mes=" +
    mes +
    "&año=" +
    anio +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&clientes=" +
    cliente +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&vista=" +
    vista;
}
/**
 * NUEVOS MODULOS DE INTEGRACION
 *
 * OBJETIVOS DE VENTA 2023
 *
 */
function cargarObjetivos(page) {
  var vista = "cargarObjetivos";

  var anio = $("#anio").val();
  var mes = $("#mesObjetivo").val();
  var mesValue = document.getElementById("mesObjetivo");
  var mesElegido = mesValue.options[mesValue.selectedIndex].text;
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "objetivosVentas",
    page: page,
    anio: anio,
    mes: mes,
    mesElegido: mesElegido,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasAgente.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".objetivosData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function generarReporteObjetivos(vista) {
  agregarEvento("Descargo El Reporte " + vista + "", 3);

  var anio = $("#anio").val();
  var mes = $("#mesObjetivo").val();
  var mesValue = document.getElementById("mesObjetivo");
  var mesElegido = mesValue.options[mesValue.selectedIndex].text;
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;

  location.href =
    "views/moduls/reporteador.php?reporteObjetivosVentas=" +
    "&año=" +
    anio +
    "&mes=" +
    mes +
    "&mesElegido=" +
    mesElegido +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&vista=" +
    vista;
}
function cargarObjetivosCanal(page) {
  var vista = "cargarObjetivosCanal";

  var anio = $("#anio").val();
  var mes = $("#mesObjetivo").val();
  var mesValue = document.getElementById("mesObjetivo");
  var mesElegido = mesValue.options[mesValue.selectedIndex].text;
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "objetivosVentasCanal",
    page: page,
    anio: anio,
    mes: mes,
    mesElegido: mesElegido,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasAgente.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".objetivosCanalData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/**
 * DEFINICION DE OBJETIVOS
 */
function cargarDefinicionObjetivos(page) {
  var vista = "cargarDefinicionObjetivos";

  var per_page = $("#per_page").val();
  var canal = $("#canal").val();
  var campo = "CID";
  var orden = "asc";
  var parametros = {
    action: "definicionObjetivos",
    page: page,
    canal: canal,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasAgente.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".objetivosData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/**
 * DETALLE VENTAS OBJETIVOS
 */
function cargarDetalleVentasClienteObjetivos(page) {
  var vista = "cargarDetalleVentasClienteObjetivos";
  var anio = localStorage.añoDetalleObjetivos;
  var mes = localStorage.mesDetalleObjetivos;

  var agente = localStorage.agenteDetalleObjetivos;
  var canal = localStorage.canalDetalleObjetivos;

  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();

  var parametros = {
    action: "detalleVentasClienteObjetivos",
    page: page,
    agente: agente,
    canal: canal,
    anio: anio,
    mes: mes,
    vista: vista,
    campo: campo,
    orden: orden,
    per_page: per_page,
  };

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/detalleVentas.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDetalleClientes").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/**
 * REPORTE DE VENTAS CLIENTE OBJETIVOS
 */
function generarReporteVentasClienteObjetivos(vista) {
  var anio = localStorage.añoDetalleObjetivos;
  var mes = localStorage.mesDetalleObjetivos;

  var agente = localStorage.agenteDetalleObjetivos;
  var canal = localStorage.canalDetalleObjetivos;

  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;

  agregarEvento("Descargo El Reporte " + vista + "", 3);

  location.href =
    "views/moduls/reporteador.php?reporteVentasClienteObjetivos=" +
    "&año=" +
    anio +
    "&mes=" +
    mes +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&vista=" +
    vista;
}
