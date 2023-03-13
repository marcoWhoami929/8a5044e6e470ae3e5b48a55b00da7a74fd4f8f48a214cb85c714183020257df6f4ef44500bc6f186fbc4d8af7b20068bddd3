<?php
require_once "db_conexion.php";
$agenteListPinturas = "CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
WHEN 'UE'
THEN
CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END 
WHEN 'CP'
THEN 
'PV CAPU'
WHEN 'CT'
THEN 
'PV ACATEPEC'
WHEN 'SA'
THEN 
'PV SAN MANUEL'
WHEN 'SA'
THEN 
'PV SAN MANUEL'
WHEN 'MA'
THEN 
'PV MAYORAZGO'
WHEN 'NO'
THEN 
'PV NORTE'
WHEN 'CH'
THEN 
'PV CHOLULA'
WHEN 'XO'
THEN 
'PV XONACA'
WHEN 'RE'
THEN 
'PV REFORMA'
WHEN 'VE'
THEN 
'PV VERGEL'
WHEN 'GO'
THEN 
'PV SANTIAGO'
WHEN 'DI'
THEN 
'PV DIAGONAL'
WHEN 'DG'
THEN 
'PV VERGEL'
WHEN 'MY'
THEN 
'PV MAYORAZGO'
WHEN 'VG'
THEN 
'PV VERGEL'
WHEN 'XN'
THEN 
'PV XONACA'
WHEN 'RF'
THEN
 'PV REFORMA'
WHEN 'TR'
THEN 
  'PV TORRES'
WHEN 'SG'
THEN 
  'PV SANTIAGO'
WHEN 'SM'
THEN 
  'PV SAN MANUEL'

WHEN 'CI'
THEN
CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END 
WHEN 'AC'
THEN
CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
WHEN 'CM'
THEN    
CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
WHEN 'TD'
THEN
CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  

WHEN 'CD'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'DE'
   THEN
       CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
          CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
       ELSE
          agen.CNOMBREAGENTE
       END
   WHEN 'CR'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen2.CNOMBREAGENTE
       END
   WHEN 'FA'
   THEN
   CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen.CNOMBREAGENTE
       END
   ELSE
       agen.CNOMBREAGENTE
   END
WHEN 'PB'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'NC'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen2.CNOMBREAGENTE
       END
   WHEN 'DE'
   THEN
       CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
          CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
       ELSE
          agen.CNOMBREAGENTE
       END
   WHEN 'CR'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen2.CNOMBREAGENTE
       END
   WHEN 'FA'
   THEN
   CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen.CNOMBREAGENTE
       END
   ELSE
       agen.CNOMBREAGENTE
   END
WHEN 'ND'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'DE'
   THEN
       CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
          CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
       ELSE
          agen.CNOMBREAGENTE
       END
   WHEN 'CR'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen2.CNOMBREAGENTE
       END
   WHEN 'FA'
   THEN
   CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen.CNOMBREAGENTE
       END
   ELSE
       agen.CNOMBREAGENTE
   END
ELSE
   CASE agen.CNOMBREAGENTE
   WHEN '(Ninguno)'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
          acla.CVALORCLASIFICACION
 
       ELSE
           agen2.CNOMBREAGENTE
       END
   ELSE
       agen.CNOMBREAGENTE
   END
END";

$agenteListDekkerlab = "CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
WHEN 'CA'
THEN 
'PV CAPU'
WHEN 'CT'
THEN 
'PV ACATEPEC'
WHEN 'RM'
THEN
 'PV REFORMA'
WHEN 'TO'
THEN 
  'PV TORRES'
WHEN 'SN'
THEN 
      CASE RTRIM(agen.CNOMBREAGENTE)
      WHEN 'ALBERTO YIZARK GONZALEZ AVILES'
      THEN
           'ALBERTO YIZARK GONZALEZ AVILES'
      WHEN 'IVAN HERRERA PEREZ'
      THEN
           'IVAN HERRERA PEREZ'
      ELSE
            'MOSTRADOR SAN MANUEL'
      END
WHEN 'ST'
THEN 
      CASE RTRIM(agen.CNOMBREAGENTE)
      WHEN 'GABRIEL GARDUÑO GARCIA'
      THEN
           'GABRIEL GARDUÑO GARCIA'
      ELSE
            'MOSTRADOR SANTIAGO'
END
WHEN 'MY'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'DT'
   THEN
       CASE RTRIM(agen2.CNOMBREAGENTE)
       WHEN '(Ninguno)'
       THEN
        CASE RTRIM(acla.CVALORCLASIFICACION)
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               RTRIM(acla.CVALORCLASIFICACION)
           END
       ELSE
           CASE RTRIM(agen2.CNOMBREAGENTE)
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               RTRIM(agen2.CNOMBREAGENTE)
           END
       END
       WHEN 'DV'
       THEN
           CASE RTRIM(agen.CNOMBREAGENTE)
           WHEN '(Ninguno)'
           THEN
            CASE RTRIM(agen2.CNOMBREAGENTE)
            WHEN '(Ninguno)'
            THEN 
               CASE RTRIM(acla.CVALORCLASIFICACION)
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   RTRIM(acla.CVALORCLASIFICACION)
               END
            ELSE
                RTRIM(agen2.CNOMBREAGENTE)
            END
           ELSE
               RTRIM(agen.CNOMBREAGENTE)
           END
       WHEN 'NC'
       THEN
           CASE RTRIM(agen2.CNOMBREAGENTE)
           WHEN '(Ninguno)'
           THEN
            CASE RTRIM(acla.CVALORCLASIFICACION)
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
                WHEN '(Ninguna)'
               THEN
               'PV ACATEPEC'
               ELSE
                   RTRIM(acla.CVALORCLASIFICACION)
               END
           ELSE
               CASE RTRIM(agen2.CNOMBREAGENTE)
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   RTRIM(agen2.CNOMBREAGENTE)
               END
           END
   WHEN 'FC'
   THEN
   CASE RTRIM(agen.CNOMBREAGENTE)
       WHEN '(Ninguno)'
       THEN
       CASE RTRIM(agen2.CNOMBREAGENTE)
        WHEN 'RODOLFO ROMERO CARPINTEYRO'
        THEN
        'PV REFORMA'
        WHEN 'MIROSLAVA PEREZ LIRA'
        THEN
        'MOSTRADOR SANTIAGO'
        WHEN 'PAULA ZEPEDA ARCE'
        THEN
        'PV CAPU'
        WHEN 'ANA LAURA SANCHEZ MARTINEZ'
        THEN
        'PV TORRES'
        WHEN '(Ninguno)'
            THEN
             CASE RTRIM(acla.CVALORCLASIFICACION)
                WHEN 'RODOLFO ROMERO CARPINTEYRO'
                THEN
                'PV REFORMA'
                WHEN 'MIROSLAVA PEREZ LIRA'
                THEN
                'MOSTRADOR SANTIAGO'
                WHEN 'PAULA ZEPEDA ARCE'
                THEN
                'PV CAPU'
                WHEN 'ANA LAURA SANCHEZ MARTINEZ'
                THEN
                'PV TORRES'
                ELSE
                    RTRIM(acla.CVALORCLASIFICACION)
                END
            ELSE
                RTRIM(agen2.CNOMBREAGENTE)
            END
       
       ELSE
           CASE RTRIM(agen.CNOMBREAGENTE)
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               RTRIM(agen.CNOMBREAGENTE)
           END
       END
   ELSE
        CASE RTRIM(agen.CNOMBREAGENTE)
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               RTRIM(agen.CNOMBREAGENTE)
           END
   END
    WHEN 'NC'
       THEN
           CASE RTRIM(agen2.CNOMBREAGENTE)
           WHEN '(Ninguno)'
           THEN
            CASE RTRIM(acla.CVALORCLASIFICACION)
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
                WHEN '(Ninguna)'
               THEN
               'PV ACATEPEC'
               ELSE
                   RTRIM(acla.CVALORCLASIFICACION)
               END
           ELSE
               CASE RTRIM(agen2.CNOMBREAGENTE)
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   RTRIM(agen2.CNOMBREAGENTE)
               END
           END
WHEN 'IN'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'DT'
   THEN
       CASE RTRIM(agen2.CNOMBREAGENTE)
       WHEN '(Ninguno)'
       THEN
        CASE RTRIM(acla.CVALORCLASIFICACION)
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               RTRIM(acla.CVALORCLASIFICACION)
           END
       ELSE
           CASE RTRIM(agen2.CNOMBREAGENTE)
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               RTRIM(agen2.CNOMBREAGENTE)
           END
       END
       WHEN 'DV'
       THEN
           CASE RTRIM(agen.CNOMBREAGENTE)
           WHEN '(Ninguno)'
           THEN
            CASE RTRIM(agen2.CNOMBREAGENTE)
           WHEN '(Ninguno)'
            THEN 
               CASE RTRIM(acla.CVALORCLASIFICACION)
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   RTRIM(acla.CVALORCLASIFICACION)
               END
            ELSE
                RTRIM(agen2.CNOMBREAGENTE)
            END
           ELSE
               RTRIM(agen.CNOMBREAGENTE)
           END
       WHEN 'NC'
       THEN
           CASE RTRIM(agen2.CNOMBREAGENTE)
           WHEN '(Ninguno)'
           THEN
            CASE RTRIM(acla.CVALORCLASIFICACION)
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               WHEN '(Ninguna)'
               THEN
               'PV ACATEPEC'
               ELSE
                   RTRIM(acla.CVALORCLASIFICACION)
               END
           ELSE
               CASE RTRIM(agen2.CNOMBREAGENTE)
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   RTRIM(agen2.CNOMBREAGENTE)
               END
           END
   WHEN 'FC'
   THEN
   CASE RTRIM(agen.CNOMBREAGENTE)
       WHEN '(Ninguno)'
       THEN
       CASE RTRIM(agen2.CNOMBREAGENTE)
        WHEN 'RODOLFO ROMERO CARPINTEYRO'
        THEN
        'PV REFORMA'
        WHEN 'MIROSLAVA PEREZ LIRA'
        THEN
        'MOSTRADOR SANTIAGO'
        WHEN 'PAULA ZEPEDA ARCE'
        THEN
        'PV CAPU'
        WHEN 'ANA LAURA SANCHEZ MARTINEZ'
        THEN
        'PV TORRES'
        WHEN '(Ninguno)'
            THEN
             CASE RTRIM(acla.CVALORCLASIFICACION)
                WHEN 'RODOLFO ROMERO CARPINTEYRO'
                THEN
                'PV REFORMA'
                WHEN 'MIROSLAVA PEREZ LIRA'
                THEN
                'MOSTRADOR SANTIAGO'
                WHEN 'PAULA ZEPEDA ARCE'
                THEN
                'PV CAPU'
                WHEN 'ANA LAURA SANCHEZ MARTINEZ'
                THEN
                'PV TORRES'
                ELSE
                    RTRIM(acla.CVALORCLASIFICACION)
                END
            ELSE
                RTRIM(agen2.CNOMBREAGENTE)
            END
       
       ELSE
           CASE RTRIM(agen.CNOMBREAGENTE)
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               RTRIM(agen.CNOMBREAGENTE)
           END
       END
   ELSE
        CASE RTRIM(agen.CNOMBREAGENTE)
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               RTRIM(agen.CNOMBREAGENTE)
           END
   END
