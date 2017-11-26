<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();  
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/logout
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$data['error'] = $this->input->get('error') | 0;	
		//echo "string".$error;	
	    $this->load->view('login/index',$data);
	    ///$this->load->view('template/template',$data);
	}

	public function login(){
		$data = array();
	    $usuario = $this->input->post('usuario');
	    $clave = $this->input->post('clave');
	    $usuario = $this->usuario_model->login($usuario, $clave);
	    if(count($usuario)!=0){
	    	$session = array(
	            'id_usuario' => $usuario['id_usuario'],
	            'usuario' => $usuario['usuario'],
	            'rol' => $usuario['rol'],
	            'id_rol' => $usuario['id_rol'],
	            'estado' => $usuario['estado'],
	            'id_empleado' => $usuario['id_empleado'],
	        );
	        $this->session->set_userdata($session);
	        //print_r($this->session);
	    } 
	    else redirect('login?error=1','refresh');
	    if($this->session->userdata('id_rol')==1){
	    	redirect('welcome','refresh');
	    }
	    else if($this->session->userdata('id_rol')==3){
	    	redirect('recepcionista/cliente','refresh');
	    }else if($this->session->userdata('id_rol')==5){
	    	redirect('encargado_lab_quimico/solicitud_analisis_lq','refresh');
	    }else{
	    	echo 'error';
	    	print_r($this->session);
	    }
	}

	public function logout()
	{
		$data = array();
	    $this->session->sess_destroy();
	    redirect('login/login','refresh');
		//$this->load->view('login/logout');
	}	    
}
