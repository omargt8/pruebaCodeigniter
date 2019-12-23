<html>
<head>
    <title>Productos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <h3>Lista de Productos!</h3>

    <table id="tblProductos" class="table table-striped">
        <tr>
            <th>Id Producto</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </table>

    <br/>
    <a href="<?php echo base_url();?>cproducto" class="btn btn-danger">Regresar</a>

<!-- Modal -->

<div class="modal fade" id="modalEditProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal">
                    <input type="hidden" id="mhdnIdProducto">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" name="mtxtNombre" class="form-control" id="mtxtNombre" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cantidad</label>
                            <div class="col-sm-9">
                                <input type="text" name="mtxtCantidad" class="form-control" id="mtxtCantidad" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Descripcion</label>
                            <div class="col-sm-9">
                                <input type="text" name="mtxtDescripcion" class="form-control" id="mtxtDescripcion" placeholder="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" id="mbtnActProducto">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal -->

<!-- Modal Borrar -->
<div class="modal fade" id="modalBorrarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2>Seguro?</h2>
        <input type="hidden" id="mhdnId_Producto">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrarModal" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="mbtnBorrarProducto">Borrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal -->

</body>
<script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url();?>js/producto.js" type="text/javascript"></script>
</html>