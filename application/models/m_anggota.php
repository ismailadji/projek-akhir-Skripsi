<?php

class M_anggota Extends CI_Model{

    public function tampil_data($anggota)
    {
        return $this->db->get('anggota');
    }

    public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->order_by('id_anggota', 'desc');
		return $this->db->get()->result();
	}

    public function id_anggota()
    {
        // program untuk menguruitkan 
        //idanggota                 // nama tabel
        $this->db->select('RIGHT(anggota.id_anggota,5) as kode', FALSE);
        $this->db->order_by('id_anggota', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('anggota');
        if ($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
        $kodejadi = "AG".$kodemax;
        return $kodejadi;
    }
    
    public function edit($id)
    {
        $this->db->where('id_anggota', $id);
        return $this->db->get('anggota')->row_array();
    }

    public function update($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
    }

    public function hapus($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->delete('anggota');
    }

    public function detail($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        return $this->db->get('anggota')->row_array();
    }

    public function cetak_kartu_ang($id_anggota) 
    {
        $this->db->where('id_anggota', $id_anggota);
        return $this->db->get('anggota')->row_array();
    }

    
}
?>