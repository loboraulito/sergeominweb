<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empleado_model extends CI_Model {

	function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('empleado',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_empleado', $id);
        $this->db->update('empleado', $data);        
    }

    function delete($id)
    {   
        $data=array('estado'=>'I');
		$this->db->where('id_empleado', $id);
        $this->db->update('empleado', $data); 
    }

    function activar($id)
    {   
        $data=array('estado'=>'A');
		$this->db->where('id_empleado', $id);
        $this->db->update('empleado', $data); 
    }
    
    public function get_empleados()
    {
            $query = $this->db->get('empleado');
            return $query->result();
    }       

    function get($id)
    {           
        $query = $this->db->query('SELECT * FROM empleado WHERE id_empleado = ?',array($id));
        return $query->row();
    }

    function get_buscar_ci($ci){
        $query = $this->db->query('SELECT * FROM empleado WHERE ci = ?',array($ci));
        return $query->row();
    }
}