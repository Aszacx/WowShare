<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    private $session_id;

    public function __construct() {
        parent::__construct();

        $this->load->model('frontend/Noticias_model');
        $this->load->model('frontend/Lectura_model');
        $this->load->model('frontend/Video_model');
        $this->load->model('frontend/Apps_model');
        $this->load->model('frontend/Slides_model');

        $this->layout->setLayout('tmp_usuario');
        $this->layout->css(array(
			base_url().'assets/bootstrap-3.3.6/css/bootstrap.min.css',
			base_url().'assets/formvalidation.io-0.7/css/formValidation.min.css',
			base_url().'assets/font-awesome-4.5.0/css/font-awesome.min.css',
			base_url().'assets/wow/css/estilos.css'	            
	    ));
	    $this->layout->js(array(
			base_url().'assets/jquery-2.1.4/jquery-2.1.4.min.js',
			base_url().'assets/bootstrap-3.3.6/js/bootstrap.min.js'
	    ));
        $this->layout->setTitle('Ingresar | Wow Share');
        $this->load->model('frontend/Usuario_model');
        $this->session_id = $this->session->userdata('email');
    }

    function index() {
    	if (!empty($this->session_id)) {
        	$this->layout->setTitle('Bienvenido | Wow Share');
        	$datos['noticias'] = $this->Noticias_model->listaNoticias();
            $datos['slides'] = $this->Slides_model->getSlides();
            $datos['session'] = $this->session_id;
        	$this->layout->view('home', $datos);
        }
        else{
			redirect(base_url().'login', 301);
		}
    }

    function login(){
    	$this->layout->setLayout('tmp_inicio');
    	$this->layout->css(array(
			base_url().'assets/bootstrap-3.3.6/css/bootstrap.min.css',
			base_url().'assets/formvalidation.io-0.7/css/formValidation.min.css',
			base_url().'assets/font-awesome-4.5.0/css/font-awesome.min.css',
			base_url().'assets/wow/css/estilos.css'	            
	    ));
	    $this->layout->js(array(
			base_url().'assets/jquery-2.1.4/jquery-2.1.4.min.js',
			base_url().'assets/bootstrap-3.3.6/js/bootstrap.min.js'
	    ));
		if ($this->input->post()) {
			//die(sha1($this->input->post('pass', TRUE)));
			$datos = $this->Usuario_model->login($this->input->post('email', TRUE), sha1($this->input->post('pass', TRUE)));
			//echo $datos; exit();
			if ($datos == 1) {
				$this->session->set_userdata("wow");
                $this->session->set_userdata('email', $this->input->post('email', TRUE));
                redirect(base_url(),  301);
			}
			else{
				$this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
				//redirect(base_url().'login',  301);
			}
		}
		$this->layout->view('login');
	}

	function logout(){
		$this->session->unset_userdata(array('email' => ''));
		$this->session->sess_destroy("wow");
		redirect(base_url().'login',  301);
	}

	function cuenta() {
    	if (!empty($this->session_id)) {
        	$this->layout->setTitle('Mi Cuenta | Wow Share');
    		$datos['usuario'] = $this->Noticias_model->listaNoticias();

        	$this->layout->view('cuenta', $datos);
        }
        else{
			redirect(base_url().'login', 301);
		}
    }

    function noticias() {
    	if (!empty($this->session_id)) {
        	$this->layout->setTitle('Noticias | Wow Share');
    		$datos['noticias'] = $this->Noticias_model->listaNoticias();
        	$this->layout->view('noticias', $datos);
        }
        else{
			redirect(base_url().'login', 301);
		}
    }

    function detalleNoticia($url){
    	if (!empty($this->session_id)) {
	        $urlLimpia = $this->security->xss_clean($url);
	        $datos['detalle'] = $this->Noticias_model->detalleNoticia($urlLimpia);
	        $titulo = $datos['detalle']->titulo;
	        $this->layout->setTitle($titulo.' | Wow Share');
	        $this->layout->view('details/detalle_noticia', $datos);
	    }
	    else{
			redirect(base_url().'login', 301);
		}
    }

    function lecturas() {
    	if (!empty($this->session_id)) {
        	$this->layout->setTitle('Lecturas | Wow Share');
    		$datos['catalogo'] = $this->Lectura_model->listaLecturas();
        	$this->layout->view('lecturas', $datos);
        }
        else{
			redirect(base_url().'login', 301);
		}
    }

    function detalleLectura($url){
    	if (!empty($this->session_id)) {
	        $urlLimpia = $this->security->xss_clean($url);
	        $datos['detalle'] = $this->Lectura_model->detalleLectura($urlLimpia);
	        $titulo = $datos['detalle']->titulo;
	        $this->layout->setTitle($titulo.' | Wow Share');
	        $this->layout->view('details/detalle_lectura', $datos);
	    }
	    else{
			redirect(base_url().'login', 301);
		}
    }

    function videos() {
    	if (!empty($this->session_id)) {
    		$this->layout->setTitle('Video | Wow Share');
	        //$this->layout->js(array(base_url()."assets/jw/jwplayer.js",
            //    base_url()."assets/jw/jwplatform.js",
            //    base_url()."assets/jw/key.js"));
	        $datos['catalogo'] = $this->Video_model->listaVideos();
	        $this->layout->view('videos', $datos);
	    }
	    else{
			redirect(base_url().'login', 301);
		}
    }

    function detalleVideo($url) {
    	if (!empty($this->session_id)) {
        	$urlLimpia = $this->security->xss_clean($url);
            $this->layout->js(array(base_url()."assets/jw/jwplayer.js",
	            base_url()."assets/jw/jwplatform.js",
	            base_url()."assets/jw/key.js"));
	        $datos['detalle'] = $this->Video_model->detalleVideo($urlLimpia);
	        $titulo = $datos['detalle']->titulo;
	        $this->layout->setTitle($titulo.' | Wow Share');
	        $this->layout->view('details/detalle_video', $datos);
	    }
	    else{
			redirect(base_url().'login', 301);
		}
    }

    function apps() {
    	if (!empty($this->session_id)) {
    		$this->layout->setTitle('App Movil | Wow Share');
	        $datos['catalogo'] = $this->Apps_model->listaApps();
	        $this->layout->view('apps', $datos);
		}
		else{
			redirect(base_url().'login', 301);
		}
    }

    function detalleApps($url) {
    	if (!empty($this->session_id)) {
	        $urlLimpia = $this->security->xss_clean($url);
	        $datos['detalle'] = $this->Apps_model->detalleApps($urlLimpia);
	        $titulo = $datos['detalle']->titulo;
	        $this->layout->setTitle($titulo.' | Wow Share');
	        $this->layout->view('details/detalle_app', $datos);
	    }
		else{
			redirect(base_url().'login', 301);
		}
    }

}
