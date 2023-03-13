<?php
include("../models/db_conexion.php");
error_reporting(0);
class dataInventarios extends ConexionsBd
{
    public $mysqli;
    public $counter;

    public function __construct()
    {
        $this->mysqli = $this->conectarDekkerlab();
    }

    public function countAll($sql)
    {
        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return count($query);
    }

    public function getDocumentosNoImpresos($campos, $search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];

        if ($search["idConcepto"] == "") {
            $sWhere = "CIDDOCUMENTODE = '" . $search["idDocumentoDe"] . "' AND CCANCELADO = '" . $search["estatus"] . "' AND CIMPRESO = 0";
        } else {
            $sWhere = "CIDDOCUMENTODE = '" . $search["idDocumentoDe"] . "' AND CIDCONCEPTODOCUMENTO = '" . $search["idConcepto"] . "' AND CCANCELADO = '" . $search["estatus"] . "' AND CIMPRESO = 0";
        }



        $orden = $search['orden'];
        $campo = $search['campo'];

        $sql = "SELECT $campos FROM [adDEKKERLAB].[dbo].[admDocumentos] WHERE $sWhere ORDER BY $campo $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

        $query = $this->mysqli->query($sql);

        $sql1 = "SELECT $campos FROM [adDEKKERLAB].[dbo].[admDocumentos] WHERE $sWhere ORDER BY $campo $orden";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;

