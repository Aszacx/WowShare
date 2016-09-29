<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

	private $session_id;

	public function __construct() {
		parent::__construct();
		$this->layout->setLayout('tmp_login');
		$this->layout->css(array(
			base_url().'assets/formvalidation.io-0.7/css/formValidation.min.css',
			base_url().'assets/bootstrap-3.3.6/css/bootstrap.min.css',
			base_url().'assets/font-awesome-4.5.0/css/font-awesome.min.css',
			base_url().'assets/wow/css/estilos.css'	            
		));
		$this->layout->js(array(
			base_url().'assets/jquery-2.1.4/jquery-2.1.4.min.js',
			base_url().'assets/formvalidation.io-0.7/js/formValidation.min.js',
			base_url().'assets/bootstrap-3.3.6/js/bootstrap.min.js',
			base_url().'assets/wow/js/admin/app.js'	            
		));
        $this->layout->setTitle('Ingresar | Wow Share');
		$this->load->model('backend/Admin_model');
		$this->session_id = $this->session->userdata('email');
	}

	public function index() {
		if (!empty($this->session_id)) {
			$this->layout->setLayout('tmp_admin');
        	$this->layout->setTitle('Panel Administración | Wow Share');
			$datos['paises'] = $this->Admin_model->listarDatos('pais');
			$datos['entrada'] = $this->Admin_model->listarDatos('tipo_noticia');
			$datos['membresia'] = $this->Admin_model->listarDatos('membresia');
			$datos['session'] = $this->session_id;
			$this->layout->view('admin', $datos);
            
		}
		else{
			redirect(base_url().'backend/admin/login', 301);
		}
	}

	function login(){
		if ($this->input->post()) {
			//die(sha1($this->input->post('pass', TRUE)));
			$datos = $this->Admin_model->login($this->input->post('email', TRUE), sha1($this->input->post('pass', TRUE)));
			//echo $datos; exit;
			if ($datos == 1) {
				$this->session->set_userdata("wow");
                $this->session->set_userdata('email', $this->input->post('email', TRUE));
                redirect(base_url().'backend/admin',  301);
			}
			else{
				$this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
				//redirect(base_url().'backend/admin/login',  301);
			}
		}
		$this->layout->view('login');
	}

	function logout(){
		$this->session->unset_userdata(array('email' => ''));
		$this->session->sess_destroy("wow");
		redirect(base_url().'backend/admin/login',  301);
	}

	//Tabla de Datos
	function leerDatos(){
		if ($this->input->is_ajax_request()) {
			if($this->input->post()){
				$tabla = $this->input->post('tabla', TRUE);
				$data = array(
					'buscar' => 'buscar_'.$tabla.'',
					'pagina' => 'pagina_'.$tabla.''
				);
				switch ($tabla) {
					case 'usuario':
						$data['metodo'] = 'obtenerUsuarios';
					break;
					case 'contenido':
						$data['metodo'] = 'obtenerContenidos';
					break;
					case 'autor':
						$data['metodo'] = 'obtenerAutores';
					break;
					case 'categoria':
						$data['metodo'] = 'obtenerCategorias';
					break;
					case 'noticia':
						$data['metodo'] = 'obtenerNoticias';
					break;
					case 'portada':
						$data['metodo'] = 'obtenerPortadas';
					break;
					case 'slide':
						$data['metodo'] = 'obtenerSlides';
					break;
				}
				$this->gestionarRegistros($data);
			}
		}
		else{
			show_404();
		}
	}

	function gestionarRegistros($data = array()){
		$buscar = $this->input->post($data['buscar']);
		$num_pagina = $this->input->post($data['pagina']);
		$cantidad = 5;
        $inicio = ($num_pagina - 1) * $cantidad;
        $data = array(
           	'registros' => $this->Admin_model->$data['metodo']($buscar, $inicio, $cantidad),
           	'total_registros' => count($this->Admin_model->$data['metodo']($buscar)),
           	'cantidad' => $cantidad	
        );
		echo json_encode($data);
		exit();
	}

	//Alta de Registros
	function crearDatos(){
		if ($this->input->is_ajax_request()) {
            if($this->input->post()){
				$tabla = $this->input->post('tabla', TRUE);
				switch ($tabla) {
					case 'usuario':
						$config = array(
		            		't_uno' => 'usuario',
		                    't_dos' => 'cliente',
		                    'foreign_id' => 'usuario_id'
		            	);
		                $tipo =  $this->input->post('tipo', TRUE);
		                $membresia = $this->input->post('membresia', TRUE);
		                $data_uno = array(
		                    'tipo' => $this->input->post('tipo', TRUE),
		                    'nombre' => $this->input->post('nombre', TRUE),
		                    'apellido' => $this->input->post('apellido', TRUE),
		                    'email' => $this->input->post('email', TRUE),
		                    'estatus' => 0,
		                    'contrasena' => sha1($this->input->post('pass', TRUE)),
		                    'fecha_registro' => date('Y-m-d')
		                );
		                switch ($tipo) {
		                    case '1':
		                    break;
		                    case '2':
		                    break;
		                    case '3':
		                    	switch ($membresia) {
		                        	case '1':
		                        		$caducidad = date('Y-m-d', strtotime("+1 year"));
		                        	break;
		                        	case '2':
		                        		$caducidad = date('Y-m-d', strtotime("+5 days"));
		                        	break;
		                        	case '3':
		                        		$caducidad = date('Y-m-d', strtotime("+3 month"));
		                        	break;
		                        } 
		                    $data_dos = array(
		                        'pais_id' => $this->input->post('pais', TRUE),
		                        'caducidad' => $caducidad,
		                        'membresia_id' => $membresia
		                    );                                                
		                }
                    break;
                    case 'contenido':
                    	$config = array(
		            		't_uno' => 'contenido',
		                    't_dos' => 'tipo_contenido',
		                    'foreign_id' => 'contenido_id'
		            	);
                    	$titulo = $this->input->post('titulo', TRUE);
						$url = convert_accented_characters(url_title($titulo,'-',TRUE));
						$data_dos = array(
							'tipo' => $this->input->post('tipo', TRUE),
							'enlace' => $this->input->post('enlace', TRUE),
							'anio' => $this->input->post('anio', TRUE),
						);
			            switch ($data_dos['tipo']) {
							//Videos
							case '4':
			                    $data_uno = array(
			                        'titulo' => $titulo,
			                        'estatus' => 0,
			                        'fecha' => date('Y-m-d'),
			                        'url' => $url,
			                        //'descripcion' => $this->input->post('descripcion', TRUE),
			                        'autor_id' => $this->input->post('autor', TRUE),
			                        'categoria_id' => $this->input->post('categoria', TRUE),
			                        'portada_id' => $this->input->post('portada', TRUE)
			                    );
							break;
							//Apps, Libros y Revistas
							default:
			                    $data_uno = array(
			                        'titulo' => $titulo,
			                        'estatus' => 0,
			                        'fecha' => date('Y-m-d'),
			                        'url' => $url,
			                        //'descripcion' => $this->input->post('descripcion', TRUE),
			                        'autor_id' => $this->input->post('autor', TRUE),
			                        'categoria_id' => $this->input->post('categoria', TRUE),
			                    );							   
							break;
						}
                    break;
                    case 'autor':
                    	$config = array(
		            		'tabla' => 'autor'
		            	);
		            	$data_uno = array('autor' => $this->input->post('autor', TRUE));
		            	$data_dos = NULL;
                    break;
                    case 'categoria':
                    	$config = array(
		            		'tabla' => 'categoria'
		            	);
		            	$data_uno = array('categoria' => $this->input->post('categoria', TRUE));
		            	$data_dos = NULL;
                    break;
                    case 'noticias':
                    	$config = array(
		            		'tabla' => 'noticias'
		            	);
		            	$titulo = $this->input->post('titulo', TRUE);
						$url = convert_accented_characters(url_title($titulo,'-',TRUE));
			            $data_uno = array(
			                'titulo' => $titulo,
			                'contenido' => $this->input->post('contenido', TRUE),
			                'fecha' => date('Y-m-d'),
			                'url' => $url,
			                'tipo_noticia_id' => $this->input->post('tipo_noticia', TRUE),
			                'estatus' => 0
						);
		            	$data_dos = NULL;
                    break;
                }            	
            	$this->guardarRegistros($data_uno, $data_dos, $config);
            }
        }
		else{
			show_404();
		}
	
	}

	function guardarRegistros($data_uno = array(), $data_dos = array(), $config = array()){
		/*print_r($data_uno);
		print_r($data_dos);
		print_r($config);
		exit();*/
        $query = $this->Admin_model->guardar($data_uno, $data_dos, $config);
        $query = ($query == TRUE) ? TRUE : FALSE;
        echo json_encode($query);
        exit();
	}

	function createCover(){
		if ($this->input->is_ajax_request()) {
				$this->load->library('upload');
                $config = array(
		            'upload_path' => './uploads/cover/',
			        'file_path' => 'uploads/cover/',
			        'thumbnail_path' => 'uploads/cover/thumbs/',
			        'allowed_types' => 'jpg|png',
			        'encrypt_name' => 'TRUE',
			        'max_size' => '2000',
			        'max_width' => '2024',
			        'max_height' => '2008',
			        'tabla' => 'portada'
		        );

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('portada')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->layout->view('admin', $error);
                } else {
                    $file_info = $this->upload->data();
                    //Pasa el nombre de la imagen a la función create_thumbnail
                    $this->_crear_thumbnail($file_info['file_name'], 4);
                    $data = array('upload_data' => $this->upload->data());
                    $thumbnail_path = $config['thumbnail_path'].$file_info['raw_name'].'_thumb'.$file_info['file_ext'];
                    $imagen = $file_info['file_name'];
                    $nombre = $file_info['raw_name'];
                            
                    $data_uno = array(
                    	'tipo' => 4,
                        'nombre' => $nombre,
                        'ruta' => $config['file_path'].$imagen,
                        'miniatura' => $thumbnail_path
                    );
                    $data_dos = NULL;
                    $this->guardarRegistros($data_uno, $data_dos, $config);
			}
		}
	}

	function createSlide() {  
    	if ($this->input->is_ajax_request()) {
            if($this->input->post()){
                $buscar = $this->input->post('slides', TRUE);
                $this->load->library('upload');
                $config = array(
			        'allowed_types' => 'jpg|png',
			        'max_size' => '2000',
			        'max_width' => '2024',
			        'max_height' => '2008',
			        'tabla' => 'slides'
		        );
                switch ($tipo) {
                    case '1':
		                $config['upload_path'] = './uploads/slide/';
			            $config['file_path'] = 'uploads/slide/';
			            $config['thumbnail_path'] = 'uploads/slide/thumbs/';
                    break;
                    case '2': 
		                $config['upload_path'] = './uploads/300x300/';
			            $config['file_path'] = 'uploads/300x300/';
			            $config['thumbnail_path'] = 'uploads/300x300/thumbs/';
                    break;
                    case '3':
		                $config['upload_path'] = './uploads/1000x150/';
			            $config['file_path'] = 'uploads/1000x150/';
			            $config['thumbnail_path'] = 'uploads/1000x150/thumbs/';
                    break;
                }
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('ruta')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->layout->view('admin', $error);
                } else {
                    $file_info = $this->upload->data();
                    //Pasa el nombre de la imagen a la función create_thumbnail
                    $this->_crear_thumbnail($file_info['file_name'], $tipo);
                    //$data = array('upload_data' => $this->upload->data());
                    $imagen = ucfirst($file_info['raw_name']);
                    $ruta = $file_info['file_name'];
                    $thumbnail_path = $config['thumbnail_path'].$file_info['raw_name'].'_thumb'.$file_info['file_ext'];

                    $data_uno = array(
                    	'tipo' => $tipo,
                        'nombre' => $imagen,
                        'ruta' => $config['file_path'].$ruta,
                        'miniatura' => $thumbnail_path,
                        'estatus' => 0
	                );
	                $data_dos = NULL;
	                $this->guardarRegistros($data_uno, $data_dos, $config);
                }
            }
        }
	    else {
	      	show_404();
	    }
    }

	//Obtener Datos de Registo a Actualizar
	function editarRegistro(){
		if ($this->input->is_ajax_request()) {
			$tabla = $this->input->post('tabla', TRUE);
			switch ($tabla) {
				case 'usuario':
					$id = $this->input->post('id', TRUE);
				break;
			}
			$query = $this->Admin_model->getUsuario($id);
			for ($i = 0; $i < count($query); $i++) { 
				echo $i
			}
			/*$datos = array(
                0 => $query->tipo,
                1 => $query->idMembresia,
            	2 => $query->nombre,
            	3 => $query->apellido,
                4 => $query->idPais,
				5 => $query->email,
                6 => $query->contrasena
			);
			echo json_encode($datos);*/
			exit();
		}
		else{
			show_404();
		}
	}

	function editarUsuario(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('idUsuario', TRUE);
			$query = $this->Admin_model->getUsuario($id);
			$datos = array(
                0 => $query->tipo,
                1 => $query->idMembresia,
            	2 => $query->nombre,
            	3 => $query->apellido,
                4 => $query->idPais,
				5 => $query->email,
                6 => $query->contrasena
			);
			echo json_encode($datos);
			exit();
		}
		else{
			show_404();
		}
	}

	function editarContenido(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('idCatalogo');
			$query = $this->Admin_model->getContenido($id);
			$datos = array(
                0 => $query->tipo,
                1 => $query->titulo,
				2 => $query->idAutor,
            	3 => $query->idCategoria,
				4 => $query->idPortada,
                5 => $query->anio,
                6 => $query->enlace,
                //7 => $query->descripcion
			);
			echo json_encode($datos);
			exit();
		}
		else{
			show_404();
		}
	}

	function editarAutor(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('idAutor');
			$query = $this->Admin_model->getRegistro($id, 'autor');
			$datos = array(
            	0 => $query->autor,
			);
			echo json_encode($datos);
			exit();
		}
		else{
			show_404();
		}
    }

    function editarCategoria(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('idCategoria');
			$query = $this->Admin_model->getRegistro($id, 'categoria');
			$datos = array(
            	0 => $query->categoria,
			);
			echo json_encode($datos);
			exit();
		}
		else{
			show_404();
		}
    }

    function editarNoticia(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('idNoticias');
			$query = $this->Admin_model->getNoticia($id);
			$datos = array(
				0 => $query->tipo_noticia_id,
                1 => $query->titulo,
				2 => $query->fecha,
                3 => $query->contenido
			);
			echo json_encode($datos);
			exit();
		}
		else{
			show_404();
		}
	}

	//Actualizar Registro
	function actualizarUsuario(){
		if ($this->input->is_ajax_request()) {
            $tipo = $this->input->post('tipo', TRUE);
			$datos = array(
				'id' => $this->input->post('idUsuario', TRUE),
                'nombre' => $this->input->post('nombre', TRUE),
                'apellido' => $this->input->post('apellido', TRUE),
                'email' => $this->input->post('email', TRUE),
                'contrasena' => sha1($this->input->post('pass', TRUE))
            );

            switch ($tipo) {
					case '1':
					break;
					case '2':
					break;
					case '3':
                        $data['pais'] = $this->input->post('pais');
                        $data['membresia'] = $this->input->post('membresia');
                        $this->Admin_Model->actualizarUsuario($datos, $data);
					break;
            }
		}
		else{
			show_404();
		}
	}

	function actualizarContenido(){
		if ($this->input->is_ajax_request()) {
			$titulo = $this->input->post('titulo', TRUE);
			$url = convert_accented_characters(url_title($titulo,'-',TRUE));
			
			$data['tipo'] =  $this->input->post('tipo', TRUE);
			$data['enlace'] = $this->input->post('enlace', TRUE);
			$data['anio'] = $this->input->post('anio', TRUE);

            switch ($data['tipo']) {
				//Videos
				case '4':
                    $datos = array(
                        'id' => $this->input->post('idCatalogo', TRUE),
                        'titulo' => $titulo,
                        'url' => $url,
                        //'descripcion' => $this->input->post('descripcion', TRUE),
                        'autor_id' => $this->input->post('autor', TRUE),
                        'categoria_id' => $this->input->post('categoria', TRUE),
                        'portada_id' => $this->input->post('portada', TRUE)
                    );
                    $query = $this->Admin_model->actualizarContenido($datos, $data);
                    if($query == TRUE) {
						echo json_encode($query);
						exit();
					} else{
						echo json_encode($query);
						exit();
					}
				break;
				//Apps, Libros y Revistas
				default:
                    $datos = array(
                        'id' => $this->input->post('idCatalogo', TRUE),
                        'titulo' => $titulo,
                        'url' => $url,
                        //'descripcion' => $this->input->post('descripcion', TRUE),
                        'autor_id' => $this->input->post('autor', TRUE),
                        'categoria_id' => $this->input->post('categoria', TRUE),
                    );
				    $query = $this->Admin_Model->actualizarContenido($datos, $data);
				    if($query == TRUE) {
						echo json_encode($query);
						exit();
					} else{
						echo json_encode($query);
						exit();
					}
				break;
			}
		}
		else{
			show_404();
		}
	}

	function actualizarAutor(){
		if ($this->input->is_ajax_request()) {
            $datos = array(
                'id' => $this->input->post('idAutor', TRUE),
                'autor' => $this->input->post('autor', TRUE)
            );
			$query = $this->Admin_model->actualizarRegistro($datos, 'autor');
			if($query == TRUE) {
				echo json_encode($query);
				exit();
			} else{
				echo json_encode($query);
				exit();
        	}
        } else{
			show_404();
		}
	}

	function actualizarCategoria(){
		if ($this->input->is_ajax_request()) {
            $datos = array(
                'id' => $this->input->post('idCategoria', TRUE),
                'categoria' => $this->input->post('categoria', TRUE)
            );
			$query = $this->Admin_model->actualizarRegistro($datos, 'categoria');
			if($query == TRUE) {
				echo json_encode($query);
				exit();
			} else{
				echo json_encode($query);
				exit();
        	}
        }
		else{
			show_404();
		}
	}

	function actualizarNoticia(){
		if ($this->input->is_ajax_request()) {
            $titulo = $this->input->post('titulo', TRUE);
			$url = convert_accented_characters(url_title($titulo,'-',TRUE));
            $datos = array(
                'id' => $this->input->post('idNoticias', TRUE),
                'tipo_noticia_id' => $this->input->post('tipo', TRUE),
                'titulo' => $titulo,
                'contenido' => $this->input->post('contenido', TRUE),
                'url' => $url,
                'fecha' => $this->input->post('fecha', TRUE),
			);
            $this->Admin_model->actualizarRegistro($datos, 'noticias');
		}
		else{
			show_404();
		}
	}

	//Eliminar Registro
	function eliminarDatos(){
		if ($this->input->is_ajax_request()) {
			$tabla = $this->input->post('tabla', TRUE);
			$data = array(
				'id' => $this->input->post('id', TRUE),
				'primary_id' => 'id'
			);
			switch ($tabla) {
				case 'usuario':
					$data['foreign_id'] = 'usuario_id';
					$data['t_uno'] = 'usuario';
					$data['t_dos'] = 'cliente';
				break;
				case 'contenido':
					$data['foreign_id'] = 'contenido_id';
					$data['t_uno'] = 'contenido';
					$data['t_dos'] = 'tipo_contenido';
				break;
				case 'autor':
				case 'categoria':
				case 'portada':
				case 'slide':
					$data['foreign_id'] = NULL;
					$data['t_uno'] = $tabla;
					$data['t_dos'] = NULL;
				break;
			}
			$this->eliminarRegistro($data);
		}
		else{
			show_404();
		}
	}

	function eliminarRegistro($data){
		if($data['t_uno'] == 'portada' || $data['t_uno'] == 'slide'){		
			$result['item'] = $this->Admin_model->getRegistro($data['id'], $data['t_uno']);
			$query = $this->Admin_model->eliminarRegistro($data);
			rename($result['item']->ruta, $result['item']->ruta.'_delete');
	        rename($result['item']->miniatura, $result['item']->miniatura.'_delete');
		}
		else {
			$query = $this->Admin_model->eliminarRegistro($data);
		}
		$query = ($query == TRUE) ? TRUE : FALSE;
		echo json_encode($query);
		exit();
	}

	//Cambiar Status a Registro 
	function estatusRegistro(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id', TRUE);
			$tabla = $this->input->post('tabla', TRUE);
			$data = $this->Admin_model->getRegistro($id, $tabla);
			$estatus = ($data->estatus == 1) ? 0 : 1;
			$query = $this->Admin_model->actualizarEstatus($id, $estatus, $tabla);
			$query = ($query == TRUE) ? TRUE : FALSE;
			echo json_encode($query);
			exit();
		}
		else{
			show_404();
		}
	}

    //Listar Datos	
	function listarDatos(){
		if ($this->input->is_ajax_request()) {
			$tabla = $this->input->post('tabla', TRUE);
			$data = $this->Admin_model->listarDatos($tabla);
			echo json_encode($data);
			exit();
		}
		else{
			show_404();
		}
	}

