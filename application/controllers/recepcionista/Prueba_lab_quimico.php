<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba_lab_quimico extends CI_Controller {

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
	
	public function por_solicitud($id_solicitud_analisis_lq)
	{
		if($this->session->userdata('id_rol')==3){
			$data['contenido'] = 'recepcionista/prueba_lab_quimico'; 
			$data['usuario'] = $this->session->userdata('usuario');	  
			$data['prueba_lab_quimicos']=$this->prueba_lab_quimico_model->get_por_id_cliente($id_cliente);
			$data['id_solicitud_analisis_lq'] = $id_solicitud_analisis_lq;	  
			$datosCapsula['data']=$data;  
			$this->load->view('template/template',$datosCapsula);
		}else{
			redirect('login','refresh');
		}
	}
	
	public function nuevo(){   
		$data = $this->input->post();
		$data['id_usuario'] = $this->session->id_usuario;    
        $this->prueba_lab_quimico_model->insert($data);
	}

	public function editar($id){
	    $data = array(	        
	        'nombre'=>$this->input->post('nombre'),
            'apellido_paterno'=>$this->input->post('apellido_paterno'),
            'apellido_materno'=>$this->input->post('apellido_materno')     
	    );
	    
	    $this->prueba_lab_quimico_model->update($id,$data);
	}
    
    public function borrar($id){      
        
        $this->prueba_lab_quimico_model->delete($id);
    }

    public function activar($id){      
        
        $this->prueba_lab_quimico_model->activar($id);
    }
}
