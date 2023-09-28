<?php

class M_buku Extends CI_Model{

    public function id_buku()
    {
        // program untuk menguruitkan 
        //idbuku                 // nama tabel
        $this->db->select('RIGHT(buku.id_buku,5) as kode', FALSE);
        $this->db->order_by('id_buku', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('buku');
        if ($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi = "BK".$kodemax;
        return $kodejadi;
    }

    public function edit($id)
    {
        $this->db->join('kategori', 'buku.id_kategori = kategori.nama_kategori');
        $this->db->join('rak', 'buku.id_rak = rak.nama_rak');
        $this->db->where('id_buku', $id);
        return $this->db->get('buku')->row_array();
    }

    public function update($id_buku, $data)
    {
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data);
    }

    public function hapus($id_buku)
    {
        $this->db->where('id_buku', $id_buku);
        $this->db->delete('buku');
    }
    
    public function detail($id_buku)
    {
        $this->db->where('id_buku', $id_buku);
        return $this->db->get('buku')->row_array();
    }
}
?>