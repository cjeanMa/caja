<?php 

Class Model_Persona extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function mostrar_personas(){
		$query = $this->db->query("SELECT * FROM persona");
		return $query->result();
	}

	public function insertar_persona($id, $apat, $amat, $nom, $fn=null, $sex=null, $dir=null, $em=null, $nc=null, $disc='NO', $con='NO'){
		$array = array(
			'idPersona' => $id,
			'apellidoPaterno' => $apat,
			'apellidoMaterno' => $amat,
			'nombres' => $nom,
			'fechaNacimiento' => $fn,
			'sexo' => $sex,
			'direccion' => $dir,
			'email' => $em,
			'numCelular'=> $nc,
			'discapacidad' => $disc,
			'conadis' => $con
		);
		$this->db->insert('persona', $array);
	}

	public function verificar_persona($idpersona){
		$query = $this->db->query("SELECT * FROM persona WHERE idpersona = '$idpersona'");
		if (!$query->result()) {
			return false;
		}
		else return true;
	}
	//conseguir datos personales basicos en base al dni
	public function nombre_completo($dni){
		$query = $this->db->query("SELECT * FROM persona WHERE idPersona = '$dni'");
		return $query->result();
	}
}

 ?>