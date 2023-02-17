<?php
require_once "../models/admon.model.php";
$ventas = new ModelAdmon();
if (isset($_GET["grafico"])) {
    if ($_GET["grafico"] == "grafico1") {
        $year = $_GET["año"];
        $week = $_GET["semana"];
        $day = $_GET["dia"];
        $ventasDiarias = $ventas->mdlTotalVentasDiarias($year, $week, $day);
        $ventasDiariasTiendas = $ventas->mdlTotalVentasDiariasDesglose($year, $week, $day);

        $etiquetas = array();
        $series = array();
        foreach ($ventasDiarias as $key => $value) {

            array_push($etiquetas, array("name" => $value["canalComercial"], "y" => (float)$value["Totales"], "drilldown" => $value["canalComercial"]));
        }
        $totalSanManuel = 0;
        $totalSantiago = 0;
        foreach ($ventasDiariasTiendas as $key => $value) {

            if ($value["Agente"] == "ALBERTO YIZARK GONZALEZ AVILES") {
                $totalSanManuel = $totalSanManuel + $value["Totales"];
            } else if ($value["Agente"] == "IVAN HERRERA PEREZ") {
                $totalSanManuel = $totalSanManuel + $value["Totales"];
            } else if ($value["Agente"] == "MOSTRADOR SAN MANUEL") {
                $total = $totalSanManuel + $value["Totales"];
                array_push($series, array('PV SAN MANUEL', (float)$total));
            } else if ($value["Agente"] == "GABRIEL GARDUÑO GARCIA") {
                $totalSantiago = $totalSantiago + $value["Totales"];
            } else if ($value["Agente"] == "MOSTRADOR SANTIAGO") {
                $totals = $totalSantiago + $value["Totales"];
                array_push($series, array('PV SANTIAGO', (float)$totals));
            } else {
                array_push($series, array($value["Agente"], (float)$value["Totales"]));
            }
        }

        $respuesta = [
            "etiquetas" => $etiquetas,
            "series" => $series,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico2") {
        $fechaInicial = $_GET["fechaInicial"];
        $fechaFinal = $_GET["fechaFinal"];
        $año1 = $_GET["año1"];
        $año2 = $_GET["año2"];

        $ventasYearToDay = $ventas->mdlVentasYearToDay($fechaInicial, $fechaFinal, $año1, $año2);


        $series1 = array();
        $series2 = array();
        foreach ($ventasYearToDay as $key => $value) {
            array_push($series1, array($value["canalComercial"], (float)$value[$año1]));
            array_push($series2, array($value["canalComercial"], (float)$value[$año2]));
        }
        $respuesta = [
            "ventas1" => $series1,
            "ventas2" => $series2,


        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico3") {
        $week = $_GET["week"];
        $year = $_GET["año1"];
        $year2 = $_GET["año2"];
        $search = array("año1" => $year, "año2" => $year2, "week" => $week);
        $ventasYearToWeek = $ventas->mdlVentasYearToWeek($search);
        $series1 = array();
        $series2 = array();
        $ventas1 = array();


        for ($day = 1; $day < 7; $day++) {

            $dia = date('d', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
            $mes = date('m', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
            $año = date('Y', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
            $fecha = $año . "-" . (int)$mes . "-" . (int)$dia;
            array_push($series1, $fecha);
        }

        for ($i = 1; $i < 7; $i++) {

            $dia2 = date('d', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
            $mes2 = date('m', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
            $año2 = date('Y', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
            $fecha2 = $año2 . "-" . (int)$mes2 . "-" . (int)$dia2;
            array_push($series2, $fecha2);
        }

        $fechas = [$series1[0], $series2[0], $series1[1], $series2[1], $series1[2], $series2[2], $series1[3], $series2[3], $series1[4], $series2[4], $series1[5], $series2[5]];
        foreach ($ventasYearToWeek as $key => $value) {
            array_push($ventas1, array("name" => $value["canalComercial"], "data" => array((float)$value[$series1[0]], (float)$value[$series2[0]], (float)$value[$series1[1]], (float)$value[$series2[1]], (float)$value[$series1[2]], (float)$value[$series2[2]], (float)$value[$series1[3]], (float)$value[$series2[3]], (float)$value[$series1[4]], (float)$value[$series2[4]], (float)$value[$series1[5]], (float)$value[$series2[5]])));
        }

        $respuesta = [
            "fechas" => $fechas,
            "ventas" => $ventas1,



        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico4") {
        $year1 = $_GET["año1"];
        $year2 = $_GET["año2"];
        $ventasYearToWeek = $ventas->mdlVentasYearToMonth($year1, $year2);

        $ventas1 = array();
        foreach ($ventasYearToWeek as $key => $value) {
            array_push($ventas1, array("name" => $value["canalComercial"], "data" => array((float)$value["" . $year1 . "-1"], (float)$value["" . $year2 . "-1"], (float)$value["" . $year1 . "-2"], (float)$value["" . $year2 . "-2"], (float)$value["" . $year1 . "-3"], (float)$value["" . $year2 . "-3"], (float)$value["" . $year1 . "-4"], (float)$value["" . $year2 . "-4"], (float)$value["" . $year1 . "-5"], (float)$value["" . $year2 . "-5"], (float)$value["" . $year1 . "-6"], (float)$value["" . $year2 . "-6"], (float)$value["" . $year1 . "-7"], (float)$value["" . $year2 . "-7"], (float)$value["" . $year1 . "-8"], (float)$value["" . $year2 . "-8"], (float)$value["" . $year1 . "-9"], (float)$value["" . $year2 . "-9"], (float)$value["" . $year1 . "-10"], (float)$value["" . $year2 . "-10"], (float)$value["" . $year1 . "-11"], (float)$value["" . $year2 . "-11"], (float)$value["" . $year1 . "-12"], (float)$value["" . $year2 . "-12"])));
        }

        $respuesta = [
            "ventas" => $ventas1,
        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoObjetivos") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVenta($año, $mes);

        $agentes = array();
        $objetivos = array();

        foreach ($detalle as $key => $value) {

            array_push($agentes, array($value["AgenteVenta"]));
            $venta = $value[$mes];
            $objetivo = $value["Objetivo"];
            if ($objetivo == 0) {
                $pronostico = 0;
            } else {
                $pronostico = (($venta / ($objetivo / 26 * 26)) * 100);
            }
            $pronostico = number_format($pronostico, 2);


            array_push($objetivos, array((float)$pronostico));
        }
        $respuesta = [
            "agentes" => $agentes,
            "objetivos" => $objetivos,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoObjetivosAcumulado") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVenta($año, $mes);

        $agentes = array();
        $objetivos = array();

        foreach ($detalle as $key => $value) {

            array_push($agentes, array($value["AgenteVenta"]));
            $venta = $value["Totales"];
            $objetivo = $value["Objetivos"];
            if ($objetivo == 0) {
                $pronostico = 0;
            } else {
                $pronostico = (($venta / ($objetivo / 26 * 26)) * 100);
            }
            $pronostico = number_format($pronostico, 2);


            array_push($objetivos, array((float)$pronostico));
        }
        $respuesta = [
            "agentes" => $agentes,
            "objetivos" => $objetivos,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoPronostico") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVenta($año, $mes);

        $pronosticos = array();
        $venta = 0;
        $objetivo = 0;
        foreach ($detalle as $key => $value) {
            $venta += $value[$mes];
            $objetivo += $value["Objetivo"];
        }

        if ($objetivo == 0) {
            $pronostico = 0;
        } else {
            $pronostico = (($venta / ($objetivo / 26 * 26)) * 100);
        }
        $pronostico = number_format($pronostico, 2);


        array_push($pronosticos, array((float)$pronostico));
        $respuesta = [
            "pronostico" => $pronosticos

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoPronosticoAcumulado") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVenta($año, $mes);

        $pronosticos = array();
        $venta = 0;
        $objetivo = 0;
        foreach ($detalle as $key => $value) {
            $venta += $value["Totales"];
            $objetivo += $value["Objetivos"];
        }

        if ($objetivo == 0) {
            $pronostico = 0;
        } else {
            $pronostico = (($venta / ($objetivo / 26 * 26)) * 100);
        }
        $pronostico = number_format($pronostico, 2);


        array_push($pronosticos, array((float)$pronostico));
        $respuesta = [
            "pronostico" => $pronosticos

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoObjetivosCanal") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVentaCanal($año, $mes);

        $canales = array();
        $objetivos = array();
        foreach ($detalle as $key => $value) {

            array_push($canales, array($value["canalComercial"]));
            $venta = $value[$mes];
            $objetivo = $value["Objetivo"];
            if ($objetivo == 0) {
                $pronostico = 0;
            } else {
                $pronostico = (($venta / ($objetivo / 26 * 26)) * 100);
            }
            $pronostico = number_format($pronostico, 2);


            array_push($objetivos, array((float)$pronostico));
        }
        $respuesta = [
            "canales" => $canales,
            "objetivos" => $objetivos,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoObjetivosCanalAcumulado") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVentaCanal($año, $mes);

        $canales = array();
        $objetivos = array();
        foreach ($detalle as $key => $value) {

            array_push($canales, array($value["canalComercial"]));
            $venta = $value["Totales"];
            $objetivo = $value["Objetivos"];
            if ($objetivo == 0) {
                $pronostico = 0;
            } else {
                $pronostico = (($venta / ($objetivo / 26 * 26)) * 100);
            }
            $pronostico = number_format($pronostico, 2);


            array_push($objetivos, array((float)$pronostico));
        }
        $respuesta = [
            "canales" => $canales,
            "objetivos" => $objetivos,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoObjetivosvsVentas") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVenta($año, $mes);

        $agentes = array();
        $objetivos = array();
        $ventas = array();

        foreach ($detalle as $key => $value) {

            array_push($agentes, array($value["AgenteVenta"]));
            $venta = $value[$mes];
            $objetivo = $value["Objetivo"];


            array_push($ventas, array((float)$venta));
            array_push($objetivos, array((float)$objetivo));
        }
        $respuesta = [
            "agentes" => $agentes,
            "objetivos" => $objetivos,
            "ventas" => $ventas,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoObjetivosvsVentasAcumulado") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVenta($año, $mes);

        $agentes = array();
        $objetivos = array();
        $ventas = array();

        foreach ($detalle as $key => $value) {

            array_push($agentes, array($value["AgenteVenta"]));
            $venta = $value["Totales"];
            $objetivo = $value["Objetivos"];


            array_push($ventas, array((float)$venta));
            array_push($objetivos, array((float)$objetivo));
        }
        $respuesta = [
            "agentes" => $agentes,
            "objetivos" => $objetivos,
            "ventas" => $ventas,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoObjetivosvsVentasCanal") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVentaCanal($año, $mes);

        $canales = array();
        $objetivos = array();
        $ventas = array();

        foreach ($detalle as $key => $value) {

            array_push($canales, array($value["canalComercial"]));
            $venta = $value["Totales"];
            $objetivo = $value["Objetivos"];


            array_push($ventas, array((float)$venta));
            array_push($objetivos, array((float)$objetivo));
        }
        $respuesta = [
            "canales" => $canales,
            "objetivos" => $objetivos,
            "ventas" => $ventas,

        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "graficoObjetivosvsVentasAcumuladoCanal") {
        $año = $_GET["año"];
        $mes = $_GET["mes"];

        $detalle = $ventas->mdlObjetivosVentaCanal($año, $mes);

        $canales = array();
        $objetivos = array();
        $ventas = array();

        foreach ($detalle as $key => $value) {

            array_push($canales, array($value["canalComercial"]));
            $venta = $value["Totales"];
            $objetivo = $value["Objetivos"];


            array_push($ventas, array((float)$venta));
            array_push($objetivos, array((float)$objetivo));
        }
        $respuesta = [
            "canales" => $canales,
            "objetivos" => $objetivos,
            "ventas" => $ventas,

        ];
        echo json_encode($respuesta);
    }
}
