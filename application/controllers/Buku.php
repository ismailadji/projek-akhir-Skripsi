<?php

class Buku extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_buku');
        $this->load->helper('url');
        // $this->load->library('Ciqrcode');// untuk memanggil library qrcode
    }

    public function index()
    {
        $isi['content'] = 'Buku/v_buku'; // memnaggil folder buku degna v_buku
        $isi['judul']   = 'Daftar Data Buku';
        $isi['data']    = $this->db->get('buku')->result(); // memanggil data tbl buku dari db
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_buku()
    {
        $isi['content']     = 'Buku/form_buku'; // memnaggil folder buku dengan form_buku
        $isi['judul']       = 'Form Tambah Buku';
        $isi['id_buku']     = $this->m_buku->id_buku();
        $isi['kategori']    =  $this->db->get('kategori')->result();
        $isi['rak']         =  $this->db->get('rak')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $config['upload_path']          = 'assets/image/buku';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 3024;
		$this->load->library('upload', $config);
        $this->upload->do_upload('gambar_buku');
        $file_name = $this->upload->data();
            
        $data = array(
            'id_buku'           => $this->input->post('id_buku'),
            'judul_buku'        => $this->input->post('judul_buku'),
            'isbn'              => $this->input->post('isbn'),
            'id_kategori'       => $this->input->post('id_kategori'),
            'id_rak'            => $this->input->post('id_rak'),
            'pengarang'         => $this->input->post('pengarang'),
            'penerbit'          => $this->input->post('penerbit'),
            'tahun_terbit'      => $this->input->post('tahun_terbit'),
            'jumlah_buku'       => $this->input->post('jumlah_buku'),
            'gambar_buku'       => $file_name['file_name'],
            // 'lampiran_buku'     => $file_name['file_name'],
            'tanggal_masuk'     => $this->input->post('tanggal_masuk'),
            // 'qr_code'        => $file_name['file_name']
        );
        $query = $this->db->insert('buku', $data);// buku : nama tabel
        if ($query = true){
            $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
            redirect('buku'); //adata yang berhasil maka akan menampilkan con buku
        }else{
            redirect('buku/form_buku');
        }   
    }

    public function edit($id)
    {
        $isi['content']     = 'buku/edit_buku'; // memnaggil folder buku dengan edit_buku
        $isi['judul']       = 'Form Edit Buku';
        $isi['data']        = $this->m_buku->edit($id);
        $isi['kategori']    =  $this->db->get('kategori')->result();
        $isi['rak']         =  $this->db->get('rak')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_buku = $this->input->post('id_buku');
        $config['upload_path']          = 'assets/image/buku';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 3024;
		$this->load->library('upload', $config);
        if (!empty($_FILES['gambar_buku']['name'])) {
            $this->upload->do_upload('gambar_buku');
            $upload = $this->upload->data();
            $image = $upload['file_name'];
        
            $data = array(
                'id_buku'           => $this->input->post('id_buku'),
                'judul_buku'        => $this->input->post('judul_buku'),
                'isbn'              => $this->input->post('isbn'),
                'id_kategori'       => $this->input->post('id_kategori'),
                'id_rak'            => $this->input->post('id_rak'),
                'pengarang'         => $this->input->post('pengarang'),
                'penerbit'          => $this->input->post('penerbit'),
                'tahun_terbit'      => $this->input->post('tahun_terbit'),
                'jumlah_buku'       => $this->input->post('jumlah_buku'),
                'gambar_buku'       => $file_name['file_name'],
                'tanggal_berubah'       => $this->input->post('tanggal_berubah'),
                // 'lampiran_buku'     => $file_name['file_name'],
                // 'qr_code'        => $file_name['file_name']
            );
            $id = $this->db->get_where('buku',['id_buku' => $id_buku])->row();
            $query = $this->m_buku->update($id_buku, $data);
            if ($query = true){ // jika data berhasil di update 
                $this->session->set_flashdata('info', 'Data Berhasil di Update'); // maka akan muncul flas data
                unlink('assets/image/buku/'.$id->gambar_buku);
                redirect('Buku'); //data yang berhasil maka akan diarahkan ke con buku
            }
        }
        else{
            $data = array(
                'id_buku'           => $this->input->post('id_buku'),
                'judul_buku'        => $this->input->post('judul_buku'),
                'isbn'              => $this->input->post('isbn'),
                'id_kategori'       => $this->input->post('id_kategori'),
                'id_rak'            => $this->input->post('id_rak'),
                'pengarang'         => $this->input->post('pengarang'),
                'penerbit'          => $this->input->post('penerbit'),
                'tahun_terbit'      => $this->input->post('tahun_terbit'),
                'jumlah_buku'       => $this->input->post('jumlah_buku'),
                'tanggal_berubah'       => $this->input->post('tanggal_berubah'),
                // 'lampiran_buku'     => $file_name['file_name'],
                // 'qr_code'        => $file_name['file_name']
            );
            $query = $this->m_buku->update($id_buku, $data);
            if ($query = true){ // jika data berhasil di update 
                $this->session->set_flashdata('info', 'Data Berhasil di Update'); // maka akan muncul flas data
                redirect('Buku'); //data yang berhasil maka akan diarahkan ke con buku
            }
        }
    }
    
    public function hapus($id_buku)
    {
        $id = $this->db->get_where('buku',['id_buku' => $id_buku])->row();
        $hapus = $this->m_buku->hapus($id_buku);
        if ($hapus = true){ // jika data berhasil di hapus
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus'); // maka akan muncul flas data
            unlink('assets/image/buku/'.$id->gambar_buku);
            redirect('Buku'); //data yang berhasil maka akan diarahkan ke con buku
        }
    }

    public function detail($id_buku)
    {
        $isi['content']     = 'buku/detail_buku'; // memnaggil folder buku dengan detail_buku
        $isi['judul']       = 'Detail Data Buku';
        $isi['data']        = $this->m_buku->detail($id_buku);
        $isi['kategori']    =  $this->db->get('kategori')->result();
        $isi['rak']         =  $this->db->get('rak')->result();
        $this->load->view('v_dashboard', $isi);
    }

    // function QRcode($kodenya)
    // {
    //     // render qr code dengan format gambar PNG
    //     QRcode::png(
    //         $kodenya,
    //         $outfile = false,
    //         $level = QR_ECLEVEL_H,
    //         $size  = 6,
    //         $margin = 2
    //     );
    // }
}