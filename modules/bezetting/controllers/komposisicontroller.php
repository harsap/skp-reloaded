<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Komposisicontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('Komposisimodel', 'komposisimodel');
    }

    public function index() {
        $this->template->load('mainlayout', 'index');
    }

    public function grafikagama($id) {
        $data['idsatker'] = $this->komposisimodel->getallsatuankerja($id);
        $this->template->load('mainlayout', 'grafikagama', $data);
    }

    public function grafikeselon($id) {
        $data['idsatker'] = $this->komposisimodel->getallsatuankerja($id);
        $this->template->load('mainlayout', 'grafikeselon', $data);
    }

    public function grafikjenisjabatan($id) {
        $data['idsatker'] = $this->komposisimodel->getallsatuankerja($id);
        $this->template->load('popuplayout', 'grafikjenisjabatan', $data);
    }

    public function grafikjeniskelamin($id) {
        $data['idsatker'] = $this->komposisimodel->getallsatuankerja($id);
        $this->template->load('popuplayout', 'grafikjeniskelamin', $data);
    }

    public function grafikpangkat($id) {
        $data['idsatker'] = $this->komposisimodel->getallsatuankerja($id);
        $this->template->load('popuplayout', 'grafikpangkat', $data);
    }

    public function grafikpendidikan($id) {
        $data['idsatker'] = $this->komposisimodel->getallsatuankerja($id);
        $this->template->load('popuplayout', 'grafikpendidikan', $data);
    }

    public function grafikusia($id) {
        $data['idsatker'] = $this->komposisimodel->getallsatuankerja($id);
        $this->template->load('popuplayout', 'grafikusia', $data);
    }

    public function rekappegbyusia() {
        $data['listusia'] = $this->komposisimodel->getalldatapegawaiusia();
        $this->template->load('mainlayout', 'rekappegbyusia', $data);
    }

    public function rekappegbyusiajson($id) {
        $hasil = $this->komposisimodel->getalldatapegawaiusia($id);
        echo json_encode(array(
            array("name" => "16-20|16-20", "data" => array(floatval($hasil[0]->u1620))),
            array("name" => "21-25|21-25", "data" => array(floatval($hasil[0]->u2125))),
            array("name" => "26-30|26-30", "data" => array(floatval($hasil[0]->u2630))),
            array("name" => "31-35|31-35", "data" => array(floatval($hasil[0]->u3135))),
            array("name" => "36-40|36-40", "data" => array(floatval($hasil[0]->u3640))),
            array("name" => "41-45|41-45", "data" => array(floatval($hasil[0]->u4145))),
            array("name" => "46-50|46-50", "data" => array(floatval($hasil[0]->u4650))),
            array("name" => "51-55|51-55", "data" => array(floatval($hasil[0]->u5155))),
            array("name" => "56-60|56-60", "data" => array(floatval($hasil[0]->u5660))),
            array("name" => " > 60|60", "data" => array(floatval($hasil[0]->u61)))
        ));
    }

    public function rekappegbypangkat() {
        $data['listusia'] = $this->komposisimodel->getalldatapegawaibypangkat();
        $this->template->load('mainlayout', 'rekappegbypangkat', $data);
    }

    public function rekappegbypangkatjson($id) {
        $hasil = $this->komposisimodel->getalldatapegawaibypangkat($id);

        echo json_encode(array(
            array("name" => "IA|1", "data" => array(floatval($hasil[0]->a1))),
            array("name" => "IB|2", "data" => array(floatval($hasil[0]->b1))),
            array("name" => "IC|3", "data" => array(floatval($hasil[0]->c1))),
            array("name" => "ID|4", "data" => array(floatval($hasil[0]->d1))),
            array("name" => "IIA|5", "data" => array(floatval($hasil[0]->a2))),
            array("name" => "IIB|6", "data" => array(floatval($hasil[0]->b2))),
            array("name" => "IIC|7", "data" => array(floatval($hasil[0]->c2))),
            array("name" => "IID|8", "data" => array(floatval($hasil[0]->d2))),
            array("name" => "IIIA|9", "data" => array(floatval($hasil[0]->a3))),
            array("name" => "IIIB|10", "data" => array(floatval($hasil[0]->b3))),
            array("name" => "IIIC|11", "data" => array(floatval($hasil[0]->c3))),
            array("name" => "IIID|12", "data" => array(floatval($hasil[0]->d3))),
            array("name" => "IVA|13", "data" => array(floatval($hasil[0]->a4))),
            array("name" => "IVB|14", "data" => array(floatval($hasil[0]->b4))),
            array("name" => "IVC|15", "data" => array(floatval($hasil[0]->c4))),
            array("name" => "IVD|16", "data" => array(floatval($hasil[0]->d4))),
            array("name" => "IVE|17", "data" => array(floatval($hasil[0]->e4)))
        ));
    }

    public function rekappegbypendidikan() {
        $data['listusia'] = $this->komposisimodel->getalldatapegawaibypendidikan();
        $this->template->load('mainlayout', 'rekappegbypendidikan', $data);
    }

    public function rekappegbypendidikajson($id) {
        $hasil = $this->komposisimodel->getalldatapegawaibypendidikan($id);

        echo json_encode(array(
            array("name" => "SD|1", "data" => array(floatval($hasil[0]->sd))),
            array("name" => "SMP|2", "data" => array(floatval($hasil[0]->smp))),
            array("name" => "SMPK|3", "data" => array(floatval($hasil[0]->smpk))),
            array("name" => "SMU|4", "data" => array(floatval($hasil[0]->smu))),
            array("name" => "SMK|5", "data" => array(floatval($hasil[0]->smk))),
            array("name" => "D1|6", "data" => array(floatval($hasil[0]->d1))),
            array("name" => "D2|7", "data" => array(floatval($hasil[0]->d2))),
            array("name" => "Sarjana Muda|8", "data" => array(floatval($hasil[0]->smuda))),
            array("name" => "D3|9", "data" => array(floatval($hasil[0]->d3))),
            array("name" => "D4|10", "data" => array(floatval($hasil[0]->d4))),
            array("name" => "S1|11", "data" => array(floatval($hasil[0]->s1))),
            array("name" => "SP2|12", "data" => array(floatval($hasil[0]->sp2))),
            array("name" => "S2|13", "data" => array(floatval($hasil[0]->s2))),
            array("name" => "S3|14", "data" => array(floatval($hasil[0]->s3)))
        ));
    }

    public function rekappegbyeselon() {
        $data['listeselon'] = $this->komposisimodel->getalldatapegawaieselon();
        $this->template->load('mainlayout', 'rekappegbyeselon', $data);
    }

    public function rekappegbyeselonjson($id) {
        $hasil = $this->komposisimodel->getalldatapegawaieselon($id);

        echo json_encode(array(
            array("name" => "Ia|2", "data" => array(floatval($hasil[0]->ia))),
            array("name" => "Ib|3", "data" => array(floatval($hasil[0]->ib))),
            array("name" => "IIa|4", "data" => array(floatval($hasil[0]->iia))),
            array("name" => "IIb|5", "data" => array(floatval($hasil[0]->iib))),
            array("name" => "IIIa|6", "data" => array(floatval($hasil[0]->iiia))),
            array("name" => "IIIb|7", "data" => array(floatval($hasil[0]->iiib))),
            array("name" => "IVa|8", "data" => array(floatval($hasil[0]->iva))),
            array("name" => "IVb|9", "data" => array(floatval($hasil[0]->ivb))),
            array("name" => "Va|10", "data" => array(floatval($hasil[0]->va))),
            array("name" => "Vb|11", "data" => array(floatval($hasil[0]->vb)))
        ));
    }

    public function rekappegbyagama() {
        $data['listagama'] = $this->komposisimodel->getalldatapegawaiagama();
        $this->template->load('mainlayout', 'rekappegbyagama', $data);
    }

    public function rekappegbyagamajson($id) {
        $hasil = $this->komposisimodel->getalldatapegawaiagama($id);
        echo json_encode(array(array("name" => "Islam|1", "data" => array(floatval($hasil[0]->islam))), array("name" => "Katolik|2",
                "data" => array(floatval($hasil[0]->katolik))),
            array("name" => "Protestan|3", "data" => array(floatval($hasil[0]->protestan))),
            array("name" => "Hindu|4", "data" => array(floatval($hasil[0]->hindu))),
            array("name" => "Budha|5", "data" => array(floatval($hasil[0]->buda))),
            array("name" => "Konghucu|6", "data" => array(floatval($hasil[0]->konghucu)))));
    }

    public function rekappegbykelamin() {
        $data['listagama'] = $this->komposisimodel->getalldatapegawaikelamin();
        $this->template->load('mainlayout', 'rekappegbykelamin', $data);
    }

    public function rekappegbykelaminjson($id) {
        $hasil = $this->komposisimodel->getalldatapegawaikelamin($id);
        echo json_encode(array(
            array("name" => "Laki-laki|L", "data" => array(floatval($hasil[0]->l))),
            array("name" => "Perempuan|P", "data" => array(floatval($hasil[0]->p)))
        ));
    }

    public function rekappegbyjabatan() {
        $data['listjenis'] = $this->komposisimodel->getalldatajenisjabatan();
        $this->template->load('mainlayout', 'rekappegbyjenisjabatan', $data);
    }

    public function rekappegbyjabatanjson($id) {
        $hasil = $this->komposisimodel->getalldatajenisjabatan($id);
        echo json_encode(array(
            array("name" => "Struktural|2", "data" => array(floatval($hasil[0]->struktural))),
            array("name" => "Fungsional Tertentu|3", "data" => array(floatval($hasil[0]->ft))),
            array("name" => "Fungsional Umum|4", "data" => array(floatval($hasil[0]->fu))),
            array("name" => "Belum Ada Jabatan|0", "data" => array(floatval($hasil[0]->belum)))
        ));
    }

    public function rekappetaeselon() {
        $data['listeselon'] = $this->komposisimodel->getallpetaeselon();
        $this->template->load('mainlayout', 'rekappetaeselon', $data);
    }

    public function rekappetaeselonxls() {
        $data['listeselon'] = $this->komposisimodel->getallpetaeselon();
        $this->load->view('rekappetaeselonxls', $data);
    }

    public function matriksstruktural() {
        $golpangkat = isset($_GET['golongan']) && is_array($_GET['golongan']) ? implode(",", $_GET['golongan']) : null;
        $data['golpilih'] = $golpangkat;
        $data['listgol'] = $this->komposisimodel->getalldatapegawaibypangkat();
        $data['golpilih'] = isset($_GET['golongan']) && is_array($_GET['golongan']) ? $_GET['golongan'] : null;

        $data['listmt'] = $this->komposisimodel->getmatrikstrukturalpegawaiall($golpangkat);
        $this->template->load('mainlayout', 'matrixstruktural', $data);
    }

}