        //Set counter
        $this->setCounter($nums_row);
        return $query;
    }
    public function getListaProductosEcommerce($campos, $search)
     {

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          /***CODIGOS DE PRODUCTOS */
          $codigos = explode(',', $search['producto']);
          $codigoProducto = "";
          for ($i = 0; $i < count($codigos); $i++) {
               $codigoProducto .= "'" . $codigos[$i] . "', ";
          }
          $codigoProducto = substr($codigoProducto, 0, -2);
          /**MARCA */
          $marcas = explode(',', $search['marca']);
          $marca = "";

          for ($i = 0; $i < count($marcas); $i++) {
               $marca .= "'" . $marcas[$i] . "', ";
          }
          $marca = substr($marca, 0, -2);
          /***MARCA */

          $orden = $search['orden'];

          $periodo = $search['periodo'];
          $almacen1 = $search['almacen'];
          $almacen2 = $search['almacen2'];

          $sWhere = "admprod.CTIPOPRODUCTO = 1 and admexis.CIDALMACEN = '" . $search["almacen2"] . "' and admexis.CIDEJERCICIO = 3 ";
          $sWhere2 = "CIDPRODUCTO != 0";
          if ($search["marca"] != "") {
               $sWhere .= " and admcla2.CVALORCLASIFICACION in(" . $marca . ") ";
          }
          if ($search["producto"] != "") {
               $sWhere .= " and admprod.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
          }
          if ($search["clasificacion"] != "") {
               $sWhere2 .= " and CLASIFICACION = '" . $search['clasificacion'] . "' ";
          }
          if ($search["estatusFacebook"] != "") {
               $sWhere2 .= " and ESTATUS = '" . $search['estatusFacebook'] . "' ";
          }
          if ($search["categoria"] != "") {
               $sWhere2 .= " and CLASIFPRODUCTO = '" . $search['categoria'] . "' ";
          }
          if ($search["utilidad"] != "") {
               if ($search["utilidad"] == "+30") {
                    $sWhere2 .= " and (((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100) >= 30 ";
               } else {
                    $sWhere2 .= " and (((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100) < 30 ";
               }
          }
          if ($search["utilidadMl"] != "") {
               if ($search["utilidadMl"] == "+30") {
                    $sWhere2 .= " and (((PRECIO-(PRECIO * 0.13)-ENVIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO-(PRECIO * 0.13)-ENVIO / 1) * 100) >= 30 ";
               } else {
                    $sWhere2 .= " and (((PRECIO-(PRECIO * 0.13)-ENVIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO-(PRECIO * 0.13)-ENVIO / 1) * 100) < 30 ";
               }
          }

          if ($search["almacen"] == 21) {
               $ejercicio = 4;
          } else {
               $ejercicio  = 9;
          }
          if ($search["campoOrden"] == 'UTILIDAD') {
               $campoOrden = "(((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100)";
          } else {
               $campoOrden = $search['campoOrden'];
          }
          $sql = "WITH productosEcommerce as(SELECT  admprod.CIDPRODUCTO
          ,admprod.CCODIGOPRODUCTO
          ,admprod.CNOMBREPRODUCTO
          ,admmed.CNOMBREUNIDAD
          ,CASE
          WHEN $almacen1 = 21
          THEN
          CASE 
          WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END
          ELSE
          CASE 
          WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END 
          END as 'CLASIFICACION'
          ,admcla.CIDVALORCLASIFICACION as 'CLASIFPRODUCTO'
          ,admcla2.CVALORCLASIFICACION as 'MARCA'
          ,admexis.CENTRADASPERIODO$periodo-admexis.CSALIDASPERIODO$periodo as 'EXISTENCIA'
          ,(admprod.CPRECIO1 * 1.16) as 'PRECIO'
          ,CASE 
                  WHEN dbo.ultimoCostoDekkerlab(admprod.CCODIGOPRODUCTO) IS NULL
                  THEN
                    CASE WHEN  dbo.ultimoCostoPinturas(admprod.CCODIGOPRODUCTO) IS NULL
                    THEN
                        dbo.ultimoCostoFlex(admprod.CCODIGOPRODUCTO)
                    ELSE
                        dbo.ultimoCostoPinturas(admprod.CCODIGOPRODUCTO)
                    END
                 
                  ELSE
                  dbo.ultimoCostoDekkerlab(admprod.CCODIGOPRODUCTO)
                  END as 'COSTO'
          ,CASE
          WHEN (admprod.CPRECIO1 * 1.16) < 299
          THEN
          0
          ELSE
          168
          END as 'ENVIO'
          ,CASE  
          WHEN admexis.CENTRADASPERIODO$periodo-admexis.CSALIDASPERIODO$periodo = 0
          THEN
          'Inactivo'
          ELSE
          'Activo'
          END as 'ESTATUS'
     FROM [adDEKKERLAB].[dbo].[admProductos] as admprod INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as admmed ON admprod.CIDUNIDADBASE = admmed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as admcla ON admprod.CIDVALORCLASIFICACION3 = admcla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as admcla2 ON admprod.CIDVALORCLASIFICACION1 = admcla2.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admExistenciaCosto] as admexis ON admprod.CIDPRODUCTO = admexis.CIDPRODUCTO  WHERE $sWhere)
     SELECT *,(CAST(COSTO as numeric(18,2))*1.16) as 'COSTOIVA',(((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100) as 'UTILIDAD',(PRECIO * 0.13) as 'COMISION',PRECIO-(PRECIO * 0.13)-ENVIO as 'VENTAML',(((PRECIO-(PRECIO * 0.13)-ENVIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO-(PRECIO * 0.13)-ENVIO / 1) * 100) as 'UTILIDADML' FROM productosEcommerce WHERE  $sWhere2 order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

          $query = $this->mysqli->query($sql);

          $sql1 = "WITH productosEcommerce as(SELECT  admprod.CIDPRODUCTO
          ,admprod.CCODIGOPRODUCTO
          ,admprod.CNOMBREPRODUCTO
          ,admmed.CNOMBREUNIDAD
          ,CASE
          WHEN $almacen1 = 21
          THEN
          CASE 
          WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END
          ELSE
          CASE 
          WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END 
          END as 'CLASIFICACION'
          ,admcla.CIDVALORCLASIFICACION as 'CLASIFPRODUCTO'
          ,admcla2.CVALORCLASIFICACION as 'MARCA'
          ,admexis.CENTRADASPERIODO$periodo-admexis.CSALIDASPERIODO$periodo as 'EXISTENCIA'
          ,(admprod.CPRECIO1 * 1.16) as 'PRECIO'
          ,CASE 
          WHEN dbo.ultimoCostoDekkerlab(admprod.CCODIGOPRODUCTO) IS NULL
          THEN
            CASE WHEN  dbo.ultimoCostoPinturas(admprod.CCODIGOPRODUCTO) IS NULL
            THEN
                dbo.ultimoCostoFlex(admprod.CCODIGOPRODUCTO)
            ELSE
                dbo.ultimoCostoPinturas(admprod.CCODIGOPRODUCTO)
            END
         
          ELSE
          dbo.ultimoCostoDekkerlab(admprod.CCODIGOPRODUCTO)
          END as 'COSTO'
          ,CASE
          WHEN (admprod.CPRECIO1 * 1.16) < 299
          THEN
          0
          ELSE
          168
          END as 'ENVIO'
          ,CASE  
          WHEN admexis.CENTRADASPERIODO$periodo-admexis.CSALIDASPERIODO$periodo = 0
          THEN
          'Inactivo'
          ELSE
          'Activo'
          END as 'ESTATUS'
     FROM [adDEKKERLAB].[dbo].[admProductos] as admprod INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as admmed ON admprod.CIDUNIDADBASE = admmed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as admcla ON admprod.CIDVALORCLASIFICACION3 = admcla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as admcla2 ON admprod.CIDVALORCLASIFICACION1 = admcla2.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admExistenciaCosto] as admexis ON admprod.CIDPRODUCTO = admexis.CIDPRODUCTO  WHERE $sWhere)
     SELECT *,(CAST(COSTO as numeric(18,2))*1.16) as 'COSTOIVA',(((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100) as 'UTILIDAD',(PRECIO * 0.13) as 'COMISION',PRECIO-(PRECIO * 0.13)-ENVIO as 'VENTAML',(((PRECIO-(PRECIO * 0.13)-ENVIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO-(PRECIO * 0.13)-ENVIO / 1) * 100) as 'UTILIDADML' FROM productosEcommerce WHERE $sWhere2";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
    function setCounter($counter)
    {
        $this->counter = $counter;
    }
    function getCounter()
    {
        return $this->counter;
    }
}
