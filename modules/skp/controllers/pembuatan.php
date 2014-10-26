<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of pembuatan
 *
 * @author hari
 */
class pembuatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('skp_model', 'skp_model');
        $this->load->model('formskp/Skpmodel', 'skpmodel');
    }

    public function index($peg_id) {
        $data['pegawai'] = $this->skpmodel->getdatapegawaidetail($peg_id);
        //  $data['skp_pokok'] = $this->skp_model->get_skp_pokok($peg_id);
        //  $data['skp_tambahan'] = $this->skp_model->get_skp_tambahan($peg_id);

        $this->template->load('mainlayout', 'index', $data);
    }

    public function gettugas($pegid, $tahun, $status) {
        echo json_encode(array("datahasil" => $this->skp_model->get_skp_pokok($pegid, $tahun, $status)));
    }

    public function getpejabatpenilai($pegid, $tahun) {
        $pejabatid = $this->skp_model->get_pegpejabatpenilai($pegid, $tahun);
        echo json_encode(array("datahasil" => $this->skpmodel->getdatapegawaidetail($pejabatid)));
    }

    public function addpokok() {
        $item = json_decode($this->input->post("item"));
        $data_input = array(
            "peg_id" => $item->peg_id,
            "peg_id_atasan" => $item->peg_id_atasan,
            'deskripsi_kegiatan' => $item->deskripsi_kegiatan,
            'nilai_angka_kredit' => $item->nilai_angka_kredit,
            'target_kuantitatif' => $item->target_kuantitatif,
            'satuan_target_kuantitatif' => $item->satuan_target_kuantitatif,
            'target_kualitas' => $item->target_kualitas,
            'waktu' => $item->waktu,
            'satuan_waktu' => $item->satuan_waktu,
            'biaya' => $item->biaya,
            'status' => $item->status,
            'tahun' => $item->tahun,
            'id_entry' => $this->session->userdata('id'),
            'satuan_kerja_id' => $this->session->userdata('satker_id')
        );
        $this->skp_model->simpankegiatan($data_input);
        echo json_encode(array("output" => "Simpan berhasil!", "datahasil" => $this->skp_model->get_skp_pokok($item->peg_id, $item->tahun, $item->status)));
    }

    public function addtambahan() {
        $data_input = array(
            'nomor_kegiatan' => $this->input->post('nomor_kegiatan'),
            'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan'),
            'c_nik_pgw' => $this->input->post('nikPegawai'),
            'c_nik_pgw_atasan' => $this->input->post('nikAtasan')
        );

        $this->db->insert('public.tminputskp_tmbhn', $data_input);

        redirect('/skp/pembuatan/index/' . $this->input->post('nikPegawai'));
    }

    public function deletepokok() {

        $this->db->where('id_pengajuan', $this->uri->segment(4));
        $this->db->delete('public.tminputskp');

        redirect('/skp/pembuatan/index/' . $this->uri->segment(5));
    }

    public function deletetambahan() {

        $this->db->where('id_Pengajuan', $this->uri->segment(4));
        $this->db->delete('public.tminputskp_tmbhn');

        redirect('/skp/pembuatan/index/' . $this->uri->segment(5));
    }

    public function tambahkegiatan() {

        $count = count($_POST['pokok']);
        $data = array();

        for ($i = 0; $i < $count; $i++) {
            $data[$i] = array(
                'target_kuantitatif' => $_POST['pokok'][$i]['target_kuantitatif'],
                'satuan_target_kuantitatif' => $_POST['pokok'][$i]['satuan_target_kuantitatif'],
                'target_kualitas' => $_POST['pokok'][$i]['target_kualitas'],
                'waktu' => $_POST['pokok'][$i]['waktu'],
                'satuan_waktu' => $_POST['pokok'][$i]['satuan_waktu'],
                'biaya' => $_POST['pokok'][$i]['biaya'],
                'id_pengajuan' => $_POST['pokok'][$i]['id_pengajuan'],
                'tgl_pengajuan' => date('Y-m-d')
            );
            $this->db->where('id_pengajuan', $_POST['pokok'][$i]['id_pengajuan']);
            $this->db->update('public.tminputskp', $data[$i]);
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

        redirect('/skp/pembuatan/index/' . $this->input->post('nikPegawai'));
    }

}
