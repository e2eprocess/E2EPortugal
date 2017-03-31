<?php
  require_once("../../conexion_e2e_process.php");
  require_once("../../queryMemoria.php");

  /*Declaracion de arrays json*/
  $category = array();
  $titulo = array();
  $series1 = array();
  $series2 = array();
  $series3 = array();
  $series4 = array();
  $series5 = array();
  $series6 = array();
  $series7 = array();
  $series8 = array();
  $series9 = array();
  $series10 = array();
  $series11 = array();
  $series12 = array();
  $series13 = array();
  $series14 = array();
  $series15 = array();
  $series16 = array();
  $series17 = array();
  $series18 = array();
  $series19 = array();
  $series20 = array();
  $series21 = array();
  $series22 = array();
  $series23 = array();
  $series24 = array();



  /*Recuperar variables de sesión que contienen las fechas a comparar*/
  session_start();
  $from = $_SESSION["fechaFromNet"];
  $newFrom = date("Y-m-d", strtotime($from));
  $to=$_SESSION["fechaToNet"];
  $newTo = date("Y-m-d", strtotime($to));

  /*Declaración variables*/
  if(date("Y-m-d")==$newTo){
    $newToF = date("Y-m-d 00:00");
    $newTo = date("Y-m-d H:i", strtotime('-20 minute'));
    $OPBM_S01_10_To = busquedaClonHoy('OPBM_S01_10',$newToF,$newTo);
    $OPBM_S01_20_To = busquedaClonHoy('OPBM_S01_20',$newToF,$newTo);
  }else{
    $OPBM_S01_10_To = busquedaClon('OPBM_S01_10',$newTo);
    $OPBM_S01_20_To = busquedaClon('OPBM_S01_20',$newTo);
  }
  $OPBM_S01_10_From = busquedaClon('OPBM_S01_10',$newFrom);
  $OPBM_S01_20_From = busquedaClon('OPBM_S01_20',$newFrom);

  $category['name'] = 'fecha';
  $titulo['text'] = "<b>$from</b> comparado con <b>$to</b>";

  while($r1 = pg_fetch_assoc($OPBM_S01_10_From)) {
        $category['data'][] = $r1['fecha'];
        $series1['data'][] = $r1['memoria'];
      }
  while($r2 = pg_fetch_assoc($OPBM_S01_20_From)) {
        $series2['data'][] = $r2['memoria'];
      }

  while($r3 = pg_fetch_assoc($OPBM_S01_10_To)) {
        $series3['data'][] = $r3['memoria'];
      }
  while($r4 = pg_fetch_assoc($OPBM_S01_20_To)) {
        $series4['data'][] = $r4['memoria'];
      }

      $datos = array();
      array_push($datos,$category);
      array_push($datos,$series1);
      array_push($datos,$series2);
      array_push($datos,$series3);
      array_push($datos,$series4);
      array_push($datos,$titulo);

  print json_encode($datos, JSON_NUMERIC_CHECK);

  pg_close($db_con);

?>
