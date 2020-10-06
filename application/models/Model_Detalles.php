<?php 

Class Model_Detalles extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function mostrar_detalles(){
		$query = $this->db->query("SELECT * FROM detalle");
		return $query->result();
	}

	public function insertar_detalles($cantidad, $descripcion, $costo_detalle, $idboleta, $idprocedimiento){
		$datos = array(
			'cantidad' => $cantidad,
			'descripcion' => $descripcion,
			'costo_detalle' =>$costo_detalle,
			'boleta_idboleta' => $idboleta,
			'idprocedimiento' => $idprocedimiento);
		$this->db->insert('detalle', $datos);
	}

	public function detalles_boleta($idboleta){
		$query = $this->db->query("SELECT * FROM detalle d LEFT JOIN procedimiento p ON d.idprocedimiento = p.idprocedimiento LEFT JOIN boleta b ON d.boleta_idboleta = b.idboleta WHERE d.boleta_idboleta = '$idboleta'");
		return $query->result();
	}

	public function cantidad_detalles($idboleta){
		
	}

}
?>
