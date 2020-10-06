<?php 

	class Model_TiposUsuario extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function MostrarTiposUsuario(){
			$query = $this->db->query("SELECT * FROM permisos");
			//retornamos la consulta $query
			return $query->result();
		}

	}

 ?>