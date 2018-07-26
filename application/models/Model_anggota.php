<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_anggota extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_upload');
    }

    public function index()
    {
        $data = $this->db->get('anggota');
        return $data->result();
    }

    public function jurusan()
    {
        return $this->db->get('jurusan')->result();
    }

    public function prodi()
    {
        return $this->db->get('prodi')->result();
    }

    public function select($nim)
    {
        return $this->db->get_where('anggota', array('nim' => $nim))->row();
    }

    public function store()
    {
        $this->Model_upload->uploadFile('anggota');

        if (! $this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            die();
            $this->load->view('anggota/view_anggotaadd');
        } else {
            $object = array(
                'nim'       => $this->input->post('nim'),
                'nama'      => $this->input->post('nama'),
                'jurusan'   => $this->input->post('jurusan'),
                'prodi'     => $this->input->post('prodi'),
                'jk'        => $this->input->post('jk'),
                'tempat'    => $this->input->post('tempat'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_telp'   => $this->input->post('no_telp'),
                'alamat'    => $this->input->post('alamat'),
                'foto'      => $this->upload->data('file_name')
                );
            $this->db->insert('anggota', $object);
            $this->session->set_flashdata('info', 'Data berhasil ditambahkan!');
            redirect('anggota', 'refresh');
        }
    }

    public function delete($nim)
    {
        $row = $this->select($nim);
        unlink('./public/img/anggota/'.$row->foto);
        $this->db->delete('anggota', array('nim' => $nim));
        $this->session->set_flashdata('info', 'Data berhasil dihapus!');
        redirect('anggota', 'refresh');
    }

    public function update($nim)
    {
        $this->Model_upload->uploadFile('anggota');

        if (empty($_FILES['foto']['name'])) {
            $object = array(
                    'nama'      => $this->input->post('nama'),
                    'jurusan'   => $this->input->post('jurusan'),
                    'prodi'     => $this->input->post('prodi'),
                    'jk'        => $this->input->post('jk'),
                    'tempat'    => $this->input->post('tempat'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'no_telp'   => $this->input->post('no_telp'),
                    'alamat'    => $this->input->post('alamat')
                    );
            $this->db->update('anggota', $object, array('nim' => $nim));
            $this->session->set_flashdata('info', 'Data berhasil diubah!');
            redirect('anggota/show/'.$nim, 'refresh');
        } else {
            $row = $this->select($nim);
            unlink('./assets/gambar/anggota/'.$row->foto);
            $this->upload->do_upload('foto');
            $object = array(
                    'nama'      => $this->input->post('nama'),
                    'jurusan'   => $this->input->post('jurusan'),
                    'prodi'     => $this->input->post('prodi'),
                    'jk'        => $this->input->post('jk'),
                    'tempat'    => $this->input->post('tempat'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'no_telp'   => $this->input->post('no_telp'),
                    'alamat'    => $this->input->post('alamat'),
                    'foto'      => $this->upload->data('file_name')
                    );
            $this->db->update('anggota', $object, array('nim' => $nim));
            $this->session->set_flashdata('info', 'Data berhasil diubah!');
            redirect('anggota/show/'.$ni, 'refresh');
        }
    }

    public function edit($nim)
    {
        $data['anggota'] = $this->select($nim);   
        $data['jurusan'] = $this->jurusan();
        $data['prodi'] = $this->prodi();
        $this->load->view('anggota/view_anggotaupdate', $data);
    }
}

/* End of file Model_anggota.php */
/* Location: ./application/models/Model_anggota.php */
