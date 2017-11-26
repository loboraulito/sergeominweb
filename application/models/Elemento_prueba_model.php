<?php
/*
*/
class Elemento_prueba_model extends CI_Model{
   function insert($data)
    {
        $this->db->set($data);
        $this->db->insert('elemento_prueba',$data);
    }

    function insert_elementos($id_prueba_lab_quimico,$elementos)
    {
        foreach ($elementos as $key => $elemento) {
            $data = array(          
                'id_prueba_lab_quimico'=>$id_prueba_lab_quimico,
                'id_cotizacion'=>$elemento            
            );
            $this->db->set($data);
            $this->db->insert('elemento_prueba',$data);
        }
        
    }

    function update($id, $data)
    {
        $this->db->where('id_elemento_prueba', $id);
        $this->db->update('elemento_prueba', $data);        
    }

    function delete($id)
    {   
        $data=array('estado'=>'I');
        $this->db->where('id_elemento_prueba', $id);
        $this->db->update('elemento_prueba', $data); 
    }

    function activar($id)
    {   
        $data=array('estado'=>'A');
        $this->db->where('id_elemento_prueba', $id);
        $this->db->update('elemento_prueba', $data); 
    }
    
    public function get_elemento_pruebas()
    {
            $query = $this->db->get('elemento_prueba');
            return $query->result();
    }       

}// fin class
