<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Slides_Model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    function getSlides(){
        $query = $this->db
        ->from('slides')
        ->where('estatus = 1')
        ->get();
        return $query->result();
    }
    
    function countRows(){
        $query = $this->db
        ->from('slides')
        ->count_all_results();
        return $query;
    }
    
    
}