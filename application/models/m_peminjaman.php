<?php

class M_peminjaman Extends CI_Model{

    public function id_peminjaman()
    {
        // program untuk menguruitkan 
        //id_peminjaman                 // nama tabel
        $this->db->select('RIGHT(peminjaman.id_peminjaman,5) as kode', FALSE);
        $this->db->order_by('id_peminjaman', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('peminjaman');
        if ($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi = "PM".$kodemax;
        return $kodejadi;
    }

    public function getDataPeminjaman()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.nama');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        return $this->db->get()->result();
    }

    public function getDataById_peminjaman($id)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'peminjaman.id_anggota = anggota.nama');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('peminjaman.id_peminjaman', $id);
        return $this->db->get()->row_array();
    }

    public function getBukuDipinjam($id_peminjaman)
    {
        $this->db->select('buku.id_buku');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
        return $this->db->get()->result();
    }

    public function getBukuById($id)
    {
        $this->db->where('id_buku', $id);
        return $this->db->get('buku')->row_array();
    }

    public function deletePeminjaman($id)
    {
        $this->db->where('id_peminjaman', $id);
        $this->db->delete('peminjaman');
        return true;
    }

    public function detailpinjam($id_peminjaman)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->get('peminjaman')->row_array();
    }

    public function hapus($id)
    {
        $this->db->where('id_peminjaman', $id);
        $this->db->delete('peminjaman');
    }

}