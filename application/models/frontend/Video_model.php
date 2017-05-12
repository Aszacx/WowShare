<?php
class Video_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function listaVideos(){
        $query = $this->db->select('c.url, c.titulo, a.autor, tc.anio, tc.enlace')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'c.id = tc.contenido_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->where('tc.tipo = 4 AND c.estatus = 1')
        ->order_by('c.id', 'ASC')      
        ->get();                       
        return $query->result();
    }

    function slideVideo($cantidad, $inicio){
        $query = $this->db->select('*')
        ->from('portada')
        ->limit($cantidad, $inicio)
        /*$query = $this->db->select('c.titulo', 'a.autor', 'tc.enlace', 'p.nombre', 'p.miniatura')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'c.id = tc.contenido_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->join('portada as p', 'c.portada_id = p.id', 'LEFT')
        ->where('tc.tipo = 4')
        ->order_by('c.id', 'ASC')*/      
        ->get();                  
        return $query->result();
    }
  
    //Muestra el detalle de noticia por Titulo
    function detalleVideo($url){
        $query = $this->db->select('c.titulo, c.descripcion, a.autor, tc.anio, tc.enlace, cat.categoria, p.nombre, p.miniatura, p.ruta')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'c.id = tc.contenido_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->join('categoria as cat', 'c.categoria_id = cat.id', 'LEFT')
        ->join('portada as p', 'c.portada_id = p.id', 'LEFT')
        ->where('c.url', $url)
        ->get();
        return $query->row();
    }
}