ELSE
   CASE RTRIM(agen.CNOMBREAGENTE)
   WHEN '(Ninguno)'
   THEN
       CASE RTRIM(agen2.CNOMBREAGENTE)
       WHEN '(Ninguno)'
       THEN
           CASE RTRIM(acla.CVALORCLASIFICACION)
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           WHEN '(Ninguna)'
               THEN
               'PV ACATEPEC'
           ELSE
               RTRIM(acla.CVALORCLASIFICACION)
           END
       WHEN 'RODOLFO ROMERO CARPINTEYRO'
       THEN
       'PV REFORMA'
       WHEN 'MIROSLAVA PEREZ LIRA'
       THEN
       'MOSTRADOR SANTIAGO'
       WHEN 'PAULA ZEPEDA ARCE'
       THEN
       'PV CAPU'
       WHEN 'ANA LAURA SANCHEZ MARTINEZ'
       THEN
       'PV TORRES'
       ELSE
           RTRIM(agen2.CNOMBREAGENTE)
       END
   WHEN 'RODOLFO ROMERO CARPINTEYRO'
   THEN
   'PV REFORMA'
   WHEN 'MIROSLAVA PEREZ LIRA'
   THEN
   'MOSTRADOR SANTIAGO'
   WHEN 'PAULA ZEPEDA ARCE'
   THEN
   'PV CAPU'
   WHEN 'ANA LAURA SANCHEZ MARTINEZ'
   THEN
   'PV TORRES'
   ELSE
       RTRIM(agen.CNOMBREAGENTE)
   END
END";

$agenteVenta = "CASE canalComercial
WHEN 'CEDIS'
THEN
   CASE Agente 
   WHEN 'LUIS ENRIQUE ESCOBEDO RIOS'
   THEN 
    'GABRIEL JIMÉNEZ OCHOA'
   ELSE 
    Agente
   END 
WHEN 'E-COMMERCE'
THEN
   CASE Agente 
   WHEN 'MARY CARMEN FUENTES CALDERÓN'
   THEN 
    'IRLANDA REYES PASTRANA'
   ELSE 
    Agente
   END 
 WHEN 'TIENDAS'
THEN
   CASE Agente 
   WHEN 'DANIEL TREJO CAMARGO'
   THEN 
    'PV ACATEPEC'
   WHEN 'IVAN MUÑOZ TOMAY'
   THEN 
    'PV ACATEPEC'
   WHEN 'PV ACATEPEC'
   THEN 
    'PV ACATEPEC'
   WHEN 'MOSTRADOR ACATEPEC'
   THEN 
    'PV ACATEPEC'
   WHEN 'MOSTRADOR CAPU'
   THEN 
    'PV CAPU'
   WHEN 'PV CAPU'
   THEN 
    'PV CAPU'
     WHEN 'MOSTRADOR REFORMA'
   THEN 
    'PV REFORMA'
   WHEN 'PV REFORMA'
   THEN 
    'PV REFORMA'
   WHEN 'MOSTRADOR SAN MANUEL'
   THEN 
    'PV SAN MANUEL'
   WHEN 'PV SAN MANUEL'
   THEN 
    'PV SAN MANUEL'
    WHEN 'MOSTRADOR SANTIAGO'
   THEN 
    'PV SANTIAGO'
   WHEN 'PV SANTIAGO'
   THEN 
    'PV SANTIAGO'
    WHEN 'MOSTRADOR TORRES'
   THEN 
    'PV TORRES'
   WHEN 'PV TORRES'
   THEN 
    'PV TORRES'
   ELSE 
    Agente
   END 
 ELSE 
    Agente
END";

