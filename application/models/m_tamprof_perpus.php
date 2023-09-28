<?php

class M_tamprof_perpus Extends CI_Model{

    public function index()
    {
        return $this->db->get('profil_perpus_ua')->row_array();
    }
}
?>