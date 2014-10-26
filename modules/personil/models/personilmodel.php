<?php

class Personilmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getdatapegawaidetail($idpegawai) {
        $sql = "  SELECT  case when a.peg_gelar_depan is not null and length(trim(a.peg_gelar_depan)) >0 then a.peg_gelar_depan||'.'
       else '' end ||a.peg_nama||COALESCE(','||a.peg_gelar_belakang,'') AS nama_lengkap,a.peg_id,
       a.id_goldar,
       a.gol_id_awal,
       a.id_pend_awal,
       a.unit_kerja_id,
       a.kecamatan_id,
       a.gol_id_akhir,
       a.jabatan_id,
       a.id_pend_akhir,
       a.id_agama,
       a.peg_nip,
       a.peg_nama,
       a.peg_gelar_depan,
       a.peg_gelar_belakang,
       a.peg_lahir_tempat,
       a.peg_lahir_tanggal,
       a.peg_jenis_kelamin,
       a.peg_status_perkawinan,
       a.peg_karpeg,
       a.peg_karsutri,
       a.peg_status_kepegawaian,
       a.peg_cpns_tmt,
       a.peg_pns_tmt,
       a.peg_gol_awal_tmt,
       a.peg_kerja_tahun,
       a.peg_kerja_bulan,
       a.peg_jabatan_tmt,
       a.peg_no_askes,
       a.peg_npwp,
       a.peg_bapertarum,
       a.peg_rumah_alamat,
       a.peg_kel_desa,
       a.peg_kodepos,
       a.peg_telp,
       a.peg_telp_hp,
       a.peg_tmt_kgb,
       a.peg_tmt_pmk,
       a.peg_tmt_cltn,
       a.peg_foto,
       a.peg_pend_awal_th,
       a.peg_pend_akhir_th,
       a.peg_gol_akhir_tmt,
       a.satuan_kerja_id,
       a.peg_ak,
       a.peg_status,
       a.peg_nip_baru, kecamatan_nm,
       c1.nm_pend as nm_pend_awal,
       c2.nm_pend as nm_pend_akhir,
       d1.nm_gol as nm_gol_awal,
       d2.nm_gol as nm_gol_akhir,
       d1.nm_pkt as nm_pkt_awal,
       d2.nm_pkt as nm_pkt_akhir,
       e.kabupaten_nm,
       f.nm_goldar,
       g.nm_agama,
       h.jabatan_nama,
       h.jabatan_jenis,
        (case h.jabatan_jenis
            when 1 then 'Politis'
            when 2 then 'Struktural'
            when 3 then 'Fungsional Tertentu'
            when 4 then 'Fungsional Umum'
       end  ) as nama_jenis_jabatan,
        
       i.unit_kerja_nama, i.unit_kerja_nama || COALESCE('/'||cb_dns.unit_kerja_nama) as cabang_dinas,
       i.unit_kerja_khusus,
        COALESCE( m.satuan_kerja_nama, k.satuan_kerja_nama) as satuan_kerja_nama,
       l.eselon_nm,
       (
         SELECT unit_kerja_nama
         FROM m_spg_unit_kerja
         WHERE unit_kerja_id = i.unit_kerja_parent
       ) as parent,
       COALESCE(i.unit_kerja_nama, k.satuan_kerja_nama) as tempat_kerja,
       a.satuan_kerja_id as peg_satuan_kerja_id,
       COALESCE(i.satuan_kerja_id, a.satuan_kerja_id) as satuan_kerja_id,
       EXTRACT(YEAR
FROM masa_kerja_pegawai(a.peg_id)) AS peg_skr_tahun,
     EXTRACT(MONTH
FROM masa_kerja_pegawai(a.peg_id)) AS peg_skr_bulan
from spg_pegawai a
     LEFT JOIN m_spg_kecamatan b ON (a.kecamatan_id = b.kecamatan_id)
     LEFT JOIN m_spg_pendidikan c1 ON (c1.id_pend = id_pend_awal)
     LEFT JOIN m_spg_pendidikan c2 ON (c2.id_pend = id_pend_akhir)
     LEFT JOIN m_spg_golongan d1 ON (d1.gol_id = gol_id_awal)
     LEFT JOIN m_spg_golongan d2 ON (d2.gol_id = gol_id_akhir)
     LEFT JOIN m_spg_kabupaten e ON (e.kabupaten_id = b.kabupaten_id)
     LEFT JOIN m_spg_golongan_darah f ON (f.id_goldar = a.id_goldar)
     LEFT JOIN m_spg_agama g ON (g.id_agama = a.id_agama)
     LEFT JOIN m_spg_jabatan h ON (h.jabatan_id = a.jabatan_id)
     LEFT JOIN m_spg_unit_kerja i 
	    LEFT OUTER JOIN m_spg_unit_kerja cb_dns
        ON i.unit_kerja_parent = cb_dns.unit_kerja_id
     LEFT JOIN m_spg_satuan_kerja k 
     ON (k.satuan_kerja_id = i.satuan_kerja_id)
     ON (i.unit_kerja_id = a.unit_kerja_id)     
     LEFT JOIN m_spg_eselon l ON (h.eselon_id = l.eselon_id)
         LEFT JOIN m_spg_satuan_kerja m 
     ON (m.satuan_kerja_id = a.satuan_kerja_id)
     where a.peg_id = '$idpegawai' ";

