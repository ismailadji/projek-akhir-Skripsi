<?php

class Pprof_perpus extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_pprof_perpus');
    }

    
    public function index()
    {
        $isi['content'] = 'pengaturan_profil_perpus/v_prof_perpus'; // memnaggil folder Pprof_perpus degna v_prof_perpus
        $isi['judul']   = 'Pengaturan Profil Perpustakaan';
        $isi['profil']  = $this->m_pprof_perpus->index();
        $this->load->view('v_dashboard', $isi);
    }

    public function edit()
    {
        $isi['content']     = 'pengaturan_profil_perpus/edit_pprof_perpus'; // memnaggil folder pengaturan_profil_perpus dengan edit_pprof_perpus
        $isi['judul']       = 'Form Edit Profil Perpustakaan';
        $isi['profil']      = $this->m_pprof_perpus->edit();
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {    
        $profil = array(
            'id_profil_perpus'   => $this->input->post('id_profil_perpus'),    
            'nama_apk'           => $this->input->post('nama_apk'),
            'alamat_smp'         => $this->input->post('alamat_smp'),
            'email_smp'          => $this->input->post('email_smp'),
            'no_tlp_smp'         => $this->input->post('no_tlp_smp')
        );
        $query = $this->m_pprof_perpus->update($profil);
        // $query = $this->m_pdenda->update($id_denda, $data);
        if ($query = true){
            $this->session->set_flashdata('info', 'Data Berhasil di Update');
            redirect('Pprof_perpus'); //adata yang berhasil maka akan menampilkan con pdeda
        }  
    }
}
?>