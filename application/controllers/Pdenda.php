<?php

class Pdenda extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pdenda');
        
    }

    public function index()
    {
        $isi['content'] = 'pengaturan_denda/v_pdenda'; // memnaggil folder pengaturan_denda degna v_pdenda
        $isi['judul']   = 'Pengaturan Denda';
        $isi['data']    = $this->db->get('tbl_biaya_denda')->result(); // memanggil data tbl_biaya_denda dari db
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_rpdenda()
    {
        $isi['content']     = 'pengaturan_denda/v_pdenda'; // memnaggil folder pengaturan_denda dengan form_denda
        $isi['judul']       = 'Form Tambah Biaya Denda';
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {    
        $data = array(
            'rp_denda'        => $this->input->post('rp_denda')
        );
        $query = $this->db->insert('tbl_biaya_denda', $data);// tbl_biaya_denda : nama tabel
        if ($query = true){
            $this->session->set_flashdata('info', 'Data Berhasil di Tambah');
            redirect('Pdenda'); //adata yang berhasil maka akan menampilkan con pdeda
        }  
    }

    public function edit($id)
    {
        $isi['content']     = 'pengaturan_denda/edit_pdenda'; // memnaggil folder pengaturan_denda dengan form_denda
        $isi['judul']       = 'Form Edit Biaya Denda';
        $isi['data']        = $this->m_pdenda->edit($id);
        $this->load->view('v_dashboard', $isi);
    }
    
    public function update()
    {    
        $data = array(
            'id_denda'   => $this->input->post('id_denda'),    
            'rp_denda'   => $this->input->post('rp_denda')
        );
        $query = $this->m_pdenda->update($data);
        // $query = $this->m_pdenda->update($id_denda, $data);
        if ($query = true){
            $this->session->set_flashdata('info', 'Data Berhasil di Update');
            redirect('Pdenda'); //adata yang berhasil maka akan menampilkan con pdeda
        }  
    }

    public function hapus($id)
    {
        $hapus = $this->m_pdenda->hapus($id);
        if ($hapus = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            redirect('pdenda'); //data yang berhasil maka akan diarahkan ke con Pdenda
        }
    }
}