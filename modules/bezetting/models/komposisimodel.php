<?php

class Komposisimodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getalldatapegawaiusia($idsatker = null, $jenisjabatan = null) {
        $sql = " select distinct b.satuan_kerja_id,b.satuan_kerja_nama as satker,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) between 16 and  20 then 1 else 0 end) as u1620,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) between 21 and  25 then 1 else 0 end) as u2125,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) between 26 and  30 then 1 else 0 end) as u2630,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) between 31 and  35 then 1 else 0 end) as u3135,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) between 36 and  40 then 1 else 0 end) as u3640,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) between 41 and  45 then 1 else 0 end) as u4145,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) between 46 and  50 then 1 else 0 end) as u4650,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) between 51 and  55 then 1 else 0 end) as u5155,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) between 56 and  60 then 1 else 0 end) as u5660,
       sum(case when EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) >  60 then 1 else 0 end) as u61
	   from spg_pegawai a
            LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)  
							 inner join m_spg_jabatan d on d.jabatan_id = a.jabatan_id
							where 1=1 and b.status = '1' ";
        if (isset($idsatker) && $idsatker != '') {
            $sql .= " and  b.satuan_kerja_id in ($idsatker)  ";
        }
        if (isset($jenisjabatan) && $jenisjabatan != '') {
            $sql .= "  and   d.jabatan_jenis in ( $jenisjabatan)    ";
        }

        $sql .= "  group by b.satuan_kerja_id,b.satuan_kerja_nama   order by b.satuan_kerja_nama ";
//echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getalldatapegawaibypangkat($idsatker = null, $jenisjabatan = null) {
        $sql = " select distinct b.satuan_kerja_id,b.satuan_kerja_nama as satker,
       sum(case when a.gol_id_akhir = 1 then 1 else 0 end) as a1,
       sum(case when a.gol_id_akhir = 2 then 1 else 0 end ) as b1,
       sum(case when a.gol_id_akhir = 3 then 1 else 0 end ) as c1,
       sum(case when a.gol_id_akhir = 4 then 1 else 0 end ) as d1,
       sum(case when a.gol_id_akhir = 5 then 1 else 0 end ) as a2,
       sum(case when a.gol_id_akhir = 6 then 1 else 0 end ) as b2,
       sum(case when a.gol_id_akhir = 7 then 1 else 0 end ) as c2,
       sum(case when a.gol_id_akhir = 8 then 1 else 0 end ) as d2,
       sum(case when a.gol_id_akhir = 9 then 1 else 0 end ) as a3,
       sum(case when a.gol_id_akhir = 10 then 1 else 0 end ) as b3,
       sum(case when a.gol_id_akhir = 11 then 1 else 0 end ) as c3,
       sum(case when a.gol_id_akhir = 12 then 1 else 0 end ) as d3,
       sum(case when a.gol_id_akhir = 13 then 1 else 0 end ) as a4,
       sum(case when a.gol_id_akhir = 14 then 1 else 0 end ) as b4,
       sum(case when a.gol_id_akhir = 15 then 1 else 0 end ) as c4,
       sum(case when a.gol_id_akhir = 16 then 1 else 0 end ) as d4,
        sum(case when a.gol_id_akhir = 17then 1 else 0 end ) as e4
	   from spg_pegawai a
              LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	    inner join m_spg_golongan e on e.gol_id = a.gol_id_akhir 
         inner join m_spg_jabatan d on d.jabatan_id = a.jabatan_id
		where 1=1 and b.status = '1'
	     ";
        if (isset($idsatker) && $idsatker != '') {
            $sql .= " and  b.satuan_kerja_id in ($idsatker)  ";
        }
        if (isset($jenisjabatan) && $jenisjabatan != '') {
            $sql .= "  and   d.jabatan_jenis in ( $jenisjabatan)    ";
        }

        $sql .= "  group by b.satuan_kerja_id,b.satuan_kerja_nama
	     order by b.satuan_kerja_nama  ";
//echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getalldatapegawaibypendidikan($idsatker = null, $jenisjabatan = null) {
        $sql = " select distinct b.satuan_kerja_id,b.satuan_kerja_nama as satker,
       sum(case when f.tingpend_id = 1 then 1 else 0 end) as sd,
       sum(case when f.tingpend_id = 2  then 1 else 0 end) as smp,
       sum(case when f.tingpend_id = 3 then 1 else 0 end) as smpk,
       sum(case when f.tingpend_id = 4 then 1 else 0 end) as smu,
       sum(case when f.tingpend_id = 5 then 1 else 0 end) as smk,
       sum(case when f.tingpend_id = 6 then 1 else 0 end) as d1,
       sum(case when f.tingpend_id = 7 then 1 else 0 end) as d2,
       sum(case when f.tingpend_id = 8 then 1 else 0 end) as smuda,
       sum(case when f.tingpend_id = 9 then 1 else 0 end) as d3,
       sum(case when f.tingpend_id = 10 then 1 else 0 end) as d4,
       sum(case when f.tingpend_id = 11 then 1 else 0 end) as s1,
       sum(case when f.tingpend_id = 12 then 1 else 0 end) as sp2,
       sum(case when f.tingpend_id = 13 then 1 else 0 end) as s2,
       sum(case when f.tingpend_id = 14 then 1 else 0 end) as s3
	   from spg_pegawai a
            LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	   inner join m_spg_pendidikan e
	   inner join m_spg_tingkat_pendidikan f on f.tingpend_id = e.tingpend_id
           	on e.id_pend = a.id_pend_akhir  
                inner join m_spg_jabatan d on d.jabatan_id = a.jabatan_id	                
                where 1=1 and b.status = '1'
	    ";
        if (isset($idsatker) && $idsatker != '') {
            $sql .= " and  b.satuan_kerja_id in ($idsatker)  ";
        }
        if (isset($jenisjabatan) && $jenisjabatan != '') {
            $sql .= "  and   d.jabatan_jenis in ( $jenisjabatan)    ";
        }

        $sql .= " group by b.satuan_kerja_id,b.satuan_kerja_nama  order by b.satuan_kerja_nama  ";
//echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getalldatapegawaieselon($idsatker = null, $jenisjabatan = null) {
        $sql = "  select distinct b.satuan_kerja_id,b.satuan_kerja_nama as satker,
       sum(case when f.eselon_id = 2 then 1 else 0 end) as Ia,
       sum(case when f.eselon_id = 3 then 1 else 0 end) as Ib,
       sum(case when f.eselon_id = 4 then 1 else 0 end) as IIa,
       sum(case when f.eselon_id = 5 then 1 else 0 end) as IIb,
       sum(case when f.eselon_id = 6 then 1 else 0 end) as IIIa,
       sum(case when f.eselon_id = 7 then 1 else 0 end) as IIIb,
       sum(case when f.eselon_id = 8 then 1 else 0 end) as IVa,
       sum(case when f.eselon_id = 9 then 1 else 0 end) as IVb,
       sum(case when f.eselon_id = 10 then 1 else 0 end) as Va,
       sum(case when f.eselon_id = 11 then 1 else 0 end) as Vb
	    from spg_pegawai a
             LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	     inner join m_spg_jabatan d 
             inner join m_spg_eselon f ON (f.eselon_id = d.eselon_id) 
	     ON  d.jabatan_id = a.jabatan_id  
              
where 1=1 and b.status = '1' ";

        if (isset($idsatker) && $idsatker != '') {
            $sql .= " and  b.satuan_kerja_id in ($idsatker)  ";
        }
        if (isset($jenisjabatan) && $jenisjabatan != '') {
            $sql .= "  and   d.jabatan_jenis in ( $jenisjabatan)    ";
        }

        $sql .= "  group by b.satuan_kerja_id,b.satuan_kerja_nama
	     	     order by b.satuan_kerja_nama  ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getalldatapegawaiagama($idsatker = null, $jenisjabatan = null) {
        $sql = " select distinct b.satuan_kerja_id,b.satuan_kerja_nama as satker,
       sum(case when f.id_agama = 1 then 1 else 0 end) as islam,
       sum(case when f.id_agama = 2 then 1 else 0 end) as katolik,
       sum(case when f.id_agama = 3 then 1 else 0 end) as protestan,
       sum(case when f.id_agama = 4 then 1 else 0 end) as hindu,
       sum(case when f.id_agama = 5 then 1 else 0 end) as buda,
       sum(case when f.id_agama = 6 then 1 else 0 end) as konghucu
	    from spg_pegawai a
            LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	     inner join m_spg_agama f on f.id_agama = a.id_agama
 inner join m_spg_jabatan d on d.jabatan_id = a.jabatan_id             
where 1=1 and b.status = '1' ";
        if (isset($idsatker) && $idsatker != '') {
            $sql .= " and  b.satuan_kerja_id in ($idsatker)  ";
        }
        if (isset($jenisjabatan) && $jenisjabatan != '') {
            $sql .= "  and   d.jabatan_jenis in ( $jenisjabatan)    ";
        }

        $sql .= " group by b.satuan_kerja_id,b.satuan_kerja_nama
	     	     order by b.satuan_kerja_nama  ";
//echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getalldatapegawaikelamin($idsatker = null, $jenisjabatan = null) {
        $sql = " select distinct b.satuan_kerja_id,b.satuan_kerja_nama as satker,
       sum(case when a.peg_jenis_kelamin = 'L' then 1 else 0 end) as l,
       sum(case when a.peg_jenis_kelamin = 'P' then 1 else 0 end) as p
          from spg_pegawai a
             LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id) 
inner join m_spg_jabatan d on d.jabatan_id = a.jabatan_id                              
where 1=1 and b.status = '1' ";
        if (isset($idsatker) && $idsatker != '') {
            $sql .= " and  b.satuan_kerja_id in ($idsatker)  ";
        }
        if (isset($jenisjabatan) && $jenisjabatan != '') {
            $sql .= "  and   d.jabatan_jenis in ( $jenisjabatan)    ";
        }

        $sql .= " group by b.satuan_kerja_id,b.satuan_kerja_nama
	     	     order by b.satuan_kerja_nama  ";
//echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getalldatajenisjabatan($idsatker = null) {
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
	     ";
