<?php
class Lectura_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
  
    function listaLecturas(){
        $query = $this->db->select('c.url, c.titulo, c.estatus, tc.anio, tc.enlace, a.autor, cat.categoria')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'c.id = tc.contenido_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->join('categoria as cat', 'c.categoria_id = c.id', 'LEFT')
        ->where('(tc.tipo = 2 OR tc.tipo = 3) AND c.estatus = 1')
        ->order_by('c.id', 'ASC')
        ->get();                       
        return $query->result();
    }
    
    //Muestra el detalle de lecturas por ID
    function detalleLectura($url){      
        $query = $this->db
        ->select('c.titulo, a.autor, tc.anio, c.fecha, tc.enlace')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'cat.id = tc.contenido_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->where('c.url', $url)
        ->get();                    
        return $query->row();
    }
}


