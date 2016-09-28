<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    function login($email, $pass){
        $query = $this->db->select('id, email, contrasena', 'tipo', 'estatus')
        ->from('usuario')
        ->where(array('email' => $email, 'contrasena' => $pass, 'tipo' => 1, 'estatus' => 1))
        ->count_all_results();
        //echo $this->db->last_query();
        return $query;
    }

    //Listar Datos
    function obtenerUsuarios($buscar = NULL, $inicio = FALSE, $cantidad = FALSE){
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        }
        $query = $this->db
        ->select('u.id,u.nombre,u.apellido,u.email,p.pais,m.membresia, c.caducidad,fecha_registro,u.estatus')
        ->from('usuario as u')
        ->join('cliente as c','u.id = c.usuario_id','LEFT')
        ->join('pais as p', 'p.id = c.pais_id')
        ->join('membresia as m', 'm.id = c.membresia_id')
        ->where('u.tipo = 3')
        ->like('u.nombre', $buscar)
        ->or_like('u.apellido', $buscar)
        ->or_like('u.email', $buscar)
        ->order_by('u.nombre', 'ASC')
        ->get();                       
        return $query->result();
    }

    function obtenerContenidos($buscar = NULL, $inicio = FALSE, $cantidad = FALSE){
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        } 
        $query = $this->db
        ->select('c.id ,c.titulo, a.autor, cat.categoria, tc.anio, tc.enlace, c.estatus')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'c.id = tc.contenido_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->join('categoria as cat', 'c.categoria_id = cat.id', 'LEFT')
        ->like('c.titulo', $buscar)
        ->or_like('a.autor', $buscar)
        ->or_like('cat.categoria', $buscar)
        ->order_by('c.id', 'ASC')
        ->get();                   
        return $query->result();
    }

    function obtenerCategorias($buscar = NULL, $inicio = FALSE, $cantidad = FALSE){
        $this->db->like('categoria', $buscar)->order_by('categoria', 'ASC');
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        }
        $query = $this->db->get('categoria');
        return $query->result();
    }

    function obtenerAutores($buscar = NULL, $inicio = FALSE, $cantidad = FALSE) {
        $this->db->like('autor', $buscar)->order_by('autor', 'ASC');
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        }
        $query = $this->db->get('autor');
        return $query->result();
    }

    function obtenerPortadas($buscar = NULL, $inicio = FALSE, $cantidad = FALSE){
        $this->db->like('nombre', $buscar)->order_by('id', 'ASC');
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        }
        $query = $this->db->get('portada');
        return $query->result();
    }

    function obtenerSlides($buscar = NULL, $inicio = FALSE, $cantidad = FALSE){
        $this->db->where('tipo', $buscar)->order_by('id', 'ASC');
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        }
        $query = $this->db->get('slide');
        return $query->result();
    }

    function obtenerNoticias($buscar = NULL, $inicio = FALSE, $cantidad = FALSE){
        if ($inicio !== FALSE && $cantidad !== FALSE) {
            $this->db->limit($cantidad, $inicio);
        }
        $query = $this->db
        ->select('n.id, n.titulo, n.fecha, n.estatus, tn.tipo')
        ->from('noticias as n')
        ->join('tipo_noticia as tn','tn.id = n.tipo_noticia_id','LEFT')
        ->like('n.titulo', $buscar)
        ->or_like('tn.tipo', $buscar)
        ->order_by('n.id', 'DESC')
        ->get();                       
        return $query->result();
    }
    //Fin listar Datos

    //Guardar Datos
    function guardar($data_uno = FALSE, $data_dos = FALSE, $config = array()) {
        if($data_uno == TRUE && $data_dos == TRUE && $config == TRUE){
            $this->db->insert($config['t_uno'], $data_uno);
            $this->db
            ->set($config['foreign_id'], $this->db->insert_id())
            ->insert($config['t_dos'], $data_dos);
        }
        else if($data_uno == TRUE && $data_dos == FALSE && $config == TRUE){
            $this->db->insert($config['tabla'], $data_uno);
        }
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }  
    }
    //Fin guardar Datos

    //Editar Datos
    function getUsuario($id){
        $query = $this->db
        ->select('u.tipo, u.nombre, u.apellido, u.email, u.estatus, p.id, m.id, u.contrasena')
        ->from('usuario as u')
        ->join('cliente as c','u.id = c.usuario_id','LEFT')
        ->join('pais as p', 'p.id = c.pais_id')
        ->join('membresia as m', 'm.id = c.membresia_id')
        ->where('u.id', $id)
        ->get();                       
        return $query->row();
    }
    
    function getContenido($id){
        $query = $this->db
        ->select('c.titulo, c.estatus, a.id, cat.id, tc.anio, tc.enlace, tc.tipo, p.id')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'c.id = tc.contenido_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->join('categoria as cat', 'c.categoria_id = cat.id', 'LEFT')
        ->join('portada as p', 'c.portada_id = p.id', 'LEFT')
        ->where('c.id', $id)
        ->get();                       
        return $query->row();
    }

    //Obtener datos para llenar formulario de editar
    function getRegistro($id, $tabla) {
        $query = $this->db
        ->from($tabla)
        ->where('id', $id)
        ->get();                       
        return $query->row();
        //autor, categoria, slide, noticia
    }

    //Fin editar Datos

    //Actualizar Datos
    function actualizarUsuario($datos, $data){
        $this->db->where('id', $datos['id']);
        $this->db->update('usuario', $datos);
        $data2 = array(
            'pais_id' => $data['pais'],
            'membresia_id' => $data['membresia']
        );
        $this->db->where('usuario_id', $datos['id']);
        $this->db->update('cliente', $data2);
    }

    function actualizarContenido($datos, $data){
        $this->db->where('id', $datos['id']);
        $this->db->update('contenido', $datos);
         
        if($this->db->affected_rows() > 0) {
            $dato = array(
                'tipo' => $data['tipo'],
                'enlace' => $data['enlace'],
                'anio' => $data['anio'],
            );
            $this->db->where('contenido_id', $datos['id']);
            $this->db->update('tipo_contenido', $dato);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function actualizarRegistro($datos, $tabla){
        $this->db->where('id', $datos['id']);
        $this->db->update($tabla, $datos);
        if($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        //Autor, categoria
    }

    //Fin actualizar Datos

    //Eliminar Datos
    function eliminarRegistro($data){
        if($data['t_uno'] == TRUE && $data['t_dos'] == TRUE){
            $this->db->delete($data['t_dos'], array($data['foreign_id'] => $data['id']));
            $this->db->delete($data['t_uno'], array($data['primary_id'] => $data['id']));
        }
        else if($data['t_uno'] == TRUE && $data['t_dos'] == FALSE){
            $this->db->delete($data['t_uno'], array($data['primary_id'] => $data['id']));
        }
        if($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    //Fin eliminar Datos

    //Estatus Datos
    function actualizarEstatus($id, $estatus, $tabla){
        $this->db->where('id', $id);
        $this->db->update($tabla, array('estatus' => $estatus));
        if($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        //usuario, contenido, slides, noticias
    }

    //Fin estatus Datos

    //Filtrar Datos
    function filtrarContenido($filtro){
         $query = $this->db
        ->select('c.id, c.titulo, a.autor, c.categoria, tc.anio, tc.enlace, tc.tipo, c.estatus')
        ->from('contenido as c')
        ->join('tipo_contenido as tc', 'c.id = tc.catalogo_id', 'LEFT')
        ->join('autor as a', 'c.autor_id = a.id', 'LEFT')
        ->join('categoria as cat', 'c.categoria_id = cat.id', 'LEFT')
        ->like('tc.tipo', $filtro)
        ->order_by('c.id', 'ASC')      
        ->get();                       
        return $query->result();
    }
    //Fin filtrar Datos

    //Listar en campo select formulario Datos
    function listarDatos($tabla){
        $query = $this->db
        ->from($tabla)
        ->order_by("id", "ASC")
        ->get();
        return $query->result();
        //pais, membresia, autor, categoria, tipo_noticias
    }

    //Fin listar en formulario Datos
}