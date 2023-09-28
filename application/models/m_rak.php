<?php

class M_rak Extends CI_Model{

    public function id_rak()
    {
        // program untuk menguruitkan 
        //idrak                 // nama tabel
        $this->db->select('RIGHT(rak.id_rak,3) as kode', FALSE);
        $this->db->order_by('id_rak', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('rak');
        if ($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "R".$kodemax;
        return $kodejadi;
    }

    public function hapus($id)
    {
        $this->db->where('id_rak', $id);
        $this->db->delete('rak');
    }

}
?>