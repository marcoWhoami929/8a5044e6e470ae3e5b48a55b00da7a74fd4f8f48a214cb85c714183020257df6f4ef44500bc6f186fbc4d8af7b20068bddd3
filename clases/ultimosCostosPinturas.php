<?php

include("../models/db_conexion.php");
class ultimosCostosPinturas extends ConexionsBd
{
    public $mysqli;
    public $counter;

    function __construct()
    {
        $this->mysqli = $this->conectarPinturas();
    }

    public function countAll($sql)
    {
        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return count($query);
    }

    public function getData($search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $orden = $search['orden'];
        switch ($search["campo"]) {
            case 'nombre':
                $campoOrden = "CNOMBREPRODUCTO";
                break;
            case 'codigo':
                $campoOrden = "CCODIGOPRODUCTO";
                break;
        }
        /***CODIGOS DE PRODUCTOS */
        $codigos = explode(',', $search['query']);
        $codigoProducto = "";
        for ($i = 0; $i < count($codigos); $i++) {
            $codigoProducto .= "'" . $codigos[$i] . "', ";
        }
        $codigoProducto = substr($codigoProducto, 0, -2);

        /***MARCAS DE PRODUCTOS */
        $marcas = explode(',', $search['marcas']);
        $marcaProducto = "";
        for ($i = 0; $i < count($marcas); $i++) {
            $marcaProducto .= "'" . $marcas[$i] . "', ";
        }
        $marcaProducto = substr($marcaProducto, 0, -2);

        $sWhere = " CIDDOCUMENTODE IN( '19','00') 
        and CIDCLIENTEPROVEEDOR != 19 
        OR CIDCLIENTEPROVEEDOR = '00'";

        $codigo = "WHERE admpro.CTIPOPRODUCTO = 1 ";

        if ($search["query"] != "") {
            $codigo .= "and admpro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
        } else {
            $codigo .= "";
        }

        if ($search["marcas"] != "") {
            $codigo .= "and admcla.CVALORCLASIFICACION in(" . $marcaProducto . ") ";
        } else {
            $codigo .= "";
        }

        if ($search["estatus"] == "") {
            $codigo .= "";
        } else {
            $codigo .= "and admpro.CSTATUSPRODUCTO = '" . $search["estatus"] . "'";
        }

        $sql = "WITH COSTOS AS(SELECT 
        admpro.CTIPOPRODUCTO,
        admpro.CIDPRODUCTO, 
        admpro.CCODIGOPRODUCTO, 
        admpro.CNOMBREPRODUCTO, 
        (
          CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN YEAR(admcos.CFECHACOSTOH) ELSE $año END ELSE $año END
        ) as AÑO, 
        (
          CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN MONTH(admcos.CFECHACOSTOH) ELSE 1 END ELSE 1 END
        ) as MES, 
        (
           CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        0
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admcos.CULTIMOCOSTOH ELSE 0 END ELSE 0 END
        END
        ) as CULTIMOCOSTOH, 
        (
         CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admcos.CFECHACOSTOH ELSE 0 END ELSE 0 END
        ) as CFECHACOSTOH, 
        (
           CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN 1 ELSE 1 END ELSE 1 END
        ) as EXISTE, 
        (
         
         CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        '00'
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admmov.CIDDOCUMENTODE ELSE 0 END ELSE 0 END
        END
        ) as CIDDOCUMENTODE, 
        (
          
           CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        '00'
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admdoc.CIDCLIENTEPROVEEDOR ELSE 0 END ELSE 0 END
        END
        ) as CIDCLIENTEPROVEEDOR, 
        CASE admmov.CIDDOCUMENTODE WHEN 19 THEN ROW_NUMBER() OVER(
          PARTITION BY admcos.CIDPRODUCTO, 
          DATEADD(
            MONTH, 
            DATEDIFF(MONTH, 0, admcos.CFECHACOSTOH), 
            0
          ) 
          ORDER BY 
            admcos.CFECHACOSTOH asc
        ) ELSE 1 END AS filtro1 
                       
        FROM dbo.admProductos as admpro FULL OUTER JOIN  dbo.admClasificacionesValores as admcla ON admpro.CIDVALORCLASIFICACION1 = admcla.CIDVALORCLASIFICACION
    FULL OUTER JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO 
    FULL OUTER JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO 
    FULL OUTER JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO $codigo),
        
