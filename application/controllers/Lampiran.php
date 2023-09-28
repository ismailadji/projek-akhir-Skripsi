<?php

class Lampiran extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_lampiran');
        $this->load->helper('download');
        
    }

    public function index()
    {
        $isi['content'] = 'Lampiran/v_lampiran_buku'; // memnaggil folder lampiran degna v_lampiran
        $isi['judul']   = 'Daftar Data Lampiran Buku';
        $isi['data']    = $this->db->get('tbl_lampiran')->result(); // memanggil data tbl lapiran dari db
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_lampiran()
    {
        $isi['content']     = 'Lampiran/form_lampiran'; // memnaggil folder lampiran dengan form_lampiran
        $isi['judul']       = 'Form Tambah Lampiran';
        $isi['id_lampiran']  = $this->m_lampiran->id_lampiran();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan() 
    {
        $config['upload_path']          = 'assets/image/buku/lampiran';
		$config['allowed_types']        = 'pdf|docx';
		$config['max_size']             = 3024;
		$this->load->library('upload', $config);
        $this->upload->do_upload('lampiran_buku');
        $file_name = $this->upload->data();

        $data = array(
            'id_lampiran'   => $this->input->post('id_lampiran'),
            'lampiran_buku' => $file_name['file_name'],
            'tgl_masuk'     => $this->input->post('tgl_masuk')
        );
        $query = $this->db->insert('tbl_lampiran', $data);// Anggota : nama tabel
        if ($query = true){
            $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
            redirect('Lampiran'); //adata yang berhasil maka akan menampilkan con Lampiran
        }else{
            redirect('Lampiran/form_lampiran');
        }
    }

    public function unduh($id)
    {
        // load model m_lampiran
        $this->load->model('m_lampiran');
        
        // ambil data lampiran berdasarkan id
        $data_lampiran = $this->m_lampiran->get_lampiran_by_id($id);
        
        // tentukan header respons untuk file yang akan diunduh
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Disposition: attachment; filename=".$data_lampiran->lampiran_buku);
        
        // baca file dan kirimkan ke browser
        readfile(base_url('assets/image/buku/lampiran/'.$data_lampiran->lampiran_buku));
    }

    public function hapus($id)
    {
        $hapus = $this->m_lampiran->hapus($id);
        if ($hapus = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            redirect('lampiran');
        }
    }
}