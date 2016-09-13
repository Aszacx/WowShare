<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('resetModel');

        $this->layout->setLayout('tmpInicio');
        $this->layout->setTitle('Recuperar Contraseña | Wow Share');
    }

    public function index() {
        $this->layout->view('reset');
    }

    function recuperar(){
        if($this->input->post()){
            if($this->form_validation->run('formContra')){
                $email = $this->input->post('email', TRUE);
                $datos['detalle'] = $this->resetModel->reset($email);
                $this->layout->view('reset', $datos);
            }
            //$this->layout->view('reset');
        }
    }
}
