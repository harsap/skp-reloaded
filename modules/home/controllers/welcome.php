<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('Dashboardmodel', 'dashboardmodel');
    }

    public function index() {
        $this->template->load('mainlayout', 'welcome_message');
    }

    public function gettotalskpd($status = 1) {
        echo json_encode($this->dashboardmodel->getbanyaksotk($this->db->escape_str($status)));
    }

    public function gettotalpegawaibyjenisjabatan() {
        $struk = isset($_GET['struk']) ? $_GET['struk'] : '';
        $fu = isset($_GET['fu']) ? $_GET['fu'] : '';
        $ft = isset($_GET['ft']) ? $_GET['ft'] : '';
        echo json_encode($this->dashboardmodel->getbanyakpencarianpegawai($this->db->escape_str($struk), $this->db->escape_str($fu), $this->db->escape_str($ft), null, null, null, null, null, null, null, null, null, null, null, null, null, null));
    }

    public function getpersenpegawaibyjenisjabatan() {
        $total = $this->dashboardmodel->getbanyakpencarianpegawai(2, 4, 3, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
        $struk = $this->dashboardmodel->getbanyakpencarianpegawai(2, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
        $fu = $this->dashboardmodel->getbanyakpencarianpegawai(null, 4, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
        $ft = $this->dashboardmodel->getbanyakpencarianpegawai(null, null, 3, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
        $hasil = array(
            array("Struktural", ($struk / $total) * 100),
            array("Fungsional Umum", ($fu / $total) * 100),
            array("Fungsional Khusus", ($ft / $total) * 100)
        );
        $series = array("type" => "pie", "name" => "Jumlah Per jenis jabatan", "data" => $hasil);
        echo json_encode($series);
    }

    public function getpersenpegawaibyeselon() {
        $hasiltotal = $this->dashboardmodel->getpersenpegbyeselon();
        $seriesdata = array();

        foreach ($hasiltotal as $value) {
            $seriesdata[] = array($value->eselon_nm, (float) $value->perc);
        }
        $hasil = $seriesdata;
        $series = array("type" => "pie", "name" => "Jumlah ", "data" => $hasil);
        echo json_encode($series);
    }
    
     public function getpersenstrukturalperskpd() {
        $hasiltotal = $this->dashboardmodel->getpersenstrukturalperskpd();
        $seriesdata = array();

        foreach ($hasiltotal as $value) {
            $seriesdata[] = array($value->satker, (float) $value->perc);
        }
        $hasil = $seriesdata;
        $series = array("type" => "pie", "name" => "Jumlah ", "data" => $hasil);
        echo json_encode($series);
    }

}
