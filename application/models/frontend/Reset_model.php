<?php
class resetModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function reset($email){
        $query = $this->db
        ->select('*')
        ->from('usuario')
        ->where('email', $email)
        //->count_all_results();
        ->get();
        return $query->row();
    }
    
}
