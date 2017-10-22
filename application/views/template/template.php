<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('template/header',$data);
$this->load->view($data['contenido'],$data);
$this->load->view('template/footer');