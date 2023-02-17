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

    function setCounter($counter)
    {
        $this->counter = $counter;
    }
    function getCounter()
    {
        return $this->counter;
    }
}
