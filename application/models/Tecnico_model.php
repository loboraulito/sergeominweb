<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tecnico_model extends CI_Model{
         
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('tecnico',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_tecnico', $id);
        $this->db->update('tecnico', $data);        
    }

    function delete($id)
    {
		$this->db->where('id_tecnico', $id);
		$this->db->delete('tecnico');
    }
    
    function get_todos(){
        $query = $this->db->query('SELECT * FROM tecnico');
        return $query->result();
    }

    function get($id_tecnico)
    {
        $query = $this->db->query('SELECT * FROM tecnico WHERE id_tecnico = ?',array($id_tecnico));
        return $query->row();
    }

    function get_por_solicitud($id_solicitud_analisis_lq)
    {
        $query = $this->db->query('SELECT * FROM tecnico t
            join tecnico_cotizacion 
            WHERE id_solicitud_analisis_lq = ?',array($id_solicitud_analisis_lq));
        return $query->row();
    }
    
}// fin class
