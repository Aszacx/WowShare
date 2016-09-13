<?php

class Registro extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('tmpInicio');
        $this->layout->setTitle('Registro | Wow Share');
        $this->load->model('adminModel');
    }

    public function index() {
    	$datos['paises'] = $this->adminModel->getPais();
        $this->layout->view('regCaptura', $datos);
    }

}
