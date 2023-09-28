<?php

class Tam_user extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tampilan_user/m_tam_user'); // Mengambil data anggota dari database
        $this->load->helper('url');
    
    }

    public function index()
    {
        $isi['content'] = 'tampilan_user/tam_user/v_tam_user'; // memnaggil folder anggota degna v_anggota
        $isi['judul']   = 'Daftar Data Anggota';
        $isi['data']    = $this->db->get('anggota')->result(); // memanggil data dari db
        $this->load->view('v_dashboard_user', $isi);
    }

    public function detail($id_anggota)
    {
        $isi['content']     = 'tampilan_user/tam_user/detail_tam'; // memnaggil folder tampilan_user dengan detail_tam
        $isi['judul']       = 'Detail Data Anggota';
        $isi['data']        = $this->m_tam_user->detail($id_anggota);
        $this->load->view('v_dashboard_user', $isi);
    }

    public function cetak_kartu_ang($id_anggota)  // Mengambil data anggota berdasarkan ID anggota dan mencetak kartu anggota
    {
        $isi['content']     = 'tampilan_user/tam_user/cetak_kartu_ang'; // memnaggil folder anggota dengan cetak_kartu_ang
        $isi['anggota']     = $this->m_tam_user->cetak_kartu_ang($id_anggota);
        $this->load->view('tampilan_user/tam_user/cetak_kartu_ang', $isi);
    }
}
