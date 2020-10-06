<?php 
	Class Model_Cprocedimientos extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function mostrar_cprocedimientos(){
			$query = $this->db->query("SELECT * FROM cprocedimientos ORDER BY denominacion ASC");
			return $query->result();
		}

	}

 ?>