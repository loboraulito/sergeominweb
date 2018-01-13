<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
			$data['usuarios']=$this->usuario_model->get_usuarios();			
			$datosCapsula['data']=$data;  
			$this->load->view('template/template',$datosCapsula);
		}else{
			redirect('login','refresh');
		}
	}

	public function empleados()
	{
		if($this->session->userdata('id_rol')==1){
			$data['contenido'] = 'administracion/usuarios'; 
			$data['roles']=$this->rol_model->get_todos();
			$data['usuario'] = $this->session->userdata('usuario');	  
			$data['usuarios']=$this->usuario_model->get_empleado_usuarios();			
			$datosCapsula['data']=$data;  
			$this->load->view('template/template',$datosCapsula);
		}else{
			redirect('login','refresh');
		}
	}
	
	public function nuevo(){
		$data = $this->input->post();
		$data_usuario['id_empleado'] = $data['id_empleado'];
		$data_usuario['usuario'] = $data['usuario'];
		$data_usuario['clave'] = md5($data['clave']);
        $id_usuario = $this->usuario_model->insert($data_usuario);
        $data_rol['id_usuario'] = $id_usuario;
        $data_rol['id_rol'] = $data['id_rol'];
        $this->roles_usuario_model->insert($data_rol);
	}

	public function editar($id){
	    $data = $this->input->post();		
		$data_usuario['usuario'] = $data['usuario'];
		$data_usuario['clave'] = md5($data['clave']);
        $this->usuario_model->update($id,$data_usuario);
        $usuarios = $this->usuario_model->get_usuarios_empleado($id);
        $id_usuario = $usuarios[0]->id_usuario;        
        $data_rol['id_rol'] = $data['id_rol'];
        $this->roles_usuario_model->update($id_usuario,$data_rol);
	}
    
    public function borrar($id){      
        
        $this->usuario_model->delete($id);
    }

    public function activar($id){      
        
        $this->usuario_model->activar($id);
    }

    public function listar_usuarios_empleado($id_empleado){
    	if($this->session->userdata('id_rol')==1){
			$data['contenido'] = 'administracion/usuarios'; 
			$data['usuario'] = $this->session->userdata('usuario');	  
			$data['usuarios']=$this->usuario_model->get_usuarios_empleado($id_empleado);
			$data['roles']=$this->rol_model->get_todos();
			$data['id_empleado']=$id_empleado;
			$datosCapsula['data']=$data;  
			$this->load->view('template/template',$datosCapsula);
		}else{
			redirect('login','refresh');
		}
    }
}
