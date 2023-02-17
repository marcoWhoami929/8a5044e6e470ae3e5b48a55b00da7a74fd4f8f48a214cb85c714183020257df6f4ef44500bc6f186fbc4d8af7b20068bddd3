Highcharts.setOptions({
  lang: {
    numericSymbols: null,
  },
  colors: [
    "#058DC7",
    "#50B432",
    "#ED561B",
    "#DDDF00",
    "#24CBE5",
    "#64E572",
    "#FF9655",
    "#FFF263",
    "#6AF9C4",
  ],
});
var currency = {
  style: "currency",
  currency: "MXN",
};
function grafico1VentasDiarias(año, semana, dia) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=grafico1&año=" +
        año +
        "&semana=" +
        semana +
        "&dia=" +
        dia
    );

    const respuesta = await respuestaRaw.json();

    const $grafica = document.querySelector("#graficoVentasDiariasBar");

    const etiquetas = respuesta.etiquetas;
    const series = respuesta.series;

    // Create the chart
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
        options3d: {
          enabled: true,
          alpha: 15,
          beta: 15,
          viewDistance: 25,
          depth: 40,
        },
      },
      title: {
        text: "Ventas Semana #" + semana,
      },
      subtitle: {
        text: "Dar click en el canal para ver mas detalles",
      },
      accessibility: {
        announceNewData: {
          enabled: true,
        },
      },
      xAxis: {
        type: "category",
      },
      yAxis: {
        title: {
          text: "Ventas Totales Diarias",
        },
      },
      legend: {
        enabled: false,
      },
      plotOptions: {
        column: {
          stacking: "normal",
          depth: 40,
        },
        series: {
          borderWidth: 0,
          dataLabels: {
            enabled: true,
            format: "$ {point.y:.2f}",
          },
        },
      },

      tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat:
          '<span style="color:{point.color}">{point.name}</span>: <b>$ {point.y:.2f}</b><br/>',
      },

      series: [
        {
          name: "Canales",
          colorByPoint: true,
          data: etiquetas,
        },
      ],
      drilldown: {
        series: [
          {
            name: "TIENDAS",
            id: "TIENDAS",
            data: series,
          },
        ],
      },
    });
  })();
}

