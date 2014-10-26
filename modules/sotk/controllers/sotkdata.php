<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Sotkdata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('Sotkmodel', 'sotkmodel');
    }

    public function index() {
	    $data['listsotk'] = $this->sotkmodel->getdatakomponensotk();
        $this->template->load('mainlayout', 'index',$data);
    }
	
	 

}
