<?php

class Cproducto extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('mproducto');
        $this->load->library('export_excel');
        $this->load->library('csvimport');
    }

    public function index()
    {
        $this->load->view('vindex');
        $this->load->view('layout/footer');
    }

    public function guardar()
    {
        $this->load->view('producto/vproducto');
        $this->load->view('layout/footer');
    }

    public function lista()
    {
        $this->load->view('producto/vlista');
        $this->load->view('layout/footer');
    }

    public function descargar()
    {
        $this->load->view('producto/vdescargar');
        $this->load->view('layout/footer');
    }

    public function subir()
    {
        $this->load->view('producto/vsubir');
        $this->load->view('layout/footer');
    }

    public function factura()
    {
        $this->load->view('facturacion');
        $this->load->view('layout/footer');
    }

    public function guardarProducto()
    {
        $param['id_producto'] = $this->input->post('txtIdProducto');
        $param['nombre'] = $this->input->post('txtNombre');
        $param['cantidad'] = $this->input->post('txtCantidad');
        $param['descripcion'] = $this->input->post('txtDescripcion');

        $this->mproducto->guardarProducto($param);

        $this->load->view('vindex');
        $this->load->view('layout/footer');
    }

    public function getProductos()
    {
        echo json_encode($this->mproducto->getProductos());
    }

    public function actProducto()
    {
        $param['id_producto'] = $this->input->post('mhdnIdProducto');
        $param['nombre'] = $this->input->post('mtxtNombre');
        $param['cantidad'] = $this->input->post('mtxtCantidad');
        $param['descripcion'] = $this->input->post('mtxtDescripcion');
        $id = $this->input->post('mhdnIdProducto');

        echo $this->mproducto->actProducto($param, $id);
    }

    public function borrarProducto()
    {
        $id = $this->input->post('mhdnId_Producto');
        echo $this->mproducto->borrarProducto($id);
    }

    public function dExcel()
    {
        $result = $this->mproducto->getProducto();
        $this->export_excel->to_excel($result, 'lista_de_productos');
    }

    /* function load_data()
    {
        $result = $this->mproducto->select();
        $output = '
            <h3 align="center">Detalle del archivo csv</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Cuenta</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Detalle</th>
                    </tr>
        ';
        $count = 0;
        if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $count = $count + 1;
                $output .= '
                    <tr>
                        <td>'.$count.'</td>
                        <td>'.$row->id_producto.'</td>
                        <td>'.$row->nombre.'</td>
                        <td>'.$row->cantidad.'</td>
                        <td>'.$row->descripcion.'</td>
                    </tr>
                '; 
            }
        }
        else
        {
            $output .= '
                <tr>
                    <td colspan="5" align="center">Datos no disponibles</td>
                </tr>
            ';
        }
        $output .= '</table></div>';
        echo $output;
    }

    function import()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row)
		{
			$data[] = array(
				'id_producto'	=>	$row["id_producto"],
        		'nombre'		=>	$row["nombre"],
        		'descripcion'	=>	$row["descripcion"],
        		'cantidad'		=>	$row["cantidad"]
            );
		}
		$this->mproducto->insert($data);
    } */
    
    public function llenarCombo()
    {
        $resultado = $this->mproducto->llenarCombo();

        echo json_encode($resultado);
    }

    public function complementoCombo()
    {
        $s = $this->input->post('id');
        $resultado = $this->mproducto->complementoCombo($s);

        echo json_encode($resultado);
    }
    
}

