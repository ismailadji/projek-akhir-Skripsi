<?php

class M_tam_pengunjung Extends CI_Model{


    public function hapus($id)
    {
        $this->db->where('id_pengunjung', $id);
        $this->db->delete('pengunjung');
    }

}
?>