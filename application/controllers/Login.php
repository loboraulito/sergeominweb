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
	    if($usuario) redirect('welcome','refresh');
	    else redirect('login?error=1','refresh');
	}

	public function logout()
	{
		$this->load->view('login/logout');
	}
}
