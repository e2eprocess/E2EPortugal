<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
    	<link type="text/css" rel="stylesheet" href="/E2EPortugal/css/jquery-ui.css">
		<link type="text/css" rel="Stylesheet" href="/E2EPortugal/css/estilo.css">
    	<link type="text/css" rel="stylesheet" href="/E2EPortugal/css/drop-down-menu.css">
    	<link type="text/css" rel="Stylesheet" href="/E2EPortugal/css/menu.css">
		<script type="text/javascript" src="/E2EPortugal/js/library/jquery.min.js"></script>
		<script type="text/javascript" src="/E2EPortugal/js/library/highstock.js"></script>
    	<script type="text/javascript" src="/E2EPortugal/js/seguimientoCanales/bbvanet.js"></script>
		<script type="text/javascript" src="/E2EPortugal/js/seguimientoCanales/mobile.js"></script>
		<script type="text/javascript" src="/E2EPortugal/js/seguimientoCanales/blueoffice.js"></script>
		
    	<script type="text/javascript">
			$(function(){
					// Indica el nombre del archivo a cargar
					$("#incluirPagina").load("/E2EPortugal/html/menu.html");
			});
		</script>
  </head>
  <body>
    <header id="menu-header">
		<div id="incluirPagina"></div>
	</header>

	<!-- Cuerpo informe -->
	<section id="contenedor" style="padding-top:30px;">

	<!-- Formulario gestión fechas -->
	<?php include("php/fechaFrom.php"); ?>
	<form id="comparador" action='' method='post'>
		<input type="text" name="from" id="from" readonly="readonly" size="12" value="<?= $from ?>"/>
		<input type="submit" value="Ver día" name="consulta"/>
	</form>
  	<script src="external/jquery/jquery.js"></script>
    <script src="js/fecha/jquery-ui.js"></script>
    <script src="js/fecha/calendario.js"></script>

	<fieldset id="recuadro">
		<div id="bbvanet"></div>
	</fieldset>
	<fieldset id="recuadro">
		<div id="mobile"></div>
	</fieldset>
	<fieldset id="recuadroMemoria">
		<div id="blueoffice"></div>
	</fieldset>
	
    </section>
  </body>
</html>
