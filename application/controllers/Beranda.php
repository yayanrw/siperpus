<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->Model_security->getSecurity();
		$this->load->model('Model_beranda');
			
	}

	public function index()
	{
		$level = $this->session->userdata('level');
		if ($level == 'admin') {
			$this->Model_security->getSecurityAdmin();
			$this->Model_beranda->index();
		}
		else {
			$this->Model_security->getSecurityPegawai();
			$this->Model_beranda->index();
		}	
	}

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */