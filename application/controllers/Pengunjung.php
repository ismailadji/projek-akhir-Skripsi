<?php

class Pengunjung extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengunjung');
        $this->load->library('session');
        $this->load->library('ciqrcode');
    }
    
    public function index()
    {
        $isi['content'] = 'Pengunjung/v_pengunjung'; // memnaggil folder pengunjung degna v_pengunjung
        $isi['judul']   = 'Data Pengunjung';
        $isi['data']    = $this->db->get('pengunjung')->result(); // memanggil data tbl pengunjung dari db
        $this->load->view('v_dashboard', $isi);
    }

    // public function isi_pengunjung()
    // {
    //     // Mendapatkan hasil scan QR code
    //     $data['result'] = $this->session->flashdata('hasil_scan_qr_code');


    //     $isi['content']     = 'Pengunjung/bk_pengunjung'; // memnaggil folder Pengunjung dengan bk_pengunjung
    //     $isi['judul']       = 'Isi Buku Pengunjung'; 
    //     $this->load->view('v_dashboard', $isi);
    //     $this->load->view('templates/scan_header', $isi);
    //     $this->load->view('templates/scan_footer', $isi);
    // }

    public function isi_pengunjung()
    {
        $isi['content'] = 'Pengunjung/bk_pengunjung'; // memanggil folder Pengunjung dengan bk_pengunjung
        $isi['judul'] = 'Isi Buku Pengunjung';
        
        // Mendapatkan data nama dan kelas dari variabel session
        $isi['nama'] = $this->session->userdata('nama');
        $isi['kelas'] = $this->session->userdata('kelas');

        $this->load->view('v_dashboard', $isi);
        $this->load->view('templates/scan_header', $isi);
        $this->load->view('templates/scan_footer', $isi);
    }

    // public function simpan()
    // {
    //     $data = array(
    //         'tanggal_kunjung'   => $this->input->post('tanggal_kunjung'),
    //         'nama'              => $this->input->post('nama'),
    //         'kelas'             => $this->input->post('kelas'),
    //         'keperluan'        => $this->input->post('keperluan') 
    //     );
    //     $query = $this->db->insert('pengunjung', $data);// pengunjung : nama tabel
    //     if ($query = true){
    //         $this->session->set_flashdata('info', 'Data Berhasil di Tambah, Selamat Datang');
    //         redirect('Pengunjung'); //adata yang berhasil maka akan menampilkan con pengunjung
    //     }  
    // }

    public function simpan()
    {
        $data = array(
            'tanggal_kunjung'   => $this->input->post('tanggal_kunjung'),
            'nama'              => $this->input->post('nama'),
            'kelas'             => $this->input->post('kelas'),
            'keperluan'         => $this->input->post('keperluan') 
        );
    
        // Mendapatkan hasil scan QR code
        $hasilScanQRCode = $this->input->post('qrcode');
        
        if (!empty($hasilScanQRCode)) {
            $dataQRCode = explode('|', $hasilScanQRCode);
            $data['nama'] = $dataQRCode[3];
            $data['kelas'] = $dataQRCode[4];

            // Simpan data nama dan kelas dalam variabel session
            $this->session->set_userdata('nama', $data['nama']);
            $this->session->set_userdata('kelas', $data['kelas']);
            
            // Kembalikan ke halaman bk_pengunjung
            redirect('Pengunjung/isi_pengunjung');
        }
        
        $query = $this->db->insert('pengunjung', $data);
    
        if ($query === true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Tambah, Selamat Datang');
            redirect('Pengunjung');
        }
    }
    

    public function hapus($id)
    {
        $hapus = $this->m_pengunjung->hapus($id);
        if ($hapus = true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            redirect('Pengunjung'); //data yang berhasil maka akan diarahkan ke con Pengunjung
        }
    }
}