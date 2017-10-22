<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$data['contenido'] = 'welcome_message'; 
		$data['usuario'] = $this->session->userdata('usuario');	  
	    $datosCapsula['data']=$data;  
	    $this->load->view('template/template',$datosCapsula);
	}

	public function saludar(){
		//$this->load->model('empleado_model');
		 $data['empleados'] = $this->empleado_model->get_empleados();
		$this->load->view('saludar',$data);
	}
}
