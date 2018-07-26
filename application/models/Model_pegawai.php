<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pegawai extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->model('Model_upload');
    }

    public function index()
    {
        return $this->db->get('pegawai')->result();
    }

    public function select($id_pegawai)
    {
        return $this->db->get_where('pegawai', array('id_pegawai' => $id_pegawai ))->row();
    }

    public function store()
    {
        if (isset($_POST['simpan'])) {
            $this->Model_upload->uploadFile('admin');

            if (! $this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                die();
            } else {
                $password = $this->input->post('password');
                $object = array(
                    'id_pegawai' => $this->input->post('id_pegawai'),
                    'password'   => $this->encryption->encrypt($password),
                    'nama'       => $this->input->post('nama'),
                    'jk'         => $this->input->post('jk'),
                    'tempat'     => $this->input->post('tempat'),
                    'tgl_lahir'  => $this->input->post('tgl_lahir'),
                    'no_telp'    => $this->input->post('no_telp'),
                    'alamat'     => $this->input->post('alamat'),
                    'foto'       => $this->upload->data('file_name')
                    );
                $this->db->insert('pegawai', $object);
                $this->session->set_flashdata('info', 'Data berhasil ditambahkan!');
                redirect('pegawai', 'refresh');
            }
        } else {
            $this->load->view('pegawai/view_pegawai');
        }
    }

    public function delete($id_pegawai)
    {
        $row = $this->select($id_pegawai);
        unlink('./public/img/admin/'.$row->foto);
        $this->db->delete('pegawai', array('id_pegawai' => $id_pegawai));
        $this->session->set_flashdata('info', 'Data berhasil dihapus!');
        redirect('pegawai', 'refresh');
    }

    public function update($id_pegawai)
    {
        $this->Model_upload->uploadFile('admin');

        if (empty($_FILES['foto']['name'])) {
            $password = $this->input->post('password');
            $object = array(
                    'id_pegawai' => $this->input->post('id_pegawai'),
                    'password'   => $this->encryption->encrypt($password),
                    'nama'       => $this->input->post('nama'),
                    'jk'         => $this->input->post('jk'),
                    'tempat'     => $this->input->post('tempat'),
                    'tgl_lahir'  => $this->input->post('tgl_lahir'),
                    'no_telp'    => $this->input->post('no_telp'),
                    'alamat'     => $this->input->post('alamat')
                    );
            $this->db->update('pegawai', $object, array('id_pegawai' => $id_pegawai));
            $this->session->set_flashdata('info', 'Data berhasil diubah!');
            redirect('pegawai/show/'.$id_pegawai, 'refresh');
        } else {
            $row = $this->select($id_pegawai);
            unlink('./public/img/admin/'.$row->foto);
            $this->upload->do_upload('foto');
            $password = $this->input->post('password');
            $object = array(
                    'id_pegawai' => $this->input->post('id_pegawai'),
                    'password'   => $this->encryption->encrypt($password),
                    'nama'       => $this->input->post('nama'),
                    'jk'         => $this->input->post('jk'),
                    'tempat'     => $this->input->post('tempat'),
                    'tgl_lahir'  => $this->input->post('tgl_lahir'),
                    'no_telp'    => $this->input->post('no_telp'),
                    'alamat'     => $this->input->post('alamat'),
                    'foto'       => $this->upload->data('file_name')
                    );
            $this->db->update('pegawai', $object, array('id_pegawai' => $id_pegawai));
            $this->session->set_flashdata('info', 'Data berhasil diubah!');
            redirect('pegawai/show/'.$id_pegawai, 'refresh');
        }
    }

}

/* End of file Model_pegawai.php */
/* Location: ./application/models/Model_pegawai.php */