//echo $sql;
        if (isset($idsatker) && $idsatker != '') {
            $sql .= "   and  b.satuan_kerja_id in ($idsatker)   ";
        }

        $sql .= "    group by b.satuan_kerja_id,b.satuan_kerja_nama
	     order by b.satuan_kerja_nama    ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getallpetaeselon($idsatker = null) {
        $sql = " SELECT  distinct b.satuan_kerja_id,  b.satuan_kerja_nama as satker,
       sum(case when f.eselon_id = 2 then 1 else 0 end) as Ia,
       sum(case when f.eselon_id = 3 then 1 else 0 end) as Ib,
       sum(case when f.eselon_id = 4 then 1 else 0 end) as IIa,
       sum(case when f.eselon_id = 5 then 1 else 0 end) as IIb,
       sum(case when f.eselon_id = 6 then 1 else 0 end) as IIIa,
       sum(case when f.eselon_id = 7 then 1 else 0 end) as IIIb,
       sum(case when f.eselon_id = 8 then 1 else 0 end) as IVa,
       sum(case when f.eselon_id = 9 then 1 else 0 end) as IVb,
       sum(case when f.eselon_id = 10 then 1 else 0 end) as Va,
       sum(case when f.eselon_id = 11 then 1 else 0 end) as Vb,
       sum(case when d.eselon_id = 2 then 1 else 0 end) as riil_Ia,
       sum(case when d.eselon_id = 3 then 1 else 0 end) as riil_Ib,
       sum(case when d.eselon_id = 4 then 1 else 0 end) as riil_IIa,
       sum(case when d.eselon_id = 5 then 1 else 0 end) as riil_IIb,
       sum(case when d.eselon_id = 6 then 1 else 0 end) as riil_IIIa,
       sum(case when d.eselon_id = 7 then 1 else 0 end) as riil_IIIb,
       sum(case when d.eselon_id = 8 then 1 else 0 end) as riil_IVa,
       sum(case when d.eselon_id = 9 then 1 else 0 end) as riil_IVb,
       sum(case when d.eselon_id = 10 then 1 else 0 end) as riil_Va,
       sum(case when d.eselon_id = 11 then 1 else 0 end) as riil_Vb       
  FROM mx_spg_peta_jabatan mx 
  left join m_spg_jabatan f   on f.jabatan_id  =  mx.jabatan_id  and f.jabatan_jenis = 2
  left join spg_pegawai a   inner join m_spg_jabatan d ON  d.jabatan_id = a.jabatan_id  and  d.jabatan_jenis = 2
  on a.jabatan_id   = mx.jabatan_id and   a.satuan_kerja_id  = mx.satuan_kerja_id 
  INNER  JOIN m_spg_satuan_kerja b ON b.satuan_kerja_id = mx.satuan_kerja_id  
where 1=1   ";
        if (isset($idsatker) && $idsatker != '') {
            $sql .= "and mx.satuan_kerja_id in ($idsatker)  ";
        }
        $sql .= " group by  b.satuan_kerja_id,b.satuan_kerja_nama
	     	     order by b.satuan_kerja_nama   ";
//echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getallsatuankerja($idsatker = null) {

        $sql = " SELECT distinct(satuan_kerja_id) as satuan_kerja_id, tahun_id, satuan_kerja_nama FROM m_spg_satuan_kerja      ";
        if (isset($idsatker) && $idsatker != null) {
            $sql .= "  where  satuan_kerja_id = '$idsatker'  ";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getmatrikstrukturalpegawaiall($golpangkat = null) {
        $sql = " select distinct a.gol_id_akhir,e.nm_gol ,
       sum(case when f.eselon_id = 2 then 1 else 0 end) as Ia,
       sum(case when f.eselon_id = 3 then 1 else 0 end) as Ib,
       sum(case when f.eselon_id = 4 then 1 else 0 end) as IIa,
       sum(case when f.eselon_id = 5 then 1 else 0 end) as IIb,
       sum(case when f.eselon_id = 6 then 1 else 0 end) as IIIa,
       sum(case when f.eselon_id = 7 then 1 else 0 end) as IIIb,
       sum(case when f.eselon_id = 8 then 1 else 0 end) as IVa,
       sum(case when f.eselon_id = 9 then 1 else 0 end) as IVb,
       sum(case when f.eselon_id = 10 then 1 else 0 end) as Va,
       sum(case when f.eselon_id = 11 then 1 else 0 end) as Vb,
       sum(case when d.jabatan_jenis = '4' then 1 else 0 end) as fu,
       sum(case when d.jabatan_jenis = '3' then 1 else 0 end) as ft
	    from spg_pegawai a
             inner join m_spg_golongan e on e.gol_id = a.gol_id_akhir 
             LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	     inner join m_spg_jabatan d 
             left join m_spg_eselon f ON (f.eselon_id = d.eselon_id) 
	     ON  d.jabatan_id = a.jabatan_id 
             where 1=1 and b.status = '1'
	     ";

        if (isset($golpangkat) && $golpangkat != '') {
            $sql .= "  and   a.gol_id_akhir in ( $golpangkat)    ";
        }
       
        $sql .= "  group by a.gol_id_akhir,e.nm_gol 
                   order by a.gol_id_akhir desc   ";

//echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

}
