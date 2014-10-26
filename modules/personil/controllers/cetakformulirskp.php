<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of cetakformulirskp
 *
 * @author hari
 */
class cetakformulirskp extends CI_Controller{
   public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions(); 
        $this->load->model('Personilmodel', 'personilmodel');
    }
     public function index() {
        $data['listgol'] = $this->personilmodel->getallgolongan();
        $data['listeselon'] = $this->personilmodel->geteselon();
        $this->template->load('mainlayout', 'indexall', $data);
    }
}
