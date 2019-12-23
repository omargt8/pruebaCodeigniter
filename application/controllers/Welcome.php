<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mproducto');
		$this->load->library('export_excel');
	}

	public function index()
	{
        $this->load->view('v_dpdf');
        $this->load->view('layout/footer');		
	}

	public function descargar(){

		//Obtener Datos
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
		$output .= '</table></div>';
		$html2 = $output;
		//Fin Datos

		$data = [];

		$hoy = date("dmyhis");

        //load the view and saved it into $html variable
        $html = 
        "<style>@page {
			    margin-top: 0.5cm;
			    margin-bottom: 0.5cm;
			    margin-left: 0.5cm;
			    margin-right: 0.5cm;
			}
			</style>".
		"<body>
        	<div style='color:#006699;'><b>".$this->input->post('txtPDF')."<b></div>".
        		"<div style='width:50px; height:50px; background-color:red;'>asdf</div>
		</body>";
		
		//$html = $this->load->view('csvindex', $date,true);

        // $html = $this->load->view('v_dpdf',$date,true);
 		
 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "cipdf_".$hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4-L'); 
 		$mpdf->WriteHTML($html);
 		$mpdf->WriteHTML($html2);
		$mpdf->Output($pdfFilePath, "D");
       // //generate the PDF from the given html
       //  $this->m_pdf->pdf->WriteHTML($html);
 
       //  //download it.
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}

}
