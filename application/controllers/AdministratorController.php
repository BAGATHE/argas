<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/AdministratorParentController.php');
class AdministratorController extends AdministratorParentController{
    public function __construct(){
        parent::__construct();
        $this->load->model('Administrator');
        $this->load->model('Citizen');
        }
        public function index(){
          echo "ato am admin";
        }
        
        public function checkLogin(){	
          $data = array();
          $email = $this->input->post('email');
          $password = $this->input->post('password');
          $phone = $this->input->post('tel');
          $administrator = $this->Administrator->check_login($email, $phone, $password);
          echo json_encode($administrator);    
      }
        public function accessHomePage(){	
          $email =$this->input->post('email');
          $phone =$this->input->post('phone');
          $password =$this->input->post('password');

          $data['title'] = 'home Page';
          $data['description'] = 'home page';
          $data['contents'] = 'home';
          $data['administrator'] = $this->Administrator->check_login($email,$phone,$password);
          $data['citizens'] = $this->Citizen->findAllCitizen();
          $this->load->view('templates/template2', $data);
          
        }




        

}

