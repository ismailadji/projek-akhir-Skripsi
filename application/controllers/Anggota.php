<?php

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anggota'); // Mengambil data anggota dari database
        $this->load->helper('url');
    
    }

    public function index()
    {
        $isi['content'] = 'anggota/v_anggota'; // memnaggil folder anggota degna v_anggota
        $isi['judul']   = 'Daftar Data Anggota';
        $isi['data']    = $this->db->get('anggota')->result(); // memanggil data dari db
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_anggota()
    {
        $isi['content']     = 'anggota/form_anggota'; // memnaggil folder anggota dengan form_anggota
        $isi['judul']       = 'Form Tambah Anggota';
        $isi['id_anggota']  = $this->m_anggota->id_anggota();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $config['upload_path']          = 'assets/image/anggota';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 1024;
		$this->load->library('upload', $config);
        $this->upload->do_upload('foto_anggota');
        $file_name = $this->upload->data();

        $data = array(
            'id_anggota'        => $this->input->post('id_anggota'),
            'nis'               => $this->input->post('nis'),
            'nama'              => $this->input->post('nama'),
            'kelas'             => $this->input->post('kelas'),
            'jenkel'            => $this->input->post('jenkel'),
            'alamat'            => $this->input->post('alamat'),
            'tgl_lahir'        => $this->input->post('tgl_lahir'),
            'no_hp'             => $this->input->post('no_hp'),
            'email'             => $this->input->post('email'),
            'username'          => $this->input->post('username'),
            'password'          => md5($this->input->post('password')),
            'foto_anggota'      => $file_name['file_name'],
            'tgl_gabung'        => $this->input->post('tgl_gabung'),
            // 'qr_ang'         => $this->input->post('qr_ang'),
            'level'             => $this->input->post('level')
        );
        $query = $this->db->insert('anggota', $data);// Anggota : nama tabel
        if ($query = true){
            $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
            redirect('Anggota'); //adata yang berhasil maka akan menampilkan con anggota
        }else{
            redirect('Anggota/form_anggota');
        }
    }

    public function edit($id)
    {
        $isi['content']     = 'anggota/edit_anggota'; // memnaggil folder anggota dengan edit_anggota
        $isi['judul']       = 'Form Edit Anggota';
        $isi['data']        = $this->m_anggota->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_anggota                     = $this->input->post('id_anggota');
        $config['upload_path']          = 'assets/image/anggota';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 1024;
		$this->load->library('upload', $config);
        if (!empty($_FILES['foto_anggota']['name'])) {
            $this->upload->do_upload('foto_anggota');
            $upload = $this->upload->data();
            $image = $upload['file_name'];
        
            $data = array(
                'id_anggota'        => $this->input->post('id_anggota'),
                'nis'               => $this->input->post('nis'),
                'kelas'             => $this->input->post('kelas'),
                'jenkel'            => $this->input->post('jenkel'),
                'alamat'            => $this->input->post('alamat'),
                'tgl_lahir'         => $this->input->post('tgl_lahir'),
                'no_hp'             => $this->input->post('no_hp'),
                'email'             => $this->input->post('email'),
                'username'          => $this->input->post('username'),
                'password'          => md5($this->input->post('password')),
                'foto_anggota'      => $image,
                'tgl_terakhir_ubah' => $this->input->post('tgl_terakhir_ubah'),
                // 'qr_anggota'        => $file_name['file_name'],
                'level'             => $this->input->post('level')
            );
            $id = $this->db->get_where('anggota',['id_anggota' => $id_anggota])->row();
            $query = $this->m_anggota->update($id_anggota, $data);
            if ($query = true){ // jika data berhasil di update 
                $this->session->set_flashdata('info', 'Data Berhasil di Update'); // maka akan muncul flas data
                unlink('assets/image/anggota/'.$id->foto_anggota);
                redirect('Anggota'); //data yang berhasil maka akan diarahkan ke con anggota
            }
        }
        else{
            $data = array(
                'id_anggota'        => $this->input->post('id_anggota'),
                'nis'               => $this->input->post('nis'),
                'nama'              => $this->input->post('nama'),
                'kelas'             => $this->input->post('kelas'),
                'jenkel'            => $this->input->post('jenkel'),
                'alamat'            => $this->input->post('alamat'),
                'tgl_lahir'         => $this->input->post('tgl_lahir'),
                'no_hp'             => $this->input->post('no_hp'),
                'email'             => $this->input->post('email'),
                'username'          => $this->input->post('username'),
                'password'          => md5($this->input->post('password')),
                'tgl_terakhir_ubah' => $this->input->post('tgl_terakhir_ubah'),
                // 'qr_anggota'        => $file_name['file_name'],
                'level'             => $this->input->post('level')
            );
            $query = $this->m_anggota->update($id_anggota, $data);
            if ($query = true){ // jika data berhasil di update 
                $this->session->set_flashdata('info', 'Data Berhasil di Update'); // maka akan muncul flas data
                redirect('Anggota'); //data yang berhasil maka akan diarahkan ke con anggota
            }
        }
    }

    public function hapus($id_anggota)
    {
        $id = $this->db->get_where('anggota',['id_anggota' => $id_anggota])->row();
        $hapus = $this->m_anggota->hapus($id_anggota);
        if ($hapus = true){ // jika data berhasil di hapus 
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus'); // maka akan muncul flas data
            unlink('assets/image/anggota/'.$id->foto_anggota);
            redirect('Anggota'); //data yang berhasil maka akan diarahkan ke con anggota
        }
    }

    public function detail($id_anggota)
    {
        $isi['content']     = 'anggota/detail_anggota'; // memnaggil folder anggota dengan detail_anggota
        $isi['judul']       = 'Detail Data Anggota';
        $isi['data']        = $this->m_anggota->detail($id_anggota);
        $this->load->view('v_dashboard', $isi);
    }

    public function print()
    {
        $isi['content']     = 'anggota/print_anggota'; // memnaggil folder anggota dengan print_anggota
        $isi['anggota']     = $this->m_anggota->tampil_data('anggota')->result();
        $this->load->view('anggota/print_anggota', $isi);
    }
    
    public function cetak_kartu_ang($id_anggota)  // Mengambil data anggota berdasarkan ID anggota dan mencetak kartu anggota
    {
        $isi['content']     = 'anggota/cetak_kartu_ang'; // memnaggil folder anggota dengan cetak_kartu_ang
        $isi['anggota']     = $this->m_anggota->cetak_kartu_ang($id_anggota);
        $this->load->view('anggota/cetak_kartu_ang', $isi);
    }


}