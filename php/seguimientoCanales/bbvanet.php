<?php
require_once("../conexion_e2e_process.php");
require_once("../querys/seguimientoCanales/query.php");
require_once("../querys/informeMensual/informeMensual.php");


$category = array();
  $titulo = array();
  $series1 = array();
  $series2 = array();
  $series3 = array();
  
/*Recuperar variables de sesión que contienen las fechas a comparar*/
session_start();
$from = $_SESSION["fechaFromSeguimiento"];
$newFrom = date("Y-m-d 07:00", strtotime($from));
$to = date("Y-m-d 22:00", strtotime($from));

$ovbxPeticiones = busqueda('ovbx_mult_web_servicing',$newFrom,$to,'Throughput');
$ovbxTiempo = busqueda('ovbx_mult_web_servicing',$newFrom,$to,'Time');

$maxPeticiones = max_peti('ovbx_mult_web_servicing');
$r8 = pg_fetch_assoc($maxPeticiones);
$max_peti = $r8['max_peticiones'];
$Fecha_peti = $r8['fecha'];
$TituloPeticiones = "Max. peticiones $Fecha_peti";

while($r1  = pg_fetch_assoc($ovbxPeticiones)) {
        $fecha = $r1['x']*1000;
        $series1[] = [$fecha,$r1['y']];
    }
while($r2  = pg_fetch_assoc($ovbxTiempo)) {
        $fecha = $r2['x']*1000;
        $series2[] = [$fecha,$r2['y']];
        $series3[] = [$fecha,$max_peti];
    }


$datos = array();
array_push($datos,$series1);
array_push($datos,$series2);
array_push($datos,$series3);
array_push($datos,$TituloPeticiones);


print json_encode($datos, JSON_NUMERIC_CHECK);

pg_close($db_con);

?>
