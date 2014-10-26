<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of pembuatan
 *
 * @author hari
 */
class penilaian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('skp_model', 'skp_model');
    }

    public function index() {
        $data['list_pegawai'] = $this->skp_model->get_all_pegawai();

        $nik = $this->input->post('select_c_nik_pgw');

        if ($nik) {
            $data['pegawai'] = $this->skp_model->get_pegawai_by_nik($nik);

            $data['skp_pokok'] = $this->skp_model->get_skp_pokok($nik);
            $data['skp_tambahan'] = $this->skp_model->get_skp_tambahan($nik);
            $data['realisasi_pokok'] = $this->skp_model->get_realisasi_pokok($nik);
        }

        $this->template->load('mainlayout', 'nilai', $data);
    }

    public function tambahrealisasi() {

        $count = count($_POST['preal']);
        $data = array();

        for ($i = 0; $i < $count; $i++) {
            $data[$i] = array(
                'id_pengajuan' => $_POST['preal'][$i]['id_pengajuan'],
                'nomor_kegiatan' => $_POST['preal'][$i]['nomor_kegiatan'],
                'c_nik_pgw' => $this->input->post('nikPegawai'),
                'c_nik_pgw_atasan' => $this->input->post('nikAtasan'),
                'realisasi_kuantitatif' => $_POST['preal'][$i]['kuant'],
                //'satuan_realisasi_kuantitatif'=>$_POST['preal'][$i]['sat_kuant'],
                'realisasi_kualitas' => $_POST['preal'][$i]['kual'],
                //'satuan_realisasi_kualitas'=>$_POST['preal'][$i]['sat_kual'],
                'waktu' => $_POST['preal'][$i]['waktu'],
                'biaya' => $_POST['preal'][$i]['biaya'],
                'tgl_pengajuan' => date('Y-m-d')
            );
            $this->db->insert('public.tmrealisasiskp', $data[$i]);
        }

        // $count2 = count($_POST['tambahan']);
        // $data2 = array();
        // for($i2=0; $i2<$count2; $i2++) {
        //   $data2[$i] = array(
        //     'target_kuantitatif'=>$_POST['tambahan'][$i2]['target_kuantitatif'],
        //     'satuan_target_kuantitatif'=>$_POST['tambahan'][$i2]['satuan_target_kuantitatif'],
        //     'target_kualitas'=>$_POST['tambahan'][$i2]['target_kualitas'],
        //     'waktu'=>$_POST['tambahan'][$i2]['waktu'],
        //     'satuan_waktu'=>$_POST['tambahan'][$i2]['satuan_waktu'],
        //     'biaya'=>$_POST['tambahan'][$i2]['biaya'],
        //     'id_Pengajuan'=>$_POST['tambahan'][$i2]['id_Pengajuan'],
        //     'tgl_pengajuan'=>date('Y-m-d')
        //     );
        //   $this->db->where('id_Pengajuan', $_POST['tambahan'][$i2]['id_Pengajuan']);
        //   $this->db->update('public.tminputskp_tmbhn',$data2[$i2]);
        // } 
        // Debug Sript
        // echo "<pre>";
        // var_dump($data);

        redirect('/skp/penilaian/');
    }

}
