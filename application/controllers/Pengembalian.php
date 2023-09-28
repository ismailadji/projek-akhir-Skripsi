<?php

class Pengembalian extends CI_Controller{

    public function index()
    {
        $isi['content'] = 'pengembalian/v_pengembalian';
        $isi['judul'] = 'Data Pengembalian Buku';
        $this->load->model('m_pengembalian');
        $isi['data'] = $this->m_pengembalian->getAllData();
        $this->load->view('v_dashboard', $isi);
    }

    public function hapus($id_pengembalian)
    {
        $hapus = $this->m_pengembalian->hapus($id_pengembalian);
        if ($hapus = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            redirect('pengembalian');
        }
    }
}
