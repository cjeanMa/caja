<?php 
	class Model_Usuario extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->library('session');
		}

		public function get_usuario($usuario, $pass){
			$query = $this->db->query("SELECT * FROM usuario u LEFT JOIN persona p ON u.idpersona = p.idpersona LEFT JOIN permisos ps ON u.permiso = ps.idpermiso LEFT JOIN habilitacion h ON u.habilitacion = h.idhabilitacion WHERE u.usuario = '$usuario' AND u.contraseña = '$pass'");
			return $query->result();
		}

		public function insertarUsuario($ap, $am, $nom, $usu, $pas, $tu){
			$array = array(
				'apellidoPaterno' => $ap,
				'apellidoMaterno' => $am,
				'nombres' => $nom,
				'nomUsuario' => $usu,
				'pass' => SHA1($pas),
				'idtipo_usuario' => $tu
			);
			$this->db->insert('usuario',$array);
		}
		public function mostrar(){
			$query=$this->db->query("SELECT * FROM persona per RIGHT JOIN usuario u on per.idpersona = u.idpersona
			 INNER JOIN permisos p ON u.permiso = p.idpermiso");
			return $query->result();
		}

		public function eliminarUsuario($id){
			$this->db->where('idusuario', $id);
			$this->db->delete('usuario');
		}

		public function datosEditar($id){
			//$consulta = $this->db->query("SELECT * FROM usuario u INNER JOIN permisos t ON u.idtipo_usuario = t.idtipo_usuario WHERE u.idusuario = $id");
			$this->db->select();
			$this->db->from('usuario u');
			$this->db->join('permisos p','u.permiso=p.idpermiso','left');
			$this->db->where('u.idusuario',$user);
			$consulta = $this->db->get();
			return $consulta->result();
		}

		public function actualizarUsuario($id,$ap, $am, $nom, $usu, $pas, $tu){
			$array = array(
				'apellidoPaterno' => $ap,
				'apellidoMaterno' => $am,
				'nombres' => $nom,
				'nomUsuario' => $usu,
				'pass' => $pas,
				'idtipo_usuario' => $tu
			);
			$this->db->where('idusuario',$id);
			$this->db->update('usuario',$array);
		}

		//funcion para verificar si existe session activa
		public function verificar_session(){
			
		}


		//funcion para verificar usuario en el modulo login
		public function verificar_usuario($user, $pas){
			$per = array('1','3');
			$this->db->select('u.idusuario, u.usuario, u.contraseña, u.permiso, u.habilitacion, p.idpersona, p.apellidoPaterno, p.apellidoMaterno, p.nombres');
			$this->db->from('usuario u');
			$this->db->join('persona p', 'u.idpersona = p.idpersona', 'left');
			$this->db->where('usuario',$user);
			$this->db->where('contraseña', $pas);
			$this->db->where('habilitacion=', '1');
			$this->db->where_in('permiso', $per);
			$resultado = $this->db->get();

			if ($resultado->num_rows() == 1) {
				$r_data = $resultado->row();
				
				$data_session = array(
					'idusuario' => $r_data->idusuario,
					'usuario' => $r_data->usuario,
					'password' => $r_data->contraseña,
					'permiso' => $r_data->permiso,
					'nom_completo' => $r_data->nombres.' '.$r_data->apellidoPaterno.' '.$r_data->apellidoMaterno
					);

				$this->session->set_userdata($data_session);

				return 1;
			}
			else{
				return  0;
			}
		}

		public function datos_basicos($user, $pas){
			$consulta = $this->db->query("SELECT u.idusuario, u.usuario, u.permiso, u.habilitacion, concat(p.apellidoPaterno,' ', p.apellidoMaterno,' ', p.nombres) nombres FROM usuario u LEFT JOIN persona p ON u.idpersona = p.idpersona WHERE u.usuario = '$user' AND u.contraseña = '$pas'");
			return $consulta->result();
		}

		public function datos_usuario($user, $pas){
			$consulta = $this->db->query('SELECT * FROM usuario u left join persona p on u.idperonsa = p.idpersona WHERE u.usuario = $user AND u.contraseña');
			return $consulta->result();
		}

		public function cerrar_sesion(){
			$this->session->sess_destroy();
			redirect('');
		}
	}
 ?>