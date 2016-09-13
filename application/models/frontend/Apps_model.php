<?php
class Apps_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function listaApps(){
        $query = $this->db->select('c.url, c.titulo, a.autor, tc.anio, tc.enlace')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'c.id = tc.contenido_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->where('tc.tipo = 1 AND c.estatus = 1')
        ->order_by('c.id', 'ASC')      
        ->get();                       
        return $query->result();
    }
  
    //Muestra el detalle de noticia por Titulo
    function detalleApps($url){
        $query = $this->db
        ->select('c.titulo, a.autor, tc.anio, c.fecha, tc.enlace')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'c.id = tc.contenido_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->where('c.url', $url)
        ->get();
        return $query->row();
    }
}
