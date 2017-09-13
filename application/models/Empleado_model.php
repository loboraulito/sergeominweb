<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empleado_model extends CI_Model {

        public function get_empleados()
        {
                $query = $this->db->get('empleado');
                return $query->result();
        }       

}