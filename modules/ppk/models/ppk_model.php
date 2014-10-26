<?php

class ppk_model extends CI_Model {

  function __construct() {
      parent::__construct();
  }

  function get_all_pegawai(){

    $this->db->select('peg_id, peg_nama, peg_nip_baru');
    $this->db->from('spg_pegawai');
    $this->db->order_by('peg_nip_baru','desc');
    $this->db->where('peg_nip_baru','198506102010012012');
    // $this->db->limit('10');
    $query = $this->db->get();

    return $query;
  }

function get_pegawai($peg_id){
  $this->db->select('*');
  $this->db->from('spg_pegawai');
  $this->db->join('m_spg_jabatan','m_spg_jabatan.jabatan_id = spg_pegawai.jabatan_id');
  $this->db->join('m_spg_unit_kerja','m_spg_unit_kerja.unit_kerja_id = spg_pegawai.unit_kerja_id');
  $this->db->where('peg_id',$peg_id);
  $query = $this->db->get();

  return $query;
}

function get_pegawai_by_nik($c_nik_pgw){
  $this->db->select('*');
  $this->db->from('spg_pegawai');
  $this->db->join('m_spg_jabatan','m_spg_jabatan.jabatan_id = spg_pegawai.jabatan_id');
  $this->db->join('m_spg_unit_kerja','m_spg_unit_kerja.unit_kerja_id = spg_pegawai.unit_kerja_id');
  $this->db->where('peg_nip_baru',$c_nik_pgw);
  $query = $this->db->get();

  return $query;
}

  function get_skp_pokok($nik){
    // $this->db->select('*');
    // $this->db->from('tminputskp');
    // $this->db->where('c_nik_pgw',$nik);
    // $this->db->order_by('nomor_kegiatan','asc');
    // $query = $this->db->get();

    $sql = "SELECT * FROM tminputskp WHERE c_nik_pgw = '198506102010012012' ORDER BY nomor_kegiatan asc;";
    $query = $this->db->query($sql);

    return $query;
  }

  function get_skp_tambahan($nik){
    $this->db->select('*');
    $this->db->from('tminputskp_tmbhn');
    $this->db->where('c_nik_pgw',$nik);
    $this->db->order_by('nomor_kegiatan','asc');
    $query = $this->db->get();

    return $query;
  }

}
