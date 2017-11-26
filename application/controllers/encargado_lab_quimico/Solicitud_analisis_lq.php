<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud_analisis_lq extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();  
    }
	
	public function index()
	{
		if($this->session->userdata('id_rol')==5){
			$data['contenido'] = 'encargado_lab_quimico/solicitud_analisis_lq'; 
			$data['usuario'] = $this->session->userdata('usuario');	  
			$data['solicitud_analisis_lqs']=$this->solicitud_analisis_lq_model->get_todos();
			$data['id_cliente'] = 0;	  
			$datosCapsula['data']=$data;  
			$this->load->view('template/template',$datosCapsula);
		}else{
			redirect('login','refresh');
		}
	}
	
	public function nuevo(){   
		$data = $this->input->post();
		$data['id_usuario'] = $this->session->id_usuario;    
        $this->solicitud_analisis_lq_model->insert($data);
	}

	public function editar($id){
	    $data = array(	        
	        'nombre'=>$this->input->post('nombre'),
            'apellido_paterno'=>$this->input->post('apellido_paterno'),
            'apellido_materno'=>$this->input->post('apellido_materno')     
	    );
	    
	    $this->solicitud_analisis_lq_model->update($id,$data);
	}
    
    public function borrar($id){      
        
        $this->solicitud_analisis_lq_model->delete($id);
    }

    public function activar($id){      
        
        $this->solicitud_analisis_lq_model->activar($id);
    }

    public function imprimir($id_solicitud_analisis_lq){
    	$solicitud = $this->solicitud_analisis_lq_model->get_detalles($id_solicitud_analisis_lq);
        $cliente = $this->cliente_model->get($solicitud->id_cliente);
        $pruebas=$this->prueba_lab_quimico_model->get_todos_con_elementos($id_solicitud_analisis_lq);
        $cotizaciones=$this->solicitud_analisis_lq_model->get_elementos_cotizacion($id_solicitud_analisis_lq);

        //print_r($solicitud);
        
        $this->load->library('Pdf');
        $pdf = new Pdf('I', 'mm', 'usletter', true, 'UTF-8', false); // 'I'' es para horizon;a pagina horizontal 'P' vertical
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('UTO');
        $pdf->SetTitle('Universidad Técnica de Oruro');
        $pdf->SetSubject('SisCat.UTO');
        $pdf->SetKeywords('uto');
        
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'SERGEOMIN', 'SergeominWeb', array(
            0,
            0,
            0
        ), array(
            0,
            64,
            128
        ));
        $pdf->setFooterData(array(
            0,
            64,
            0
        ), array(
            0,
            64,
            128
        ));
        
        // set header and footer fonts
        $pdf->setHeaderFont(Array(
            PDF_FONT_NAME_MAIN,
            '',
            PDF_FONT_SIZE_MAIN
        ));
        $pdf->setFooterFont(Array(
            PDF_FONT_NAME_DATA,
            '',
            PDF_FONT_SIZE_DATA
        ));
        
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once (dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        
        // ---------------------------------------------------------
        
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
        
        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        // $pdf->SetFont('dejavusans', '', 14, '', true);
        
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();
        
        $pdf->SetFont('helvetica', '', 7);        
        
		$nro = 1; 

        $texto='';
        foreach ($pruebas as $prueba){
            $texto=$texto.'<tr>   
	        <td class="tg-yw4l">'.$nro++.'</td>
            <td class="tg-yw4l" colspan="2">'.$prueba->codigo_muestra_cliente.'</td>
            <td class="tg-yw4l" colspan="2">'.$prueba->elementos.'</td>
            <td class="tg-yw4l">'.$prueba->id_prueba_lab_quimico.'</td>            
		</tr>';
        }     


        $nro1 = 1; 
        $total = 0;

        $texto1='';

        foreach ($cotizaciones as $cotizacion){
        	$total = $total + ($cotizacion->cantidad*$cotizacion->precio_unitario);
            $texto1=$texto1.'<tr>   
	        <td class="tg-yw4l">'.$nro1++.'</td>
            <td class="tg-yw4l">'.$cotizacion->elemento.'</td>
            <td class="tg-yw4l" align="right">'.$cotizacion->cantidad.'</td>
            <td class="tg-yw4l" align="right">'.$cotizacion->precio_unitario.'</td>
            <td class="tg-yw4l" align="right">'.number_format(($cotizacion->cantidad*$cotizacion->precio_unitario), 2, ',', '.').'</td>
            <td class="tg-yw4l"></td>          
		</tr>';
        }        
   		
   		$total_impr = number_format($total, 2, ',', '.');

        $html = <<<EOD


<table class="tg" border="1" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tg-yw4l" width="30"></td>
    <td class="tg-yw4l" width="90"></td>
    <td class="tg-yw4l" width="150"></td>
    <td class="tg-yw4l" width="150"></td>
    <td class="tg-yw4l" width="90"></td>
    <td class="tg-yw4l" width="120"></td>
  </tr>	
  <tr>
    <th class="tg-031e" colspan="6" align="center"><h2>FORMULARIO DE INGRESO DE MUESTRAS QMC <strong>Nro. $solicitud->id_solicitud_analisis_lq</strong></h2></th>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"></td>
    <td class="tg-yw4l" colspan="4" align="center">
    	<h4>SERVICIO NACIONAL DE GEOLOGÍA Y TECNICO DE MINAS</h4>
		<h4>"SERGEOTECMIN"</h4>
		<h4>DEPARTAMENTO DE MINERIA Y METALURGIA</h4>
		<h4>ORURO - BOLIVIA</h4>
    </td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="6"><strong>Datos del cliente o empresa</strong></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><strong>Empresa o Proyecto:</strong></td>
    <td class="tg-yw4l" colspan="2">$cliente->nombre_empresa</td>
    <td class="tg-yw4l" colspan="2"><strong>NIT:</strong>$cliente->nit</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><strong>Responsable:</strong></td>
    <td class="tg-yw4l" colspan="4">$cliente->nombre_responsable</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><strong>Dirección del resp:</strong></td>
    <td class="tg-yw4l" colspan="4">$cliente->direccion</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><strong>Departamento:</strong></td>
    <td class="tg-yw4l" colspan="4">$cliente->departamento</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><strong>Telefonos:</strong></td>
    <td class="tg-yw4l" colspan="4">$cliente->numero_telefono $cliente->numero_celular</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><strong>Correo Electrónico:</strong></td>
    <td class="tg-yw4l" colspan="4">$cliente->email</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="6"><strong>Datos de la Muestra</strong></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2" rowspan="2"><strong>Nro. de Orden:</strong></td>
    <td class="tg-yw4l" rowspan="2"><h1><strong>$solicitud->id_solicitud_analisis_lq</strong></h1></td>
    <td class="tg-yw4l"><strong>Fecha de Recepción:</strong></td>
    <td class="tg-yw4l" colspan="2">$solicitud->fecha_recepcion</td>
  </tr>
  <tr>
    <td class="tg-yw4l"><strong>Hoja de ruta:</strong></td>
    <td class="tg-yw4l" colspan="2"><strong>$solicitud->numero_hoja_ruta</strong></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><strong>Cant. de Muestras:</strong></td>
    <td class="tg-yw4l">$solicitud->cantidad_pruebas</td>
    <td class="tg-yw4l"><strong>Fecha de Entrega:</strong></td>
    <td class="tg-yw4l" colspan="2">$solicitud->fecha_entrega</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><strong>Tipo de Muestra:</strong></td>
    <td class="tg-yw4l" colspan="4">$solicitud->tipo_muestra</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><strong>Procedencia:</strong></td>
    <td class="tg-yw4l" colspan="4">$solicitud->procedencia</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="6"><strong>Analisis por:</strong></td>
  </tr>
  <tr>
    <td class="tg-yw4l"><strong>Nro.</strong></td>
    <td class="tg-yw4l" colspan="2"><strong>Código</strong></td>
    <td class="tg-yw4l" colspan="2"><strong>Elemento(s)</strong></td>
    <td class="tg-yw4l"><strong>Nro. de Análisis:</strong></td>
  </tr>
  $texto
  <tr>
    <td class="tg-yw4l" colspan="6"><strong>Observaciones:</strong></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="6"><strong>Costos:</strong></td>
  </tr>
  <tr>
    <td class="tg-yw4l" ><strong>Nro.</strong></td>
    <td class="tg-yw4l" ><strong>Detalle</strong></td>
    <td class="tg-yw4l" ><strong>Nro. Muestras</strong></td>
    <td class="tg-yw4l" ><strong>P. Unit. Bs.</strong></td>
    <td class="tg-yw4l" ><strong>P. Total Bs.</strong></td>
    <td class="tg-yw4l" ><strong>Observaciones</strong></td>
  </tr>
  $texto1
  <tr>
    <td class="tg-yw4l" colspan="4"><strong>Pulverización, por muestras:</strong></td>
    <td class="tg-yw4l" align="right">0,00</td>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="4"><strong>preparación de muestras: (trituración, molienda)</strong></td>
    <td class="tg-yw4l" align="right">0,00</td>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="4"><strong>Precio Total (incluye impuestos de ley):</strong></td>
    <td class="tg-yw4l" align="right"><h2>$total_impr</h2></td>
    <td class="tg-yw4l"></td>
  </tr>  
  <tr>
  	<td class="tg-yw4l"></td>
    <td class="tg-yw4l" colspan="2" rowspan="3"></td>
    <td class="tg-yw4l" colspan="3" rowspan="3"></td>
  </tr>
  <tr>
  	<td class="tg-yw4l"></td>
  </tr>
  <tr>
  	<td class="tg-yw4l"></td>
  </tr>
  <tr>
  	<td class="tg-yw4l"></td>
    <td class="tg-yw4l" colspan="2"><strong>Firma del Responsable</strong></td>
    <td class="tg-yw4l" colspan="3"><strong>Firma Recepcionista</strong></td>
  </tr>
</table>
EOD;
        
        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        
        // ---------------------------------------------------------
        
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        ob_end_clean();
        $pdf->Output('pdfexample.pdf', 'I');
    }
}
