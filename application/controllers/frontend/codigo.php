<?php

class Codigo extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('tmpInicio');
        $this->layout->setTitle('Acceso Gratuito | Wow Share');
    }

    public function index() {
        $this->layout->view('codigo');
    }

}

