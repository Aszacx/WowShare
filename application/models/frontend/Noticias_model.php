<?php

class Noticias_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    //Genera lista de noticias
    function listaNoticias(){
        $query = $this->db
        ->from('noticias')
        ->where("tipo_noticia_id = 2 AND estatus = 1")
        ->order_by('id', 'ASC')
        ->get();
        return $query->result();
    }
    
    //Muestra el detalle de noticia por Titulo
    function detalleNoticia($url){
        $this->db->where('url', $url);
        $query = $this->db->get('noticias');
        return $query->row();
    }
}
