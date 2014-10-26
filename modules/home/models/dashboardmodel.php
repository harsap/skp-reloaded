<?php

class Dashboardmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getbanyaksotk($status = 1) {
        $sql = " SELECT count( satuan_kerja_id) as banyak
  FROM m_spg_satuan_kerja where status = " . $this->db->escape_str($status) . " ";
        $query = $this->db->query($sql);
        return $query->row()->banyak;
    }

    function getbanyakpencarianpegawai($struk = null, $fu = null, $ft = null, $satker = null, $unit = null, $golongan = null, $pendidikan = null, $jeniskelamin = null, $agama = null, $statuskepegawaian = null, $eselon = null, $nip = null, $nama = null, $usia = null, $masakerja = null, $level = null, $jurusan = null) {
        $sql = " SELECT count( distinct( a.peg_id)) as banyak
                 FROM
                        spg_pegawai a
						   LEFT OUTER JOIN m_spg_jabatan b
                            ON a.jabatan_id = b.jabatan_id

                            LEFT OUTER JOIN m_spg_golongan c1
                            ON a.gol_id_akhir = c1.gol_id

                            LEFT OUTER JOIN m_spg_golongan c2
                            ON a.gol_id_awal = c2.gol_id

                            LEFT OUTER JOIN m_spg_pendidikan pd
                            ON a.id_pend_akhir = pd.id_pend

                            LEFT OUTER JOIN  m_spg_tingkat_pendidikan tpd
                            ON pd.tingpend_id = tpd.tingpend_id

                            LEFT OUTER JOIN m_spg_eselon es
                            ON es.eselon_id = b.eselon_id

                            LEFT OUTER JOIN  spg_riwayat_diklat dist
                            ON (dist.peg_id = a.peg_id and kategori_id = (SELECT MAX(dist2.kategori_id)
                                                                          FROM spg_riwayat_diklat dist2
                                                                          WHERE dist2.kategori_id IS NOT NULL
                                                                          AND dist2.peg_id = a.peg_id
                                                                          LIMIT 1
                                                                          )
                                )
                            LEFT OUTER JOIN  m_spg_diklat_struk_kategori mdist
                            ON (mdist.kategori_id = dist.kategori_id)

                            LEFT OUTER JOIN m_spg_unit_kerja uk
                            ON a.unit_kerja_id = uk.unit_kerja_id

                            LEFT OUTER JOIN m_spg_unit_kerja cb_dns
                            ON uk.unit_kerja_parent = cb_dns.unit_kerja_id

                            LEFT OUTER JOIN m_spg_satuan_kerja sk
                            ON sk.satuan_kerja_id = COALESCE(uk.satuan_kerja_id,a.satuan_kerja_id)

							LEFT OUTER JOIN m_spg_kecamatan kec
                            ON kec.kecamatan_id = a.kecamatan_id

							LEFT OUTER JOIN m_spg_kabupaten kab
                            ON kab.kabupaten_id = kec.kabupaten_id

							WHERE sk.status=1  ";
        if ($struk == '2' || $fu == '4' || $ft == '3') {
            $sql .= "  and   cast( b.jabatan_jenis as char) in ('$struk','$fu','$ft')    ";
        }


        if (isset($golongan) && $golongan != '-' && $golongan != '') {
            $sql .= "   and a.gol_id_akhir in ($golongan) ";
        }
        if (isset($pendidikan) && $pendidikan != '-' && $pendidikan != '') {
            $sql .= "   and  tpd.tingpend_id in ($pendidikan) ";
        }


        if (isset($jeniskelamin) && $jeniskelamin != '-' && $jeniskelamin != '') {
            $sql .= "   and  peg_jenis_kelamin = '$jeniskelamin'  ";
        }
        if (isset($agama) && $agama != '-' && $agama != '') {
            $sql .= "   and  id_agama in ($agama)  ";
        }
        if (isset($statuskepegawaian) && $statuskepegawaian != '-' && $statuskepegawaian != '') {
            $sql .= "   and  peg_status_kepegawaian in ($statuskepegawaian)  ";
        }
        if (isset($eselon) && $eselon != '-' && $eselon != '') {
            $sql .= "   and es.eselon_id in  ($eselon) ";
        }
        if (isset($nip) && $nip != '-' && $nip != '') {
            $sql .= "   and  ( a.peg_nip = '$nip' or
                    a.peg_nip_baru = '$nip' ) ";
        }
        if (isset($nama) && $nama != '-') {
            $sql .= "   and  upper(a.peg_nama) like  upper('%$nama%') ";
        }

        if (isset($jurusan) && $jurusan != '-') {
            $sql .= "   and  upper(pd.nm_pend) like  upper('%$jurusan%') ";
        }

        if (isset($usia) && $usia != '-' && $usia != '') {
            //  $sql .= "   and EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) in ($usia) ";
            $sql .= " and   (select extract (year from age(peg_lahir_tanggal))) in ($usia) ";
        }
        if (isset($masakerja) && $masakerja != '-' && $masakerja != '') {
            $sql .= " and   EXTRACT(YEAR FROM masa_kerja_pegawai(a.peg_id)) in ($masakerja) ";
        }
        if (isset($satker) && $satker != '-' && $satker != '' && (!isset($unit) || $unit == '-' || $unit == '0' || $unit == '' )) {
            $sql .= "   and ( sk.satuan_kerja_id in ($satker) ";
            $sql .= "   and uk.unit_kerja_id is null ) ";
        }
        if (isset($satker) && $satker != '-' && $satker != '' && (isset($unit) && $unit != '-' && $unit != '0' && $unit != '' && ($unit != '#' || $unit != 'X' ) )) {
            $sql .= "   and sk.satuan_kerja_id in ($satker) ";
        }

        if (isset($unit) && $unit != '-' && $unit != '0' && $unit != '' && $unit != '#' && $unit != 'X') {
            $sql .= "   and  (  ";
            $sql .= "     ( sk.satuan_kerja_id in ($satker) ";
            $sql .= "   and uk.unit_kerja_id in ($unit) ) ";
            if (isset($satker) && $satker != '-' && $satker != '' && isset($level) && $level < 1) {
                $sql .= "   or ( sk.satuan_kerja_id in ($satker) ";
                $sql .= "   and uk.unit_kerja_id is null ) ";
            }
            $sql .= "   )  ";
        }
        // echo $sql;
        $query = $this->db->query($sql);
        return $query->row()->banyak;
    }

    function getalldatapegawaibyeselon() {
        $sql = "  select  f.eselon_nm,count(f.eselon_id) as banyak
	    from spg_pegawai a
             LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	     inner join m_spg_jabatan d 
             inner join m_spg_eselon f ON (f.eselon_id = d.eselon_id) 
	     ON  d.jabatan_id = a.jabatan_id  
              
where 1=1 and b.status = '1'
group by f.eselon_nm ";


        $query = $this->db->query($sql);
        return $query->result();
    }

    function getbanyakpegstruktural() {
        $sql = "  select  count(f.eselon_id) as banyak
	    from spg_pegawai a
             LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	     inner join m_spg_jabatan d 
             inner join m_spg_eselon f ON (f.eselon_id = d.eselon_id) 
	     ON  d.jabatan_id = a.jabatan_id  
              
where 1=1 and b.status = '1' ";


        $query = $this->db->query($sql);
        return $query->row()->banyak;
    }

    function getpersenpegbyeselon() {
        $sql = "    select  f.eselon_nm,count(f.eselon_id) as banyak ,(100.0 * count(f.eselon_id) / sum(count(f.eselon_id)) over ())  as perc
	    from spg_pegawai a
             LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	     inner join m_spg_jabatan d 
             inner join m_spg_eselon f ON (f.eselon_id = d.eselon_id) 
	     ON  d.jabatan_id = a.jabatan_id                
where 1=1 and b.status = '1'
group by f.eselon_nm  ";


        $query = $this->db->query($sql);
        return $query->result();
    }
    
     function getpersenstrukturalperskpd() {
        $sql = "     select distinct b.satuan_kerja_id,b.satuan_kerja_nama as satker, 
       count( a.peg_id) as struktural,   (100.0 * count(a.peg_id) / sum(count(a.peg_id)) over ())  as perc
             from spg_pegawai a
              LEFT OUTER JOIN m_spg_unit_kerja c
                            ON a.unit_kerja_id = c.unit_kerja_id
                            LEFT OUTER JOIN m_spg_satuan_kerja b
                            ON b.satuan_kerja_id = COALESCE(c.satuan_kerja_id,a.satuan_kerja_id)
	    inner join m_spg_jabatan d on d.jabatan_id = a.jabatan_id  where 1=1 and b.status = '1' and d.jabatan_jenis = '2'
	     group by b.satuan_kerja_id,b.satuan_kerja_nama
	     order by b.satuan_kerja_nama  ";


        $query = $this->db->query($sql);
        return $query->result();
    }

}
