<?php 

if (!defined('BASEPATH'))
exit('No direct script access allowed');

Class Procedimientos extends CI_Controller{

	public $titulo = "PROCEDIMIENTOS";

	public function __construct(){
		parent::__construct();
		date_default_timezone_set("AMERICA/LIMA");
		$this->load->model("Model_Procedimiento");
		$this->load->model("Model_Cprocedimientos");
	}
	public function index(){
		$data['titulo'] = $this->titulo;
		$data['subtitulo'] = "NUEVO PROCEDIMIENTO";
		$data['contenido'] = "procedimiento/index";
		$data['cprocedimientos'] = $this->Model_Cprocedimientos->mostrar_cprocedimientos();
		$data['procedimientos'] = $this->Model_Procedimiento->mostrar_procedimientos();
		$data['js'] = "public/iestp/js/procedimientos.js";
 		$this->load->view('layouts/content',$data);
	}

	public function insertar_procedimiento($format = "html"){
	if ($this->input->is_ajax_request()) {
		$data = $this->input->post();
		if (isset($data)) {
			$den = $data['procedimiento'];
			$p_a = $data['plazo'];
			$costo = $data['costo'];
			$cp = $data['cprocedimiento'];
			$this->Model_Procedimiento->insertar_procedimiento($den, $p_a, $costo, $cp);
			$data['cprocedimientos'] = $this->Model_Cprocedimientos->mostrar_cprocedimientos();
			$data['procedimientos'] = $this->Model_Procedimiento->mostrar_procedimientos();
			$this->load->view('procedimiento/ajax/tabla_procedimientos', $data);
		}
		}
	}

	public function actualizar_procedimiento($format = "html"){
		if ($this->input->is_ajax_request()) {
			$data = $this->input->post();
			if (isset($data)) {
				$idproc = $data['idprocedimiento'];
				$den = $data['procedimiento'];
				$p_a = $data['plazo'];
				$costo = $data['costo'];
				$cp = $data['cprocedimiento'];
				$this->Model_Procedimiento->update_procedimiento($idproc, $den, $p_a, $costo, $cp);
				$data['cprocedimientos'] = $this->Model_Cprocedimientos->mostrar_cprocedimientos();
				$data['procedimientos'] = $this->Model_Procedimiento->mostrar_procedimientos();
				$this->load->view('procedimiento/ajax/tabla_procedimientos', $data);
			}
			}
		}

}
?>