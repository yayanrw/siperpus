<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function index()
	{
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('view_login');
		}
		else
		{
			$this->load->view('view_login');
		}
	}

	public function cekLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$queryAdmin = $this->db->get_where('admin', array('username' => $username));
		$resultAdmin = $queryAdmin->row();
		$queryPegawai = $this->db->get_where('pegawai', array('id_pegawai' => $username));
		$resultPegawai = $queryPegawai->row();

		if ($queryAdmin->num_rows() > 0) {
			$password_decDb = $this->encryption->decrypt($resultAdmin->password);
			if ($password_decDb == $password) {
				$array = array(
					'username' 	=>	$resultAdmin->username,
					'level'		=>  'admin',
					'nama' 		=>	$resultAdmin->nama,
					'foto'		=>  $resultAdmin->foto
					);				
				$this->session->set_userdata( $array );
				redirect('beranda','refresh');
			}
			else{
				$this->session->set_flashdata('notif', 'Password anda salah!');
				redirect('login','refresh');
			}
		}
		elseif ($queryPegawai->num_rows() > 0) {
			$password_decDb = $this->encryption->decrypt($resultPegawai->password);
			if ($password_decDb == $password) {
				$array = array(
					'username' 	=>	$resultPegawai->id_pegawai,
					'level'		=>  'pegawai',
					'nama' 		=>	$resultPegawai->nama,
					'foto'		=>  $resultPegawai->foto
					);				
				$this->session->set_userdata( $array );
				redirect('beranda','refresh');
			}
			else{
				$this->session->set_flashdata('notif', 'Password anda salah!');
				redirect('login','refresh');
			}
		}
		else{
			$this->session->set_flashdata('notif', 'Username atau ID anda Salah!');
			redirect('login','refresh');
		}
	}		

}

/* End of file Model_login.php */
/* Location: ./application/models/Model_login.php */