                       filtroCostos as(select CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,MES,CULTIMOCOSTOH,ROW_NUMBER() OVER(PARTITION BY CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,CFECHACOSTOH),0)
                       ORDER BY CFECHACOSTOH desc) as filtro2 FROM COSTOS as cost WHERE $sWhere) 
        
                       select * from filtroCostos  PIVOT(SUM(CULTIMOCOSTOH) FOR MES in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  where filtro2 = 1  ORDER BY $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);


        $sql1 = "WITH COSTOS AS(SELECT 
        admpro.CTIPOPRODUCTO,
        admpro.CIDPRODUCTO, 
        admpro.CCODIGOPRODUCTO, 
        admpro.CNOMBREPRODUCTO, 
        (
          CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN YEAR(admcos.CFECHACOSTOH) ELSE $año END ELSE $año END
        ) as AÑO, 
        (
          CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN MONTH(admcos.CFECHACOSTOH) ELSE 1 END ELSE 1 END
        ) as MES, 
        (
           CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        0
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admcos.CULTIMOCOSTOH ELSE 0 END ELSE 0 END
        END
        ) as CULTIMOCOSTOH, 
        (
         CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admcos.CFECHACOSTOH ELSE 0 END ELSE 0 END
        ) as CFECHACOSTOH, 
        (
           CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN 1 ELSE 1 END ELSE 1 END
        ) as EXISTE, 
        (
         
         CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        '00'
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admmov.CIDDOCUMENTODE ELSE 0 END ELSE 0 END
        END
        ) as CIDDOCUMENTODE, 
        (
          
           CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        '00'
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admdoc.CIDCLIENTEPROVEEDOR ELSE 0 END ELSE 0 END
        END
        ) as CIDCLIENTEPROVEEDOR, 
        CASE admmov.CIDDOCUMENTODE WHEN 19 THEN ROW_NUMBER() OVER(
          PARTITION BY admcos.CIDPRODUCTO, 
          DATEADD(
            MONTH, 
            DATEDIFF(MONTH, 0, admcos.CFECHACOSTOH), 
            0
          ) 
          ORDER BY 
            admcos.CFECHACOSTOH asc
        ) ELSE 1 END AS filtro1 
                       
        FROM dbo.admProductos as admpro FULL OUTER JOIN  dbo.admClasificacionesValores as admcla ON admpro.CIDVALORCLASIFICACION1 = admcla.CIDVALORCLASIFICACION
    FULL OUTER JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO 
    FULL OUTER JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO 
    FULL OUTER JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO $codigo),
        
                       filtroCostos as(select CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,MES,CULTIMOCOSTOH,ROW_NUMBER() OVER(PARTITION BY CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,CFECHACOSTOH),0)
                       ORDER BY CFECHACOSTOH desc) as filtro2 FROM COSTOS as cost WHERE $sWhere) 
        
                       select * from filtroCostos  PIVOT(SUM(CULTIMOCOSTOH) FOR MES in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  where filtro2 = 1  ORDER BY $campoOrden $orden";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getIdDocuments($search)
    {

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];

        $orden = $search['orden'];
        switch ($search["campo"]) {
            case 'nombre':
                $campoOrden = "CNOMBREPRODUCTO";
                break;
            case 'codigo':
                $campoOrden = "CCODIGOPRODUCTO";
                break;
        }
        /***CODIGOS DE PRODUCTOS */
        $codigos = explode(',', $search['query']);
        $codigoProducto = "";
        for ($i = 0; $i < count($codigos); $i++) {
            $codigoProducto .= "'" . $codigos[$i] . "', ";
        }
        $codigoProducto = substr($codigoProducto, 0, -2);

        /***MARCAS DE PRODUCTOS */
        $marcas = explode(',', $search['marcas']);
        $marcaProducto = "";
        for ($i = 0; $i < count($marcas); $i++) {
            $marcaProducto .= "'" . $marcas[$i] . "', ";
        }
        $marcaProducto = substr($marcaProducto, 0, -2);

        $sWhere = " CIDDOCUMENTODE IN( '19','00') 
        and CIDCLIENTEPROVEEDOR != 19 
        OR CIDCLIENTEPROVEEDOR = '00'";

        $codigo = "WHERE admpro.CTIPOPRODUCTO = 1 ";

        if ($search["query"] != "") {
            $codigo .= "and admpro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
        } else {
            $codigo .= "";
        }

        if ($search["marcas"] != "") {
            $codigo .= "and admcla.CVALORCLASIFICACION in(" . $marcaProducto . ") ";
        } else {
            $codigo .= "";
        }

        if ($search["estatus"] == "") {
            $codigo .= "";
        } else {
            $codigo .= "and admpro.CSTATUSPRODUCTO = '" . $search["estatus"] . "'";
        }

        $sql = "WITH COSTOS AS(SELECT 
        admpro.CTIPOPRODUCTO,
        admpro.CIDPRODUCTO, 
        admpro.CCODIGOPRODUCTO, 
        admpro.CNOMBREPRODUCTO, 
        (
          CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN YEAR(admcos.CFECHACOSTOH) ELSE $año END ELSE $año END
        ) as AÑO, 
        (
          CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN MONTH(admcos.CFECHACOSTOH) ELSE 1 END ELSE 1 END
        ) as MES, 
        (
           CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        0
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admmov.CIDDOCUMENTO ELSE 0 END ELSE 0 END
        END
        ) as CIDDOCUMENTO, 
        (
         CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admcos.CFECHACOSTOH ELSE 0 END ELSE 0 END
        ) as CFECHACOSTOH, 
        (
           CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN 1 ELSE 1 END ELSE 1 END
        ) as EXISTE, 
        (
         
         CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        '00'
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admmov.CIDDOCUMENTODE ELSE 0 END ELSE 0 END
        END
        ) as CIDDOCUMENTODE, 
        (
          
           CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        '00'
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admdoc.CIDCLIENTEPROVEEDOR ELSE 0 END ELSE 0 END
        END
        ) as CIDCLIENTEPROVEEDOR, 
        CASE admmov.CIDDOCUMENTODE WHEN 19 THEN ROW_NUMBER() OVER(
          PARTITION BY admcos.CIDPRODUCTO, 
          DATEADD(
            MONTH, 
            DATEDIFF(MONTH, 0, admcos.CFECHACOSTOH), 
            0
          ) 
          ORDER BY 
            admcos.CFECHACOSTOH asc
        ) ELSE 1 END AS filtro1 
                       
        FROM dbo.admProductos as admpro FULL OUTER JOIN  dbo.admClasificacionesValores as admcla ON admpro.CIDVALORCLASIFICACION1 = admcla.CIDVALORCLASIFICACION
    FULL OUTER JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO 
    FULL OUTER JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO 
    FULL OUTER JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO  $codigo),
        
                       filtroCostos as(select CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,MES,CIDDOCUMENTO,ROW_NUMBER() OVER(PARTITION BY CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,CFECHACOSTOH),0)
                       ORDER BY CFECHACOSTOH desc) as filtro2 FROM COSTOS as cost WHERE $sWhere) 
        
                       select * from filtroCostos  PIVOT(MAX(CIDDOCUMENTO) FOR MES in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  where filtro2 = 1  ORDER BY $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return $query;
    }
    public function getDateDocuments($search)
    {

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];

        $orden = $search['orden'];
        switch ($search["campo"]) {
            case 'nombre':
                $campoOrden = "CNOMBREPRODUCTO";
                break;
            case 'codigo':
                $campoOrden = "CCODIGOPRODUCTO";
                break;
        }
        /***CODIGOS DE PRODUCTOS */
        $codigos = explode(',', $search['query']);
        $codigoProducto = "";
        for ($i = 0; $i < count($codigos); $i++) {
            $codigoProducto .= "'" . $codigos[$i] . "', ";
        }
        $codigoProducto = substr($codigoProducto, 0, -2);

        /***MARCAS DE PRODUCTOS */
        $marcas = explode(',', $search['marcas']);
        $marcaProducto = "";
        for ($i = 0; $i < count($marcas); $i++) {
            $marcaProducto .= "'" . $marcas[$i] . "', ";
        }
        $marcaProducto = substr($marcaProducto, 0, -2);

        $sWhere = " CIDDOCUMENTODE IN( '19','00') 
        and CIDCLIENTEPROVEEDOR != 19 
        OR CIDCLIENTEPROVEEDOR = '00'";

        $codigo = "WHERE admpro.CTIPOPRODUCTO = 1 ";

        if ($search["query"] != "") {
            $codigo .= "and admpro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
        } else {
            $codigo .= "";
        }

        if ($search["marcas"] != "") {
            $codigo .= "and admcla.CVALORCLASIFICACION in(" . $marcaProducto . ") ";
        } else {
            $codigo .= "";
        }

        if ($search["estatus"] == "") {
            $codigo .= "";
        } else {
            $codigo .= "and admpro.CSTATUSPRODUCTO = '" . $search["estatus"] . "'";
        }

        $sql = "WITH COSTOS AS(SELECT 
        admpro.CTIPOPRODUCTO,
        admpro.CIDPRODUCTO, 
        admpro.CCODIGOPRODUCTO, 
        admpro.CNOMBREPRODUCTO, 
        (
          CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN YEAR(admcos.CFECHACOSTOH) ELSE $año END ELSE $año END
        ) as AÑO, 
        (
          CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN MONTH(admcos.CFECHACOSTOH) ELSE 1 END ELSE 1 END
        ) as MES, 
        (
           CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        0
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admmov.CIDDOCUMENTO ELSE 0 END ELSE 0 END
        END
        ) as CIDDOCUMENTO, 
        (
         CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admcos.CFECHACOSTOH ELSE 0 END ELSE 0 END
        ) as CFECHACOSTOH, 
        (
           CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN 1 ELSE 1 END ELSE 1 END
        ) as EXISTE, 
        (
         
         CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        '00'
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admmov.CIDDOCUMENTODE ELSE 0 END ELSE 0 END
        END
        ) as CIDDOCUMENTODE, 
        (
          
           CASE admdoc.CIDCLIENTEPROVEEDOR
        WHEN 19
        THEN
        '00'
        ELSE 
        CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año and admmov.CIDDOCUMENTODE = 19 THEN admdoc.CIDCLIENTEPROVEEDOR ELSE 0 END ELSE 0 END
        END
        ) as CIDCLIENTEPROVEEDOR, 
        CASE admmov.CIDDOCUMENTODE WHEN 19 THEN ROW_NUMBER() OVER(
          PARTITION BY admcos.CIDPRODUCTO, 
          DATEADD(
            MONTH, 
            DATEDIFF(MONTH, 0, admcos.CFECHACOSTOH), 
            0
          ) 
          ORDER BY 
            admcos.CFECHACOSTOH asc
        ) ELSE 1 END AS filtro1 
                       
        FROM dbo.admProductos as admpro FULL OUTER JOIN  dbo.admClasificacionesValores as admcla ON admpro.CIDVALORCLASIFICACION1 = admcla.CIDVALORCLASIFICACION
    FULL OUTER JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO 
    FULL OUTER JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO 
    FULL OUTER JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO  $codigo),
        
                       filtroCostos as(select CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,MES,CFECHACOSTOH,ROW_NUMBER() OVER(PARTITION BY CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,CFECHACOSTOH),0)
                       ORDER BY CFECHACOSTOH desc) as filtro2 FROM COSTOS as cost WHERE $sWhere) 
        
                       select * from filtroCostos  PIVOT(MAX(CFECHACOSTOH) FOR MES in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  where filtro2 = 1  ORDER BY $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return $query;
    }
    public function getUltimoCosto($idProducto, $año)
    {

        switch ($año) {
            case '2013':
                $meses = "2013";
                break;
            case '2014':
                $meses = "2013";
                break;
            case '2015':
                $meses = "2013,2014";
                break;
            case '2016':
                $meses = "2013,2014,2015";
                break;
            case '2017':
                $meses = "2013,2014,2015,2016";
                break;
            case '2018':
                $meses = "2013,2014,2015,2016,2017";
                break;
            case '2019':
                $meses = "2013,2014,2015,2016,2017,2018";
                break;
            case '2020':
                $meses = "2013,2014,2015,2016,2017,2018,2019";
                break;
            case '2021':
                $meses = "2013,2014,2015,2016,2017,2018,2019,2020";
                break;
            case '2022':
                $meses = "2013,2014,2015,2016,2017,2018,2019,2020,2021";
                break;
            case '2023':
                $meses = "2013,2014,2015,2016,2017,2018,2019,2020,2021,2022";
                break;
        }

        $sql = "WITH consulta as (SELECT  admpro.CIDPRODUCTO,admcos.CULTIMOCOSTOH,admmov.CIDDOCUMENTO,admcos.CFECHACOSTOH,MONTH(admcos.CFECHACOSTOH) as mes,YEAR(admcos.CFECHACOSTOH) as año,ROW_NUMBER() OVER(PARTITION BY admcos.CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,admcos.CFECHACOSTOH),0)
        ORDER BY admcos.CFECHACOSTOH desc) as filtro1 FROM dbo.admProductos as admpro LEFT OUTER JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO LEFT OUTER JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO LEFT OUTER JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO WHERE YEAR(admcos.CFECHACOSTOH) IN($meses) AND admmov.CIDDOCUMENTODE = '19' and admcos.CIDPRODUCTO = $idProducto and admdoc.CIDCLIENTEPROVEEDOR != 19 and admcos.CULTIMOCOSTOH != 0 )

     select TOP(1) CFECHACOSTOH,CULTIMOCOSTOH,CIDDOCUMENTO from consulta where filtro1 = 1 ORDER BY YEAR(CFECHACOSTOH) DESC,MONTH(CFECHACOSTOH) DESC,CFECHACOSTOH DESC";

        $query = $this->mysqli->query($sql);
        $query = $query->fetch();

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
