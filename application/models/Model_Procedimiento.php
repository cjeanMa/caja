<?php 
	Class Model_Procedimiento extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function mostrar_procedimientos(){
			$query = $this->db->query("SELECT * FROM procedimiento");
			return $query->result();
		}

		public function proc_cprocedimientos($cprocedimiento){
			$query = $this->db->query("SELECT * FROM procedimiento WHERE idcprocedimientos = '$cprocedimiento'");
			return $query->result(); 
		}

		public function insertar_procedimiento($den, $p_a, $costo, $cp){
			$data = array('denominacion' => $den,
					'plazo_atencion' => $p_a,
					'costo' => $costo,
					'idcprocedimientos' => $cp);
			$this->db->insert('procedimiento', $data);
		}

		public function update_procedimiento($id, $den, $p_a, $costo, $cp){
			$data = array('denominacion' => $den,
					'plazo_atencion' => $p_a,
					'costo' => $costo,
					'idcprocedimientos' => $cp);
			$this->db->where('idprocedimiento', $id);
			$this->db->update('procedimiento', $data);
		}

		//obtener procedimiento por ID
		public function get_procedimiento($id){
			$query = $this->db->query("SELECT * FROM procedimiento WHERE idprocedimiento = '$id'");
			return $query->result();
		}

		//obtener costo por id
		public function get_costo($id){
			$result = $this->db->select('costo')->from('procedimiento')->where('idprocedimiento', '$id')->limit(1)->get()->row();
			return $result;
		}
	}

 ?>