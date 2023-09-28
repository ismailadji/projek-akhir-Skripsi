<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $this->m_squrity->getSqurity();
        $isi['content'] = 'v_home';
        $isi['judul']   = 'Dashboard Admin';

        $this->load->model('m_dashboard');
        $isi['peminjaman']  = $this->m_dashboard->countPeminjaman();
        $isi['pengunjung']  = $this->m_dashboard->countPengunjung();
        $isi['anggota']     = $this->m_dashboard->countAnggota();
        $isi['buku']        = $this->m_dashboard->countBuku();
        $this->load->view('v_dashboard', $isi);
    }
}
// buat menampilkan data di dashboar
// $isi['count_peminjaman']  =    $this->db->query("SELECT * FROM peminjaman")->num_rows();
// $isi['count_pengunjung']  =    $this->db->query("SELECT * FROM pengunjung")->num_rows();
// $isi['count_anggota']     =    $this->db->query("SELECT * FROM anggota")->num_rows();
// $isi['count_buku']        =    $this->db->query("SELECT * FROM buku")->num_rows();