        $query = $this->db->query($sql);
        return $query->row();
    }

    function getlistpencarianpegawai(
    $struk = null, $fu = null, $ft = null, $satker = null, $unit = null, $golongan = null, $pendidikan = null, $jeniskelamin = null, $agama = null, $statuskepegawaian = null, $eselon = null, $orderby = null, $jenisorder = 'ASC', $nip = null, $nama = null, $limit, $offset, $usia = null, $masakerja = null, $level = null, $jurusan = null, $jabatanid = null) {
        $sql = "
             SELECT (a.peg_id) as peg_id,
                   case when a.peg_gelar_depan is not null and length(trim(a.peg_gelar_depan)) >0 then a.peg_gelar_depan||'.'
       else '' end ||a.peg_nama||COALESCE(','||a.peg_gelar_belakang,'') AS nama_lengkap,
                    a.unit_kerja_id,
                    a.peg_nip,a.peg_id,
                    a.peg_nip_baru,
                    a.peg_nama,
                    a.peg_gelar_depan,
                    a.peg_gelar_belakang, 
                    a.peg_lahir_tempat,
                    a.peg_lahir_tanggal,
                    a.peg_gol_akhir_tmt, case when a.peg_bapertarum = '2' then 'Belum Diambil' else 'Sudah Diambil' end as peg_bapertarum,   a.id_goldar,gd.nm_goldar,a.peg_jenis_kelamin
                    ,a.id_agama,ag.nm_agama,
                    case
                    when b.jabatan_jenis = '2' then 'struktural'
                    when b.jabatan_jenis = '3' then 'fungsional tertentu'
                    when b.jabatan_jenis = '4' then 'fungsional umum'
                    end as jenis_jabatan,
                    a.peg_pend_akhir_th,
                    a.peg_telp,
                    a.peg_telp_hp,
                    a.peg_rumah_alamat,
					a.peg_kel_desa,
					a.peg_kodepos,
					kec.kecamatan_nm,
					kab.kabupaten_nm,
                    nm_tingpend,
                    nm_pend,
                    EXTRACT(YEAR FROM masa_kerja_pegawai(a.peg_id))
                    AS peg_kerja_tahun,
                    EXTRACT(MONTH FROM masa_kerja_pegawai(a.peg_id))
                    AS peg_kerja_bulan,
                    (select extract (year from age(peg_lahir_tanggal))) as peg_umur,
                    a.peg_pns_tmt,
                    b.jabatan_nama,
                    a.peg_id,
                    a.peg_rumah_alamat,
                    es.eselon_nm,
                    mdist.kategori_nama,
                    dist.diklat_sttp_tgl,
                    dist.diklat_jumlah_jam,
                    (select kategori_nama
                     from m_spg_diklat_struk_kategori
                     where kategori_id = (select kategori_parent
                                          from m_spg_diklat_struk_kategori
                                          where kategori_nama = mdist.kategori_nama
                                          limit 1))
                    as kategori_parent,
                    sk.satuan_kerja_nama,
					uk.unit_kerja_khusus,
					uk.unit_kerja_nama,
					( SELECT unit_kerja_nama
					  FROM m_spg_unit_kerja
					  WHERE unit_kerja_id = uk.unit_kerja_parent
					) as parent,
                    CASE WHEN sk.satuan_kerja_nama ilike '%dinas pendidikan%'
                              OR sk.satuan_kerja_nama ilike '%dinas kesehatan%'
                    THEN 1 else 0 END as special,
                    COALESCE(a.peg_pns_tmt,a.peg_cpns_tmt) as pegawai_tmt,
                    COALESCE(c1.nm_gol,c2.nm_gol) as golongan_nama,
                    peg_gol_akhir_tmt as golongan_tmt,
                    COALESCE( uk.unit_kerja_nama || COALESCE('/'||cb_dns.unit_kerja_nama),uk.unit_kerja_nama) as cabang_dinas,
                    a.peg_jabatan_tmt,
                    a.peg_cpns_tmt,
                    a.peg_status_kepegawaian,

                    CASE
                      when a.peg_status_kepegawaian = '1' then 'PNS'
                      else 'CPNS'
                    END AS status_kepegawaian,
                    a.peg_tmt_kgb,
                    a.peg_npwp,
                    a.peg_karpeg,
                    a.peg_karsutri,                    
                    case 
                      when b.jabatan_jenis = '2'  then  b.jabatan_jenis
                    end as struktural,
                    case 
                      when b.jabatan_jenis = '4' then  b.jabatan_jenis
                    end as fu,
                    case 
                      when b.jabatan_jenis = '3' then  b.jabatan_jenis
                    end as ft,peg_foto, uk.unit_kerja_nama
                    FROM
                        spg_pegawai a
                            LEFT OUTER JOIN m_spg_agama ag
                           ON ag.id_agama = a.id_agama

		           LEFT OUTER JOIN m_spg_golongan_darah gd
                           ON gd.id_goldar = a.id_goldar

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

							WHERE sk.status = 1

	     ";

        if ($struk == '2' || $fu == '4' || $ft == '3') {
            $sql .= "  and   cast( b.jabatan_jenis as char) in ('$struk','$fu','$ft')    ";
        }

        /* if (isset($satker) && $satker != '-' && $satker != '' && (!isset($unit) || $unit == '-' || $unit == '0' || $unit == '')) {
          $sql .= "   and ( sk.satuan_kerja_id in ($satker) ";
          $sql .= "   and uk.unit_kerja_id is null ) ";
          }
          if (isset($satker) && $satker != '-' && $satker != '' && (isset($unit) && $unit != '-' && $unit != '0' && $unit != '' && ($unit != '#' || $unit != 'X'))) {
          $sql .= "   and sk.satuan_kerja_id in ($satker) ";
          } */
        if (isset($satker) && $satker != '-' && $satker != '') {
           // $sql .= "   and sk.satuan_kerja_nama ilike '%'||'$satker'||'%' ";
             $sql .= "   and (sk.satuan_kerja_nama ilike '%'||'$satker'||'%'  OR sk.satuan_kerja_id in ($satker) ) ";
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
            $sql .= "   and  a.id_agama in ($agama)  ";
        }
        if (isset($statuskepegawaian) && $statuskepegawaian != '-' && $statuskepegawaian != '') {
            $sql .= "   and  peg_status_kepegawaian in($statuskepegawaian)  ";
        }
        if (isset($eselon) && $eselon != '-' && $eselon != '') {
            $sql .= "   and es.eselon_id in  ($eselon) ";
        }
        if (isset($nip) && $nip != '-' && $nip != '') {
            $nip = trim($nip);
            $sql .= "   and  ( a.peg_nip like '$nip%' or
                    a.peg_nip_baru like '$nip%' ) ";
        }
        if (isset($nama) && $nama != '-') {
            $nama = trim($nama);
            $sql .= "   and  upper(a.peg_nama) like  upper('%$nama%') ";
        }


        if (isset($usia) && $usia != '-' && $usia != '') {

            //  $sql .= "   and EXTRACT(year from AGE(NOW(), peg_lahir_tanggal)) in ($usia) ";
            if ($usia == '60') {
                $sql .= " and   (select extract (year from age(peg_lahir_tanggal))) > $usia ";
            } else {
                $sql .= " and   (select extract (year from age(peg_lahir_tanggal))) in ($usia) ";
            }
        }
        if (isset($masakerja) && $masakerja != '-' && $masakerja != '') {
            $sql .= " and   EXTRACT(YEAR FROM masa_kerja_pegawai(a.peg_id)) in ($masakerja) ";
        }
        if (isset($jurusan) && $jurusan != '-' && $jurusan != '') {
            $jurusan = trim($jurusan);
            $sql .= "   and  upper(pd.nm_pend) like  upper('%$jurusan%') ";
        }
        if (isset($jabatanid) && $jabatanid != '-' && $jabatanid != '0' && $jabatanid != '') {
            $sql .= "   and ( upper(b.jabatan_nama) like '%'||upper('$jabatanid')||'%'    or  a.jabatan_id = '$jabatanid'  ) ";
        }





        if (isset($orderby) && $orderby != '') {
            switch ($orderby) {
                case 0:
                    $orderby = 'a.peg_nama';
                    break;
                case 1:
                    $orderby = 'a.peg_nip_baru';
                    break;
                case 2:
                    $orderby = 'b.jabatan_nama';
                    break;
                case 3:
                    $orderby = 'c1.kd_gol';
                    break;
                case 4:
                    $orderby = 'es.eselon_nm';
                    break;
                case 5:
                    $orderby = 'sk.satuan_kerja_nama';
                    break;
                default:
                    $orderby = 'a.peg_nama';
                    break;
            }
            if (isset($limit) && $limit != '' && $limit > 0) {
                $sql .= "    order by $orderby   $jenisorder   limit  $limit  offset  $offset    ";
            } else {
                $sql .= "    order by $orderby    ";
            }
        } else {
            $orderby = ' a.peg_nama,c1.kd_gol DESC,
                        a.peg_gol_akhir_tmt ASC,
                        es.eselon_nm ASC,
                        a.peg_jabatan_tmt ASC,
                        peg_kerja_tahun DESC,
                        peg_kerja_bulan DESC,
                        mdist.kategori_id ASC,
                        tpd.kd_tingpend DESC,
                        peg_umur DESC ';
            if (isset($limit) && $limit != '' && $limit > 0) {
                $sql .= "    order by $orderby    limit  $limit  offset  $offset    ";
            }
        }


        //echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getbanyakpencarianpegawai($struk = null, $fu = null, $ft = null, $satker = null, $unit = null, $golongan = null, $pendidikan = null, $jeniskelamin = null, $agama = null, $statuskepegawaian = null, $eselon = null, $nip = null, $nama = null, $usia = null, $masakerja = null, $level = null, $jurusan = null, $jabatanid = null) {
        $sql = " SELECT count( distinct( a.peg_id)) as banyakpeg
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

							WHERE sk.status = 1 ";
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
            $nip = trim($nip);
            $sql .= "   and  ( a.peg_nip like '$nip%' or
                    a.peg_nip_baru like '$nip%' ) ";
        }
        if (isset($nama) && $nama != '-') {
            $nama = trim($nama);
            $sql .= "   and  upper(a.peg_nama) like  upper('%$nama%') ";
        }

        if (isset($jurusan) && $jurusan != '-' && $jurusan != '') {
            $jurusan = trim($jurusan);
            $sql .= "   and  upper(pd.nm_pend) like  upper('%$jurusan%') ";
        }

        if (isset($usia) && $usia != '-' && $usia != '') {
            if ($usia == '60') {
                $sql .= " and   (select extract (year from age(peg_lahir_tanggal))) > $usia ";
            } else {
                $sql .= " and   (select extract (year from age(peg_lahir_tanggal))) in ($usia) ";
            }
        }
        if (isset($masakerja) && $masakerja != '-' && $masakerja != '') {
            $sql .= " and   EXTRACT(YEAR FROM masa_kerja_pegawai(a.peg_id)) in ($masakerja) ";
        }
        /* if (isset($satker) && $satker != '-' && $satker != '' && (!isset($unit) || $unit == '-' || $unit == '0' || $unit == '')) {
          $sql .= "   and ( sk.satuan_kerja_id in ($satker) ";
          $sql .= "   and uk.unit_kerja_id is null ) ";
          }
          if (isset($satker) && $satker != '-' && $satker != '' && (isset($unit) && $unit != '-' && $unit != '0' && $unit != '' && ($unit != '#' || $unit != 'X'))) {
          $sql .= "   and sk.satuan_kerja_id in ($satker) ";
          } */
        if (isset($satker) && $satker != '-' && $satker != '') {
            $sql .= "   and (sk.satuan_kerja_nama ilike '%'||'$satker'||'%'  OR sk.satuan_kerja_id in ($satker) ) ";
        }

        if (isset($jabatanid) && $jabatanid != '-' && $jabatanid != '0' && $jabatanid != '') {
            $sql .= "   and ( upper(b.jabatan_nama) like '%'||upper('$jabatanid')||'%'    or  a.jabatan_id = '$jabatanid'  ) ";
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


        //echo $sql;
        $query = $this->db->query($sql);
        return $query->row()->banyakpeg;
    }

    function getallgolongan($idgol = null) {
        $where = 'WHERE 1=1 ';
        if (isset($idgol) && $idgol != '') {
            $where .= "  AND gol_id = '$idgol'  ";
        }
        $sql = " SELECT gol_id, kd_gol, nm_gol, nm_pkt
                 FROM m_spg_golongan    $where  ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function geteselon($ideselon = null, $nmeselon = null, $limit = null, $offset = null) {
        $sql = " SELECT eselon_id, gol_id_awal, 
		        gol_id_akhir, eselon_nm, eselon_bup
                FROM m_spg_eselon where 1=1  ";

        $nmeselon = rawurldecode($nmeselon);
        if (isset($nmeselon)) {
            $sql .= " and  upper(eselon_nm)  like '%'||upper('$nmeselon')||'%'  ";
        }
        if (isset($ideselon)) {
            $sql .= " and  eselon_id = '" . $ideselon . "'  ";
        }
        if (isset($limit) && isset($offset)) {
            $sql .= "  limit $limit offset  $offset   ";
        }

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatpenforpegawai($idpegawai) {
        $sql = "  SELECT 
       a.riw_pendidikan_id,
       a.id_pend,
       a.peg_id,
       a.riw_pendidikan_nm,
       a.riw_pendidikan_sttb_ijazah,
       a.riw_pendidikan_tgl,
       a.univ_id,
       a.jurusan_id,
       COALESCE(c.tingpend_id, d.tingpend_id) as tingpend_id,
       CASE
         WHEN a.id_pend IS NOT NULL THEN c.nm_tingpend
         ELSE d.nm_tingpend
       END AS nm_tingpend,
       CASE
         WHEN a.riw_pendidikan_fakultas is NOT NULL THEN
          a.riw_pendidikan_fakultas
         WHEN a.id_pend IS NULL THEN riw_pendidikan_fakultas
         ELSE b.nm_pend
       END as nm_pend
FROM spg_riwayat_pendidikan a
     LEFT JOIN m_spg_pendidikan b ON (a.id_pend = b.id_pend)
     LEFT JOIN m_spg_tingkat_pendidikan c ON (c.tingpend_id = b.tingpend_id)
     LEFT JOIN m_spg_tingkat_pendidikan d ON (d.tingpend_id = a.tingpend_id)
where peg_id = '$idpegawai'
order by c.tingpend_id desc, d.tingpend_id desc ,riw_pendidikan_tgl asc ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatpennonformalpegawai($idpegawai) {
        $sql = "  SELECT non_id,
       peg_id,
       non_nama,
       non_tgl_mulai,
       non_tgl_selesai,
       non_sttp,
       non_penyelenggara,
       non_tempat
FROM spg_riwayat_nonformal
where peg_id = '$idpegawai'
order by non_tgl_mulai ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatdiklatpegawai($idpegawai, $tipe = 'diklat_fungsional_id') {
        switch ($tipe) {
            case 'diklat_teknis_id':
                $tiped = "'DT'";
                break;
            case 'diklat_fungsional_id':
                $tiped = "'DF'";
                break;
            default :
                $tiped = null;
        }
        $sql = "
                SELECT a.diklat_id,
                       a.peg_id,
                       a.kategori_id,
                       a.diklat_fungsional_id,
                       a.diklat_teknis_id,
                       a.diklat_jenis,
                       a.diklat_mulai,
                       a.diklat_selesai,
                       a.diklat_penyelenggara,
                       a.diklat_tempat,
                       a.diklat_jumlah_jam,
                       a.diklat_sttp_no,
                       a.diklat_sttp_tgl,
                       a.diklat_usul_no,
                       a.diklat_usul_tgl,
                       a.diklat_usul,
                       a.pejabat_id,
                       a.diklat_nama,
                       a.diklat_tipe,
                       a.diklat_sttp_pej,
                       CASE
                         WHEN a.$tipe IS NOT NULL AND diklat_tipe IS NULL THEN
                          b.diklat_fungsional_nm
                         WHEN diklat_tipe IS NOT NULL THEN diklat_nama
                         ELSE diklat_nama
                       END as diklat_fungsional_nm,
                       CASE
                         WHEN a.$tipe IS NOT NULL AND diklat_tipe IS NULL THEN
                          c.diklat_teknis_nm
                         WHEN diklat_tipe IS NOT NULL THEN diklat_nama
                         ELSE diklat_nama
                       END as diklat_teknis_nm,
                       d.kategori_nama,
                       e.kategori_nama as parent_nama,
                       d.kategori_parent
                FROM spg_riwayat_diklat a
                     LEFT JOIN m_spg_diklat_fungsional b ON (a.diklat_fungsional_id = b.diklat_fungsional_id)
                     LEFT JOIN m_spg_diklat_teknis c ON (a.diklat_teknis_id = c.diklat_teknis_id
                     )
                     LEFT JOIN m_spg_diklat_struk_kategori d ON (a.kategori_id = d.kategori_id)
                     LEFT JOIN m_spg_diklat_struk_kategori e ON (e.kategori_id =
                      d.kategori_parent)
                WHERE peg_id = '$idpegawai' and
                      ((a.$tipe is not null and
                      (diklat_usul is false or
                      diklat_usul is null)   )
                ";
        $sql .=!empty($tiped) ? " OR diklat_tipe = " . $tiped : '';
        $sql .= ")";
        $sql .= "
                ORDER BY diklat_mulai
                ";
//echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatdiklatstrukturalpegawai($idpegawai, $tipe = 'diklat_fungsional_id') {

        $sql = "  SELECT a.diklat_id, a.peg_id, a.kategori_id,
       a.diklat_jenis, a.diklat_mulai, a.diklat_selesai, a.diklat_penyelenggara,
       a.diklat_tempat, a.diklat_jumlah_jam, a.diklat_sttp_no, a.diklat_sttp_tgl,
       a.diklat_usul_no, a.diklat_usul_tgl, a.diklat_usul, a.pejabat_id, a.diklat_nama,
       a.diklat_tipe, a.diklat_sttp_pej,
                       d.kategori_nama,
                       e.kategori_nama as parent_nama,
                       d.kategori_parent
                FROM
                        spg_riwayat_diklat a
                        LEFT JOIN m_spg_diklat_fungsional b ON (a.diklat_fungsional_id = b.diklat_fungsional_id)
                        LEFT JOIN m_spg_diklat_teknis c ON (a.diklat_teknis_id = c.diklat_teknis_id)
                        LEFT JOIN m_spg_diklat_struk_kategori d ON (a.kategori_id = d.kategori_id)
                        LEFT JOIN m_spg_diklat_struk_kategori e ON (e.kategori_id = d.kategori_parent)

                WHERE  peg_id = '$idpegawai' and
                    (
                     (a.kategori_id is not null and
                     (diklat_usul is false or diklat_usul is null)
                    )
                )
              ORDER BY diklat_mulai
        ";
//echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatpangkatpegawai($idpegawai) {
        /* $sql = "   SELECT
          a.*,
          b.nm_gol, b.nm_pkt,
          c.pejabat_nm, c.pejabat_jabatan

          FROM
          spg_riwayat_pangkat a
          LEFT JOIN m_spg_golongan b ON (a.gol_id = b.gol_id)
          LEFT JOIN m_spg_pejabat c ON (a.pejabat_id = c.pejabat_id)
          WHERE peg_id = '$idpegawai'
          ORDER BY riw_pangkat_tmt "; */

        $sql = " SELECT
                  a.riw_pangkat_id, b.gol_id,
                 coalesce(a.riw_pangkat_tmt::character varying ,'-') as riw_pangkat_tmt,
                 coalesce( a.riw_pangkat_sk,'-')as riw_pangkat_sk,
                 coalesce( a.riw_pangkat_sktgl::character varying ,'-')as riw_pangkat_sktgl,
                 coalesce( a.riw_pangkat_thn,'-')as riw_pangkat_thn,
                 coalesce( a.riw_pangkat_bln,'-')as riw_pangkat_bln,
                  b.nm_gol, b.nm_pkt,
                  c.pejabat_nm,riw_pangkat_pejabat, c.pejabat_jabatan,pejabat_nm||'-'||pejabat_jabatan as riw_pangkat_pejabatid

                FROM
                        spg_riwayat_pangkat a
                        LEFT JOIN m_spg_golongan b ON (a.gol_id = b.gol_id)
                        LEFT JOIN m_spg_pejabat c ON (a.pejabat_id = c.pejabat_id)
                WHERE peg_id = '$idpegawai'
                ORDER BY riw_pangkat_tmt ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatjabatanpegawai($idpegawai) {
        /* $sql = "    SELECT
          riw_jabatan_id
          ,peg_id
          ,a.jabatan_id
          ,CASE WHEN a.jabatan_id IS NULL THEN riw_jabatan_nm ELSE jabatan_nama||COALESCE('('||eselon_nm||')','') END as riw_jabatan_nm
          ,CASE WHEN a.jabatan_id IS NULL THEN riw_jabatan_unit ELSE unit_kerja_nama END as riw_jabatan_unit
          ,riw_jabatan_tmt
          ,riw_jabatan_no
          ,COALESCE( riw_jabatan_tgl::character varying,'-') as  riw_jabatan_tgl
          ,riw_jabatan_pejabat
          FROM
          spg_riwayat_jabatan a
          LEFT JOIN m_spg_jabatan d ON (a.jabatan_id = d.jabatan_id)
          LEFT JOIN m_spg_unit_kerja b ON (d.unit_kerja_id = b.unit_kerja_id)
          LEFT JOIN m_spg_golongan c ON (d.gol_id_awal = c.gol_id)
          LEFT JOIN m_spg_eselon e ON (d.eselon_id = e.eselon_id)
          WHERE peg_id = '$idpegawai'
          ORDER BY riw_jabatan_tmt "; */


        $sql = "    SELECT
                  riw_jabatan_id 
                  ,peg_id 
                  ,a.jabatan_id 
                  ,riw_jabatan_nm as riw_jabatan_nm
                  ,CASE WHEN  riw_jabatan_unit is not null  or a.jabatan_id IS NULL or a.jabatan_id=7 THEN riw_jabatan_unit ELSE k.satuan_kerja_nama  END as riw_jabatan_unit
                  ,riw_jabatan_tmt 
                  ,riw_jabatan_no 
                  ,COALESCE( riw_jabatan_tgl::character varying,'-') as  riw_jabatan_tgl
                  ,riw_jabatan_pejabat                        
                FROM 
                        spg_riwayat_jabatan a
                        LEFT JOIN m_spg_jabatan d ON (a.jabatan_id = d.jabatan_id)
                        LEFT JOIN m_spg_unit_kerja b ON (d.unit_kerja_id = b.unit_kerja_id)
                        LEFT JOIN m_spg_golongan c ON (d.gol_id_awal = c.gol_id)
                        LEFT JOIN m_spg_eselon e ON (d.eselon_id = e.eselon_id)
						LEFT join m_spg_satuan_kerja k on (k.satuan_kerja_id = d.satuan_kerja_id)
                WHERE peg_id = '$idpegawai' 
                ORDER BY riw_jabatan_tmt ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatpenghargaan($idpegawai) {
        $sql = "   SELECT a.*,
                       b.penghargaan_nm    
                FROM 
                    spg_riwayat_penghargaan a
                    LEFT JOIN m_spg_penghargaan b ON (a.penghargaan_id = b.penghargaan_id)
                WHERE peg_id = '$idpegawai'
				order by riw_penghargaan_tglsk ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatdisiplinpegawai($idpegawai) {
        $sql = "SELECT a.riw_hukum_id, a.peg_id, a.mhukum_id, a.riw_hukum_tmt, a.riw_hukum_sd, 
                                      a.riw_hukum_sk, a.riw_hukum_tgl, a.riw_hukum_ket,
					   b.mhukum_hukuman,
					   c.mhukum_cat_nm,
					   d.peg_nip,mhukum_cat_id
				FROM spg_riwayat_hukuman a 
				LEFT JOIN m_spg_hukum b using(mhukum_id)
				LEFT JOIN m_spg_hukum_kategori c using(mhukum_cat_id)
				LEFT JOIN spg_pegawai d on a.peg_id = d.peg_id
				WHERE a.peg_id = '$idpegawai' order by a.riw_hukum_id";

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatorganisasi($idpegawai) {
        $sql = "SELECT riwayat_org_id, peg_id, nama, kedudukan, tahun_mulai, tahun_akhir, 
                tempat, nama_pimpinan
           FROM spg_riwayat_organisasi 
				WHERE peg_id = '$idpegawai' order by tahun_mulai";

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getdatariwayatorganisasibyid($id) {
        $sql = "SELECT riwayat_org_id, peg_id, nama, kedudukan, tahun_mulai, tahun_akhir, 
                tempat, nama_pimpinan
           FROM spg_riwayat_organisasi 
				WHERE riwayat_org_id = '$id' ";

        $query = $this->db->query($sql);
        return $query->row();
    }

    function getketbadanpegawaibyidpeg($idpegawai) {
        $sql = " SELECT riwayat_ketbadan_id, peg_id, tinggi, berat, rambut, bentuk_muka, 
       warna_kulit, ciri_khas, cacat_tubuh
  FROM spg_riwayat_ketbadan where peg_id = '$idpegawai'  ";

        $query = $this->db->query($sql);
        return $query->row();
    }

    function getallsatuankerja($idsatker = null) {
        //$where = 'WHERE 1=1 and status=1 ';
        $where = 'WHERE 1=1  ';
        if (isset($idsatker) && $idsatker != null) {
            $where .= "  AND  satuan_kerja_id = '$idsatker'  ";
        }
        if ($this->ion_auth->is_group_by_id(array(2, 4, 6))) {
            $where .= "  AND  satuan_kerja_id = '" . $this->session->userdata('satker_id') . "'  ";
        }
        $sql = " SELECT distinct(satuan_kerja_id) as satuan_kerja_id, tahun_id, satuan_kerja_nama FROM m_spg_satuan_kerja   $where 
        order by  satuan_kerja_nama ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getallsatuankerjabyaktif($aktif = 1) {
        $sql = " SELECT distinct(satuan_kerja_id) as satuan_kerja_id, tahun_id, satuan_kerja_nama,status FROM m_spg_satuan_kerja WHERE 1=1  ";
        if (isset($aktif) && $aktif != null && $aktif != '-') {
            $sql .= "  AND  status = '$aktif'  ";
        }
        if ($this->ion_auth->is_group_by_id(array(2, 4, 6))) {
            $sql .= "  AND  satuan_kerja_id = " . $this->session->userdata('satker_id') . " ";
        }
        $sql .= "   order by  satuan_kerja_nama ";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
