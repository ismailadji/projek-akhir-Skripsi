<?php

class Tam_pengunjung extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tampilan_user/m_tam_pengunjung');
        
    }
    
    public function index()
    {
        $isi['content'] = 'tampilan_user/tam_pengunjung/v_tam_pengunjung'; // memnaggil folder pengunjung degna v_tam_pengunjung
        $isi['judul']   = 'Data Pengunjung';
        $isi['data']    = $this->db->get('pengunjung')->result(); // memanggil data tbl pengunjung dari db
        $this->load->view('v_dashboard_user', $isi);
    }

    public function tam_isi_pengunjung()
    {
        $isi['content']     = 'tampilan_user/tam_pengunjung/tam_bk_pengunjung'; // memnaggil folder Pengunjung dengan bk_pengunjung
        $isi['judul']       = 'Isi Buku Pengunjung'; 
        $this->load->view('v_dashboard_user', $isi);
        $this->load->view('templates/scan_header', $isi);
        $this->load->view('templates/scan_footer', $isi);
    }

    public function simpan()
    {
        $data = array(
            'tanggal_kunjung'   => $this->input->post('tanggal_kunjung'),
            'nama'              => $this->input->post('nama'),
            'kelas'             => $this->input->post('kelas'),
            'keperluan'        => $this->input->post('keperluan') 
        );
        $query = $this->db->insert('pengunjung', $data);// pengunjung : nama tabel
        if ($query = true){
            $this->session->set_flashdata('info', 'Data Berhasil di Tambah');
            redirect('tampilan_user/tam_pengunjung'); //adata yang berhasil maka akan menampilkan con tam_pengunjung
        }  
    }
}