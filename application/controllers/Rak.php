<?php

class Rak extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_rak');
        
    }

    public function index()
    {
        $isi['content'] = 'Rak/v_rak'; // memnaggil folder rak degna v_rak
        $isi['judul']   = 'Daftar Data rak Buku';
        $isi['data']    = $this->db->get('rak')->result(); // memanggil data tbl lapiran dari db
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_rak()
    {
        $isi['content']     = 'Rak/form_rak'; // memnaggil folder rak dengan form_rak
        $isi['judul']       = 'Form Tambah Rak';
        $isi['id_rak']  = $this->m_rak->id_rak();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {    
        $data = array(
            'id_rak'           => $this->input->post('id_rak'),
            'nama_rak'        => $this->input->post('nama_rak')
        );
        $query = $this->db->insert('rak', $data);// rak : nama tabel
        if ($query = true){
            $this->session->set_flashdata('info', 'Data Berhasil di Tambah');
            redirect('rak'); //adata yang berhasil maka akan menampilkan con rak
        }else{
            redirect('rak/form_rak');
        }   
    }

    public function hapus($id)
    {
        $hapus = $this->m_rak->hapus($id);
        if ($hapus = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            redirect('rak');
        }
    }
}