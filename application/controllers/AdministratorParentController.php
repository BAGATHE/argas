<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorParentController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->_check_administrator_session();
    }

    private function _check_administrator_session() {
        if ($this->session->userdata('user_type') !== 'administrator') {
            redirect('EntryPoint');
        }
    }
}
?>