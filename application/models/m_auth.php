<?php

 class M_auth extends CI_Model{

    public function getanggota (){
        return $this->db->get('anggota')->result_array();
    }

    public function id_anggota()
    {
        // program untuk menguruitkan 
        //idanggota                 // nama tabel
        $this->db->select('RIGHT(anggota.id_anggota,3) as kode', FALSE);
        $this->db->order_by('id_anggota', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('anggota');
        if ($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "AG".$kodemax;
        return $kodejadi;
    }

    public function proses_login($username,$password)
    {
        $password = md5($password);
        $username = $this->db->where('username', $username);
        $password = $this->db->where('password', $password);
        $query = $this->db->get('anggota');//nama tabel db
        if ($query->num_rows()>0) {
            foreach ($query->result() as $row){
                $sess = array(
                    'id_anggota'   => $row->id_anggota ,
                    'nis'          => $row->nis ,
                    'nama'         => $row->nama ,
                    'kelas'        => $row->kelas ,
                    'tgl_lahir'    => $row->tgl_lahir ,
                    'jenkel'       => $row->jenkel ,
                    'alamat'       => $row->alamat ,
                    'no_hp'        => $row->no_hp ,
                    'email'        => $row->email ,
                    'username'     => $row->username , 
                    'password'     => $row->password ,
                    'foto_anggota' => $row->foto_anggota ,
                    'level'        => $row->level ,
                    'IsActive'     => $row->IsActive ,
                    'tgl_gabung'   => $row->tgl_gabung
                );
                $this->session->set_userdata($sess);
            }
            redirect('dashboard');
        }else{
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login Gagal, Selahkan Periksa Kembali Username dan Password !</div>');
            redirect('Auth');
        }
    }

}
?>

<!-- //  'id_login'     => $row->id_login ,
//  'id_anggota'   => $row->id_anggota , 
//  'username'     => $row->username , 
//  'password'     => $row->password , 
//  'level'        => $row->level ,
//  'nis_nip'      => $row->nis_nip ,
//  'nama'         => $row->nama ,
//  'tgl_lahir'    => $row->tgl_lahir ,
//  'jekel'        => $row->jekel ,
//  'alamat'       => $row->alamat ,
//  'no_hp'        => $row->no_hp ,
//  'email'        => $row->email ,
//  'foto'         => $row->foto ,
//  'tgl_gabung'   => $row->tgl_gabung  -->