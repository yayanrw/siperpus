<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendendaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->Model_security->getSecurity();
		$this->load->model('Model_pendendaan');
	}

	public function index()
	{
		$data['pendendaan'] = $this->Model_pendendaan->get();
		$data['denda'] = $this->Model_pendendaan->getDenda();
		$data['title']   = 'Data Pendendaan';
		$this->load->view('pendendaan/pendendaan', $data);
	}

	public function updateDenda()
	{
		$this->Model_pendendaan->updateDenda();
	}

}

/* End of file Pendendaan.php */
/* Location: ./application/controllers/Pendendaan.php */