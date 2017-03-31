<?php
  require_once("../conexion_e2e_process.php");
  require_once("../queryHighstock.php");

  $series1 = array();

  $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
  $idHost = '68,69';

  $query = busqueda('oppa_mult_web_oppaweb',$newTo,$idHost);

  while($r1 = pg_fetch_assoc($query)) {
    $fecha = $r1['fecha']*1000;
    $series1[] = [$fecha, $r1['tiempo'],$r1['peticiones'],
    $r1['cpu1'],$r1['cpu2']];
    }

  print json_encode($series1, JSON_NUMERIC_CHECK);

  pg_close($db_con);

