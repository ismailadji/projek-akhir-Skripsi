<?php

class M_pprof_perpus Extends CI_Model{

    public function index()
    {
        return $this->db->get('profil_perpus_ua')->row_array();
    }

    public function edit()
    {
        // $this->db->where('id_profil_perpus');
        return $this->db->get('profil_perpus_ua')->row_array();
    }

    public function update($profil)
    {
        $this->db->where('id_profil_perpus',  $profil['id_profil_perpus']);
        $this->db->update('profil_perpus_ua', $profil);
    }

    public function hapus($id)
    {
        $this->db->where('id_profil_perpus', $id);
        $this->db->delete('profil_perpus_ua');
    }

    public function tampilprof()
    {
        return $this->db->get('profil_perpus_ua')->row_array();
    }
}
?>