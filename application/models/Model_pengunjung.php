<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengunjung extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        
    }

    public function getPengunjung()
    {
        return $this->db->get_where('pengunjung', array('date' => date('Y-m-d')));
    }

    public function getHistori()
    {
       return $this->db->get_where('pengunjung', array('date <=' => date('Y-m-d')));
    }

    public function getPengunjungAnggota($nim)
    {
        return $this->db->get_where('pengunjung', array('nim' => $nim))->result();
    }

}
