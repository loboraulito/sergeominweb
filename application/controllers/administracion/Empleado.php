<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {

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
		if($this->session->userdata('id_rol')==1){
			$data['contenido'] = 'administracion/index'; 
			$data['usuario'] = $this->session->userdata('usuario');	  
			$data['empleados']=$this->empleado_model->get_empleados();
			$datosCapsula['data']=$data;  
			$this->load->view('template/template',$datosCapsula);
		}else{
			redirect('login','refresh');
		}
	}
	
	public function nuevo(){
        /*$data = array(
                'nombre'=>$this->input->post('nombre'),
                'apellido_paterno'=>$this->input->post('apellido_paterno'),
                'apellido_materno'=>$this->input->post('apellido_materno')              
            );
        $this->empleado_model->insert($data);*/

        $data = $this->input->post();
		//$data['id_usuario'] = $this->session->id_usuario;    
        $this->empleado_model->insert($data);
	}

	public function editar($id){
	    $data = $this->input->post();
	    
	    $this->empleado_model->update($id,$data);
	}
    
    public function borrar($id){      
        
        $this->empleado_model->delete($id);
    }

    public function activar($id){      
        
        $this->empleado_model->activar($id);
    }

    public function verificar_ci($estado){

      $ci = $this->input->get('ci');
      $existe = $this->empleado_model->get_buscar_ci($ci);
       
      if((!$existe && $estado!=1) || ($estado==1 && $existe->ci==$ci)) {
          $this->output->set_status_header('200');
      }
      else $this->output->set_status_header('404');
    }

    public function imprimir($id_empleado){

        $empleado = $this->empleado_model->get($id_empleado);

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'usletter', true, 'UTF-8', false); // 'I'' es para horizon;a pagina horizontal 'P' vertical
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Viviana');
        $pdf->SetTitle('SergeominWeb');
        $pdf->SetSubject('SergeominWeb');
        $pdf->SetKeywords('sergeomin empleado imprimir');
        
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
        
        $resul = print_r($empleado);  
        $html = <<<EOD


<table class="tg" border="1" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tg-yw4l" width="100"></td>
    <td class="tg-yw4l" width="300"></td>    
  </tr>	
  <tr>
    <th class="tg-031e" colspan="2" align="center"><h2>DATOS DE EMPLEADO</h2></th>
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>Nombre:</strong></td>
    <td class="tg-031e" align="left">$empleado->nombre</td>
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>Apellido Paterno:</strong></td>
    <td class="tg-031e" align="left">$empleado->apellido_paterno</td>
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>Apellido Materno:</strong></td>
    <td class="tg-031e" align="left">$empleado->apellido_materno</td>    
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>CI:</strong></td>
    <td class="tg-031e" align="left">$empleado->ci</td>    
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>Fecha Nacimiento:</strong></td>
    <td class="tg-031e" align="left">$empleado->fecha_nacimiento</td>    
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>Lugar de Nacimiento:</strong></td>
    <td class="tg-031e" align="left">$empleado->lugar_nacimiento</td>    
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>Dirección:</strong></td>
    <td class="tg-031e" align="left">$empleado->direccion</td>    
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>Celular:</strong></td>
    <td class="tg-031e" align="left">$empleado->celular</td>    
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>Telefono:</strong></td>
    <td class="tg-031e" align="left">$empleado->telefono</td>    
  </tr>
  <tr>
    <td class="tg-031e" align="right"><strong>Email:</strong></td>
    <td class="tg-031e" align="left">$empleado->email</td>    
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
