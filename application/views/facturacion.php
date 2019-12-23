<!Doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
	

	body{
		position: absolute;
		min-height: 50%;
		width: 80%;
		top: 20%;
		left: 5%;
	}

	.selected{
		cursor: pointer;
	}
	.selected:hover{
		background-color: #0585C0;
		color: white;
	}
	.seleccionada{
		background-color: #0585C0;
		color: white;
	}
</style>
<script>
	$(document).ready(function(){
		$('#bt_add').click(function(){
			agregar();
		});
		$('#bt_del').click(function(){
			eliminar(id_fila_selected);
		});
		$('#bt_delall').click(function(){
			eliminarTodasFilas();
		});
		

	});
	var cont=0;
	var id_fila_selected=[];
	function agregar(){
		cont++;
		var fila='<tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id);"><td>'+cont+'</td><td>'+$('#cboProducto').val()+'</td><td>'+$('#cboProducto option:selected').text()+'</td><td>'+$('#mhdnDescripcion').val()+'</td></tr>';
		$('#tabla').append(fila);
		reordenar();
	}

	function seleccionar(id_fila){
		if($('#'+id_fila).hasClass('seleccionada')){
			$('#'+id_fila).removeClass('seleccionada');
		}
		else{
			$('#'+id_fila).addClass('seleccionada');
		}
		//2702id_fila_selected=id_fila;
		id_fila_selected.push(id_fila);
	}

	function eliminar(id_fila){
		/*$('#'+id_fila).remove();
		reordenar();*/
		for(var i=0; i<id_fila.length; i++){
			$('#'+id_fila[i]).remove();
		}
		reordenar();
	}

	function reordenar(){
		var num=1;
		$('#tabla tbody tr').each(function(){
			$(this).find('td').eq(0).text(num);
			num++;
		});
	}
	function eliminarTodasFilas(){
$('#tabla tbody tr').each(function(){
			$(this).remove();
		});

	}


</script>
</head>
<body>
	<br />
	<div class="form-group col-xs-3">
		<label>Productos</label>
		<select id="cboProducto" class="form-control" >
		</select>
	</div>
			<br />
			<br />
			<br />
			<br />
	<div id="content">
		<button id="bt_add" class="btn btn-default">Agregar</button>
		<button id="bt_del" class="btn btn-default">Eliminar</button>
		<button id="bt_delall" class="btn btn-default">Eliminar todo</button>
		<table id="tabla" class="table table-bordered">
			<thead>
				<tr>
					<td>Nº</td>
					<td>ID</td>
					<td>Nombre</td>
					<td>Descripcion</td>
				</tr>
			</thead>
		</table>
	</div>

	<div id="hidden">

	</div>
	<br />
	<a href="<?php echo base_url();?>cproducto" class="btn btn-danger">Regresar</a>
</body>

<script>
	$.post("<?php echo base_url();?>cproducto/llenarCombo",
	{},
	function(data){
		var p = JSON.parse(data);
		$.each(p, function(i, item)
		{
			$('#cboProducto').append('<option value="'+item.id_producto+'">'+item.nombre+'</option>');
		});
	});

	$('#cboProducto').change(function(){
		$('#cboProducto option:selected').each(function(){
			$.post("<?php echo base_url();?>cproducto/complementoCombo",
			{
				"id" : $('#cboProducto').val()
			},
			function(data){
				var c = JSON.parse(data);
				$.each(c, function(i, item)
				{
					$('#hidden').html('');
					$('#hidden').append('<input type="hidden" id="mhdnDescripcion" value="'+item.descripcion+'">');
				});
			});
		});
	});
</script>

</html>
















