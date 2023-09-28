<?php

class M_pdenda Extends CI_Model{

    public function edit($id)
    {
        $this->db->where('id_denda', $id);
        return $this->db->get('tbl_biaya_denda')->row_array();
    }

    // public function update($id_denda, $data)
    // {
    //     $this->db->where('id_denda', $id_denda);
    //     $this->db->update('tbl_biaya_denda', $data);
    // }
    public function update($data)
    {
        $this->db->where('id_denda', $data['id_denda']);
        
        $this->db->update('tbl_biaya_denda', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_denda', $id);
        $this->db->delete('tbl_biaya_denda');
    }
}
?>