<?php 

	Class Error404 extends CI_Controller{
		public function index(){
			$this->load->view('errors/cli/error_404');
		}
	} 
 ?>