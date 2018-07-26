<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pendendaan extends CI_Model {

	public function get()
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('anggota', 'peminjaman.nim = anggota.nim');
		$this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
		$this->db->join('pendendaan', 'peminjaman.id_peminjaman = pendendaan.id_peminjaman');
		// $this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
		$query = $this->db->get()->result();
		return $query;
	}	

	public function getDenda($id_denda = 1)
	{
		return $this->db->get('denda', array('id_denda' => $id_denda ))->row();
	}

	public function updateDenda($id_denda = 1)
	{
		$object = array('denda' => $this->input->post('denda'));
		$this->db->update('denda', $object, array('id_denda' => $id_denda));
		$this->session->set_flashdata('info', 'Data berhasil diubah!');
		redirect('pendendaan', 'refresh');
	}

}

/* End of file Model_pendendaan.php */
/* Location: ./application/models/Model_pendendaan.php */