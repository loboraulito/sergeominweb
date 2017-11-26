<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prueba_lab_quimico_model extends CI_Model{
         
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('prueba_lab_quimico',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
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

    function get_todos_con_elementos($id_solicitud_analisis_lq){
        $query = $this->db->query("SELECT   p.id_prueba_lab_quimico,
                p.numero_analisis,
                p.codigo_muestra_cliente,
                p.id_cotizacion,
                p.id_cliente,
                p.id_solicitud_analisis_lq, 
                GROUP_CONCAT(c.elemento SEPARATOR '-') as elementos
            FROM prueba_lab_quimico p
            left join elemento_prueba ep on (p.id_prueba_lab_quimico = ep.id_prueba_lab_quimico)
            left join cotizacion c on (c.id_cotizacion = ep.id_cotizacion)
            WHERE id_solicitud_analisis_lq = ?
            GROUP BY p.id_prueba_lab_quimico,
                p.numero_analisis,
                p.codigo_muestra_cliente,
                p.id_cotizacion,
                p.id_cliente,
                p.id_solicitud_analisis_lq
            ORDER BY p.id_prueba_lab_quimico;",array($id_solicitud_analisis_lq));
        return $query->result();
    }

    function get_por_id_solicitud_analisis_lq($id_solicitud_analisis_lq){
        $query = $this->db->query('SELECT * FROM prueba_lab_quimico WHERE id_solicitud_analisis_lq = ?',array($id_solicitud_analisis_lq));
        return $query->result();
    }

    function get($id_prueba_lab_quimico)
    {
        $query = $this->db->query('SELECT * FROM prueba_lab_quimico WHERE id_prueba_lab_quimico = ?',array($id_prueba_lab_quimico));
        return $query->row();
    }
    
}// fin class
