<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pejabatcontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions(); 
        $this->load->model('Skpmodel', 'skpmodel');
    } 
    public function index( ) {
        $data['listgol'] = $this->skpmodel->getallgolongan();
        $data['listeselon'] = $this->skpmodel->geteselon(); 
        $data['satker'] = $this->skpmodel->getallsatuankerja( $this->session->userdata('satker_id')) ;
        $this->template->load('mainlayoutpopup', 'listpejabat', $data);
    }

    

    public function caripejabatjson() {
        $golongan = $this->input->post('golongan');
        $eselon = $this->input->post('eselon');
        $jabatan = $this->input->post('jabatan');
        $instansi = $this->input->post('instansi');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $struk = 2;// $this->input->post('struk');
        $fu = null;//$this->input->post('fu');
        $ft = null;//$this->input->post('ft');
//----
        $pendidikan = $this->input->post('pendidikan');
        $jeniskelamin = $this->input->post('kelamin');
        $agama = $this->input->post('agama');
        $usia = $this->input->post('usia');

        $arr["sEcho"] = $this->input->post('sEcho');
        $banyak = $this
                ->skpmodel
                ->getbanyakpencarianpegawai($struk, $fu, $ft, $instansi, null, $golongan, $pendidikan, $jeniskelamin, $agama, null, $eselon, $nip, $nama, $usia, null, null, null, $jabatan);

        $arr["iTotalRecords"] = $banyak;
        $arr["iTotalDisplayRecords"] = $banyak;


        $arr["aaData"] = $this
                ->skpmodel
                ->getlistpencarianpegawai($struk, $fu, $ft, $instansi, null, $golongan, $pendidikan, $jeniskelamin, $agama, null, $eselon, $this->input->post('iSortCol_0'), $this->input->post('sSortDir_0'), $nip, $nama, $this->input->post('iDisplayLength'), $this->input->post('iDisplayStart'), $usia, null, null, null, $jabatan);
        echo json_encode($arr);
    }

    public function getpegawaibyidjson(){
          echo json_encode($this
                ->skpmodel
                ->getdatapegawaidetail($this->input->post("idpeg")));
     }

}
