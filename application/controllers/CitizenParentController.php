<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CitizenParentController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->_check_citizen_session();
    }
    private function _check_citizen_session() {
        if ($this->session->userdata('user_type') !== 'citizen') {
            redirect('EntryPoint');
        }
    }
}
?>