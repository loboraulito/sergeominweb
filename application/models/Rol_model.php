<?php
/*
*/
class Rol_model extends CI_Model{
         
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('rol',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_rol', $id);
        $this->db->update('rol', $data);        
    }

    function delete($id)
    {
		$this->db->where('id_rol', $id);
		$this->db->delete('rol');
    }
    
    function get_todos(){
        $query = $this->db->query('SELECT * FROM rol');
        return $query->result();
    }

    function get($id_rol)
    {
        $query = $this->db->query('SELECT * FROM rol WHERE id_rol = ?',array($id_rol));
        return $query->row();
    }
    
}// fin class
