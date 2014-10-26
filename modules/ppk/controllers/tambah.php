<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of pembuatan
 *
 * @author hari
 */
class tambah extends CI_Controller{
   public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('ppk_model', 'ppk_model');
    }

    public function index() {
      $data['list_pegawai'] = $this->ppk_model->get_all_pegawai();

      $nik = $this->input->post('select_c_nik_pgw');

      if($nik){
        $data['pegawai'] = $this->ppk_model->get_pegawai_by_nik($nik);

        $data['skp_pokok'] = $this->ppk_model->get_skp_pokok($nik);
        $data['skp_tambahan'] = $this->ppk_model->get_skp_tambahan($nik);
      }

      $this->template->load('mainlayout', 'tambah', $data);
    }

}
