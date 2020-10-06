<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

Class Boleta extends CI_Controller{

	public $titulo = "BOLETA";

	public function __construct(){
		parent::__construct();
		if (empty($this->session->userdata('usuario'))) {
				redirect(base_url());
			}
			else{
		date_default_timezone_set("AMERICA/LIMA");
		$this->load->model("Model_Boleta");
		$this->load->model("Model_Persona");
		$this->load->model("Model_Detalles");
		$this->load->model("Model_Procedimiento");
		$this->load->model("Model_Cprocedimientos");
		}
	}
	public function index(){
		$data['titulo'] = $this->titulo;
		$data['header1'] = "BOLETA";
		$data['header2']="NUEVA BOLETA";
		$data['subtitulo'] = "INGRESAR NUEVA BOLETA";
		$data['contenido'] = "boletas/index";
		$data['cprocedimientos'] = $this->Model_Cprocedimientos->mostrar_cprocedimientos();
		if (empty($this->Model_Boleta->ultima_boleta())) {
			$data['ultima_boleta'] = (object) ['idboleta'=>'0'];
		}
		else{
			$data['ultima_boleta'] = $this->Model_Boleta->ultima_boleta();
		}
		$data['js'] = "public/iestp/js/boleta.js";
 		$this->load->view('layouts/content',$data);
	}

	//funcion para cargar la pagina reportes
	public function reportes(){
		$data['titulo'] = $this->titulo;
		$data['header1'] = "REPORTES";
		$data['header2'] = "REPORTES DE BOLETAS";
		$data['contenido'] = "boletas/reportes";
		$data['cprocedimientos'] = $this->Model_Cprocedimientos->mostrar_cprocedimientos();
		$data['js'] = "public/iestp/js/reporte_boleta.js";
 		$this->load->view('layouts/content',$data);
	}

	public function listar_procedimientos($format = "html"){
		if ($this->input->is_ajax_request()) {
			$cprocedimiento = $this->input->post("cprocedimiento");
			$inf_pro['procedimientos'] = $this->Model_Procedimiento->proc_cprocedimientos($cprocedimiento);
			if ($format === 'html') {
				$this->load->view('procedimiento/ajax/lista_procedimientos',$inf_pro);
			}
		}
	}

	public function mostrar_datos_personales($format = "html"){
		if ($this->input->is_ajax_request()) {
			$dni = $this->input->post("dni");
			$inf['datos_personales'] = $this->Model_Persona->nombre_completo($dni);
				if ($format === "html") {
				$this->load->view('boletas/ajax/nombre_completo', $inf);
				}
		}
	}

	public function datos_procedimiento($format = "html"){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post("procedimiento");
			$inf['datos_procedimiento'] = $this->Model_Procedimiento->get_procedimiento($id);
				if ($format === "html") {
					$this->load->view('boletas/ajax/datos_procedimiento', $inf);
				}
		}
	}

	public function insertar_boleta($format = "html"){
		if ($this->input->is_ajax_request()) {
			$datos = $this->input->post();
			if (isset($datos)) {
				$idboleta = $datos['idboleta'];
				$dni = $datos['dni'];
				$nombres = $datos['nombres'];
				$a_paterno = $datos['a_paterno'];
				$a_materno = $datos['a_materno'];
				$procedimiento = $datos['procedimiento'];
				$fecha = date('Y-m-d H-i-s');
				$cantidad = $datos['cantidad'];
				$descripcion = $datos['descripcion'];
				$c_detalle;
				$costo_detalle = $this->Model_Procedimiento->get_procedimiento($procedimiento);
				foreach ($costo_detalle as $costo) {
					$c_detalle=$costo->costo*$cantidad;
				}
				//variable para verificar persona
				$ver_persona = $this->Model_Persona->verificar_persona($dni);
				//variable para verificar boleta
				$ver_boleta = $this->Model_Boleta->verificar_boleta($idboleta);

				if ($ver_persona == FALSE){
					$this->Model_Persona->insertar_persona($dni, $a_paterno, $a_materno, $nombres);
				}
				if ($ver_boleta == FALSE){
					$this->Model_Boleta->insertar_boleta($idboleta, $fecha, $dni);
				}

				$this->Model_Detalles->insertar_detalles($cantidad, $descripcion, $c_detalle, $idboleta, $procedimiento);
				$datos['detalles'] = $this->Model_Detalles->detalles_boleta($idboleta);
				$this->load->view('boletas/ajax/tabla_detalles', $datos);
			}
		}
	}
//funcion para llamar ajax de buscar boleta
	public function reporte_boleta($format="html"){
		if ($this->input->is_ajax_request()) {
			$idboleta = $this->input->post("idboleta");
			//$inf['cantidad_filas'] = $this->Model_Detalles->cantidad_detalles($idboleta);
			$inf['reporte_boleta'] = $this->Model_Boleta->get_reporte_boleta($idboleta);
				if ($format === "html") {
					$this->load->view('boletas/ajax/reporte_boleta', $inf);
				}
		}
	}
