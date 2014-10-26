<?php

class Sotkmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getbanyaksotk($status = 1) {
        $sql = " SELECT count( satuan_kerja_id) as banyak
  FROM m_spg_satuan_kerja where status = " . $this->db->escape_str($status) . " ";
        $query = $this->db->query($sql);
        return $query->row()->banyak;
    }
	
	function getdatakomponensotk() {
        $sql = " select distinct b.satuan_kerja_id,b.satuan_kerja_nama as satker,
       sum(case when d.jabatan_jenis = '1' then 1 else 0 end) as politik,
       sum(case when d.jabatan_jenis = '2' then 1 else 0 end) as struktural,
       sum(case when d.jabatan_jenis = '3' then 1 else 0 end) as ft,
       sum(case when d.jabatan_jenis = '4' then 1 else 0 end) as fu,
       sum(case when d.jabatan_jenis = 0 or d.jabatan_jenis is null then 1 else 0 end) as belum
             from spg_pegawai a
              LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	    inner join m_spg_jabatan d on d.jabatan_id = a.jabatan_id  where 1=1 and b.status = '1'
 group by b.satuan_kerja_id,b.satuan_kerja_nama
	     order by b.satuan_kerja_nama ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    

}
