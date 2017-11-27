<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cotizacion_model extends CI_Model{
         
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('cotizacion',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_cotizacion', $id);
        $this->db->update('cotizacion', $data);        
    }

    function delete($id)
    {
		$this->db->where('id_cotizacion', $id);
		$this->db->delete('cotizacion');
    }
    
    function get_todos(){
        $query = $this->db->query('SELECT * FROM cotizacion');
        return $query->result();
    }

    function get($id_cotizacion)
    {
        $query = $this->db->query('SELECT * FROM cotizacion WHERE id_cotizacion = ?',array($id_cotizacion));
        return $query->row();
    }

    function get_por_tipo_cotizacion($tipo_cotizacion){
        $query = $this->db->query('SELECT * FROM cotizacion WHERE tipo_cotizacion = ?',array($tipo_cotizacion));
        return $query->result();
    }

    function get_por_solicitud($id_solicitud_analisis_lq){
        $query = $this->db->query('SELECT distinct (c.id_cotizacion) as rep_id,c.* FROM cotizacion c
            join elemento_prueba ep on (ep.id_cotizacion = c.id_cotizacion)
            join prueba_lab_quimico p on (ep.id_prueba_lab_quimico = p.id_prueba_lab_quimico)
            join solicitud_analisis_lq s on (p.id_solicitud_analisis_lq = s.id_solicitud_analisis_lq)
            WHERE s.id_solicitud_analisis_lq = ?',array($id_solicitud_analisis_lq));
        return $query->result();
    }
    
}// fin class
