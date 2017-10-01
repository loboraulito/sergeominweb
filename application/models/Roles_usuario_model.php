<?php
/*
*/
class roles_usuario_model extends CI_Model{
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('roles_usuario',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_roles_usuario', $id);
        $this->db->update('roles_usuario', $data);        
    }

    function delete($id)
    {
		$this->db->where('id_roles_usuario', $id);
		$this->db->delete('roles_usuario');
    }
    
    function get_todos(){
        $query = $this->db->query('SELECT * FROM roles_usuario');
        return $query->result();
    }    
    
}// fin class
