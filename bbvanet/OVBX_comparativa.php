<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>C&PM E2E - Seguimiento</title>
		<link type="text/css" rel="stylesheet" href="/E2EPortugal/css/jquery-ui.css">
		<link type="text/css" rel="Stylesheet" href="/E2EPortugal/css/estilo.css">
    <link type="text/css" rel="stylesheet" href="/E2EPortugal/css/drop-down-menu.css">
    <link type="text/css" rel="Stylesheet" href="/E2EPortugal/css/menu.css">
		<script type="text/javascript" src="/E2EPortugal/js/library/highcharts.js"></script>
    <script type="text/javascript" src="/E2EPortugal/js/library/exporting.js"></script>
		<script type="text/javascript" src="/E2EPortugal/js/library/jquery.min.js"></script>
		<script type="text/javascript" src="/E2EPortugal/js/bbvanet/OVBX/tiempoRespuesta.js"></script>
		<script type="text/javascript" src="/E2EPortugal/js/bbvanet/OVBX/peticiones.js"></script>
		<script type="text/javascript" src="/E2EPortugal/js/bbvanet/OVBX/cpu.js"></script>
    <script type="text/javascript" src="/E2EPortugal/js/bbvanet/OVBX/memoria.js"></script>
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
		<section id="contenedor">
			<div id="submenu"> <span class="activo">Comparativa </span></div>

			<header>OVBX</header>
			<!-- Formulario gestión fechas -->
			<?php include("../php/fechaToFrom.php"); ?>
			<form id="comparador" action='' method='post'>
				<label>Comparar el día </label>
				<input type="text" name="from" id="from" readonly="readonly" size="12" value="<?= $from ?>"/>
				<label>(F) con </label>
				<input type="text" name="to" id="to" readonly="readonly" size="12" value="<?= $to ?>"/>
				<label>(T)</label>
				<input type="submit" value="Comparar" name="consulta"/>
			</form>
			<script src="../external/jquery/jquery.js"></script>
			<script src="../js/fecha/jquery-ui.js"></script>
			<script src="../js/fecha/calendario.js"></script>

			<!-- Dashboard métricas -->
			<fieldset id="recuadro">
				<div id="tiempoRespuesta"></div>
			</fieldset>
			<fieldset id="recuadro">
				<div id="peticiones"></div>
			</fieldset>
			<fieldset id="recuadroCpu">
				<div id="cpu"></div>
			</fieldset>
			<fieldset id="recuadroMemoria">
				<div id="memoria"></div>
			</fieldset>
		</section>
	</body>
</html>
