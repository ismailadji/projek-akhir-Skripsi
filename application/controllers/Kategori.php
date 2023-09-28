<?php

class Kategori extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
        
    }

    public function index()
    {
        $isi['content'] = 'Kategori/v_kategori'; // memnaggil folder buku degna v_buku
        $isi['judul']   = 'Daftar Data Kategori Buku';
        $isi['data']    = $this->db->get('kategori')->result(); // memanggil data tbl kategori dari db
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_kategori()
    {
        $isi['content']     = 'Kategori/form_kategori'; // memnaggil folder buku dengan form_buku
        $isi['judul']       = 'Form Tambah Kategori';
        $isi['id_kategori']  = $this->m_kategori->id_kategori();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {    
        $data = array(
            'id_kategori'           => $this->input->post('id_kategori'),
            'nama_kategori'        => $this->input->post('nama_kategori')
        );
        $query = $this->db->insert('kategori', $data);// kategori : nama tabel
        if ($query = true){
            $this->session->set_flashdata('info', 'Data Berhasil di Tambah');
            redirect('kategori'); //adata yang berhasil maka akan menampilkan con kategori
        }else{
            redirect('kategori/form_kategori');
        }   
    }

    public function hapus($id)
    {
        $hapus = $this->m_kategori->hapus($id);
        if ($hapus = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            redirect('kategori');
        }
    }
}