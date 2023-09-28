<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tampilan_user/m_tam_dashboard_user');
        $this->load->helper('url');
        
    }

    public function index()
    {
        $this->m_squrity->getSqurity();
        $isi['content'] = 'v_home_user';
        $isi['judul']   = 'Dashboard User';

        $this->load->model('m_tam_dashboard_user');
        $isi['peminjaman']  = $this->m_tam_dashboard_user->countPeminjaman();
        $isi['pengunjung']  = $this->m_tam_dashboard_user->countPengunjung();
        $isi['anggota']     = $this->m_tam_dashboard_user->countAnggota();
        $isi['buku']        = $this->m_tam_dashboard_user->countBuku();
        $this->load->view('v_dashboard_user', $isi);
    }
}
// buat menampilkan data di dashboar
// $isi['count_peminjaman']  =    $this->db->query("SELECT * FROM peminjaman")->num_rows();
// $isi['count_pengunjung']  =    $this->db->query("SELECT * FROM pengunjung")->num_rows();
// $isi['count_anggota']     =    $this->db->query("SELECT * FROM anggota")->num_rows();
// $isi['count_buku']        =    $this->db->query("SELECT * FROM buku")->num_rows();