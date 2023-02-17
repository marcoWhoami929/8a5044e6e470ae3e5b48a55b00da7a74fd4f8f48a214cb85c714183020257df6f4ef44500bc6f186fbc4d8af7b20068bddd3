
<?php
require_once "../controllers/admon.controller.php";
require_once "../models/admon.model.php";
class InventariosFunctions
{
    public $accion;
    /*
    public $idUsuario;
    public $idProducto;
    public $codigo;
    public $descripcion;
    public $unidades;
    public $idAlmacen;
    public $idUnidad;
    public $valorConversion;
    public $unidadesConversion;
    public $costo;
    public $importe;
    public $tipo;
    public $solicitado;
    public $importeSolicitado;
    public $idSolicitante;
    public $prioridad;
    public $observaciones;
    public $serieDocumento;
    public $folioDocumento;
    public $tabla;
    public $documento;
    public $tipoDocumento;
    public $fecha;
    */
    public $estatus;
    /*
    public $aprobado;
    public $importeAprobado;
    public $aprobador;
    public $pendiente;
    public $importePendiente;
    public $empresa;
    public $idAlmacen2;
    public $tipoDocumentoUnion;
    public $usuario;
    public $vista;
    public $folio;
    public $periodo;
    public $ejercicio;
    public $tipoDetalleDocumento;
    public $referencia;
    public $idClienteProveedor;
    public $rfcClienteProveedor;
    public $razonSocialClienteProveedor;
    public $productos;
    public $serie;
    public $tipoUsuario;
    */
    public $idDocumentoDe;

    public $idConcepto;
    /*
    public $titulo;
    public $color;
    public $mensaje;
    public $startDate;
    public $endDate;
    public $sucursal;
    public $id;
    public $existencias;
    public $inventario;
    public $diferencia;
    public $existenciasImportes;
    public $inventarioImportes;
    public $diferenciaImportes;
    public $idRealizador;
    public $marca;
    public $serieOrigen;
    public $folioOrigen;
    public $familia;
    public $categoria;
    public $anaquel;
    public $repisa;
    public $proveedor;
    public $habilitado;
    public $folioInventario;
    public $campo;
    public $filtro;
    public $idGrupo;
    public $view;
    public $idNotification;
    public $idAlmacenDestino;
    public $tipoAccion;
    public $autorizacionCompra;
    */


    public  function impresionDocumentos()
    {
        $idDocumentoDe = $this->idDocumentoDe;
        $idConcepto = $this->idConcepto;
        $estatus = $this->estatus;

        $respuesta = ModelAdmon::mdlImpresionDocumentos($idDocumentoDe, $idConcepto, $estatus);
        echo json_encode($respuesta);
    }
}

if ($_POST["accion"] === "impresionDocumentos") {
    $impresion = new InventariosFunctions();
    $impresion->idDocumentoDe = $_POST["idDocumentoDe"];
    $impresion->idConcepto = $_POST["idConcepto"];
    $impresion->estatus = $_POST["estatus"];
    $impresion->impresionDocumentos();
}