//funcion para ver todas las boletas entre fechas inicio y fin
	public function ver_boletas($format = 'html'){
		if ($this->input->is_ajax_request()) {
			$f_inicio = $this->input->post("f_inicio");//." 00:00:00";
			$f_fin = $this->input->post("f_fin");//." 23:59:59";
			$inf['fechas'] = (object) array('f_inicio' => $f_inicio,
								'f_fin' => $f_fin);
			$inf['boletas'] = $this->Model_Boleta->boletas_fechas($f_inicio, $f_fin);
			$inf['idboletas'] = $this->Model_Boleta->idboletas_fechas($f_inicio, $f_fin);
			if ($format === "html") {
				$this->load->view('boletas/ajax/ver_boletas',$inf);
			}
		}
	}

	public function ver_informe($format = 'html'){
		if ($this->input->is_ajax_request()) {
			$f_inicio = $this->input->post("f_inicio");//." 00:00:00";
			$f_fin = $this->input->post("f_fin");//." 23:59:59";
			$inf['boletas'] = $this->Model_Boleta->boletas_fechas($f_inicio, $f_fin);
			$inf['cprocedimientos'] = $this->Model_Cprocedimientos->mostrar_cprocedimientos();
			if ($format === "html") {
				$this->load->view('boletas/ajax/ver_informe',$inf);
			}
		}
	}

	public function boleta_pdf($idboleta){
		$ver_boleta = $this->Model_Boleta->verificar_boleta($idboleta);
		if ($ver_boleta==true) {
			$this->load->library('fpdf_gen');
			$datos_persona = $this->Model_Boleta->get_boleta($idboleta);
			$datos_detalles = $this->Model_Detalles->detalles_boleta($idboleta);
		$this->fpdf->SetAuthor("JM");
		$this->fpdf->SetTitle('Boleta de Ventas');
		$this->fpdf->AliasNbPages('(np)');
		$this->fpdf->SetAutoPageBreak(false);
		$this->fpdf->SetMargins(5,5,5,5);
		$this->fpdf->SetLineWidth(0.3);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetXY(90,89);//firma
		$this->fpdf->Cell(30,6,"CAJA",'T',0,'C');
		$this->fpdf->Cell(30,6,"",0,0,'C');
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->Cell(60,6,"ADMINISTRATIVO",1,0,'C');
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetXY(0,99);//SEPARADOR
		$this->fpdf->Cell(210,1,"","B",0,"C");
		$this->fpdf->SetXY(90,188);//firma
		$this->fpdf->Cell(30,6,"CAJA",'T',0,'C');
		$this->fpdf->Cell(30,6,"",0,0,'C');
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->Cell(60,6,"USUARIO",1,0,'C');
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetXY(0,198);//SEPARADOR
		$this->fpdf->Cell(210,1,"","B",0,"C");
		$this->fpdf->SetXY(90,287);
		$this->fpdf->Cell(30,6,"CAJA",'T',0,'C');
		$this->fpdf->Cell(30,6,"",0,0,'C');
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->Cell(60,6,"CAJERO",1,0,'C');

		$this->formato_boleta(0,$datos_persona,$datos_detalles);

		$this->formato_boleta(99,$datos_persona,$datos_detalles);

		$this->formato_boleta(198,$datos_persona,$datos_detalles);

		echo $this->fpdf->Output('Prueba.pdf','I');
		}
		else{
			redirect('boleta');
		}

	}

	public function formato_boleta($posicion = 0,$datos_persona, $datos_detalles){
		$this->fpdf->SetXY(10,10);
		$this->fpdf->ln($posicion);
        $this->fpdf->SetLineWidth(1);
        $this->fpdf->SetFont('Arial','B',11);
        $this->fpdf->image(base_url('public/iestp/img/logo.png'), 10, $posicion + 5, 20, 20);
        //$this->fpdf->image(base_url('public/iestp/img/logo_minedu.png'), 170,$posicion + 8,20, 14);

        $this->fpdf->Cell(200,4,utf8_decode("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO"),0,0,'C');
        $this->fpdf->Ln(4);
        $this->fpdf->Cell(200,4,"ILAVE ",0,0,'C');
        $this->fpdf->ln(4);

        $this->fpdf->SetFont('Arial','B',7);
        $this->fpdf->Cell(200,4,"RUC: 20216615035",0,0,'C');
        $this->fpdf->SetFont('Arial','B',6);
        $this->fpdf->ln(2);
        $this->fpdf->Cell(200,4,utf8_decode("Panamericana Sur 4.5 km. Chillacollo - Ilave"),0,0,'C');
        $this->fpdf->ln(4);
        $this->fpdf->Cell(200,1,"","B",0,"C");
        $this->fpdf->Ln(4);
        $this->fpdf->SetLineWidth(0.1);
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->SetFont('Arial','B',9);
		foreach ($datos_persona as $d_persona) {
			$this->fpdf->Cell(20,6,"DNI:",1,0,'L');
			$this->fpdf->Cell(40,6,$d_persona->idPersona,1,0,'C');
			$this->fpdf->Cell(20,6,"Fecha:",1,0,'L');
			$this->fpdf->Cell(40,6,$d_persona->fecha,1,0,'C');
			$this->fpdf->Cell(5,6,"",0,0,'');//espacio
			$this->fpdf->SetFont('Arial','B',12);
			$this->fpdf->Cell(75,6,"RECIBO DE INGRESOS PROPIOS",1,0,'C');
			$this->fpdf->SetFont('Arial','B',9);
			$this->fpdf->Ln(6);
			$this->fpdf->Cell(20,6,utf8_decode("Señor(a):"),1,0,'L');
			$this->fpdf->Cell(100,6,utf8_decode($d_persona->apellidoPaterno." ".$d_persona->apellidoMaterno." ".$d_persona->nombres),1,0,'C');
			$this->fpdf->Cell(5,6,"",0,0,'');//espacio
			$this->fpdf->SetFont('Arial','B',14);
			$this->fpdf->Cell(75,6,$d_persona->idboleta,1,0,'C');
			$this->fpdf->SetFont('Arial','B',9);
			$this->fpdf->Ln(7);
		}
		$this->fpdf->SetFont('Arial','B',8);
		$this->fpdf->Cell(20,6,"CANTIDAD",1,0,'C');
		$this->fpdf->Cell(140,6,"DENOMINACION",1,0,'C');
		$this->fpdf->Cell(20,6,"P. UNITARIO",1,0,'C');
		$this->fpdf->Cell(20,6,"TOTAL",1,1,'C');
		$this->fpdf->SetFont('Arial','',8);
		$total = 0.00;
		foreach ($datos_detalles as $d_detalles) {
			$this->fpdf->Cell(20,6,$d_detalles->cantidad,1,0,'C');
			if ($d_detalles->descripcion != 'Ninguna') {
				$this->fpdf->Cell(140,6,utf8_decode($d_detalles->denominacion)." (".$d_detalles->descripcion.")",1,0,'L');
			}
			else{
				$this->fpdf->Cell(140,6,utf8_decode($d_detalles->denominacion),1,0,'L');
			}
			$this->fpdf->Cell(20,6,$d_detalles->costo,1,0,'C');
			$this->fpdf->Cell(20,6,$d_detalles->costo_detalle,1,1,'C');
			$total += $d_detalles->costo_detalle;
		}
		$this->fpdf->Cell(180,6,"TOTAL",1,0,'C');
		$this->fpdf->Cell(20,6,number_format($total, 2, '.', ''),1,0,'C');

	}

	public function rep_pdf_boletas($f_inicio, $f_fin){
			$f_inicio = $this->input->post("f_inicio");//." 00:00:00";
			$f_fin = $this->input->post("f_fin");//." 23:59:59";
			$boletas = $this->Model_Boleta->boletas_fechas($f_inicio, $f_fin);
			$idboletas = $this->Model_Boleta->idboletas_fechas($f_inicio, $f_fin);
			$this->load->library('fpdf_gen');
			$this->load->library('fpdf_gen');
			$this->fpdf->SetAuthor("JM");
			$this->fpdf->SetTitle('Boleta de Ventas');
			$this->fpdf->AliasNbPages('(np)');
			$this->fpdf->SetAutoPageBreak(false);
			$this->fpdf->SetMargins(5,5,5,5);
			$this->fpdf->SetLineWidth(0.3);
			$this->fpdf->SetFont('Arial','',8);
			$this->fpdf->Cell(200,5,'REPORTE DE BOLETAS',1,0,'C');
			$this->fpdf->Cell(200,5,$f_inicio." al ".$f_fin,1,0,'C');
	}

	public function formato_cabecera($posicionY = 0){
		$this->fpdf->SetXY(0 , $posicionY);
		$this->fpdf->SetLineWidth(1);
        $this->fpdf->SetFont('Arial','B',11);
        $this->fpdf->image(base_url('public/iestp/img/logo.png'), 10, $posicionY + 5, 20, 20);
        //$this->fpdf->image(base_url('public/iestp/img/logo_minedu.png'), 170,$posicion + 8,20, 14);
        $this->fpdf->Cell(200,4,utf8_decode("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO"),0,0,'C');
        $this->fpdf->Ln(4);
        $this->fpdf->Cell(200,4,"ILAVE ",0,0,'C');
        $this->fpdf->ln(4);

        $this->fpdf->SetFont('Arial','B',7);
        $this->fpdf->Cell(200,4,"RUC: 20216615035",0,0,'C');
        $this->fpdf->SetFont('Arial','B',6);
        $this->fpdf->ln(2);
        $this->fpdf->Cell(200,4,utf8_decode("Panamericana Sur 4.5 km. Chillacollo - Ilave"),0,0,'C');
        $this->fpdf->ln(4);
	}
}

 ?>
