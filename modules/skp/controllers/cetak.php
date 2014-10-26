<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of pembuatan
 *
 * @author hari
 */
class cetak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('skp_model', 'skp_model');
    }

    public function index() {
        $data['list_pegawai'] = $this->skp_model->get_all_pegawai();

        if ($this->input->post('select_c_nik_pgw')) {
            $nik = $this->input->post('select_c_nik_pgw');
        } else if ($this->uri->segment(4)) {
            $nik = $this->uri->segment(4);
        }

        if (isset($nik) && $nik != '') {
            $data['pegawai'] = $this->skp_model->get_pegawai_by_nik($nik);
            $data['skp_pokok'] = $this->skp_model->get_skp_pokok($nik);
            $data['skp_tambahan'] = $this->skp_model->get_skp_tambahan($nik);
        }



        $this->template->load('mainlayout', 'print', $data);
    }

    public function print_data($nik) {
        $data['pegawai'] = $this->skp_model->get_pegawai_by_nik($nik);

        $data['skp_pokok'] = $this->skp_model->get_skp_pokok($nik);
        $data['skp_tambahan'] = $this->skp_model->get_skp_tambahan($nik);

        $this->load->view('cetak', $data);
    }

    public function print_penilaian($nik) {
        $data['pegawai'] = $this->skp_model->get_pegawai_by_nik($nik);

        $data['skp_pokok'] = $this->skp_model->get_skp_pokok($nik);
        $data['skp_tambahan'] = $this->skp_model->get_skp_tambahan($nik);
        if ($this->input->post('select_c_nik_pgw')) {
            $nik = $this->input->post('select_c_nik_pgw');
        } else if ($this->uri->segment(4)) {
            $nik = $this->uri->segment(4);
        }

        $this->load->view('cetak', $data);
    }

}
