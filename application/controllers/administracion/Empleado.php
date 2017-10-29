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
        $data = array(
                'nombre'=>$this->input->post('nombre'),
                'apellido_paterno'=>$this->input->post('apellido_paterno'),
                'apellido_materno'=>$this->input->post('apellido_materno')              
            );
        $this->empleado_model->insert($data);
	}

	public function editar($id){
	    $data = array(	        
	        'nombre'=>$this->input->post('nombre'),
            'apellido_paterno'=>$this->input->post('apellido_paterno'),
            'apellido_materno'=>$this->input->post('apellido_materno')     
	    );
	    
	    $this->empleado_model->update($id,$data);
	}
    
    public function borrar($id){      
        
        $this->empleado_model->delete($id);
    }

    public function activar($id){      
        
        $this->empleado_model->activar($id);
    }
}
