<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente_model extends CI_Model{
         
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('cliente',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_cliente', $id);
        $this->db->update('cliente', $data);        
    }

    function delete($id)
    {
		$this->db->where('id_cliente', $id);
		$this->db->delete('cliente');
    }
    
    function get_todos(){
        $query = $this->db->query('SELECT * FROM cliente');
        return $query->result();
    }

    function get($id_cliente)
    {
        $query = $this->db->query('SELECT * FROM cliente WHERE id_cliente = ?',array($id_cliente));
        return $query->row();
    }
    
}// fin class
