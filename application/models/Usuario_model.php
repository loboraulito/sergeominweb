<?php
/*
*/
class Usuario_model extends CI_Model{
            
    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('usuario',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update($id, $data)
    {
        $this->db->where('id_empleado', $id);
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
    
    function get_usuarios_empleado($id_empleado){
        $query = $this->db->query(
            'SELECT u.id_usuario, u.usuario,u.id_empleado,u.estado as u_estado,r.id_rol, ru.estado as ru_estado,r.rol 
            from usuario u
            join roles_usuario ru on (u.id_usuario = ru.id_usuario)
            join rol r on (r.id_rol = ru.id_rol) where id_empleado =?',array($id_empleado)
        );
        return $query->result();
    }

    function get_empleado_usuarios(){
        $query = $this->db->query(
            'SELECT u.id_usuario, u.usuario,u.id_empleado,u.estado as u_estado,r.id_rol, ru.estado as ru_estado,r.rol, e.* 
            from empleado e
            left join usuario u on (e.id_empleado = u.id_empleado)
            left join roles_usuario ru on (u.id_usuario = ru.id_usuario)
            left join rol r on (r.id_rol = ru.id_rol)'
        );
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
        $query = $this->db->query('
            SELECT * 
            FROM usuario u
                JOIN roles_usuario ru on (ru.id_usuario = u.id_usuario)
                JOIN rol r on (ru.id_rol = r.id_rol)
            WHERE u.usuario = ? 
            AND u.clave = md5(?)', 
            array($username, $password));
        return $query->row_array();
    }
}// fin class
