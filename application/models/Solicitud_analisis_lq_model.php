<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Solicitud_analisis_lq_model extends CI_Model{
         
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('solicitud_analisis_lq',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_solicitud_analisis_lq', $id);
        $this->db->update('solicitud_analisis_lq', $data);        
    }

    function delete($id)
    {
		$this->db->where('id_solicitud_analisis_lq', $id);
		$this->db->delete('solicitud_analisis_lq');
    }
    
    function get_todos(){
        $query = $this->db->query('SELECT * FROM solicitud_analisis_lq');
        return $query->result();
    }

    function get_por_id_cliente($id_cliente){
        $query = $this->db->query('SELECT * FROM solicitud_analisis_lq WHERE id_cliente = ?',array($id_cliente));
        return $query->result();
    }

    function get($id_solicitud_analisis_lq)
    {
        $query = $this->db->query('SELECT * FROM solicitud_analisis_lq WHERE id_solicitud_analisis_lq = ?',array($id_solicitud_analisis_lq));
        return $query->row();
    }
    
}// fin class
