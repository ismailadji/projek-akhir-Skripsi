<?php

class Tam_prof_perpus extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->model('m_tamprof_perpus');
    }

    public function index()
    {
        $isi['content'] = 'pengaturan_profil_perpus/tampil_profil_perpus'; // memnaggil folder Pprof_perpus degna tampil_profil_perpus
        $isi['judul']   = 'Profil Perpustakaan';
        $isi['profil']  = $this->m_tamprof_perpus->index();
        $this->load->view('v_dashboard', $isi);
    }
}
?>