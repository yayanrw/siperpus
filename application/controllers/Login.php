<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_login');
		$this->load->model('Model_sistem');
		$this->load->library('encryption');
	}

	public function index()
	{
		$this->Model_security->getSecurityViewLogin();
	}

	public function cekLogin(){
		$this->load->model('Model_login');
		$cek = $this->Model_login->cekLogin();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */