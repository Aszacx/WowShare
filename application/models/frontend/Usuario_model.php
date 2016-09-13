<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    function login($email, $pass){
        $query = $this->db
        //->select('idUsuario, usuario, email, contrasena, tipo, estatus')
        ->from('usuario')
        ->where(array('email' => $email, 'contrasena' => $pass, 'tipo' => 3, 'estatus' => 1))
        ->count_all_results();
        //echo $this->db->last_query();
        return $query;
    }

    function getUsuario($email){
        $query = $this->db
        ->from('usuario')
        ->where('email', $email)
        ->get();
        return $query->row();
    }
}