//Otras Funciones
    //Generar códigos
    function generarCodigos(){
		if ($this->input->is_ajax_request()) {
            $cantidad = $this->input->post('cantidad', TRUE);
            for ($i = 1; $i <= $cantidad; $i++) {
                $codGenerado = $this->randomCodigo(20);
                $datos = array(
                    'codigo' => $codGenerado,
                    'estatus' => 0
                );
                $this->Admin_Model->guardarCodigos($datos);
            }
		}
		else{
			show_404();
		}
	}
    
    function randomCodigo($longitud) { 
        $codigo = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $longitud);
        return $codigo;
    } 
    
	//Filtrar Contenido
	function filtrarContenido(){
		if ($this->input->is_ajax_request()) {
			$filtro = $this->input->post('filtro');
			$datos = $this->Admin_model->filtrarContenido($filtro);
			echo json_encode($datos);
			exit();
		}
		else{
			show_404();
		}
	}

	function filtrarNoticias(){
		if ($this->input->is_ajax_request()) {
			$filtro = $this->input->post('filtro');
			$datos = $this->Admin_model->filtrarNoticias($filtro);
			echo json_encode($datos);
			exit();
		}
		else{
			show_404();
		}
	}
    
    //Crear thumbnail
    function _crear_thumbnail($filename, $tipo){
        $config['image_library'] = 'gd2';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 150;
		$config['height'] = 150;
        switch ($tipo) {
        	case '1':
		        //Ubica la imágen a redimensionar
		        $config['source_image'] = 'uploads/slide/'.$filename;
		        //Guardamos la miniatura
		        $config['new_image'] = 'uploads/slide/thumbs/';
        		break;
        	case '2':
		        //Ubica la imágen a redimensionar
		        $config['source_image'] = 'uploads/300x300/'.$filename;
		        //Guardamos la miniatura
		        $config['new_image'] = 'uploads/300x300/thumbs/';
        		break;
        	case '3':
		        //Ubica la imágen a redimensionar
		        $config['source_image'] = 'uploads/1000x150/'.$filename;
		        //Guardamos la miniatura
		        $config['new_image'] = 'uploads/1000x150/thumbs/';
        		break;
            case '4':
		        //Ubica la imágen a redimensionar
		        $config['source_image'] = 'uploads/cover/'.$filename;
		        //Guardamos la miniatura
		        $config['new_image'] = 'uploads/cover/thumbs/';
        		break;
        }
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }
	
}