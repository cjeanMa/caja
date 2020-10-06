<?php 
	if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	Class Login extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Model_Usuario');
			$this->load->library('session');
		}

		public function index(){
			if(empty($this->session->userdata('idusuario'))){
				$this->load->view('login/inicio');
			}
			else{
				redirect('boleta');
			}
		}

		public function validar_post(){
			if ($this->input->post()) {
				$usuario = $this->input->post('usuario');
				$clave = $this->input->post('password');
				$validacion = $this->Model_Usuario->verificar_usuario($usuario, SHA1($clave));
				if ($validacion == 1) {
					redirect('boleta');
				}
				else{
					$data['msj_error'] = (object)['mensaje' => 'Usuario o Contraseña incorrecta']; 
					$this->load->view('login/inicio',$data);
				}
			}
			else{
				redirect('login');
			}
		}

	}

 ?>