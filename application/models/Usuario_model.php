<?php
/*
*/
class Usuario_model extends CI_Model{
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('usuario',$data);
    }

    function update($id, $data)
    {
        $this->db->where('id_usuario', $id);
        $this->db->update('usuario', $data);        
    }

    function delete($id)
    {
		$this->db->where('id_usuario', $id);
		$this->db->delete('usuario');
    }
    
    function get_todos(){
        $query = $this->db->query('SELECT * FROM usuario');
        return $query->result();
    }
    
       
    public function get_todos_limite($limite, $inicio) {
        $this->db->limit($limite, $inicio);
        $query = $this->db->get("usuario");        
        return $query->result();
    }
    
    public function get_contar_todos() {        
        return $this->db->count_all('usuario');
    }
    
    function getbuscar($id_usuario)
    {
        $query = $this->db->query('SELECT * FROM usuario WHERE id_usuario = ?',array($id_usuario));
        return $query->row();
    }

    function getbuscar_todos($id_empleado)
    {
        $query = $this->db->query('SELECT * FROM usuario WHERE id_empleado = ?',array($id_empleado));
        return $query->result();
    }
    
    function login($username, $password)
    {
        $query = $this->db->query('SELECT * FROM usuario WHERE usuario = ? AND clave = md5(?)', array($username, $password));
        return $query->row_array();
    }
}// fin class
