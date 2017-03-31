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
		<script type="text/javascript" src="/E2EPortugal/js/bbvanet/highstock.js"></script>
		<script type="text/javascript">
		$(function(){
			// Indica el nombre del archivo a cargar
			$("#incluirPagina").load("/E2EPortugal/html/menu.html");
		});
		</script>
	</head>
	<body>
		<script type="text/javascript" src="/E2EPortugal/js/library/highstock.js"></script>
		<script type="text/javascript" src="/E2EPortugal/js/library/exporting.js"></script>
		<header id="menu-header">
		<div id="incluirPagina"></div>
		</header>
		<!-- Cuerpo informe -->
		<section id="contenedor">
			<div id="submenu">
				<span class="activo">Seguimiento</span>
			</div>
			<header>BBVANET</header>
			<fieldset>
				<div id="container" style="height: 700px; min-width: 500px"></div>
			</fieldset>
		</section>
	</body>
</html>