function grafico2VentasDiarias(año, semana, dia) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=grafico1&año=" +
        año +
        "&semana=" +
        semana +
        "&dia=" +
        dia
    );

    const respuesta = await respuestaRaw.json();
    $("#graficoVentasDiariasPie").innerHTML = "";
    const $grafica = document.querySelector("#graficoVentasDiariasPie");

    const etiquetas = respuesta.etiquetas;

    // Build the chart
    Highcharts.chart($grafica, {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: "pie",
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0,
        },
      },
      title: {
        text: "Participación de Ventas Semana # " + semana,
      },
      tooltip: {
        pointFormat: "{series.name}: <b>$ {point.y:.1f}</b>",
      },
      accessibility: {
        point: {
          valueSuffix: "%",
        },
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: "pointer",
          depth: 35,
          dataLabels: {
            enabled: true,
            format: "<b>{point.name}</b>: {point.percentage:.1f} %",
            connectorColor: "silver",
          },
        },
      },
      series: [
        {
          name: "Canal",
          data: etiquetas,
        },
      ],
    });
  })();
}
function graficoVentasYearToDay() {
  (async () => {
    var fechaInicial = $("#fechaInicioDay").val();
    var fechaFinal = $("#fechaFinalDay").val();

    if (fechaInicial == "" && fechaFinal == "") {
      var añoInicial = 2022;
      var añoFinal = 2023;
    } else {
      var añoInicial = fechaInicial.substring(0, 4);
      var añoFinal = fechaFinal.substring(0, 4);
    }
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=grafico2&fechaInicial=" +
        fechaInicial +
        "&fechaFinal=" +
        fechaFinal +
        "&año1=" +
        añoInicial +
        "&año2=" +
        añoFinal
    );

    const respuesta = await respuestaRaw.json();

    const $grafica = document.querySelector("#graficoYearToDayBar");
    const ventas2023 = respuesta.ventas2;
    const ventas2022 = respuesta.ventas1;

    var dataPrev = {
      2023: ventas2023,
      2022: ventas2022,
    };

    var data = {
      2023: ventas2023,
      2022: ventas2022,
    };

    var names = [
      {
        name: "CEDIS",

        color: "rgb(201, 36, 39)",
      },
      {
        name: "E-COMMERCE",

        color: "rgb(0,188,212)",
      },
      {
        name: "FLOTILLAS",

        color: "rgb(215, 0, 38)",
      },
      {
        name: "RUTAS",

        color: "rgb(0, 82, 180)",
      },
      {
        name: "SIN ASIGNAR",

        color: "rgb(25, 82, 70)",
      },
      {
        name: "TIENDAS",

        color: "rgb(255, 217, 68)",
      },
    ];

    function getData(data) {
      return data.map(function (name, i) {
        return {
          name: name[0],
          y: name[1],
          color: names[i].color,
        };
      });
    }
    Highcharts.setOptions({
      lang: {
        numericSymbols: null, //otherwise by default ['k', 'M', 'G', 'T', 'P', 'E']
      },
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "YEAR TO DAY " + añoInicial + "-" + añoFinal,
        align: "left",
      },
      subtitle: {
        text: "",
        align: "left",
      },
      plotOptions: {
        series: {
          grouping: false,
          borderWidth: 0,
        },
      },
      legend: {
        enabled: false,
      },
      tooltip: {
        shared: true,
        headerFormat:
          '<span style="font-size: 15px">{point.point.name}</span><br/>',
        pointFormat:
          '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>$ {point.y:.2f}</b><br/>',
      },
      xAxis: {
        type: "category",
        max: 4,
        labels: {
          useHTML: true,
          animate: true,
          formatter: function () {
            var value = this.value,
              output;

            names.forEach(function (name) {
              if (name.name === value) {
                output = name.name;
              }
            });

            return output;
          },
        },
      },
      yAxis: [
        {
          title: {
            text: "VENTA POR CANAL",
          },
          showFirstLabel: false,
        },
      ],
      series: [
        {
          color: "rgb(158, 159, 163)",
          pointPlacement: -0.2,
          linkedTo: "main",
          data: dataPrev[2022].slice(),
          name: "2022",
        },
        {
          name: "2023",
          id: "main",
          dataSorting: {
            enabled: true,
            matchByName: true,
          },
          dataLabels: [
            {
              enabled: false,
              inside: false,
              style: {
                fontSize: "12px",
              },
            },
          ],
          data: getData(data[2023]).slice(),
        },
      ],
      exporting: {
        allowHTML: true,
      },
    });
  })();
}
function graficoVentasYearToWeek() {
  (async () => {
    var año1 = $("#año1").val();
    var año2 = $("#año2").val();
    var week = $("#week").val();
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=grafico3&año1=" +
        año1 +
        "&año2=" +
        año2 +
        "&week=" +
        week
    );
    const $grafica = document.querySelector("#graficoYearToWeekBar");
    const respuesta = await respuestaRaw.json();
    const fechas = respuesta.fechas;
    const ventas = respuesta.ventas;
    Highcharts.setOptions({
      lang: {
        numericSymbols: null, //otherwise by default ['k', 'M', 'G', 'T', 'P', 'E']
      },
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "VENTAS YEAR TO WEEK",
      },
      subtitle: {
        text: "",
      },
      xAxis: {
        categories: fechas,
        crosshair: true,
      },
      yAxis: {
        min: 0,
        title: {
          text: "Ventas $",
        },
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat:
          '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>$ {point.y:.2f}</b></td></tr>',
        footerFormat: "</table>",
        shared: true,
        useHTML: true,
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0,
        },
      },
      series: ventas,
    });
  })();
}
function graficoVentasYearToMonth() {
  (async () => {
    var año1 = $("#año1").val();
    var año2 = $("#año2").val();
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=grafico4&año1=" + año1 + "&año2=" + año2
    );
    const $grafica = document.querySelector("#graficoYearToMonthBar");
    const respuesta = await respuestaRaw.json();
    const fechas = respuesta.fechas;
    const ventas = respuesta.ventas;
    Highcharts.setOptions({
      lang: {
        numericSymbols: null, //otherwise by default ['k', 'M', 'G', 'T', 'P', 'E']
      },
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "VENTAS YEAR TO MONTH",
      },
      subtitle: {
        text: "",
      },
      xAxis: {
        categories: [
          "ENE 2022",
          "ENE 2023",
          "FEB 2022",
          "FEB 2023",
          "MAR 2022",
          "MAR 2023",
          "ABR 2022",
          "ABR 2023",
          "MAY 2022",
          "MAY 2023",
          "JUN 2022",
          "JUN 2023",
          "JUL 2022",
          "JUL 2023",
          "AGO 2022",
          "AGO 2023",
          "SEP 2022",
          "SEP 2023",
          "OCT 2022",
          "OCT 2023",
          "NOV 2022",
          "NOV 2023",
          "DIC 2022",
          "DIC 2023",
        ],
        crosshair: true,
      },
      yAxis: {
        min: 0,
        title: {
          text: "Ventas $",
        },
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat:
          '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>$ {point.y:.2f}</b></td></tr>',
        footerFormat: "</table>",
        shared: true,
        useHTML: true,
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0,
        },
      },
      series: ventas,
    });
  })();
}
function graficoObjetivosVenta(año, mes, mesElegido) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoObjetivos&año=" + año + "&mes=" + mes
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoObjetivos").innerHTML = "";
    const $grafica = document.querySelector("#graficoObjetivos");

    const agentes = respuesta.agentes;
    const objetivos = respuesta.objetivos;
    /*
    // Build the chart
    Highcharts.chart($grafica, {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: "pie",
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0,
        },
      },
      title: {
        text: "Participación de Ventas Semana # " + semana,
      },
      tooltip: {
        pointFormat: "{series.name}: <b>$ {point.y:.1f}</b>",
      },
      accessibility: {
        point: {
          valueSuffix: "%",
        },
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: "pointer",
          depth: 35,
          dataLabels: {
            enabled: true,
            format: "<b>{point.name}</b>: {point.percentage:.1f} %",
            connectorColor: "silver",
          },
        },
      },
      series: [
        {
          name: "Canal",
          data: etiquetas,
        },
      ],
    });
    */
    Highcharts.setOptions({
      colors: [
        "#ED561B",

        "#50B432",

        "#DDDF00",
        "#24CBE5",
        "#64E572",
        "#FF9655",
        "#FFF263",
        "#6AF9C4",
      ],
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "bar",
        options3d: {
          enabled: true,
          alpha: 0,
          beta: 0,
          depth: 30,
        },
      },
      title: {
        text: "%Pronósticos De Venta Por Agente " + mesElegido + "",
      },
      xAxis: {
        categories: agentes,
      },
      yAxis: {
        min: 0,
        max: 150,
        title: {
          text: "Pronóstico %",
        },
        plotLines: [
          {
            color: "red",
            width: 2,
            value: 100,
            zIndex: 5,
          },
        ],
      },

      legend: {
        reversed: true,
      },
      accessibility: {
        point: {
          valueSuffix: "%",
        },
      },
      plotOptions: {
        series: {
          stacking: "return",
          dataLabels: {
            enabled: true,
            style: {
              color: "white",
            },
            formatter: function () {
              return this.total.toFixed(2) + "%";
            },
          },
        },
      },

      series: [
        {
          name: "" + mesElegido + "",
          data: objetivos,
        },
      ],
    });
  })();
}
function graficoIndicadorPronostico(año, mes, mesElegido) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoPronostico&año=" + año + "&mes=" + mes
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoIndicadorPronostico").innerHTML = "";
    const $grafica = document.querySelector("#graficoIndicadorPronostico");

    const pronostico = respuesta.pronostico;

    Highcharts.chart($grafica, {
      chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "70%",
      },

      title: {
        text: "Pronóstico" + " " + mesElegido,
      },

      pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
      },

      // the value axis
      yAxis: {
        min: 0,
        max: 150,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
          distance: 20,
          style: {
            fontSize: "14px",
          },
        },
        plotBands: [
          {
            from: 0,
            to: 70,
            color: "#DF5353", // green
            thickness: 20,
          },
          {
            from: 70,
            to: 90,
            color: "#DDDF0D", // yellow
            thickness: 20,
          },
          {
            from: 90,
            to: 200,
            color: "#55BF3B", // red
            thickness: 20,
          },
        ],
      },

      series: [
        {
          name: "Pronóstico",
          data: pronostico,
          tooltip: {
            valueSuffix: " %",
          },
          dataLabels: {
            format: "{y:.2f} %",
            borderWidth: 0,
            color:
              (Highcharts.defaultOptions.title &&
                Highcharts.defaultOptions.title.style &&
                Highcharts.defaultOptions.title.style.color) ||
              "#333333",
            style: {
              fontSize: "16px",
            },
          },
          dial: {
            radius: "80%",
            backgroundColor: "gray",
            baseWidth: 12,
            baseLength: "0%",
            rearLength: "0%",
          },
          pivot: {
            backgroundColor: "gray",
            radius: 6,
          },
        },
      ],
    });
  })();
}
function graficoIndicadorPronosticoAcumulado(año, mes) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoPronosticoAcumulado&año=" +
        año +
        "&mes=" +
        mes
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoIndicadorPronosticoAcumulado").innerHTML = "";
    const $grafica = document.querySelector(
      "#graficoIndicadorPronosticoAcumulado"
    );

    const pronostico = respuesta.pronostico;

    Highcharts.chart($grafica, {
      chart: {
        type: "gauge",
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: "70%",
      },

      title: {
        text: "Pronóstico Acumulado",
      },

      pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ["50%", "75%"],
        size: "110%",
      },

      // the value axis
      yAxis: {
        min: 0,
        max: 150,
        tickPixelInterval: 72,
        tickPosition: "inside",
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
          distance: 20,
          style: {
            fontSize: "14px",
          },
        },
        plotBands: [
          {
            from: 0,
            to: 70,
            color: "#DF5353", // green
            thickness: 20,
          },
          {
            from: 70,
            to: 90,
            color: "#DDDF0D", // yellow
            thickness: 20,
          },
          {
            from: 90,
            to: 200,
            color: "#55BF3B", // red
            thickness: 20,
          },
        ],
      },

      series: [
        {
          name: "Pronóstico",
          data: pronostico,
          tooltip: {
            valueSuffix: " %",
          },
          dataLabels: {
            format: "{y:.2f} %",
            borderWidth: 0,
            color:
              (Highcharts.defaultOptions.title &&
                Highcharts.defaultOptions.title.style &&
                Highcharts.defaultOptions.title.style.color) ||
              "#333333",
            style: {
              fontSize: "16px",
            },
          },
          dial: {
            radius: "80%",
            backgroundColor: "gray",
            baseWidth: 12,
            baseLength: "0%",
            rearLength: "0%",
          },
          pivot: {
            backgroundColor: "gray",
            radius: 6,
          },
        },
      ],
    });
  })();
}
function graficoObjetivosVentaAcumulado(año, mes, mesElegido) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoObjetivosAcumulado&año=" +
        año +
        "&mes=" +
        mes
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoObjetivosAcumulado").innerHTML = "";
    const $grafica = document.querySelector("#graficoObjetivosAcumulado");

    const agentes = respuesta.agentes;
    const objetivos = respuesta.objetivos;
    Highcharts.setOptions({
      colors: [
        "#ED561B",
        "#058DC7",
        "#50B432",

        "#DDDF00",
        "#24CBE5",
        "#64E572",
        "#FF9655",
        "#FFF263",
        "#6AF9C4",
      ],
    });

    Highcharts.chart($grafica, {
      chart: {
        type: "bar",
        options3d: {
          enabled: true,
          alpha: 0,
          beta: 0,
          depth: 30,
        },
      },
      title: {
        text: "%Pronósticos De Venta Por Agente Acumulado",
      },
      xAxis: {
        categories: agentes,
      },
      yAxis: {
        min: 0,
        max: 150,
        title: {
          text: "Pronóstico %",
        },
        plotLines: [
          {
            color: "red",
            width: 2,
            value: 100,
            zIndex: 5,
          },
        ],
      },
      legend: {
        reversed: true,
      },
      accessibility: {
        point: {
          valueSuffix: "%",
        },
      },
      plotOptions: {
        series: {
          stacking: "return",
          dataLabels: {
            enabled: true,
            style: {
              color: "white",
            },
            formatter: function () {
              return this.total.toFixed(2) + "%";
            },
          },
        },
      },

      series: [
        {
          name: "Acumulados",
          data: objetivos,
        },
      ],
    });
  })();
}
function graficoObjetivosCanal(año, mes, mesElegido) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoObjetivosCanal&año=" +
        año +
        "&mes=" +
        mes +
        "&mesElegido=" +
        mesElegido
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoObjetivosCanal").innerHTML = "";
    const $grafica = document.querySelector("#graficoObjetivosCanal");

    const canales = respuesta.canales;
    const objetivos = respuesta.objetivos;
    Highcharts.setOptions({
      colors: [
        "#ED561B",
        "#058DC7",
        "#50B432",

        "#DDDF00",
        "#24CBE5",
        "#64E572",
        "#FF9655",
        "#FFF263",
        "#6AF9C4",
      ],
    });

    Highcharts.chart($grafica, {
      chart: {
        type: "cylinder",
        options3d: {
          enabled: true,
          alpha: 0,
          beta: 0,
          depth: 50,
          viewDistance: 10,
        },
      },
      title: {
        text: "Pronósticos Por Canal" + " " + mesElegido,
      },

      xAxis: {
        categories: canales,
        title: {
          text: "Canales",
        },
      },
      yAxis: {
        min: 0,
        max: 150,
        title: {
          margin: 20,
          text: "Pronóstico %",
        },
        plotLines: [
          {
            color: "red",
            width: 2,
            value: 100,
            zIndex: 5,
          },
        ],
      },
      tooltip: {
        headerFormat: "<b>Canal: {point.x:.2f} %</b><br>",
      },
      plotOptions: {
        series: {
          depth: 25,
          colorByPoint: true,
          stacking: "return",
          dataLabels: {
            enabled: true,
            style: {
              color: "white",
            },
            formatter: function () {
              return this.total.toFixed(2) + "%";
            },
          },
        },
      },
      series: [
        {
          data: objetivos,
          name: "",
          showInLegend: false,
        },
      ],
    });
  })();
}
function graficoObjetivosCanalAcumulado(año, mes) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoObjetivosCanalAcumulado&año=" +
        año +
        "&mes=" +
        mes
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoObjetivosCanalAcumulado").innerHTML = "";
    const $grafica = document.querySelector("#graficoObjetivosCanalAcumulado");

    const canales = respuesta.canales;
    const objetivos = respuesta.objetivos;
    Highcharts.setOptions({
      colors: [
        "#ED561B",
        "#058DC7",
        "#50B432",

        "#DDDF00",
        "#24CBE5",
        "#64E572",
        "#FF9655",
        "#FFF263",
        "#6AF9C4",
      ],
    });

    Highcharts.chart($grafica, {
      chart: {
        type: "cylinder",
        options3d: {
          enabled: true,
          alpha: 0,
          beta: 0,
          depth: 50,
          viewDistance: 10,
        },
      },
      title: {
        text: "Pronósticos Por Canal Acumulado",
      },

      xAxis: {
        categories: canales,
        title: {
          text: "Canales",
        },
      },
      yAxis: {
        min: 0,
        max: 150,
        title: {
          margin: 20,
          text: "Pronóstico %",
        },
        plotLines: [
          {
            color: "red",
            width: 2,
            value: 100,
            zIndex: 5,
          },
        ],
      },
      tooltip: {
        headerFormat: "<b>Canal: {point.x:.2f} %</b><br>",
      },
      plotOptions: {
        series: {
          depth: 25,
          colorByPoint: true,
          stacking: "return",
          dataLabels: {
            enabled: true,
            style: {
              color: "white",
            },
            formatter: function () {
              return this.total.toFixed(2) + "%";
            },
          },
        },
      },
      series: [
        {
          data: objetivos,
          name: "",
          showInLegend: false,
        },
      ],
    });
  })();
}
function graficoObjetivosvsVenta(año, mes, mesElegido) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoObjetivosvsVentas&año=" +
        año +
        "&mes=" +
        mes
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoObjetivosvsVentas").innerHTML = "";
    const $grafica = document.querySelector("#graficoObjetivosvsVentas");

    const agentes = respuesta.agentes;
    const ventas = respuesta.ventas;
    const objetivos = respuesta.objetivos;

    Highcharts.setOptions({
      colors: [
        "#ED561B",

        "#50B432",

        "#DDDF00",
        "#24CBE5",
        "#64E572",
        "#FF9655",
        "#FFF263",
        "#6AF9C4",
      ],
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "Ventas vs Objetivos  Por Agente " + mesElegido + "",
      },

      xAxis: {
        categories: agentes,
        title: {
          text: "Agentes",
        },
        type: "category",
      },
      yAxis: {
        allowDecimals: true,
        title: {
          text: "$",
        },
      },
      tooltip: {
        formatter: function () {
          /*
          return (
            "<b>" +
            this.series.data +
            "</b><br/>" +
            this.point.y +
            " " +
            this.total.toFixed(2)
          );
          */
          return (
            "<b>" +
            this.series.name +
            "</b><br/>" +
            this.point.y.toLocaleString("es-MX", currency)
          );
        },
      },
      series: [
        {
          data: ventas,
          name: "Ventas",
          showInLegend: true,
        },
        {
          data: objetivos,
          name: "Objetivo",
          showInLegend: true,
        },
      ],
    });
  })();
}
function graficoObjetivosvsVentaAcumulado(año, mes) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoObjetivosvsVentasAcumulado&año=" +
        año +
        "&mes=" +
        mes
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoObjetivosvsVentasAcumulado").innerHTML = "";
    const $grafica = document.querySelector(
      "#graficoObjetivosvsVentasAcumulado"
    );

    const agentes = respuesta.agentes;
    const ventas = respuesta.ventas;
    const objetivos = respuesta.objetivos;

    Highcharts.setOptions({
      colors: [
        "#ED561B",

        "#50B432",

        "#DDDF00",
        "#24CBE5",
        "#64E572",
        "#FF9655",
        "#FFF263",
        "#6AF9C4",
      ],
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "Ventas vs Objetivos Por Agente Acumulado",
      },

      xAxis: {
        categories: agentes,
        title: {
          text: "Agentes",
        },
        type: "category",
      },
      yAxis: {
        allowDecimals: true,
        title: {
          text: "$",
        },
      },
      tooltip: {
        formatter: function () {
          /*
          return (
            "<b>" +
            this.series.data +
            "</b><br/>" +
            this.point.y +
            " " +
            this.total.toFixed(2)
          );
          */
          return (
            "<b>" +
            this.series.name +
            "</b><br/>" +
            this.point.y.toLocaleString("es-MX", currency)
          );
        },
      },
      series: [
        {
          data: ventas,
          name: "Ventas",
          showInLegend: true,
        },
        {
          data: objetivos,
          name: "Objetivo",
          showInLegend: true,
        },
      ],
    });
  })();
}
function graficoObjetivosvsVentaCanal(año, mes, mesElegido) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoObjetivosvsVentasCanal&año=" +
        año +
        "&mes=" +
        mes
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoObjetivosvsVentasCanal").innerHTML = "";
    const $grafica = document.querySelector("#graficoObjetivosvsVentasCanal");

    const canales = respuesta.canales;
    const ventas = respuesta.ventas;
    const objetivos = respuesta.objetivos;

    Highcharts.setOptions({
      colors: [
        "#ED561B",

        "#50B432",

        "#DDDF00",
        "#24CBE5",
        "#64E572",
        "#FF9655",
        "#FFF263",
        "#6AF9C4",
      ],
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "Ventas vs Objetivos  Por Canal " + mesElegido + "",
      },

      xAxis: {
        categories: canales,
        title: {
          text: "Canales",
        },
        type: "category",
      },
      yAxis: {
        allowDecimals: true,
        title: {
          text: "$",
        },
      },
      tooltip: {
        formatter: function () {
          /*
          return (
            "<b>" +
            this.series.data +
            "</b><br/>" +
            this.point.y +
            " " +
            this.total.toFixed(2)
          );
          */
          return (
            "<b>" +
            this.series.name +
            "</b><br/>" +
            this.point.y.toLocaleString("es-MX", currency)
          );
        },
      },
      series: [
        {
          data: ventas,
          name: "Ventas",
          showInLegend: true,
        },
        {
          data: objetivos,
          name: "Objetivo",
          showInLegend: true,
        },
      ],
    });
  })();
}
function graficoObjetivosvsVentaAcumuladoCanal(año, mes) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=graficoObjetivosvsVentasAcumuladoCanal&año=" +
        año +
        "&mes=" +
        mes
    );
    const respuesta = await respuestaRaw.json();

    $("#graficoObjetivosvsVentasAcumuladoCanal").innerHTML = "";
    const $grafica = document.querySelector(
      "#graficoObjetivosvsVentasAcumuladoCanal"
    );

    const canales = respuesta.canales;
    const ventas = respuesta.ventas;
    const objetivos = respuesta.objetivos;

    Highcharts.setOptions({
      colors: [
        "#ED561B",

        "#50B432",

        "#DDDF00",
        "#24CBE5",
        "#64E572",
        "#FF9655",
        "#FFF263",
        "#6AF9C4",
      ],
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "Ventas vs Objetivos Por Canal Acumulado",
      },

      xAxis: {
        categories: canales,
        title: {
          text: "Canales",
        },
        type: "category",
      },
      yAxis: {
        allowDecimals: true,
        title: {
          text: "$",
        },
      },
      tooltip: {
        formatter: function () {
          /*
          return (
            "<b>" +
            this.series.data +
            "</b><br/>" +
            this.point.y +
            " " +
            this.total.toFixed(2)
          );
          */
          return (
            "<b>" +
            this.series.name +
            "</b><br/>" +
            this.point.y.toLocaleString("es-MX", currency)
          );
        },
      },
      series: [
        {
          data: ventas,
          name: "Ventas",
          showInLegend: true,
        },
        {
          data: objetivos,
          name: "Objetivo",
          showInLegend: true,
        },
      ],
    });
  })();
}
