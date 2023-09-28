<?php

class Tam_lampiran extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tampilan_user/m_tam_lampiran');
        
    }

    public function index()
    {
        $isi['content'] = 'tampilan_user/tam_lampiran/v_tam_lampiran_buku'; // memnaggil folder tam_lampiran degna v_tam_lampiran_buku
        $isi['judul']   = 'Daftar Data Lampiran Buku';
        $isi['data']    = $this->db->get('tbl_lampiran')->result(); // memanggil data tbl lapiran dari db
        $this->load->view('v_dashboard_user', $isi);
    }

    public function unduh($id)
    {
        // load model m_tam_lampiran
        $this->load->model('m_tampilan_user/m_tam_lampiran');
        
        // ambil data lampiran berdasarkan id
        $data_lampiran = $this->m_tam_lampiran->get_lampiran_by_id($id);
        
        // tentukan header respons untuk file yang akan diunduh
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Disposition: attachment; filename=".$data_lampiran->lampiran_buku);
        
        // baca file dan kirimkan ke browser
        readfile(base_url('assets/image/buku/lampiran/'.$data_lampiran->lampiran_buku));
    }
    
}