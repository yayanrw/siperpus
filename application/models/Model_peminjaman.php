<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_peminjaman extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_buku');
    }
    

    public function index()
    {
        return $this->db->get('peminjaman')->result();
    }

    public function getPeminjaman()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.nim = anggota.nim');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $query = $this->db->get()->result();
        return $query;
    }

    public function select($nim)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.nim = anggota.nim');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('anggota.nim', $nim);
        $query = $this->db->get()->result();
        return $query;
    }

    public function selectPeminjaman($id_peminjaman)
    {
        return $this->db->get_where('peminjaman', array('id_peminjaman' => $id_peminjaman))->row();
    }

    public function selectByBuku($id_buku)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.nim = anggota.nim');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('buku.id_buku', $id_buku);
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function selectById($id_peminjaman)
    {
        $peminjaman = $this->selectPeminjaman($id_peminjaman);

        if ($peminjaman->denda == 'Ya') {
         $this->db->select('*');
         $this->db->from('peminjaman');
         $this->db->join('anggota', 'peminjaman.nim = anggota.nim');
         $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
         $this->db->join('pendendaan', 'peminjaman.id_peminjaman = pendendaan.id_peminjaman');
         $this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
         $query = $this->db->get()->row();
         return $query;
     }
     else {
       $this->db->select('*');
       $this->db->from('peminjaman');
       $this->db->join('anggota', 'peminjaman.nim = anggota.nim');
       $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
       $this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
       $query = $this->db->get()->row();
       return $query;
   }
}

public function getBuku($id_buku)
{
    return $this->Model_buku->select($id_buku);
}

public function getDenda()
{
    return $this->db->get_where('denda', array('id_denda' => 1))->row();
}

public function cekJumlahBuku($id_buku)
{
    $buku     = $this->getBuku($id_buku);
    $jumlah   = $buku->jumlah;
    $dipinjam = $buku->dipinjam;
    if ($jumlah > $dipinjam) {
            return true; //Boleh dipinjam
        } else {
            return false; //Tidak boleh dipinjam
        }
    }

    public function updateBuku($id_buku, $operasi)
    {
        $dipinjam = $this->getBuku($id_buku)->dipinjam;
        if ($operasi == 'pinjam') {
            $dipinjam+=1;
        } elseif ($operasi == 'kembali') {
            $dipinjam-=1;
        }
        $object = array(
            'dipinjam' => $dipinjam
        );
        $this->db->update('buku', $object, array('id_buku' => $id_buku));
    }

    public function update($id_peminjaman)
    {
        $catatan = $this->input->post('catatan');
        $tgl_kembali = $this->input->post('tgl_kembali');
        if (date('Y-m-d') > $tgl_kembali) {
            $date1 = strtotime($tgl_kembali);
            $date2 = strtotime(date('Y-m-d'));

            $sec = $date2-$date1;

            $days = $sec / 86400;
            
            $denda = $this->getDenda();

            $object = array(
                'id_peminjaman' => $id_peminjaman,
                'total' => $days*$denda->denda 
            );
            $this->db->insert('pendendaan', $object);

            $object = array(
                'status' => 'Sudah Kembali',
                'catatan' => $this->input->post('catatan'),
                'denda' => 'Ya'
            );
            $this->db->update('peminjaman', $object, array('id_peminjaman' => $id_peminjaman));
        }
        else {
            $object = array(
                'status' => 'Sudah Kembali',
                'catatan' => $this->input->post('catatan')
            );
            $this->db->update('peminjaman', $object, array('id_peminjaman' => $id_peminjaman));

            $buku = $this->selectById($id_peminjaman);
            $dipinjam = $buku->dipinjam - 1;
            $object = array(
                'dipinjam' => $dipinjam
            );
            $this->db->update('buku', $object, array('id_buku' => $buku->id_buku));
        }
        
        $this->session->set_flashdata('notif', 'Data berhasil diubah!');
        redirect('peminjaman/show/'.$id_peminjaman, 'refresh');
    }

    // Proses pinjam
    public function store($operasi)
    {
        $id_buku = $this->input->post('id_buku');
        $buku = $this->getBuku($id_buku);
        $cekJumlahBuku = $this->cekJumlahBuku($id_buku);

        if ($cekJumlahBuku == true) {
            $this->updateBuku($id_buku, $operasi);
            $object = array(
                'nim'         => $this->input->post('nim'),
                'id_buku'     => $id_buku,
                'id_pegawai'  => $this->session->userdata('username'),
                // 'tgl_pinjam'  => date('Y-m-d'),
                'tgl_kembali' => date('Y-m-d', strtotime("+1 week")),
                'status'      => 'Belum Kembali',
                'denda'       => 'Tidak',
                'catatan'     => $this->input->post('catatan')
            );
            $this->db->insert('peminjaman', $object);
            redirect('peminjaman', 'refresh');
        } else {
            $this->session->set_flashdata('notif', 'Maaf buku <u>'.$buku->judul.'</u> sedang dipinjam');
            redirect('peminjaman', 'refresh');
        }
    }

    public function sedangDiPinjam()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.nim = anggota.nim');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('status', 'Belum Kembali');
        $this->db->where('tgl_kembali >=', date('Y-m-d'));
        $query = $this->db->get()->result();
        return $query;
    }

    public function terlambat()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.nim = anggota.nim');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('status', 'Belum Kembali');
        $this->db->where('tgl_kembali <=', date('Y-m-d'));
        $query = $this->db->get()->result();
        return $query;
    }

    public function sudahDikembalikan()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.nim = anggota.nim');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('status', 'Sudah Kembali');
        $query = $this->db->get()->result();
        return $query;
    }

    public function histori()
    {
        return $this->db->get_where('peminjaman', array('status' => 'Sudah Kembali'))->result();
    }
}

/* End of file Model_peminjaman.php */
/* Location: ./application/models/Model_peminjaman.php */
