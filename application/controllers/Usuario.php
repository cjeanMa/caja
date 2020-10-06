<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

	class Usuario extends CI_Controller{

		public $titulo = "USUARIOS";

		function __construct(){
			parent::__construct();
			$this->load->model('Model_TiposUsuario');
			$this->load->model('Model_Usuario');
		}

		public function index(){
			if (empty($this->session->userdata('usuario'))) {
				$this->load->view('login/inicio');
			}
			else{
				$data['titulo'] = $this->titulo;
				$data['subtitulo'] = "OPCIONES USUARIOS";
				$data['contenido'] = "usuario/index";
				$data['js'] = "";
				$data['MostrarTiposUsuario'] = $this->Model_TiposUsuario->MostrarTiposUsuario();
				$data['ListaUsuarios'] = $this->Model_Usuario->Mostrar();
				$this->load->view("layouts/content", $data);
			}

		}

		public function insert(){
			$datos = $this->input->post();
			if (isset($datos)) {
				$ap_paterno = $datos['ap_paterno'];
				$ap_materno = $datos['ap_materno'];
				$nombres = $datos['nombres'];
				$usuario = $datos['nom_usuario'];
				$password = $datos['password'];
				$tipo_usuario = $datos['tipo_usuario'];
				$this->Model_Usuario->insertarUsuario($ap_paterno,$ap_materno,$nombres,$usuario,$password,$tipo_usuario);
				redirect('');
			}
		}
		public function eliminar($id = NULL){
			if ($id != NULL) {
				$this->Model_Usuario->eliminarUsuario($id);
				redirect('');
			}
		}

		public function editar($id = NULL){
			if ($id != NULL){
				$data['titulo'] = $this->titulo;;
				$data['subtitulo'] = "Editar Usuario";
				$data['contenido']='usuario/editar';
				$data['MostrarTiposUsuario'] = $this->Model_TiposUsuario->MostrarTiposUsuario();
				$data['datosUsuario']=$this->Model_Usuario->datosEditar($id);
				$this->load->view('layouts/content',$data);
			}
			else{
				redirect('');
			}
		}

		public function actualizar(){
			$datos = $this->input->post();
			if (isset($datos)) {
				$id_usuario = $datos['idusuario'];
				$ap_paterno = $datos['ap_paterno'];
				$ap_materno = $datos['ap_materno'];
				$nombres = $datos['nombres'];
				$usuario = $datos['nom_usuario'];
				$password = $datos['password'];
				$tipo_usuario = $datos['tipo_usuario'];
				$this->Model_Usuario->actualizarUsuario($id_usuario,$ap_paterno,$ap_materno,$nombres,$usuario,$password,$tipo_usuario);
				redirect('');
			}
		}

		public function cerrar_sesion(){
			$this->session->sess_destroy();
			redirect(base_url());
		}

	}//fin de clase usuario

?>
