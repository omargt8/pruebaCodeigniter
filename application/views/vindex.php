<html>
<head>
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Verdana;
            font-size: 8pt;
        }
    </style>
</head>
<body>
    <h1 align="center">Bienvenido!</h1>
    <div align="center">
        <a href="<?php echo base_url();?>cproducto/guardar" class="btn  btn-info ">Guardar Producto</a>
        <br/><br/>
        <a href="<?php echo base_url();?>cproducto/lista" class="btn  btn-info">Lista de Productos</a>
        <br/><br/>
        <a href="<?php echo base_url();?>cproducto/descargar" class="btn  btn-info">Descargar Excel</a>
        <br/><br/>
        <a href="<?php echo base_url();?>csv" class="btn  btn-info">Subir csv</a>
        <br/><br/>
        <a href="<?php echo base_url();?>welcome/index" class="btn  btn-info">Descargar inventario</a>
        <br/><br/>
        <a href="<?php echo base_url();?>cproducto/factura" class="btn  btn-info">Facturacion</a>
    </div>
</body>
