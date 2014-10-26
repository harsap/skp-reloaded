<?php

class skp_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all_pegawai() {

        /* $this->db->select('peg_id, peg_nama, peg_nip_baru');
          $this->db->from('spg_pegawai');
          $this->db->order_by('peg_nip_baru','desc');
          $this->db->where('peg_nip_baru','198506102010012012');
          // $this->db->limit('10');
          $query = $this->db->get();

          return $query; */
        $sql = " SELECT a.peg_id, a.peg_nip_baru ,a.jabatan_id, peg_nama,  b.jabatan_nama,d.satuan_kerja_nama
  FROM spg_pegawai a left join m_spg_jabatan b on b.jabatan_id = a.jabatan_id
  left join m_spg_unit_kerja c on c.unit_kerja_id = a.unit_kerja_id
  left join m_spg_satuan_kerja d on d.satuan_kerja_id = coalesce(a.satuan_kerja_id,c.satuan_kerja_id)
  where  coalesce(a.satuan_kerja_id,c.satuan_kerja_id) = '" . $this->ion_auth->get_data_user_by_id()->satuan_kerja_id . "' ";
        return $this->db->query($sql);
    }

    function get_pegawai($peg_id) {
        /* $this->db->select('*');
          $this->db->from('spg_pegawai');
          $this->db->join('m_spg_jabatan','m_spg_jabatan.jabatan_id = spg_pegawai.jabatan_id');
          $this->db->join('m_spg_unit_kerja','m_spg_unit_kerja.unit_kerja_id = spg_pegawai.unit_kerja_id');
          $this->db->where('peg_id',$peg_id);
          $query = $this->db->get();
         */
        $sql = " SELECT a.peg_id, a.peg_nip_baru ,a.jabatan_id, coalesce(a.satuan_kerja_id,c.satuan_kerja_id) as satuan_kerja_id,d.satuan_kerja_nama,
  a.unit_kerja_id,c.unit_kerja_nama,  b.jabatan_nama,a.peg_nama
  FROM spg_pegawai a left join m_spg_jabatan b on b.jabatan_id = a.jabatan_id
  left join m_spg_unit_kerja c on c.unit_kerja_id = a.unit_kerja_id
  left join m_spg_satuan_kerja d on d.satuan_kerja_id = coalesce(a.satuan_kerja_id,c.satuan_kerja_id)
  where peg_id = '" . $this->ion_auth->get_data_user_by_id()->id . "' ";
        return $this->db->query($sql);
    }

    function get_pegawai_by_nik($peg_id) {
        /*  $this->db->select('*');
          $this->db->from('spg_pegawai');
          $this->db->join('m_spg_jabatan','m_spg_jabatan.jabatan_id = spg_pegawai.jabatan_id');
          $this->db->join('m_spg_unit_kerja','m_spg_unit_kerja.unit_kerja_id = spg_pegawai.unit_kerja_id');
          $this->db->where('peg_id', $this->ion_auth->get_data_user_by_id()->id);
          $query = $this->db->get();
         */
        $sql = " SELECT a.peg_id, a.peg_nip_baru ,a.jabatan_id, coalesce(a.satuan_kerja_id,c.satuan_kerja_id) as satuan_kerja_id,d.satuan_kerja_nama,
  a.unit_kerja_id,c.unit_kerja_nama,  b.jabatan_nama,a.peg_nama
  FROM spg_pegawai a left join m_spg_jabatan b on b.jabatan_id = a.jabatan_id
  left join m_spg_unit_kerja c on c.unit_kerja_id = a.unit_kerja_id
  left join m_spg_satuan_kerja d on d.satuan_kerja_id = coalesce(a.satuan_kerja_id,c.satuan_kerja_id)
  where peg_id = '" . $peg_id . "' ";
        return $this->db->query($sql);
    }

    function get_pegpejabatpenilai($peg_id,$tahun ) {
        $sql = " SELECT   peg_id_atasan 
  FROM skp.spg_skp_inputskp where  peg_id = '$peg_id' and tahun ='$tahun'   ";
        $query = $this->db->query($sql);
        return $query->row()->peg_id_atasan;
    }
    
     function get_skp_pokok($peg_id,$tahun ,$status = null) {
        $sql = " SELECT peg_id, peg_id_atasan, id_kegiatan, nomor_kegiatan, deskripsi_kegiatan, 
       nilai_angka_kredit, target_kuantitatif, satuan_target_kuantitatif, 
       target_kualitas, satuan_target_kualitas, waktu, satuan_waktu, 
       biaya, satuan_biaya, tgl_pengajuan, status, tahun, id_entry, 
       d_entry, satuan_kerja_id
  FROM skp.spg_skp_inputskp where  peg_id = '$peg_id' and tahun ='$tahun'    ";
        if(isset($status) && $status != ''){
           $sql .= " and status = '$status' "; 
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_skp_tambahan() {
        // $this->db->select('*');
        // $this->db->from('tminputskp_tmbhn');
        // $this->db->where('c_nik_pgw',$nik);
        // $this->db->order_by('nomor_kegiatan','asc');
        // $query = $this->db->get();

        $sql = "SELECT * FROM tminputskp_tmbhn WHERE c_nik_pgw = '" . $this->ion_auth->get_data_user_by_id()->peg_nip_baru . "' ORDER BY nomor_kegiatan asc;";
        $query = $this->db->query($sql);


        return $query;
    }

    function get_realisasi_pokok() {
        $sql = "SELECT * FROM tminputskp INNER JOIN tmrealisasiskp ON tminputskp.id_pengajuan=tmrealisasiskp.id_pengajuan WHERE tminputskp.c_nik_pgw = '" . $this->ion_auth->get_data_user_by_id()->peg_nip_baru . "' ORDER BY tminputskp.nomor_kegiatan asc";
        $query = $this->db->query($sql);
        return $query;
    }

    public function simpankegiatan($data) {
        $this->db->insert('skp.spg_skp_inputskp', $data);
    }

    public function updatekegiatan($data, $id) {
        return $this->db->update('skp.spg_skp_inputskp', $data, array('id_kegiatan' => $id));
    }

    function deletekegiatan($id) {
        $this->db->delete('skp.spg_skp_inputskp', array("id_kegiatan" => $id));
    }

}
