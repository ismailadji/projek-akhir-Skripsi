<?php

class M_tam_lampiran Extends CI_Model{

    public function id_lampiran()
    {
        // program untuk menguruitkan 
        //idlampiran                 // nama tabel
        $this->db->select('RIGHT(tbl_lampiran.id_lampiran,3) as kode', FALSE);
        $this->db->order_by('id_lampiran', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_lampiran');
        if ($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "LP".$kodemax;
        return $kodejadi;
    }

    public function get_lampiran_by_id($id) {
        $query = $this->db->get_where('tbl_lampiran', array('id_lampiran' => $id));
        return $query->row();
    }
}