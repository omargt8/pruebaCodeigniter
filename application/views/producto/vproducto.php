<html>
<head>
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
    <h1 align="center">Guardar Productos!</h1>
    <form action="<?php echo base_url(); ?>cproducto/guardarProducto" method="POST" class="form-horizontal">
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-3 control-label">ID Producto:</label>
                <div class="col-sm-9">
                    <input type="text" onKeyPress="return soloNumeros(event)" required name="txtIdProducto" maxlength="5">
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-sm-3 control-label">Nombre:</label>
                <div class="col-sm-9">
                    <input type="text" required name="txtNombre" maxlength="100">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Cantidad:</label>
                <div class="col-sm-9">
                    <input type="text" required name="txtCantidad" maxlength="5" onKeyPress="return soloNumeros(event)">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Descripcion:</label>
                <div class="col-sm-9">
                    <textarea name="txtDescripcion" required rows="4" cols="40" maxlength="255"></textarea>
                </div>
            </div>
            
            <div align="center">
                <input type="submit" value="Guardar" class="btn btn-success">
                <a href="<?php echo base_url();?>cproducto" class="btn btn-danger">Regresar</a>
            </div>

        </div>
    </form>
</body>

<script>
// Solo permite ingresar numeros.
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}

</script>

</html>