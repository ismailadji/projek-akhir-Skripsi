<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public function __construct() // berfungsi untk menghubungkan con auth dengan m_auth
    {
        parent::__construct();
        $this->load->model('m_auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Login Perpus UA';
        $data['anggota']  = $this->m_auth->getanggota();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/v_login', $data);
        $this->load->view('templates/auth_footer', $data);

    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->m_auth->proses_login($username,$password);
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('id_anggota', 'ID Anggota', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','required|trim');
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin',  'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Telepon', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        // $this->form_validation->set_rules('foto_anggota', 'Foto', 'required|trim');
        $this->form_validation->set_rules('level', 'Level', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('tgl_gabung', 'Tanggal Gabung', 'required|trim');

        if ($this->form_validation->run() == false) { //jika form tidak lolos validasi
            $data['judul'] = 'Registrasi Perpus UA';
            $data['id_anggota']  = $this->m_auth->id_anggota();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/v_registrasi');
            $this->load->view('templates/auth_footer', $data);
            
        } else { //jika form lolos validasi
            $config['upload_path']          = 'assets/image/anggota'; //mengupload foto
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 1024;
            $this->load->library('upload', $config);

            // $this->upload->do_upload('foto_anggota');
            // $file_name = $this->upload->data();

            if (!$this->upload->do_upload('foto_anggota')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('registration_view', $error);
            } else {

                $data = array(
                    'id_anggota'     => $this->input->post('id_anggota'),
                    'nis'            => htmlspecialchars($this->input->post('nis', true)),
                    'nama'           => htmlspecialchars($this->input->post('nama', true)),
                    'kelas'          => htmlspecialchars($this->input->post('kelas', true)),
                    'tgl_lahir'      => $this->input->post('tgl_lahir'),
                    'jenkel'         => $this->input->post('jenkel'),
                    'alamat'         => htmlspecialchars($this->input->post('alamat', true)),
                    'no_hp'          => htmlspecialchars($this->input->post('no_hp', true)),
                    'email'          => htmlspecialchars($this->input->post('email', true)),
                    'foto_anggota'   => $this->upload->data('file_name'),
                    'level'          => $this->input->post('level'),
                    'username'       => $this->input->post('username'),
                    'password'       => md5($this->input->post('password')),
                    'IsActive'       => 1,
                    'tgl_gabung'     => $this->input->post('tgl_gabung')
                );

                $query = $this->db->insert('anggota', $data); // masuk ke db di tabel Anggota
                if ($query = true){
                    $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
                    redirect('Auth'); //adata yang berhasil maka akan menampilkan con Auth
                }
            }
        }
    }

    public function logout()
    {
        $this->session->set_userdata('username', FALSE);
        $this->session->sess_destroy();
        redirect('Hal_utama');
    }
}
