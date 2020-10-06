<?php 
Class Model_Boleta extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	} 
	//MOSTRAR SOLO CAMPOS DE BOLETA
	public function mostrar_boleta(){
		$query = $this->db->query("SELECT * FROM boleta");
		return $query->result();
	}
	//PARA OBTENER EL ID DE LA ULTIMA BOLETA
	public function ultima_boleta(){
		$query = $this->db->query("SELECT idboleta FROM boleta order by idboleta desc limit 0,1");
		$fila = $query->row(0);
		return $fila;
	}
	//PRA INSERTAR UNA BOLETA
	public function insertar_boleta($idboleta, $fecha, $dni){
		$datos = array(
			'idboleta' => $idboleta,
			'fecha' => $fecha,
			'idPersona' => $dni,
		);
		$this->db->insert('boleta', $datos);
	}
	//PARA VER SI EXISTE O NO UNA BOLETA
	public function verificar_boleta($idboleta){
		$query = $this->db->query("SELECT * FROM boleta WHERE idboleta = '$idboleta'");
		if (!$query->result()) {
			return false;
		}
		else return true;
	}
	//PARA OBTENER TODOS LOS DATOS DE UNA BOLETA
	public function get_reporte_boleta($idboleta){
		$query	= $this->db->query("SELECT * FROM boleta b LEFT JOIN detalle d ON b.idboleta=d.boleta_idboleta LEFT JOIN procedimiento p ON d.idprocedimiento=p.idprocedimiento LEFT JOIN persona per ON b.idpersona = per.idpersona WHERE b.idboleta='$idboleta'");
		return $query->result();
	}
	//pARA OBTENER LA CANTIDAD DE DETALLES POR BOLETA
	public function cantidad_detalles($idboleta){
		$query = $this->db->query("SELECT * FROM detalle WHERE boleta_id_boleta = '$idboleta'");
		return $query->num_rows();
	}
	//PARA OBTENER DETALLES POR FECHAS
	public function boletas_fechas($f_inicio, $f_fin){
		$query = $this->db->query("SELECT * FROM boleta b LEFT JOIN detalle d ON b.idboleta = d.boleta_idboleta LEFT JOIN procedimiento p ON d.idprocedimiento = p.idprocedimiento LEFT JOIN persona per ON b.idpersona=per.idpersona WHERE b.fecha BETWEEN '$f_inicio' AND '$f_fin'");
		return $query->result();
	}

	//PARA OBTENER DATOS NETAMENTE DE LA BOLETA Y PERSONA, SIN DETALLES 
	public function get_boleta($idboleta){
		$query = $this->db->query("SELECT * FROM boleta b LEFT JOIN persona p ON b.idpersona = p.idpersona WHERE b.idboleta = '$idboleta'");
		return $query->result();
	}
	//PARA OBTENER ID BOLETAS POR FECHA
	public function idboletas_fechas($f_inicio, $f_fin){
		$query = $this->db->query("SELECT * FROM boleta b WHERE b.fecha BETWEEN '$f_inicio' AND '$f_fin'");
		return $query->result();
	}
}

 ?>