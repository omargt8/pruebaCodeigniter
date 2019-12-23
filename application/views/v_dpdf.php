<!DOCTYPE html>
<html>
<head>
	<title>Descargar PDF</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

	<br /><br />
	<div align="center">
		<h3>Descargar Inventario</h3>
		<form action="<?php echo base_url();?>Welcome/descargar" method="POST">
			<input type="submit" class="btn btn-info" name="btnDownload" value="Descargar">
			<a href="<?php echo base_url();?>cproducto" class="btn btn-danger">Regresar</a>
		</form>
	</div>
</body>
<br /><br />
</html>