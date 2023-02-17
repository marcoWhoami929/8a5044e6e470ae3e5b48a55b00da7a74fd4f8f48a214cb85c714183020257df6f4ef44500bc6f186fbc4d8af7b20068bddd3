/****FUNCION PARA FORMATEAR NUMEROS */
const format = (num) => {
  const n = String(num),
    p = n.indexOf(".");
  return n.replace(/\d(?=(?:\d{3})+(?:\.|$))/g, (m, i) =>
    p < 0 || i < p ? `${m},` : m
  );
};

function loadIndicadoresDashboardConcepto(año, semana, dia) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/indicadoresDashboard.ajax.php?ventas=semanalConceptos&año=" +
        año +
        "&semana=" +
        semana +
        "&dia=" +
        dia
    );

    const respuesta = await respuestaRaw.json();
    var totalAcumulado =
      respuesta.conceptos[0]["value"] +
      respuesta.conceptos[1]["value"] +
      respuesta.conceptos[2]["value"] +
      respuesta.conceptos[3]["value"] +
      respuesta.conceptos[4]["value"];

    var acumuladoFacturas =
      respuesta.conceptos[3]["value"] + respuesta.conceptos[4]["value"];
    $("#dataNotasCargo").html(
      "$ " + format(respuesta.conceptos[0]["value"].toFixed(2))
    );
    $("#dataNotasCredito").html(
      "$ " + format(respuesta.conceptos[1]["value"].toFixed(2))
    );
    $("#dataNotasDevolucion").html(
      "$ " + format(respuesta.conceptos[2]["value"].toFixed(2))
    );

    $("#facturas").html("$ " + format(acumuladoFacturas.toFixed(2)));
    $("#totalesConceptos").html("$ " + format(totalAcumulado.toFixed(2)));
  })();
}
function loadIndicadoresDashboard(año, semana, dia) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/indicadoresDashboard.ajax.php?ventas=semanal&año=" +
        año +
        "&semana=" +
        semana +
        "&dia=" +
        dia
    );

    const respuesta = await respuestaRaw.json();
    var totalAcumulado =
      respuesta.canales[0]["value"] +
      respuesta.canales[1]["value"] +
      respuesta.canales[2]["value"] +
      respuesta.canales[3]["value"] +
      respuesta.canales[4]["value"];

    var totalAcumuladoTiendas =
      respuesta.tiendas[0]["value"] +
      respuesta.tiendas[1]["value"] +
      respuesta.tiendas[2]["value"] +
      respuesta.tiendas[3]["value"] +
      respuesta.tiendas[4]["value"] +
      respuesta.tiendas[5]["value"];

    $("#dashboardMayoreo").html(
      "$ " + format(respuesta.canales[0]["value"].toFixed(2))
    );
    $("#dashboardEcommerce").html(
      "$ " + format(respuesta.canales[1]["value"].toFixed(2))
    );
    $("#dashboardFlotillas").html(
      "$ " + format(respuesta.canales[2]["value"].toFixed(2))
    );

    $("#dashboardRutas").html(
      "$ " + format(respuesta.canales[3]["value"].toFixed(2))
    );
    $("#dashboardTiendas").html(
      "$ " + format(respuesta.canales[4]["value"].toFixed(2))
    );
    $("#dashboardTotales").html("$ " + format(totalAcumulado.toFixed(2)));
    $("#dataSanManuel").html(
      "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
        format(respuesta.tiendas[0]["value"].toFixed(2))
    );
    $("#dataSantiago").html(
      "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
        format(respuesta.tiendas[1]["value"].toFixed(2))
    );
    $("#dataCapu").html(
      "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
        format(respuesta.tiendas[3]["value"].toFixed(2))
    );
    $("#dataReforma").html(
      "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
        format(respuesta.tiendas[4]["value"].toFixed(2))
    );
    $("#dataLasTorres").html(
      "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
        format(respuesta.tiendas[5]["value"].toFixed(2))
    );
    $("#dataAcatepec").html(
      "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
        format(respuesta.tiendas[2]["value"].toFixed(2))
    );
    $("#dashboardTotalesTiendas").html(
      "$ " + format(totalAcumuladoTiendas.toFixed(2))
    );
  })();
}
$(function () {
  var arreglo = {
    ventasDay: 1,
    ventasYearToDay: 0,
    ventasYearToWeek: 0,
    ventasYearToMonth: 0,
  };
  var nombresAcciones = [
    "ventasDay",
    "ventasYearToDay",
    "ventasYearToWeek",
    "ventasYearToMonth",
  ];
  var identificadoresCheck = [
    "checkSalesDay",
    "checkSalesYearDay",
    "checkSalesYearWeek",
    "checkSalesYearMonth",
  ];
  if (localStorage.accionesTablero == undefined) {
    localStorage.setItem("accionesTablero", JSON.stringify(arreglo));
  } else {
    var arregloAcciones = JSON.parse(localStorage.accionesTablero);
    for (var i = 0; i < 4; i++) {
      if (arregloAcciones[nombresAcciones[i]] == 1) {
        document
          .getElementById("" + identificadoresCheck[i] + "")
          .setAttribute("checked", true);
      } else {
        document
          .getElementById("" + identificadoresCheck[i] + "")
          .removeAttribute("checked");
      }
    }
  }
});

function accionesVista(identificador) {
  var arregloAcciones = JSON.parse(localStorage.accionesTablero);
  if (event.target.checked) {
    arregloAcciones[identificador] = 1;
    localStorage.setItem("accionesTablero", JSON.stringify(arregloAcciones));
  } else {
    arregloAcciones[identificador] = 0;
    localStorage.setItem("accionesTablero", JSON.stringify(arregloAcciones));
  }
}
