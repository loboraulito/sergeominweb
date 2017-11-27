<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tecnico_cotizacion_model extends CI_Model{
         
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('tecnico_cotizacion',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_tecnico_cotizacion', $id);
        $this->db->update('tecnico_cotizacion', $data);        
    }

    function delete($id)
    {
		$this->db->where('id_tecnico_cotizacion', $id);
		$this->db->delete('tecnico_cotizacion');
    }
    
    function get_todos(){
        $query = $this->db->query('SELECT * FROM tecnico_cotizacion');
        return $query->result();
    }

    function get($id_tecnico_cotizacion)
    {
        $query = $this->db->query('SELECT * FROM tecnico_cotizacion WHERE id_tecnico_cotizacion = ?',array($id_tecnico_cotizacion));
        return $query->row();
    }

    function get_por_solicitud($id_solicitud_analisis_lq)
    {
        $query = $this->db->query('SELECT * FROM tecnico_cotizacion WHERE id_solicitud_analisis_lq = ?',array($id_solicitud_analisis_lq));
        return $query->row();
    }
    
}// fin class
