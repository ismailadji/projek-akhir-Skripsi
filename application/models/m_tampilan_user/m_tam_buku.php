<?php

class M_tam_buku Extends CI_Model{

    public function id_buku()
    {
        // program untuk menguruitkan 
        //idbuku                 // nama tabel
        $this->db->select('RIGHT(buku.id_buku,3) as kode', FALSE);
        $this->db->order_by('id_buku', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('buku');
        if ($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "BK".$kodemax;
        return $kodejadi;
    }

    public function detail($id_buku)
    {
        $this->db->where('id_buku', $id_buku);
        return $this->db->get('buku')->row_array();
    }
}