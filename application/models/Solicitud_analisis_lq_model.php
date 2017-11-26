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

    function get_detalles($id_solicitud_analisis_lq)
    {
        $query = $this->db->query('SELECT s.*, count(p.id_prueba_lab_quimico) as cantidad_pruebas
FROM solicitud_analisis_lq s
left join prueba_lab_quimico p on (s.id_solicitud_analisis_lq = p.id_solicitud_analisis_lq)
WHERE s.id_solicitud_analisis_lq = ?
GROUP BY s.id_solicitud_analisis_lq;',array($id_solicitud_analisis_lq));
        return $query->row();
    }

    function get_elementos_cotizacion($id_solicitud_analisis_lq)
    {
        $query = $this->db->query('SELECT co.elemento,co.precio_unitario,count(co.id_cotizacion) as cantidad
from solicitud_analisis_lq s
left join prueba_lab_quimico p on  (p.id_solicitud_analisis_lq = s.id_solicitud_analisis_lq)
left join elemento_prueba ep on  (ep.id_prueba_lab_quimico = p.id_prueba_lab_quimico)
left join cotizacion co on  (co.id_cotizacion = ep.id_cotizacion)
where s.id_solicitud_analisis_lq = ?
group by co.id_cotizacion;',array($id_solicitud_analisis_lq));
        return $query->result();
    }
    
}// fin class