class ModelAdmon
{
     static public function mdlMostrarAdministradores($tabla, $item, $valor)
     {

          if ($item != null) {

               $stmt = ConexionsBd::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

               $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

               $stmt->execute();

               return $stmt->fetch();
          } else {

               $stmt = ConexionsBd::conectar()->prepare("SELECT * FROM $tabla");

               $stmt->execute();

               return $stmt->fetchAll();
          }
     }
     static public function mdlRegistroBitacora($tabla, $datos)
     {

          $stmt = ConexionsBd::conectar()->prepare("INSERT INTO $tabla(usuario, perfil, accion,idAccion) VALUES(:usuario, :perfil, :accion, :idAccion)");

          $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
          $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
          $stmt->bindParam(":accion", $datos["accion"], PDO::PARAM_STR);
          $stmt->bindParam(":idAccion", $datos["idAccion"], PDO::PARAM_INT);
          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
     static public function mdlListarCentroTrabajo($tabla)
     {
          $stmt = ConexionsBd::conectarParametros()->prepare("SELECT CAST(CCENTROTRABAJO AS NVARCHAR(100)) as  CCENTROTRABAJO FROM $tabla GROUP BY CAST(CCENTROTRABAJO AS NVARCHAR(100))");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlListarCanalComercial($tabla)
     {
          $stmt = ConexionsBd::conectarParametros()->prepare("SELECT CAST(CCANALCOMERCIAL AS NVARCHAR(100)) as CCANALCOMERCIAL FROM $tabla GROUP BY CAST(CCANALCOMERCIAL AS NVARCHAR(100))");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlListarCanalesComerciales()
     {

          $stmt = ConexionsBd::conectarParametros()->prepare("WITH canales AS(SELECT CAST(CCANALCOMERCIAL AS NVARCHAR(100)) as CCANALCOMERCIAL FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS]
          UNION
          SELECT CAST(CCANALCOMERCIAL AS NVARCHAR(100)) as CCANALCOMERCIAL FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX]
          
          ),
          ListaCanales AS(SELECT c.CCANALCOMERCIAL from canales as c)
            SELECT * FROM ListaCanales group by CCANALCOMERCIAL
        ");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlListarCentrosTrabajo()
     {

          $stmt = ConexionsBd::conectarParametros()->prepare("WITH centros AS(SELECT CAST(CCENTROTRABAJO AS NVARCHAR(100)) as CCENTROTRABAJO FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS]
          UNION
          SELECT CAST(CCENTROTRABAJO AS NVARCHAR(100)) as CCENTROTRABAJO FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX]
          
          ),
          ListaCentros AS(SELECT c.CCENTROTRABAJO from centros as c)
            SELECT * FROM ListaCentros group by CCENTROTRABAJO
        ");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlObtenerDetalleCompra($empresa, $idDocumento)

     {

          switch ($empresa) {

               case "PINTURAS":
                    $stmt = ConexionsBd::conectarPinturas()->prepare("select admcon.CNOMBRECONCEPTO,admdoc.CFECHA,admdoc.CSERIEDOCUMENTO,admdoc.CFOLIO,admdoc.CRAZONSOCIAL from dbo.admDocumentos as admdoc INNER  JOIN dbo.admConceptos as admcon ON admdoc.CIDCONCEPTODOCUMENTO = admcon.CIDCONCEPTODOCUMENTO where admdoc.CIDDOCUMENTO = $idDocumento");
                    break;
               case "FLEX":
                    $stmt = ConexionsBd::conectarFlex()->prepare("select admcon.CNOMBRECONCEPTO,admdoc.CFECHA,admdoc.CSERIEDOCUMENTO,admdoc.CFOLIO,admdoc.CRAZONSOCIAL from dbo.admDocumentos as admdoc INNER  JOIN dbo.admConceptos as admcon ON admdoc.CIDCONCEPTODOCUMENTO = admcon.CIDCONCEPTODOCUMENTO where admdoc.CIDDOCUMENTO = $idDocumento");
                    break;
               case "TORRES":
                    $stmt = ConexionsBd::conectarTorres()->prepare("select admcon.CNOMBRECONCEPTO,admdoc.CFECHA,admdoc.CSERIEDOCUMENTO,admdoc.CFOLIO,admdoc.CRAZONSOCIAL from dbo.admDocumentos as admdoc INNER  JOIN dbo.admConceptos as admcon ON admdoc.CIDCONCEPTODOCUMENTO = admcon.CIDCONCEPTODOCUMENTO where admdoc.CIDDOCUMENTO = $idDocumento");
                    break;
               case "DEKKERLAB":
                    $stmt = ConexionsBd::conectarDekkerlab()->prepare("select admcon.CNOMBRECONCEPTO,admdoc.CFECHA,admdoc.CSERIEDOCUMENTO,admdoc.CFOLIO,admdoc.CRAZONSOCIAL from dbo.admDocumentos as admdoc INNER  JOIN dbo.admConceptos as admcon ON admdoc.CIDCONCEPTODOCUMENTO = admcon.CIDCONCEPTODOCUMENTO where admdoc.CIDDOCUMENTO = $idDocumento");
                    break;
          }

          $stmt->execute();

          return $stmt->fetch();

          $stmt = null;
     }
     static public function mdlObtenerListaAgentes()
     {
          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH Agentes AS(SELECT CIDAGENTE
              ,CNOMBREAGENTE
        
          FROM [adPINTURAS2020SADEC].[dbo].[admAgentes]
          UNION
          SELECT CIDAGENTE
              ,CNOMBREAGENTE
        
          FROM [adFLEX2020SADEC].[dbo].[admAgentes]
          UNION
          SELECT CIDAGENTE
              ,CNOMBREAGENTE
        
          FROM [adPinturas_y_Complemen].[dbo].[admAgentes]
          UNION
          SELECT CIDAGENTE
              ,CNOMBREAGENTE
        
          FROM [adDEKKERLAB].[dbo].[admAgentes]
          ),
          agentesLista AS(SELECT a.CNOMBREAGENTE from agentes as a)
                  select * from agentesLista group by CNOMBREAGENTE
        ");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlObtenerListaMarcas()
     {
          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH Marcas As(SELECT
              CVALORCLASIFICACION As Marca
             
          FROM [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25
          UNION
          SELECT 
               CVALORCLASIFICACION As Marca
              
          FROM [adFLEX2020SADEC].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25
          UNION
          SELECT 
               CVALORCLASIFICACION As Marca
             
          FROM [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25
          UNION
          SELECT 
               CVALORCLASIFICACION As Marca
             
          FROM [adDEKKERLAB].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25),
          marcasOrdenadas As(
            SELECT
                *
            FROM Marcas)
            SELECT * FROM marcasOrdenadas ORDER BY Marca ASC
        ");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
      static public function mdlObtenerListaMarcasDekkerlab()
     {
          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH Marcas As(SELECT 
                CIDVALORCLASIFICACION as 'Id'
               ,CVALORCLASIFICACION as Marca
             
          FROM [adDEKKERLAB].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25),
          marcasOrdenadas As(
            SELECT
                *
            FROM Marcas)
            SELECT * FROM marcasOrdenadas ORDER BY Marca ASC
        ");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt->close();

          $stmt = null;
     }
      static public function mdlObtenerListaMarcasEmpresa($empresa)
     {
          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH Marcas As(SELECT 
          CIDVALORCLASIFICACION as 'Id'
         ,CVALORCLASIFICACION as Marca
       
               FROM [$empresa].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25),
               marcasOrdenadas As(
                    SELECT
                         *
                    FROM Marcas)
                    SELECT * FROM marcasOrdenadas ORDER BY Marca ASC
               ");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt->close();

          $stmt = null;
     }
     static public function mdlObtenerListaCategorias()
     {
          $stmt = ConexionsBd::conectarDekkerlab()->prepare("SELECT 
               CIDVALORCLASIFICACION as 'Id'
               ,CVALORCLASIFICACION as 'Categoria'
                
            FROM [adDEKKERLAB].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 27");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt->close();

          $stmt = null;
     }
     static public function mdlObtenerListaFamilias()
     {
          $stmt = ConexionsBd::conectarDekkerlab()->prepare("SELECT 
               CIDVALORCLASIFICACION as 'Id'
               ,CVALORCLASIFICACION as 'Familia'
                
            FROM [adDEKKERLAB].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 26");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt->close();

          $stmt = null;
     }
     static public function mdlRegistroConcepto($empresa, $datos)
     {
          switch ($empresa) {
               case 'PINTURAS':
                    $tabla = "[parametrosVentas].[dbo].[CONCEPTOSPINTURAS]";
                    break;
               case 'FLEX':
                    $tabla = "[parametrosVentas].[dbo].[CONCEPTOSFLEX]";
                    break;
          }

          $stmt = ConexionsBd::conectarParametros()->prepare("INSERT INTO $tabla (CNOMBREAGENTE,CCENTROTRABAJO,CCANALCOMERCIAL) VALUES(:nombreAgente,:centroTrabajo,:canalComercial)");

          $stmt->bindParam(":nombreAgente", $datos["agente"], PDO::PARAM_STR);
          $stmt->bindParam(":centroTrabajo", $datos["centroTrabajo"], PDO::PARAM_STR);
          $stmt->bindParam(":canalComercial", $datos["canalComercial"], PDO::PARAM_STR);

          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
     static public function mdlDetallesConcepto($empresa, $id)
     {
          switch ($empresa) {
               case 'PINTURAS':
                    $tabla = "[parametrosVentas].[dbo].[CONCEPTOSPINTURAS]";
                    break;
               case 'FLEX':
                    $tabla = "[parametrosVentas].[dbo].[CONCEPTOSFLEX]";
                    break;
          }
          $stmt = ConexionsBd::conectarParametros()->prepare("SELECT * FROM $tabla where CIDPARAM = $id");

          $stmt->execute();

          return $stmt->fetch();

          $stmt = null;
     }
     static public function mdlActualizarConcepto($empresa, $datos)
     {
          switch ($empresa) {
               case 'PINTURAS':
                    $tabla = "[parametrosVentas].[dbo].[CONCEPTOSPINTURAS]";
                    break;
               case 'FLEX':
                    $tabla = "[parametrosVentas].[dbo].[CONCEPTOSFLEX]";
                    break;
          }
          $stmt = ConexionsBd::conectarParametros()->prepare("UPDATE $tabla set CNOMBREAGENTE = :nombreAgente,CCENTROTRABAJO = :centroTrabajo, CCANALCOMERCIAL = :canalComercial WHERE CIDPARAM = :id");

          $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
          $stmt->bindParam(":nombreAgente", $datos["agente"], PDO::PARAM_STR);
          $stmt->bindParam(":centroTrabajo", $datos["centroTrabajo"], PDO::PARAM_STR);
          $stmt->bindParam(":canalComercial", $datos["canalComercial"], PDO::PARAM_STR);
          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
     static public function mdlEliminarConcepto($empresa, $id)
     {
          switch ($empresa) {
               case 'PINTURAS':
                    $tabla = "[parametrosVentas].[dbo].[CONCEPTOSPINTURAS]";
                    break;
               case 'FLEX':
                    $tabla = "[parametrosVentas].[dbo].[CONCEPTOSFLEX]";
                    break;
          }
          $stmt = ConexionsBd::conectarParametros()->prepare("DELETE FROM $tabla WHERE CIDPARAM = $id");

          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
     static public function mdlTotalVentasDiarias($year, $week, $day)
     {
          global $parametrosCanal;
          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $arreglo = [];
          $arreglo2 = [];
          $sWhere = " adoc.CCANCELADO  = '0' ";
          for ($i = 1; $i < 7; $i++) {
               $dia1 = date('Y-m-d', strtotime(strip_tags($year) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo, $dia1);
               $dia2 = date('d', strtotime(strip_tags($year) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, (int)$dia2);
          }

          if ($day != "") {

               $sWhere .= " and adoc.CFECHA = '" . $day . "' and YEAR(adoc.CFECHA) = '" . $year . "' ";
          } else {


               $sWhere .= " and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '" . $year . "' ";
          }


          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH ventasDiarias AS(SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
     
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
3212,
3233,
3146,
3234,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3126,
3116,
3106,
3078,
3094,
3060,
3024,
3013,
3014,
3015,
6,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3229,
3207,
3208,
3139
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
      
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
       
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
        
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
                
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        ELSE
                        dbo.canal($agenteListDekkerlab,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
       
         '1' As indicador
  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
3040,
3041,
3042,
3043,
3044,
3045,
4,
5,
3081,
3082,
6,
3046,
3047,
3048,
3049,
3050,
3051,
3052,
3053,
3054,
3055,
3056,
8,
3070,
3071,
3072,
3075,
3076,
3080
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

VentasDiariasOrdenadas As(
	SELECT
		
		Desglose,
		CAST(Dia as NVARCHAR(100)) as Day,
		canalComercial
	FROM ventasDiarias as vd WHERE canalComercial != 'PROPIAS' 
	
	)
    SELECT *,IsNull([$arreglo2[0]],0) + IsNull([$arreglo2[1]],0) + IsNull([$arreglo2[2]],0) + IsNull([$arreglo2[3]],0) + IsNull([$arreglo2[4]],0) + IsNull([$arreglo2[5]],0) as Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo2[0]],[$arreglo2[1]],[$arreglo2[2]],[$arreglo2[3]],[$arreglo2[4]],[$arreglo2[5]])) as pivotTable order by canalComercial asc");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlTotalVentasDiariasConceptos($year, $week, $day)
     {
          global $parametrosCanal;
          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $arreglo = [];
          $arreglo2 = [];
          $sWhere = " adoc.CCANCELADO  = '0' ";
          for ($i = 1; $i < 7; $i++) {
               $dia1 = date('Y-m-d', strtotime(strip_tags($year) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo, $dia1);
               $dia2 = date('d', strtotime(strip_tags($year) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, (int)$dia2);
          }
          if ($day != "") {
               $sWhere .= " and adoc.CFECHA = '" . $day . "' and YEAR(adoc.CFECHA) = '" . $year . "' ";
          } else {
               $sWhere .= " and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '" . $year . "' ";
          }

          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH ventasDiarias AS(SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
          WHEN 'DEVOLUCIÓN'
          THEN
               'devolucion'
          WHEN 'Devolución'
          THEN
               'devolucion'
          WHEN 'NOTA DE CR'
          THEN
               'credito'
          WHEN 'Nota de Cr'
          THEN
               'credito'
          WHEN 'Nota de Ca'
          THEN
               'cargo'
          WHEN 'NOTA DE CA'
          THEN
               'cargo'
          WHEN 'DOCUMENTO '
          THEN
               'documentosPrueba'
          WHEN 'Factura Pr'
          THEN
               'documentosPrueba'
          ELSE
               'facturas'
          END as Concepto,
          CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
     
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
3212,
3233,
3146,
3234,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3126,
3116,
3106,
3078,
3094,
3060,
3024,
3013,
3014,
3015,
6,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3229,
3207,
3208,
3139
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
   WHEN 'DEVOLUCIÓN'
   THEN
       'devolucion'
   WHEN 'Devolución'
   THEN
       'devolucion'
    WHEN 'NOTA DE CR'
   THEN
       'credito'
    WHEN 'Nota de Cr'
   THEN
       'credito'
    WHEN 'Nota de Ca'
   THEN
       'cargo'
  WHEN 'NOTA DE CA'
   THEN
       'cargo'
    WHEN 'DOCUMENTO '
   THEN
       'documentosPrueba'
    WHEN 'Factura Pr'
   THEN
       'documentosPrueba'
   ELSE
       'facturas'
   END as Concepto,
   CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
      
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
   WHEN 'DEVOLUCIÓN'
   THEN
       'devolucion'
   WHEN 'Devolución'
   THEN
       'devolucion'
    WHEN 'NOTA DE CR'
   THEN
       'credito'
    WHEN 'Nota de Cr'
   THEN
       'credito'
    WHEN 'Nota de Ca'
   THEN
       'cargo'
  WHEN 'NOTA DE CA'
   THEN
       'cargo'
    WHEN 'DOCUMENTO '
   THEN
       'documentosPrueba'
    WHEN 'Factura Pr'
   THEN
       'documentosPrueba'
   ELSE
       'facturas'
   END as Concepto,
   CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
        
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
   WHEN 'DEVOLUCIÓN'
   THEN
       'devolucion'
   WHEN 'Devolución'
   THEN
       'devolucion'
    WHEN 'NOTA DE CR'
   THEN
       'credito'
    WHEN 'Nota de Cr'
   THEN
       'credito'
    WHEN 'Nota de Ca'
   THEN
       'cargo'
  WHEN 'NOTA DE CA'
   THEN
       'cargo'
    WHEN 'DOCUMENTO '
   THEN
       'documentosPrueba'
    WHEN 'Factura Pr'
   THEN
       'documentosPrueba'
   ELSE
       'facturas'
   END as Concepto,
              
   CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        ELSE
                        dbo.canal($agenteListDekkerlab,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
       
         '1' As indicador
  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
3040,
3041,
3042,
3043,
3044,
3045,
4,
5,
3081,
3082,
6,
3046,
3047,
3048,
3049,
3050,
3051,
3052,
3053,
3054,
3055,
3056,
8,
3070,
3071,
3072,
3075,
3076,
3080
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

VentasDiariasOrdenadas As(
	SELECT
		
		Desglose,
		CAST(Dia as NVARCHAR(100)) as Day,
		Concepto
	FROM ventasDiarias as vd WHERE canalComercial != 'PROPIAS' 
	
	)
    SELECT *,IsNull([$arreglo2[0]],0) + IsNull([$arreglo2[1]],0) + IsNull([$arreglo2[2]],0) + IsNull([$arreglo2[3]],0) + IsNull([$arreglo2[4]],0) + IsNull([$arreglo2[5]],0) as Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo2[0]],[$arreglo2[1]],[$arreglo2[2]],[$arreglo2[3]],[$arreglo2[4]],[$arreglo2[5]])) as pivotTable order by Concepto asc");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlTotalVentasDiariasDesglose($year, $week, $day)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $arreglo = [];
          $arreglo2 = [];
          $sWhere = " adoc.CCANCELADO  = '0' ";
          for ($i = 1; $i < 7; $i++) {
               $dia1 = date('Y-m-d', strtotime(strip_tags($year) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo, $dia1);
               $dia2 = date('d', strtotime(strip_tags($year) . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, (int)$dia2);
          }
          if ($day != "") {
               $sWhere .= " and adoc.CFECHA = '" . $day . "' and YEAR(adoc.CFECHA) = '" . $year . "' ";
          } else {

               $sWhere .= " and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '" . $year . "' ";
          }


          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH ventasDiarias AS(SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.centro($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                ELSE
                dbo.centro($agenteListPinturas,'PINTURAS')
            END
     
         END As centroTrabajo,
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
     
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
3212,
3233,
3146,
3234,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3126,
3116,
3106,
3078,
3094,
3060,
3024,
3013,
3014,
3015,
6,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3229,
3207,
3208,
3139
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.centro($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                ELSE
                dbo.centro($agenteListPinturas,'PINTURAS')
            END
     
         END As centroTrabajo,
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
      
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.centro($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                ELSE
                dbo.centro($agenteListPinturas,'PINTURAS')
            END
     
         END As centroTrabajo,
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
        
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
        CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.centro($agenteListDekkerlab,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                ELSE
                dbo.centro($agenteListDekkerlab,'PINTURAS')
            END
     
         END As centroTrabajo,
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListDekkerlab,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                ELSE
                dbo.canal($agenteListDekkerlab,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
       
         '1' As indicador
  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
3040,
3041,
3042,
3043,
3044,
3045,
4,
5,
3081,
3082,
6,
3046,
3047,
3048,
3049,
3050,
3051,
3052,
3053,
3054,
3055,
3056,
8,
3070,
3071,
3072,
3075,
3076,
3080
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

VentasDiariasOrdenadas As(
	SELECT
		
		Desglose,
		CAST(Dia as NVARCHAR(100)) as Day,
		Agente
	FROM ventasDiarias as vd WHERE canalComercial = 'TIENDAS')
SELECT *,IsNull([$arreglo2[0]],0) + IsNull([$arreglo2[1]],0) + IsNull([$arreglo2[2]],0) + IsNull([$arreglo2[3]],0) + IsNull([$arreglo2[4]],0) + IsNull([$arreglo2[5]],0) as Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo2[0]],[$arreglo2[1]],[$arreglo2[2]],[$arreglo2[3]],[$arreglo2[4]],[$arreglo2[5]])) as pivotTable order by Agente asc");


          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlVentasYearToDay($fechaInicial, $fechaFinal, $año1, $año2)
     {
          global $agenteListDekkerlab;
          global $agenteListPinturas;
          $fecha_actual = date("Y-m-d");


          if ($fechaInicial == "" && $fechaFinal == "") {
               $hoy = date("Y-m-d", strtotime($fecha_actual . "- 1 days"));
               $anterior = date("Y-m-d", strtotime($fecha_actual . "- 1 year -1 days"));
          } else {
               $hoy = $fechaFinal;
               $anterior = $fechaInicial;
          }


          $sWhere = " adoc.CCANCELADO  = '0' and adoc.CFECHA >= '" . $año1 . "-01-01' and adoc.CFECHA <= '" . $anterior . "' and YEAR(adoc.CFECHA) = '" . $año1 . "'";
          $sWhere2 = " adoc.CCANCELADO  = '0' and adoc.CFECHA >= '" . $año2 . "-01-01' and adoc.CFECHA <= '" . $hoy . "' and YEAR(adoc.CFECHA) = '" . $año2 . "'";
          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH ventasData AS(SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteListPinturas as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.centro($agenteListPinturas,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
    5,
    3001,
    3002,
    3003,
    3023,
    3030,
    3076,
    3096,
    3108,
    3115,
    3128,
    3148,
    3172,
    3173,
    3174,
    3175,
    3176,
    3177,
    3178,
    3179,
    3180,
    3181,
    3212,
    3233,
    3146,
    3234,
    3182,
    3183,
    3184,
    3185,
    3186,
    3187,
    3188,
    3189,
    3190,
    3191,
    3126,
    3116,
    3106,
    3078,
    3094,
    3060,
    3024,
    3013,
    3014,
    3015,
    6,
    8,
    3016,
    3125,
    3194,
    3195,
    3196,
    3215,
    3229,
    3207,
    3208,
    3139
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteListPinturas as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.centro($agenteListPinturas,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
    
         '1' As indicador
    FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
    5,
    3001,
    3048,
    3061,
    3052,
    3012,
    3004,
    6,
    8,
    3007,
    3017,
    3053,
    3056,
    14
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteListPinturas as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.centro($agenteListPinturas,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
    3105,
    3111
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteListDekkerlab as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        ELSE
                        dbo.centro($agenteListDekkerlab,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        ELSE
                        dbo.canal($agenteListDekkerlab,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
3040,
3041,
3042,
3043,
3044,
3045,
4,
5,
3081,
3082,
6,
3046,
3047,
3048,
3049,
3050,
3051,
3052,
3053,
3054,
3055,
3056,
8,
3070,
3071,
3072,
3075,
3076,
3080
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteListPinturas as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.centro($agenteListPinturas,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
    5,
    3001,
    3002,
    3003,
    3023,
    3030,
    3076,
    3096,
    3108,
    3115,
    3128,
    3148,
    3172,
    3173,
    3174,
    3175,
    3176,
    3177,
    3178,
    3179,
    3180,
    3181,
    3212,
    3233,
    3146,
    3234,
    3182,
    3183,
    3184,
    3185,
    3186,
    3187,
    3188,
    3189,
    3190,
    3191,
    3126,
    3116,
    3106,
    3078,
    3094,
    3060,
    3024,
    3013,
    3014,
    3015,
    6,
    8,
    3016,
    3125,
    3194,
    3195,
    3196,
    3215,
    3229,
    3207,
    3208,
    3139
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteListPinturas as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.centro($agenteListPinturas,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
    5,
    3001,
    3048,
    3061,
    3052,
    3012,
    3004,
    6,
    8,
    3007,
    3017,
    3053,
    3056,
    14
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteListPinturas as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.centro($agenteListPinturas,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2 and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
    3105,
    3111
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteListDekkerlab as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        ELSE
                        dbo.centro($agenteListDekkerlab,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        ELSE
                        dbo.canal($agenteListDekkerlab,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2 and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
3040,
3041,
3042,
3043,
3044,
3045,
4,
5,
3081,
3082,
6,
3046,
3047,
3048,
3049,
3050,
3051,
3052,
3053,
3054,
3055,
3056,
8,
3070,
3071,
3072,
3075,
3076,
3080
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

ventasOrdenadas As(
    SELECT
        canalComercial,
        Total,
        Año
    FROM ventasData WHERE  canalComercial NOT IN('PROPIAS') 
    
    )
    SELECT * FROM ventasOrdenadas PIVOT(SUM(Total) FOR Año in([$año1],[$año2])) as pivotTable  order by canalComercial asc ");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlVentasYearToWeek($search)
     {
          global $agenteListPinturas;
          global $agenteListDekkerlab;
          $arreglo = array();
          $arreglo2 = array();
          $arreglo3 = array();
          $arreglo4 = array();
          if ($search["week"] < 10) {
               $week = "0" . $search["week"];
          } else {
               $week = strval($search["week"]);
          }

          $year = $search["año1"];
          $year2 = $search["año2"];
          for ($day = 1; $day < 7; $day++) {
               $diaElegido = date('Y-m-d', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
               array_push($arreglo, $diaElegido);
               $dia = date('d', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
               $mes = date('m', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
               $año = date('Y', strtotime($year . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
               $fecha = $año . "-" . (int)$mes . "-" . (int)$dia;
               array_push($arreglo3, $fecha);
          }

          for ($i = 1; $i < 7; $i++) {
               $diaElegido2 = date('Y-m-d', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, $diaElegido2);
               $dia2 = date('d', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               $mes2 = date('m', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               $año2 = date('Y', strtotime($year2 . "W" . str_pad($week, 2, '0', STR_PAD_LEFT) . $i));
               $fecha2 = $año2 . "-" . (int)$mes2 . "-" . (int)$dia2;
               array_push($arreglo4, $fecha2);
          }


          $sWhere = " adoc.CCANCELADO  = '0' and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2022'";
          $sWhere2 = " adoc.CCANCELADO  = '0' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '2023'";
          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH ventasData AS(SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
3212,
3233,
3146,
3234,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3126,
3116,
3106,
3078,
3094,
3060,
3024,
3013,
3014,
3015,
6,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3229,
3207,
3208,
3139
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
3040,
3041,
3042,
3043,
3044,
3045,
4,
5,
3081,
3082,
6,
3046,
3047,
3048,
3049,
3050,
3051,
3052,
3053,
3054,
3055,
3056,
8,
3070,
3071,
3072,
3075,
3076,
3080
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
3212,
3233,
3146,
3234,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3126,
3116,
3106,
3078,
3094,
3060,
3024,
3013,
3014,
3015,
6,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3229,
3207,
3208,
3139
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2 and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
      
         '1' As indicador
  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2 and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
3040,
3041,
3042,
3043,
3044,
3045,
4,
5,
3081,
3082,
6,
3046,
3047,
3048,
3049,
3050,
3051,
3052,
3053,
3054,
3055,
3056,
8,
3070,
3071,
3072,
3075,
3076,
3080
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

ventasOrdenadas As(
    SELECT
        canalComercial,
        Total,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasData WHERE canalComercial NOT IN('PROPIAS')  
    
    )
    SELECT *  FROM ventasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo3[0]],[$arreglo4[0]],[$arreglo3[1]],[$arreglo4[1]],[$arreglo3[2]],[$arreglo4[2]],[$arreglo3[3]],[$arreglo4[3]],[$arreglo3[4]],[$arreglo4[4]],[$arreglo3[5]],[$arreglo4[5]])) as pivotTable order by canalComercial asc");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlVentasYearToMonth($year1, $year2)
     {
          global $agenteListPinturas;
          global $agenteListDekkerlab;


          $sWhere = " adoc.CCANCELADO  = '0' and YEAR(adoc.CFECHA) = '" . $year1 . "'";
          $sWhere2 = " adoc.CCANCELADO  = '0'  and YEAR(adoc.CFECHA) = '" . $year2 . "'";
          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH ventasData AS(SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
    5,
    3001,
    3002,
    3003,
    3023,
    3030,
    3076,
    3096,
    3108,
    3115,
    3128,
    3148,
    3172,
    3173,
    3174,
    3175,
    3176,
    3177,
    3178,
    3179,
    3180,
    3181,
    3212,
    3233,
    3146,
    3234,
    3182,
    3183,
    3184,
    3185,
    3186,
    3187,
    3188,
    3189,
    3190,
    3191,
    3126,
    3116,
    3106,
    3078,
    3094,
    3060,
    3024,
    3013,
    3014,
    3015,
    6,
    8,
    3016,
    3125,
    3194,
    3195,
    3196,
    3215,
    3229,
    3207,
    3208,
    3139
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
    5,
    3001,
    3048,
    3061,
    3052,
    3012,
    3004,
    6,
    8,
    3007,
    3017,
    3053,
    3056,
    14
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
    
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
    3105,
    3111
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
3040,
3041,
3042,
3043,
3044,
3045,
4,
5,
3081,
3082,
6,
3046,
3047,
3048,
3049,
3050,
3051,
3052,
3053,
3054,
3055,
3056,
8,
3070,
3071,
3072,
3075,
3076,
3080
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
    5,
    3001,
    3002,
    3003,
    3023,
    3030,
    3076,
    3096,
    3108,
    3115,
    3128,
    3148,
    3172,
    3173,
    3174,
    3175,
    3176,
    3177,
    3178,
    3179,
    3180,
    3181,
    3212,
    3233,
    3146,
    3234,
    3182,
    3183,
    3184,
    3185,
    3186,
    3187,
    3188,
    3189,
    3190,
    3191,
    3126,
    3116,
    3106,
    3078,
    3094,
    3060,
    3024,
    3013,
    3014,
    3015,
    6,
    8,
    3016,
    3125,
    3194,
    3195,
    3196,
    3215,
    3229,
    3207,
    3208,
    3139
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
    
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
    5,
    3001,
    3048,
    3061,
    3052,
    3012,
    3004,
    6,
    8,
    3007,
    3017,
    3053,
    3056,
    14
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
    
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2 and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
    3105,
    3111
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         '1' As indicador
    FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere2 and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
3040,
3041,
3042,
3043,
3044,
3045,
4,
5,
3081,
3082,
6,
3046,
3047,
3048,
3049,
3050,
3051,
3052,
3053,
3054,
3055,
3056,
8,
3070,
3071,
3072,
3075,
3076,
3080
    )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

ventasOrdenadas As(
    SELECT
        canalComercial,
        Total,
        CAST(Mes as NVARCHAR(100)) as Mont
    FROM ventasData WHERE canalComercial NOT IN('PROPIAS')  
    
    )
    SELECT *,((NULLIF(ISNULL((IsNull([$year2-1],0)+IsNull([$year2-2],0)+IsNull([$year2-3],0)+IsNull([$year2-4],0)+IsNull([$year2-5],0)+IsNull([$year2-6],0)+IsNull([$year2-7],0)+IsNull([$year2-8],0)+IsNull([$year2-9],0)+IsNull([$year2-10],0)+IsNull([$year2-11],0)+IsNull([$year2-12],0)),0),0)/NULLIF(ISNULL((IsNull([$year1-1],0)+IsNull([$year1-2],0)+IsNull([$year1-3],0)+IsNull([$year1-4],0)+IsNull([$year1-5],0)+IsNull([$year1-6],0)+IsNull([$year1-7],0)+IsNull([$year1-8],0)+IsNull([$year1-9],0)+IsNull([$year1-10],0)+IsNull([$year1-11],0)+IsNull([$year1-12],0)),0),0))-100/100)*100 AS Crecimiento FROM ventasOrdenadas PIVOT(SUM(Total) FOR Mont in([$year1-1],[$year2-1],[$year1-2],[$year2-2],[$year1-3],[$year2-3],[$year1-4],[$year2-4],[$year1-5],[$year2-5],[$year1-6],[$year2-6],[$year1-7],[$year2-7],[$year1-8],[$year2-8],[$year1-9],[$year2-9],[$year1-10],[$year2-10],[$year1-11],[$year2-11],[$year1-12],[$year2-12])) as pivotTable order by canalComercial asc ");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlListarUsuarios($tabla, $item, $valor)
     {

          if ($item != null) {

               $stmt = ConexionsBd::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

               $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

               $stmt->execute();

               return $stmt->fetch();
          } else {

               $stmt = ConexionsBd::conectar()->prepare("SELECT * FROM $tabla");

               $stmt->execute();

               return $stmt->fetchAll();
          }
     }
     /*=============================================
	ACTIVAR USUARIO
	=============================================*/

     static public function mdlActualizarEstadoUsuario($tabla, $item, $valor, $item2, $valor2)
     {

          $stmt = ConexionsBd::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE $item2 = :$item2");

          $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
          $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
     /*==============================
    CREACION DE USUARIO
    ================================ */
     static public function mdlCreacionUsuarioAdmin($tabla, $datos)
     {
          $email = $datos["email"];
          $consulta = ConexionsBd::conectar()->prepare("SELECT * FROM $tabla WHERE email = '" . $email . "' ");
          $consulta->execute();
          $existe = $consulta->rowCount();

          if ($existe == 0) {

               $stmt = ConexionsBd::conectar()->prepare("INSERT INTO $tabla(nombre, email, foto,password,grupo,perfil) VALUES(:nombre, :email, :foto, :password, :grupo, :perfil)");

               $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
               $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
               $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
               $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
               $stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
               $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);

               if ($stmt->execute()) {

                    return "ok";
               } else {

                    return "error";
               }
          } else {
               return "existe";
          }
     }
     /*==============================
    ACTUALIZACION DE DATOS DE USUARIO
    ================================ */
     static public function mdlActualizacionUsuarioAdmin($tabla, $datos)
     {

          $stmt = ConexionsBd::conectar()->prepare("UPDATE $tabla set nombre = :nombre,grupo = :grupo, perfil = :perfil WHERE id = :idUsuario");

          $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
          $stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
          $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
          $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

          if ($stmt->execute()) {
               return "ok";
          } else {
               return "error";
          }
     }
     /*==============================
    ELIMINACION DE USUARIO
    ================================ */
     static public function mdlEliminarUsuarioAdmin($tabla, $item, $valor)
     {

          $stmt = ConexionsBd::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");

          $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
     /*==============================
    ACTUALIZACION PASSWORD
    ================================ */
     static public function mdlActualizacionPasswordUsuarioAdmin($tabla, $datos)
     {
          $password = $datos["password"];
          $id = $datos["idUsuario"];
          $consulta = ConexionsBd::conectar()->prepare("SELECT * FROM $tabla WHERE password = '" . $password . "' and id = '" . $id . "' ");
          $consulta->execute();
          $existe = $consulta->rowCount();

          if ($existe == 0) {
               $stmt = ConexionsBd::conectar()->prepare("UPDATE $tabla set password = '" . $password . "' WHERE id = '" . $id . "'");
               if ($stmt->execute()) {

                    return "ok";
               } else {

                    return "error";
               }
          } else {
               return "exist";
          }
     }

     /***MODULOS NUEVOS */
     /***
      * INDICADORES
      */
     static public function mdlDetalleIndicadores($datos)
     {
          if ($datos["centroDesglose"] === "") {
               $sWhere = "";
          } else {
               $sWhere = "and CANALORIGEN = '" . $datos["centroDesglose"] . "'";
          }
          $stmt = ConexionsBd::conectarDekkerlab()->prepare("WITH indicadores As (SELECT amov.CIDALMACEN,
           adoc.CSERIEDOCUMENTO,
           adoc.CFOLIO,
           amov.CIDDOCUMENTO,
           SUM(amov.CTOTAL) as TOTAL
           ,SUM(amov.CCOSTOESPECIFICO) AS 'COSTO'
           ,'SALIDAS' as 'ESTATUS'
           ,MONTH(amov.CFECHA) As Mes
           ,CASE 
                WHEN amov.CIDALMACEN = 1 OR amov.CIDALMACEN = 3
               THEN
               'GENERAL'
               WHEN amov.CIDALMACEN = 4 OR amov.CIDALMACEN = 5
               THEN
               '7 TIENDA CAPU'
               WHEN amov.CIDALMACEN = 6 OR amov.CIDALMACEN = 7
               THEN
               '3 TIENDA REFORMA'
                WHEN amov.CIDALMACEN = 8 OR amov.CIDALMACEN = 9
               THEN
               '1 TIENDA SAN MANUEL'
                WHEN amov.CIDALMACEN = 10 OR amov.CIDALMACEN = 11
               THEN
               '6 TIENDA SANTIAGO'
                WHEN amov.CIDALMACEN = 12 OR amov.CIDALMACEN = 13
               THEN
               '9 TIENDA TORRES'
               WHEN amov.CIDALMACEN = 17 OR amov.CIDALMACEN = 18
               THEN
               '10 TIENDA ACATEPEC'
               ELSE
               'OTRO'
               END as 'CANAL',
               CASE 
             WHEN amov2.CIDALMACEN = 1 OR amov2.CIDALMACEN = 3
           THEN
           '0 GENERAL'
           WHEN amov2.CIDALMACEN = 4 OR amov2.CIDALMACEN = 5
           THEN
           '7 TIENDA CAPU'
           WHEN amov2.CIDALMACEN = 6 OR amov2.CIDALMACEN = 7
           THEN
           '3 TIENDA REFORMA'
            WHEN amov2.CIDALMACEN = 8 OR amov2.CIDALMACEN = 9
           THEN
           '1 TIENDA SAN MANUEL'
            WHEN amov2.CIDALMACEN = 10 OR amov2.CIDALMACEN = 11
           THEN
           '6 TIENDA SANTIAGO'
            WHEN amov2.CIDALMACEN = 12 OR amov2.CIDALMACEN = 13
           THEN
           '9 TIENDA TORRES'
           WHEN amov2.CIDALMACEN = 17 OR amov2.CIDALMACEN = 18
          THEN
          '10 TIENDA ACATEPEC'
           ELSE
           'OTRO'
           END as 'CANALORIGEN'
         FROM [adDEKKERLAB].[dbo].[admMovimientos] as amov LEFT OUTER JOIN  [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adDEKKERLAB].[dbo].[admMovimientos] as amov2 ON amov2.CIDMOVTOOWNER = amov.CIDMOVIMIENTO  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admProductos] AS aprod ON aprod.CIDPRODUCTO = amov.CIDPRODUCTO WHERE  adoc.CCANCELADO  = '0' and YEAR(adoc.CFECHA) = '" . $datos["año"] . "' and amov.CIDDOCUMENTODE IN (34) and adoc.CIDCONCEPTODOCUMENTO IN(36,
           3031,
           3032,
           3033,
           3034,
           3035,
           3038,
           3066,
           3067,
           3068)  GROUP BY amov.CIDALMACEN,amov2.CIDALMACEN,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,amov.CIDDOCUMENTO,amov.CFECHA,aprod.CIDVALORCLASIFICACION1,
           aprod.CNOMBREPRODUCTO,
           aprod.CCODIGOPRODUCTO,
           amov.CUNIDADES
       UNION ALL
       SELECT amov2.CIDALMACEN
              ,adoc.CSERIEDOCUMENTO
              ,adoc.CFOLIO
              ,amov2.CIDDOCUMENTO
              ,SUM(amov2.CTOTAL) as TOTAL
              ,SUM(amov.CCOSTOESPECIFICO) AS 'COSTO'
              ,'ENTRADAS' as 'ESTATUS'
              ,MONTH(amov2.CFECHA) As Mes
               ,CASE 
                WHEN amov2.CIDALMACEN = 1 OR amov2.CIDALMACEN = 3
               THEN
               'GENERAL'
               WHEN amov2.CIDALMACEN = 4 OR amov2.CIDALMACEN = 5
               THEN
               '7 TIENDA CAPU'
               WHEN amov2.CIDALMACEN = 6 OR amov2.CIDALMACEN = 7
               THEN
               '3 TIENDA REFORMA'
                WHEN amov2.CIDALMACEN = 8 OR amov2.CIDALMACEN = 9
               THEN
               '1 TIENDA SAN MANUEL'
                WHEN amov2.CIDALMACEN = 10 OR amov2.CIDALMACEN = 11
               THEN
               '6 TIENDA SANTIAGO'
                WHEN amov2.CIDALMACEN = 12 OR amov2.CIDALMACEN = 13
               THEN
               '9 TIENDA TORRES'
               WHEN amov2.CIDALMACEN = 17 OR amov2.CIDALMACEN = 18
               THEN
               '10 TIENDA ACATEPEC'
               ELSE
               'OTRO'
               END as 'CANAL',
               CASE 
             WHEN amov.CIDALMACEN = 1 OR amov.CIDALMACEN = 3
           THEN
           '0 GENERAL'
           WHEN amov.CIDALMACEN = 4 OR amov.CIDALMACEN = 5
           THEN
           '7 TIENDA CAPU'
           WHEN amov.CIDALMACEN = 6 OR amov.CIDALMACEN = 7
           THEN
           '3 TIENDA REFORMA'
            WHEN amov.CIDALMACEN = 8 OR amov.CIDALMACEN = 9
           THEN
           '1 TIENDA SAN MANUEL'
            WHEN amov.CIDALMACEN = 10 OR amov.CIDALMACEN = 11
           THEN
           '6 TIENDA SANTIAGO'
            WHEN amov.CIDALMACEN = 12 OR amov.CIDALMACEN = 13
           THEN
           '9 TIENDA TORRES'
           WHEN amov.CIDALMACEN = 17 OR amov.CIDALMACEN = 18
           THEN
           '10 TIENDA ACATEPEC'
           ELSE
           'OTRO'
           END as 'CANALORIGEN'
         FROM [adDEKKERLAB].[dbo].[admMovimientos] as amov LEFT OUTER JOIN  [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adDEKKERLAB].[dbo].[admMovimientos] as amov2 ON amov2.CIDMOVTOOWNER = amov.CIDMOVIMIENTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admProductos] AS aprod ON aprod.CIDPRODUCTO = amov2.CIDPRODUCTO WHERE  adoc.CCANCELADO  = '0' and YEAR(adoc.CFECHA) = '" . $datos["año"] . "'  and amov.CIDDOCUMENTODE IN (34) and adoc.CIDCONCEPTODOCUMENTO IN(36,
         3031,
         3032,
         3033,
         3034,
         3035,
         3038,
         3066,
         3067,
         3068)  GROUP BY amov.CIDALMACEN,amov2.CIDALMACEN,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,amov2.CIDDOCUMENTO,amov2.CFECHA,aprod.CIDVALORCLASIFICACION1,
         aprod.CNOMBREPRODUCTO,
         aprod.CCODIGOPRODUCTO,
         amov2.CUNIDADES),
       indicadoresData As(
           SELECT
               CANAL,
               CANALORIGEN,
               ESTATUS,
               Mes,
               COSTO,
               CASE ESTATUS 
               WHEN 'ENTRADAS'
               THEN
               COSTO
               ELSE
               0
               END  as 'ENTRADA',
               CASE ESTATUS 
               WHEN 'SALIDAS'
               THEN
               COSTO
               ELSE
               0
               END  as 'SALIDA'
       
           FROM indicadores WHERE CANAL != 'GENERAL'
           )
       
       SELECT CANAL,SUM(ENTRADA) as 'ENTRADAS',SUM(SALIDA) as 'SALIDAS',SUM(ENTRADA)-SUM(SALIDA) as 'TOTAL'
               
               FROM indicadoresData WHERE Mes = '" . $datos["mes"] . "' and CANAL = '" . $datos["centro"] . "' $sWhere GROUP BY CANAL");

          $stmt->execute();

          return $stmt->fetch();

          $stmt->close();

          $stmt = null;
     }
     static public function mdlDetalleEntradasSalidas($datos)
     {
          if ($datos["centroDesglose"] === "") {
               $sWhere = "";
          } else {
               $sWhere = "and CANALORIGEN = '" . $datos["centroDesglose"] . "'";
          }
          $stmt = ConexionsBd::conectarDekkerlab()->prepare("WITH indicadores As (SELECT 
           aalm.CNOMBREALMACEN as 'ALMORIGEN',
           aalm2.CNOMBREALMACEN  as 'ALMDESTINO',
           adoc.CSERIEDOCUMENTO,
           adoc.CFOLIO,
           adoc.CFECHA,
           adoc.CREFERENCIA,
           amov.CIDDOCUMENTO,
           -SUM(amov.CCOSTOESPECIFICO) AS 'TOTAL'
           ,'SALIDAS' as 'ESTATUS'
           ,MONTH(amov.CFECHA) As Mes
           ,CASE 
             WHEN amov.CIDALMACEN = 1 OR amov.CIDALMACEN = 3
           THEN
           'GENERAL'
           WHEN amov.CIDALMACEN = 4 OR amov.CIDALMACEN = 5
           THEN
           '7 TIENDA CAPU'
           WHEN amov.CIDALMACEN = 6 OR amov.CIDALMACEN = 7
           THEN
           '3 TIENDA REFORMA'
            WHEN amov.CIDALMACEN = 8 OR amov.CIDALMACEN = 9
           THEN
           '1 TIENDA SAN MANUEL'
            WHEN amov.CIDALMACEN = 10 OR amov.CIDALMACEN = 11
           THEN
           '6 TIENDA SANTIAGO'
            WHEN amov.CIDALMACEN = 12 OR amov.CIDALMACEN = 13
           THEN
           '9 TIENDA TORRES'
           WHEN amov.CIDALMACEN = 17 OR amov.CIDALMACEN = 18
          THEN
          '10 TIENDA ACATEPEC'
           ELSE
           'OTRO'
           END as 'CANAL',
           CASE 
             WHEN amov2.CIDALMACEN = 1 OR amov2.CIDALMACEN = 3
           THEN
           '0 GENERAL'
           WHEN amov2.CIDALMACEN = 4 OR amov2.CIDALMACEN = 5
           THEN
           '7 TIENDA CAPU'
           WHEN amov2.CIDALMACEN = 6 OR amov2.CIDALMACEN = 7
           THEN
           '3 TIENDA REFORMA'
            WHEN amov2.CIDALMACEN = 8 OR amov2.CIDALMACEN = 9
           THEN
           '1 TIENDA SAN MANUEL'
            WHEN amov2.CIDALMACEN = 10 OR amov2.CIDALMACEN = 11
           THEN
           '6 TIENDA SANTIAGO'
            WHEN amov2.CIDALMACEN = 12 OR amov2.CIDALMACEN = 13
           THEN
           '9 TIENDA TORRES'
           WHEN amov2.CIDALMACEN = 17 OR amov2.CIDALMACEN = 18
          THEN
          '10 TIENDA ACATEPEC'
           ELSE
           'OTRO'
           END as 'CANALORIGEN'
         FROM [adDEKKERLAB].[dbo].[admMovimientos] as amov LEFT OUTER JOIN  [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adDEKKERLAB].[dbo].[admMovimientos] as amov2 ON amov2.CIDMOVTOOWNER = amov.CIDMOVIMIENTO INNER JOIN  [adDEKKERLAB].[dbo].[admAlmacenes] as aalm ON amov.CIDALMACEN = aalm.CIDALMACEN INNER JOIN  [adDEKKERLAB].[dbo].[admAlmacenes] as aalm2 ON amov2.CIDALMACEN = aalm2.CIDALMACEN  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admProductos] AS aprod ON aprod.CIDPRODUCTO = amov.CIDPRODUCTO WHERE  adoc.CCANCELADO  = '0' and YEAR(adoc.CFECHA) = '" . $datos["año"] . "' and amov.CIDDOCUMENTODE IN (34) and adoc.CIDCONCEPTODOCUMENTO IN(36,
                 3031,
                 3032,
                 3033,
                 3034,
                 3035,
                 3038,
                 3066,
                 3067,
                 3068)  GROUP BY amov.CIDALMACEN,amov2.CIDALMACEN,aalm.CNOMBREALMACEN,aalm2.CNOMBREALMACEN,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CFECHA,adoc.CREFERENCIA,amov.CIDDOCUMENTO,amov.CFECHA, aprod.CIDVALORCLASIFICACION1,
                 aprod.CNOMBREPRODUCTO,
                 aprod.CCODIGOPRODUCTO,
                 amov.CUNIDADES
       UNION ALL
       SELECT 
               aalm.CNOMBREALMACEN as 'ALMORIGEN',
               aalm2.CNOMBREALMACEN  as 'ALMDESTINO'
              ,adoc.CSERIEDOCUMENTO
              ,adoc.CFOLIO
               ,adoc.CFECHA
               ,adoc.CREFERENCIA
              ,amov.CIDDOCUMENTO
              ,SUM(amov.CCOSTOESPECIFICO) AS 'TOTAL'
              ,'ENTRADAS' as 'ESTATUS'
              ,MONTH(amov2.CFECHA) As Mes
              ,CASE 
                WHEN amov2.CIDALMACEN = 1 OR amov2.CIDALMACEN = 3
               THEN
               'GENERAL'
               WHEN amov2.CIDALMACEN = 4 OR amov2.CIDALMACEN = 5
               THEN
               '7 TIENDA CAPU'
               WHEN amov2.CIDALMACEN = 6 OR amov2.CIDALMACEN = 7
               THEN
               '3 TIENDA REFORMA'
                WHEN amov2.CIDALMACEN = 8 OR amov2.CIDALMACEN = 9
               THEN
               '1 TIENDA SAN MANUEL'
                WHEN amov2.CIDALMACEN = 10 OR amov2.CIDALMACEN = 11
               THEN
               '6 TIENDA SANTIAGO'
                WHEN amov2.CIDALMACEN = 12 OR amov2.CIDALMACEN = 13
               THEN
               '9 TIENDA TORRES'
               WHEN amov2.CIDALMACEN = 17 OR amov2.CIDALMACEN = 18
               THEN
               '10 TIENDA ACATEPEC'
               ELSE
               'OTRO'
               END as 'CANAL',
               CASE 
             WHEN amov.CIDALMACEN = 1 OR amov.CIDALMACEN = 3
           THEN
           '0 GENERAL'
           WHEN amov.CIDALMACEN = 4 OR amov.CIDALMACEN = 5
           THEN
           '7 TIENDA CAPU'
           WHEN amov.CIDALMACEN = 6 OR amov.CIDALMACEN = 7
           THEN
           '3 TIENDA REFORMA'
            WHEN amov.CIDALMACEN = 8 OR amov.CIDALMACEN = 9
           THEN
           '1 TIENDA SAN MANUEL'
            WHEN amov.CIDALMACEN = 10 OR amov.CIDALMACEN = 11
           THEN
           '6 TIENDA SANTIAGO'
            WHEN amov.CIDALMACEN = 12 OR amov.CIDALMACEN = 13
           THEN
           '9 TIENDA TORRES'
           WHEN amov.CIDALMACEN = 17 OR amov.CIDALMACEN = 18
           THEN
           '10 TIENDA ACATEPEC'
           ELSE
           'OTRO'
           END as 'CANALORIGEN'
         FROM [adDEKKERLAB].[dbo].[admMovimientos] as amov LEFT OUTER JOIN  [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adDEKKERLAB].[dbo].[admMovimientos] as amov2 ON amov2.CIDMOVTOOWNER = amov.CIDMOVIMIENTO INNER JOIN  [adDEKKERLAB].[dbo].[admAlmacenes] as aalm ON amov.CIDALMACEN = aalm.CIDALMACEN INNER JOIN  [adDEKKERLAB].[dbo].[admAlmacenes] as aalm2 ON amov2.CIDALMACEN = aalm2.CIDALMACEN LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admProductos] AS aprod ON aprod.CIDPRODUCTO = amov2.CIDPRODUCTO WHERE  adoc.CCANCELADO  = '0' and YEAR(adoc.CFECHA) = '" . $datos["año"] . "'  and amov.CIDDOCUMENTODE IN (34) and adoc.CIDCONCEPTODOCUMENTO IN(36,
                 3031,
                 3032,
                 3033,
                 3034,
                 3035,
                 3038,
                 3066,
                 3067,
                 3068)  GROUP BY amov.CIDALMACEN,amov2.CIDALMACEN,aalm.CNOMBREALMACEN,aalm2.CNOMBREALMACEN,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CFECHA,adoc.CREFERENCIA,amov.CIDDOCUMENTO,amov2.CFECHA, aprod.CIDVALORCLASIFICACION1,
                 aprod.CNOMBREPRODUCTO,
                 aprod.CCODIGOPRODUCTO,
                 amov2.CUNIDADES),
       indicadoresData As(
           SELECT
             *
           FROM indicadores 
           )
       
       SELECT CSERIEDOCUMENTO,CFOLIO,CIDDOCUMENTO,CFECHA,CREFERENCIA,ALMORIGEN,ALMDESTINO,SUM(TOTAL) AS 'TOTAL',ESTATUS,CANAL FROM indicadoresData WHERE Mes = '" . $datos["mes"] . "' and CANAL = '" . $datos["centro"] . "' and ESTATUS = '" . $datos["tipo"] . "' $sWhere GROUP BY CSERIEDOCUMENTO,CFOLIO,CIDDOCUMENTO,CFECHA,CREFERENCIA,ALMORIGEN,ALMDESTINO,ESTATUS,CANAL ORDER BY CSERIEDOCUMENTO,CFOLIO ASC");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt->close();

          $stmt = null;
     }
     static public function mdlDetalleDocumentoIndicadores($datos)
     {

          $stmt = ConexionsBd::conectarDekkerlab()->prepare("SELECT 
                amov.CIDMOVIMIENTO
               ,amov.CNUMEROMOVIMIENTO
               ,amov.CIDPRODUCTO
               ,aprod.CCODIGOPRODUCTO
               ,aprod.CNOMBREPRODUCTO
               ,amov.CUNIDADES
               ,amov.CUNIDADESCAPTURADAS
               ,amed.CNOMBREUNIDAD
               ,CASE
                     WHEN aprod.CIDVALORCLASIFICACION1 = 44 
                     THEN
                          CASE
                               WHEN aprod.CNOMBREPRODUCTO LIKE '%FX%' 
                                    THEN 
                                    dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                               WHEN aprod.CNOMBREPRODUCTO LIKE '%FLEX%' 
                                    THEN 
                                    dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                               ELSE
                               CASE
                                    WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL 
                                    THEN
                                         CASE
                                              WHEN dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO) = '0.00000' 
                                                   THEN 
                                                   dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                                              ELSE 
                                                   dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO)
                                              END
                                    ELSE 
                                         dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                                    END
                               END
                          ELSE
                               CASE
                                    WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL 
                                    THEN
                                         CASE
                                              WHEN dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO) = '0.00000' 
                                                   THEN 
                                                   dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                                              ELSE 
                                                   dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO)
                                         END
                                    ELSE 
                                         dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                                    END
                          END * CUNIDADES as 'TOTAL'
                     ,CASE
                     WHEN aprod.CIDVALORCLASIFICACION1 = 44 
                     THEN
                          CASE
                               WHEN aprod.CNOMBREPRODUCTO LIKE '%FX%' 
                                    THEN 
                                    dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                               WHEN aprod.CNOMBREPRODUCTO LIKE '%FLEX%' 
                                    THEN 
                                    dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                               ELSE
                               CASE
                                    WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL 
                                    THEN
                                         CASE
                                              WHEN dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO) = '0.00000' 
                                                   THEN 
                                                   dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                                              ELSE 
                                                   dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO)
                                              END
                                    ELSE 
                                         dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                                    END
                               END
                          ELSE
                               CASE
                                    WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL 
                                    THEN
                                         CASE
                                              WHEN dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO) = '0.00000' 
                                                   THEN 
                                                   dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                                              ELSE 
                                                   dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO)
                                         END
                                    ELSE 
                                         dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                                    END
                          END  as 'COST'
               ,amov.CCOSTOCAPTURADO
               ,amov.CCOSTOESPECIFICO
               ,amov.CNETO
               ,amov.CTOTAL
               
             FROM [adDEKKERLAB].[dbo].[admMovimientos] as amov INNER JOIN [adDEKKERLAB].[dbo].[admProductos] as aprod ON amov.CIDPRODUCTO = aprod.CIDPRODUCTO INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON amov.CIDUNIDAD = amed.CIDUNIDAD where amov.CIDDOCUMENTO = '" . $datos["idDocumento"] . "'");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt->close();

          $stmt = null;
     }
     static public function mdlDetalleMovimientosDocumento($idDocumento)
     {

          $stmt = ConexionsBd::conectarCorrecciones()->prepare("SELECT 
               amov.CIDMOVIMIENTO
              ,amov.CNUMEROMOVIMIENTO
              ,amov.CIDPRODUCTO
              ,aprod.CCODIGOPRODUCTO
              ,aprod.CNOMBREPRODUCTO
              ,amov.CUNIDADES
              ,amov.CUNIDADESCAPTURADAS
              ,amed.CNOMBREUNIDAD
              ,amov.CNETO
              ,amov.CPRECIOCAPTURADO
              ,amov.CIMPUESTO1
              ,amov.CUNIDADESPENDIENTES
              ,(amov.CUNIDADESPENDIENTES*amov.CPRECIOCAPTURADO) AS 'PENDIENTE'
              ,amov.CTOTAL as 'TOTAL'

              
            FROM admMovimientos as amov INNER JOIN admProductos as aprod ON amov.CIDPRODUCTO = aprod.CIDPRODUCTO INNER JOIN admUnidadesMedidaPeso as amed ON amov.CIDUNIDAD = amed.CIDUNIDAD where amov.CIDDOCUMENTO = '" . $idDocumento . "'");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt->close();

          $stmt = null;
     }
     /***NUEVOS MODULOS INTEGRACION */
     /***
      * IMPRESION DE DOCUMENTOS
      */
     static public function mdlImpresionDocumentos($idDocumentoDe, $idConcepto, $estatus)
     {

          if ($idConcepto == "") {
               $sWhere = "CIDDOCUMENTODE = '" . $idDocumentoDe . "' AND CCANCELADO = '" . $estatus . "' AND CIMPRESO = 0";
          } else {
               $sWhere = "CIDDOCUMENTODE = '" . $idDocumentoDe . "' AND CIDCONCEPTODOCUMENTO = '" . $idConcepto . "' AND CCANCELADO = '" . $estatus . "' AND CIMPRESO = 0";
          }
          $stmt = ConexionsBd::conectarParametros()->prepare("UPDATE [adDEKKERLAB].[dbo].[admDocumentos] set CIMPRESO = 1  WHERE $sWhere");

          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
          $stmt->close();

          $stmt = null;
     }
     /**
      * NUEVOS MODULOS DE INTEGRACION
      * GRAFICOS OBJETIVOS
      */
     static public function mdlObjetivosVenta($año, $mes)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;
          global $agenteVenta;


          $sWhere = " adoc.CCANCELADO  = '0'  and YEAR(adoc.CFECHA) = '" . $año . "' ";

          $condicional = "WHERE indicador = 1  and canalComercial != 'PROPIAS'";




          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH ventasData AS(SELECT 
          adoc.CSERIEDOCUMENTO,
          adoc.CFOLIO,
          adoc.CRAZONSOCIAL As NombreCliente,
          MONTH(adoc.CFECHA) As Mes,
          $agenteListPinturas as Agente,
                  CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.centro($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.centro($agenteListPinturas,'PINTURAS')
                      END
               
                   END As centroTrabajo,
                   CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.canal($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.canal($agenteListPinturas,'PINTURAS')
                      END
               
                   END As canalComercial,
           adoc.CNETO As Importe,
           adoc.CDESCUENTOMOV As Descuento,
           adoc.CIMPUESTO1 As IVA,
           adoc.CTOTAL As Totals,
           CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
           WHEN 'DEVOLUCIÓN'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'NOTA DE CR'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'DOCUMENTO '
           THEN SUM(adoc.CTOTAL)
           ELSE
           SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
           '1' As indicador
    FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
  5,
  3001,
  3002,
  3003,
  3023,
  3030,
  3076,
  3096,
  3108,
  3115,
  3128,
  3148,
  3172,
  3173,
  3174,
  3175,
  3176,
  3177,
  3178,
  3179,
  3180,
  3181,
  3212,
  3233,
  3146,
  3234,
  3182,
  3183,
  3184,
  3185,
  3186,
  3187,
  3188,
  3189,
  3190,
  3191,
  3126,
  3116,
  3106,
  3078,
  3094,
  3060,
  3024,
  3013,
  3014,
  3015,
  6,
  8,
  3016,
  3125,
  3194,
  3195,
  3196,
  3215,
  3229,
  3207,
  3208,
  3139
  )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
          adoc.CSERIEDOCUMENTO,
          adoc.CFOLIO,
          adoc.CRAZONSOCIAL As NombreCliente,
          MONTH(adoc.CFECHA) As Mes,
          $agenteListPinturas as Agente,
                  CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.centro($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.centro($agenteListPinturas,'PINTURAS')
                      END
               
                   END As centroTrabajo,
                   CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.canal($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.canal($agenteListPinturas,'PINTURAS')
                      END
               
                   END As canalComercial,
           adoc.CNETO As Importe,
           adoc.CDESCUENTOMOV As Descuento,
           adoc.CIMPUESTO1 As IVA,
           adoc.CTOTAL As Totals,
           CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
           WHEN 'DEVOLUCIÓN'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'NOTA DE CR'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'DOCUMENTO '
           THEN SUM(adoc.CTOTAL)
           ELSE
           SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
           '1' As indicador
    FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
  5,
  3001,
  3048,
  3061,
  3052,
  3012,
  3004,
  6,
  8,
  3007,
  3017,
  3053,
  3056,
  14
  )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
          adoc.CSERIEDOCUMENTO,
          adoc.CFOLIO,
          adoc.CRAZONSOCIAL As NombreCliente,
          MONTH(adoc.CFECHA) As Mes,
          $agenteListPinturas as Agente,
                  CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.centro($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.centro($agenteListPinturas,'PINTURAS')
                      END
               
                   END As centroTrabajo,
                   CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.canal($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.canal($agenteListPinturas,'PINTURAS')
                      END
               
                   END As canalComercial,
           adoc.CNETO As Importe,
           adoc.CDESCUENTOMOV As Descuento,
           adoc.CIMPUESTO1 As IVA,
           adoc.CTOTAL As Totals,
           CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
           WHEN 'DEVOLUCIÓN'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'NOTA DE CR'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'DOCUMENTO '
           THEN SUM(adoc.CTOTAL)
           ELSE
           SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
           '1' As indicador
    FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
  3105,
  3111)
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
          adoc.CSERIEDOCUMENTO,
          adoc.CFOLIO,
          adoc.CRAZONSOCIAL As NombreCliente,
          MONTH(adoc.CFECHA) As Mes,
          $agenteListDekkerlab as Agente,
                  CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.centro($agenteListDekkerlab,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          ELSE
                          dbo.centro($agenteListDekkerlab,'PINTURAS')
                      END
               
                   END As centroTrabajo,
                   CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.canal($agenteListDekkerlab,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          ELSE
                          dbo.canal($agenteListDekkerlab,'PINTURAS')
                      END
               
                   END As canalComercial,
           adoc.CNETO As Importe,
           adoc.CDESCUENTOMOV As Descuento,
           adoc.CIMPUESTO1 As IVA,
           adoc.CTOTAL As Totals,
           CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
           WHEN 'Devolución'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'Nota de Cr'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'Factura Pr'
           THEN SUM(adoc.CTOTAL)
           ELSE
           SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
           '1' As indicador
    FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
  3040,
  3041,
  3042,
  3043,
  3044,
  3045,
  4,
  5,
  3081,
  3082,
  6,
  3046,
  3047,
  3048,
  3049,
  3050,
  3051,
  3052,
  3053,
  3054,
  3055,
  3056,
  8,
  3070,
  3071,
  3072,
  3075,
  3076,
  3080
  )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),
  
  ventasOrdenadas As(
      SELECT
     $agenteVenta As AgenteVenta,
     dbo.objetivos($agenteVenta,$mes) as Objetivo, 
     dbo.objetivosTotales($agenteVenta) as Objetivos, 
      canalComercial,
          Total,
          Mes
      FROM ventasData  $condicional
      
      )
  SELECT *,IsNull([1],0) + IsNull([2],0) + IsNull([3],0) + IsNull([4],0) + IsNull([5],0) + IsNull([6],0) + IsNull([7],0) + IsNull([8],0) + IsNull([9],0) + IsNull([10],0) + IsNull([11],0) + IsNull([12],0) Totales FROM ventasOrdenadas PIVOT(SUM(Total) FOR Mes in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  order by canalComercial Asc");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlObjetivosVentaCanal($año, $mes)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;
          global $agenteVenta;


          $sWhere = " adoc.CCANCELADO  = '0'  and YEAR(adoc.CFECHA) = '" . $año . "' ";

          $condicional = "WHERE indicador = 1  and canalComercial != 'PROPIAS'";




          $stmt = ConexionsBd::conectarPinturas()->prepare("WITH ventasData AS(SELECT 
          adoc.CSERIEDOCUMENTO,
          adoc.CFOLIO,
          adoc.CRAZONSOCIAL As NombreCliente,
          MONTH(adoc.CFECHA) As Mes,
          $agenteListPinturas as Agente,
                  CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.centro($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.centro($agenteListPinturas,'PINTURAS')
                      END
               
                   END As centroTrabajo,
                   CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.canal($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.canal($agenteListPinturas,'PINTURAS')
                      END
               
                   END As canalComercial,
           adoc.CNETO As Importe,
           adoc.CDESCUENTOMOV As Descuento,
           adoc.CIMPUESTO1 As IVA,
           adoc.CTOTAL As Totals,
           CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
           WHEN 'DEVOLUCIÓN'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'NOTA DE CR'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'DOCUMENTO '
           THEN SUM(adoc.CTOTAL)
           ELSE
           SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
           '1' As indicador
    FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
  5,
  3001,
  3002,
  3003,
  3023,
  3030,
  3076,
  3096,
  3108,
  3115,
  3128,
  3148,
  3172,
  3173,
  3174,
  3175,
  3176,
  3177,
  3178,
  3179,
  3180,
  3181,
  3212,
  3233,
  3146,
  3234,
  3182,
  3183,
  3184,
  3185,
  3186,
  3187,
  3188,
  3189,
  3190,
  3191,
  3126,
  3116,
  3106,
  3078,
  3094,
  3060,
  3024,
  3013,
  3014,
  3015,
  6,
  8,
  3016,
  3125,
  3194,
  3195,
  3196,
  3215,
  3229,
  3207,
  3208,
  3139
  )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
          adoc.CSERIEDOCUMENTO,
          adoc.CFOLIO,
          adoc.CRAZONSOCIAL As NombreCliente,
          MONTH(adoc.CFECHA) As Mes,
          $agenteListPinturas as Agente,
                  CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.centro($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.centro($agenteListPinturas,'PINTURAS')
                      END
               
                   END As centroTrabajo,
                   CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.canal($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.canal($agenteListPinturas,'PINTURAS')
                      END
               
                   END As canalComercial,
           adoc.CNETO As Importe,
           adoc.CDESCUENTOMOV As Descuento,
           adoc.CIMPUESTO1 As IVA,
           adoc.CTOTAL As Totals,
           CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
           WHEN 'DEVOLUCIÓN'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'NOTA DE CR'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'DOCUMENTO '
           THEN SUM(adoc.CTOTAL)
           ELSE
           SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
           '1' As indicador
    FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
  5,
  3001,
  3048,
  3061,
  3052,
  3012,
  3004,
  6,
  8,
  3007,
  3017,
  3053,
  3056,
  14
  )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
          adoc.CSERIEDOCUMENTO,
          adoc.CFOLIO,
          adoc.CRAZONSOCIAL As NombreCliente,
          MONTH(adoc.CFECHA) As Mes,
          $agenteListPinturas as Agente,
                  CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.centro($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.centro($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.centro($agenteListPinturas,'PINTURAS')
                      END
               
                   END As centroTrabajo,
                   CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.canal($agenteListPinturas,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.canal($agenteListPinturas,'FLEX')
                          ELSE
                          dbo.canal($agenteListPinturas,'PINTURAS')
                      END
               
                   END As canalComercial,
           adoc.CNETO As Importe,
           adoc.CDESCUENTOMOV As Descuento,
           adoc.CIMPUESTO1 As IVA,
           adoc.CTOTAL As Totals,
           CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
           WHEN 'DEVOLUCIÓN'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'NOTA DE CR'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'DOCUMENTO '
           THEN SUM(adoc.CTOTAL)
           ELSE
           SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
           '1' As indicador
    FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
  3105,
  3111)
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
    UNION
    SELECT 
          adoc.CSERIEDOCUMENTO,
          adoc.CFOLIO,
          adoc.CRAZONSOCIAL As NombreCliente,
          MONTH(adoc.CFECHA) As Mes,
          $agenteListDekkerlab as Agente,
                  CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.centro($agenteListDekkerlab,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.centro($agenteListDekkerlab,'FLEX')
                          ELSE
                          dbo.centro($agenteListDekkerlab,'PINTURAS')
                      END
               
                   END As centroTrabajo,
                   CASE adoc.CRAZONSOCIAL
                   WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                   THEN
                      dbo.canal($agenteListDekkerlab,'PINTURAS')
                   ELSE
                      CASE acon.CNOMBRECONCEPTO
                          WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Devolución Mayoreo'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'FACTURA FX PUEBLA V 3.'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'FACTURA MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Factura Mayoreo'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Factura Prueba'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Nota de Cargo Mayoreo'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'Nota de Crédito Mayoreo'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          WHEN 'DOCUMENTO PRUEBA V 3.3'
                          THEN
                               dbo.canal($agenteListDekkerlab,'FLEX')
                          ELSE
                          dbo.canal($agenteListDekkerlab,'PINTURAS')
                      END
               
                   END As canalComercial,
           adoc.CNETO As Importe,
           adoc.CDESCUENTOMOV As Descuento,
           adoc.CIMPUESTO1 As IVA,
           adoc.CTOTAL As Totals,
           CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
           WHEN 'Devolución'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'Nota de Cr'
           THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
           WHEN 'Factura Pr'
           THEN SUM(adoc.CTOTAL)
           ELSE
           SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
           '1' As indicador
    FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3039,
  3040,
  3041,
  3042,
  3043,
  3044,
  3045,
  4,
  5,
  3081,
  3082,
  6,
  3046,
  3047,
  3048,
  3049,
  3050,
  3051,
  3052,
  3053,
  3054,
  3055,
  3056,
  8,
  3070,
  3071,
  3072,
  3075,
  3076,
  3080
  )
    GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),
  
  ventasOrdenadas As(
      SELECT
     $agenteVenta As AgenteVenta,
     dbo.objetivos($agenteVenta,$mes) as Objetivo, 
     dbo.objetivosTotales($agenteVenta) as Objetivos, 
      canalComercial,
          Total,
          Mes
      FROM ventasData  $condicional
      
      ),
  objetivos As(SELECT *,IsNull([1],0) + IsNull([2],0) + IsNull([3],0) + IsNull([4],0) + IsNull([5],0) + IsNull([6],0) + IsNull([7],0) + IsNull([8],0) + IsNull([9],0) + IsNull([10],0) + IsNull([11],0) + IsNull([12],0) Totales FROM ventasOrdenadas PIVOT(SUM(Total) FOR Mes in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  order by canalComercial Asc OFFSET 0 ROWS FETCH NEXT 100 ROWS ONLY) SELECT canalComercial,SUM(isnull(cast(Objetivo as float),0)) as Objetivo,SUM(isnull(cast(Objetivos as float),0)) as Objetivos,SUM([1]) as '1',SUM([2]) as '2',SUM([3]) as '3',SUM([4]) as '4',SUM([5]) as '5',SUM([6]) as '6',SUM([7]) as '7',SUM([8]) as '8',SUM([9]) as '9',SUM([10]) as '10',SUM([11]) as '11',SUM([12]) as '12',SUM(Totales) as 'Totales' FROM objetivos GROUP BY canalComercial");

          $stmt->execute();

          return $stmt->fetchAll();

          $stmt = null;
     }
     static public function mdlRegistroAgenteObjetivos($datos)
     {

          $stmt = ConexionsBd::conectarParametros()->prepare("INSERT INTO [parametrosVentas].[dbo].[OBJETIVOS] (CNOMBREAGENTE,CCANALORIGEN) VALUES(:nombreAgente,:canalComercial)");

          $stmt->bindParam(":nombreAgente", $datos["agente"], PDO::PARAM_STR);
          $stmt->bindParam(":canalComercial", $datos["canalComercial"], PDO::PARAM_STR);

          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
     static public function mdlObtenerDatosAgente($tabla, $valor)
     {
          $stmt = ConexionsBd::conectarParametros()->prepare("SELECT CID,CNOMBREAGENTE,CCANALORIGEN FROM $tabla WHERE CID = :idAgente");

          $stmt->bindParam(":idAgente", $valor, PDO::PARAM_INT);

          $stmt->execute();

          return $stmt->fetch();

          $stmt = null;
     }
     static public function mdlEliminarAgenteObjetivos($tabla, $id)
     {

          $stmt = ConexionsBd::conectarParametros()->prepare("DELETE FROM $tabla WHERE CID = $id");

          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
     static public function mdlActualizarAgenteObjetivos($tabla, $datos)
     {

          $stmt = ConexionsBd::conectarParametros()->prepare("UPDATE $tabla set CNOMBREAGENTE = :nombreAgente,CCANALORIGEN = :canalComercial WHERE CID = :id");

          $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
          $stmt->bindParam(":nombreAgente", $datos["agente"], PDO::PARAM_STR);
          $stmt->bindParam(":canalComercial", $datos["canalComercial"], PDO::PARAM_STR);
          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
     static public function mdlActualizarObjetivoAgente($tabla, $datos)
     {
          $campo = $datos["campo"];
          $stmt = ConexionsBd::conectarParametros()->prepare("UPDATE $tabla set $campo = :objetivo WHERE CID = :id");

          $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
          $stmt->bindParam(":objetivo", $datos["objetivo"], PDO::PARAM_STR);
          if ($stmt->execute()) {

               return "ok";
          } else {

               return "error";
          }
     }
}
