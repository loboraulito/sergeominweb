<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnico_lab_quimico extends CI_Controller {

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
	
	public function asignaciones()
	{
		
		$data['contenido'] = 'labquimico/asignaciones'; 
		$data['usuario'] = $this->session->userdata('usuario');
		$datosCapsula['data']=$data;  
		$this->load->view('template/template',$datosCapsula);
		
	}
	
	public function nuevo(){   
		//$data = $this->input->post();
		$data = array(	        
	        'codigo_muestra_cliente'=>$this->input->post('codigo_muestra_cliente'),
            'id_solicitud_analisis_lq'=>$this->input->post('id_solicitud_analisis_lq')            
	    );
		//$data['id_usuario'] = $this->session->id_usuario;   
		//print_r($data); 
		//print_r($this->input->post('elementos')); 
		$elementos = explode(',', $this->input->post('elementos'));
		//print_r($elems);
        $id_prueba_lab_quimico = $this->prueba_lab_quimico_model->insert($data);
        $this->elemento_prueba_model->insert_elementos($id_prueba_lab_quimico,$elementos);
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
