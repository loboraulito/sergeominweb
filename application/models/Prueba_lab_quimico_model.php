<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prueba_lab_quimico_model extends CI_Model{
         
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('prueba_lab_quimico',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_prueba_lab_quimico', $id);
        $this->db->update('prueba_lab_quimico', $data);        
    }

    function delete($id)
    {
		$this->db->where('id_prueba_lab_quimico', $id);
		$this->db->delete('prueba_lab_quimico');
    }
    
    function get_todos(){
        $query = $this->db->query('SELECT * FROM prueba_lab_quimico');
        return $query->result();
    }

    function get_por_id_cliente($id_cliente){
        $query = $this->db->query('SELECT * FROM prueba_lab_quimico WHERE id_cliente = ?',array($id_cliente));
        return $query->result();
    }

    function get($id_prueba_lab_quimico)
    {
        $query = $this->db->query('SELECT * FROM prueba_lab_quimico WHERE id_prueba_lab_quimico = ?',array($id_prueba_lab_quimico));
        return $query->row();
    }
    
}// fin class
