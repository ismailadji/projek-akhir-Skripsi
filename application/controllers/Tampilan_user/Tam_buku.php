<?php

class Tam_buku extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tampilan_user/m_tam_buku');
        $this->load->helper('url');
        // $this->load->library('Ciqrcode');// untuk memanggil library qrcode
    }

    public function index()
    {
        $isi['content'] = 'tampilan_user/tam_buku/v_tam_buku'; // memnaggil folder buku degna v_buku
        $isi['judul']   = 'Daftar Data Buku';
        $isi['data']    = $this->db->get('buku')->result(); // memanggil data tbl buku dari db
        $this->load->view('v_dashboard_user', $isi);
    }

    public function detail($id_buku)
    {
        $isi['content']     = 'tampilan_user/tam_buku/tam_detail_buku'; // memnaggil folder buku dengan detail_buku
        $isi['judul']       = 'Detail Data Buku';
        $isi['data']        = $this->m_tam_buku->detail($id_buku);
        $isi['kategori']    =  $this->db->get('kategori')->result();
        $isi['rak']         =  $this->db->get('rak')->result();
        $this->load->view('v_dashboard_user', $isi);
    }
}