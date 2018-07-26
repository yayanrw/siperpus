<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_security extends CI_Model {

	public function getSecurity()
	{
		$username = $this->session->userdata('username');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}

	public function getSecurityAdmin()
	{
		$level = $this->session->userdata('level');
		if ($level != 'admin') {
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}

	public function getSecurityPegawai()
	{
		$level = $this->session->userdata('level');
		if ($level != 'pegawai') {
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}

	public function getSecurityViewLogin()
	{
		$level = $this->session->userdata('level');
		if ($level == 'admin') {
			redirect('beranda','refresh');
		}
		elseif($level == 'pegawai') {
			redirect('beranda_pegawai','refresh');
		}
		else{
			$data['sistem'] = $this->Model_sistem->getSistem();
			$this->load->view('view_login', $data);
		}
	}

}

/* End of file Model_security.php */
/* Location: ./application/models/Model_security.php */