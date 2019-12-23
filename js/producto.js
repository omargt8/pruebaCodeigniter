//$('#btnMostrar').click(function(){
    $('#tblProductos').html(
        '<tr>'+
            '<th>Id Producto</th>'+
            '<th>Nombre</th>'+
            '<th>Cantidad</th>'+
            '<th>Descripcion</th>'+
            '<th colspan="2">Acciones</th>'+
        '</tr>'
    );
    $.post(baseurl+"cproducto/getProductos",
        function(data){
            var p = JSON.parse(data);
            $.each(p, function(i, item){
                $('#tblProductos').append(
                    '<tr>'+
                        '<td>'+item.id_producto+'</td>'+
                        '<td>'+item.nombre+'</td>'+
                        '<td>'+item.cantidad+'</td>'+
                        '<td>'+item.descripcion+'</td>'+
                        '<td><a  class="btn btn-primary btn-sm" style="width:"80%;" data-toggle="modal" data-target="#modalEditProducto" onclick="selProducto(\''+item.id_producto+'\',\''+item.nombre+'\',\''+item.cantidad+'\',\''+item.descripcion+'\');" >Editar</a>'+
                        '&nbsp; <a  class="btn btn-danger btn-sm" style="width:"80%;" data-toggle="modal" data-target="#modalBorrarProducto" onclick="borrarProducto(\''+item.id_producto+'\');" >Borrar</a></td>'+
                    '</tr>'
                );
            })
        });
//});

selProducto = function(id_producto, nombre, cantidad, descripcion){
    $('#mhdnIdProducto').val(id_producto);
    $('#mtxtNombre').val(nombre);
    $('#mtxtCantidad').val(cantidad);
    $('#mtxtDescripcion').val(descripcion);
};

$('#mbtnActProducto').click(function(){
    var idP = $('#mhdnIdProducto').val();
    var nom = $('#mtxtNombre').val();
    var cant = $('#mtxtCantidad').val();
    var desc = $('#mtxtDescripcion').val();
    $.post(baseurl+"cproducto/actProducto",
    {
        mhdnIdProducto:idP,
        mtxtNombre:nom,
        mtxtCantidad:cant,
        mtxtDescripcion:desc
    },
    function(data){
        if(data == 1){
            $('#mbtnCerrarModal').click();
            location.reload();
        }
    });
});


borrarProducto = function(id_producto){
    $('#mhdnId_Producto').val(id_producto);
};

$('#mbtnBorrarProducto').click(function(){
    var idP = $('#mhdnId_Producto').val();
    $.post(baseurl+"cproducto/borrarProducto",
    {
        mhdnId_Producto:idP,
    },
    function(data){
        if(data == 1){
            $('#cerrarModal').click();
            location.reload();
        }
    });
});