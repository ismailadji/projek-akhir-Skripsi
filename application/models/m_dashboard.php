<?php

class M_dashboard Extends CI_Model{

    public function countPeminjaman()
    {
        return $this->db->count_all('peminjaman');
    }

    public function countPengunjung()
    {
        return $this->db->count_all('pengunjung');
    }

    public function countAnggota()
    {
        return $this->db->count_all('anggota');
    }

    public function countBuku()
    {
        return $this->db->count_all('buku');
    }
}